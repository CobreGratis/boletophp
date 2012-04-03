<?php
/**
 * Project:  Boletophp
 * File:   Boleto.class.php
 *
 * This code is released under the GNU General Public License.
 * See COPYRIGHT.txt and LICENSE.txt.
 *
 * This library was built based on Boletophp v0.17
 * Many thanks to the mantainers and collaborators of Boletophp project at
 * boletophp.com.br.
 *
 * If you would like to collaborate by suggesting code and documentation
 * enhancements or
 * by extending new issuer bank implamentations then please check out readme.txt
 *  
 * @file This is the main Boleto class
 * @copyright 2011 hmcservicos.com.br 
 * @author Francisco Luz <franciscoferreiraluz at yahoo dot com dot au>
 * @package Boletophp
 *
 */

abstract class Boleto {
  /**
  * Indicate that an warning should be issued.
  */
  const BOLETO_WARNING = 'warning';
  /**
  * Image folder location.
  */
  const BOLETO_IMAGES = '../imagens/';

  /**
   * Issuer bank code.
   */
  private $bank_code;
  /**
   * Issuer bank name.
   */
  private $bank_name;
  /**
   * Defines whether or not the bank plugin is installed.
   */
  private $is_implemented = TRUE;
  
  /**
   * Hold warnings issued by the library itself and the bank issuer plugins.
   */
  public $warnings = array();
  
  /**
   * Method registration.
   */
  private $methods = array(
    'child'  => '',
    'parent' => '',
  ); 
  
  /**
   * General settings.
   */
  public $settings = array(
    'bank_logo'       => '',
    // folder location for images.
    'images'        => '',
    'style'         => '',
    'fator_vencimento_base' => '07-10-1997',
    // location and name of the html template file to render the output.
    'template'        => '',
    'bar_code'        => array(
      // thinner bar width.
      'fino'    => 1,
      // thicker bar width.
      'largo'   => 3,
      // bar height.
      'altura'  => 50,
      'black_bar' => 'p.png',
      'white_bar' => 'b.png',
      '#_strips'  => 226,
      'bar_codes' => array('00110', '10001', '01001', '11000', '00101', '10100', '01100', '00011', '10010', '01010'),
    ),
  );
  /**
   * Arguments sent by the application using this library.
   */
  public $arguments = array(
    'merchant_logo' => '',
    'nosso_numero' => '',
    'agencia' => '',
    'agencia_dv' => '',
    'conta' => '',
    'conta_dv' => '',
    'valor_boleto' => '',
    'numero_documento' => '',
    'endereco' => '',
    'cidade_uf' => '',
    'cedente' => '',
    'sacado' => '',
    'carteira_nosso_numero' => '',
    'cpf_cnpj' => '',
    // Client's address line 1, includes street name and number.
    'endereco1' => '',
    // Client's address line 2, includes city, state and zip code.
    'endereco2' => '',
    'demonstrativo1' => '',
    'demonstrativo2' => '',
    'demonstrativo3' => '',
    'instrucoes1' => '',
    'instrucoes2' => '',
    'instrucoes3' => '',
    'instrucoes4' => '',
    'data_documento' => '',
    'data_vencimento' => '',
    'data_processamento' => '',
    'carteira' => 'SR',
    'title' => '',
    'local_pagamento' => 'Pag&aacute;vel em qualquer Banco at&eacute; o vencimento',
    'especie' => 'R$',
    'quantidade' => '',
    'valor_unitario' => '',
    'especie_doc' => '',
    'avalista' => '',
    'aceite' => 'N',
    'desconto_abatimento' => '0.00',
    'outras_deducoes' => '0.00',
    'mora_multa' => '0.00',
    'outros_acrescimos' => '0.00',
  );
  /**
   * Holds values that went through some sort of processing.
   */
  private $computed = array(
    'codigo_banco_com_dv' => '',
    'valor_cobrado' => '',
    'data_vencimento' => '',
    // Human readable line.
    'linha_digitavel' => '',
    'nosso_numero' => '',
    'bar_code' => array(
      // Final drawn.
      'strips' => '',
      // Strip widths for debug checking.
      'widths' => ''
    ),
  );
  /**
   * Holds the values calculated accordingly to the FEBRABAN specification.
   */
  protected $febraban = array(
    // Codigo do banco sem o digito.
    '1-3'   => '',
    // Codigo da Moeda (9-Real).
    '4-4'   => 9,
    // Dígito verificador do código de barras.
    '5-5'   => '',
    // Fator de vencimento.
    '6-9'   => '',
    // Valor Nominal do Titulo.
    '10-19' => '',
    // Campo Livre. Set by child class (issuer bank implementation).
    '20-44' => '',
  );

  /**
   * @see the method output().
   */
  protected $output = array();
  
  /**
   * This the method that the library consumer must call statically.
   * It first checks it there is an plugin implementation for the desired bank.
   * If the plugin is present than it instantiates and returns the object
   * otherwise otherwise it returns a error message.
   */
  public static function load_boleto($arguments) {
    $bank_code = trim($arguments['bank_code']);
    $plugin_location = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'bancos' . DIRECTORY_SEPARATOR . $bank_code . DIRECTORY_SEPARATOR. 'Banco_' . $bank_code . '.php';
    
    if (@file_exists($plugin_location) ) {
      // Include the bank plugin.
      include_once($plugin_location);
      // Set the plugin class name.
      $bank_plugin = "Banco_$bank_code";
      // Instantiate the plugin objetc.
      return new $bank_plugin($arguments);
    }
    else {
      return "The plugin for the bank code $bank_code is not installed.";
    }
  }
  
  private function __construct($arguments){
    $this->arguments['data_documento']   = date('d-m-Y');
    $this->arguments['data_processamento'] = $this->arguments['data_documento'];
    
    // assign the arguments sent through.
    foreach($arguments as $argument => $value){
      $this->arguments[$argument] = $value;
    }
    // set default html head title.
    if (!isset($arguments['title'])){
      $this->arguments['title'] = $this->arguments['cedente'];   
    }
    $this->bank_code = trim($arguments['bank_code']);

    // Get methods declared in child class.
    $methods = get_class_methods('Banco_'.$this->bank_code);
    $child = TRUE;
    foreach($methods as $key => $method){
      // Everything listed before construct belongs to the child implementation.
      if ($method == '__construct'){
        $child = FALSE;
      }
      if ($child){
        $this->methods['child'][] = $method;
      }
      else {
        $this->methods['parent'][] = $method;
      }
    }

    // Call start up methods.
    $startUp = array(
      'settings',
      'data_vencimento',
      'fator_vencimento',
      'codigo_banco_com_dv',
      'febraban',
      'linha_digitavel',
      // generate bar code strips.
      'barcode', 
    );

    foreach($startUp as $methodName) {
      $this->$methodName();
    }
  }

  /**
   * Calculates a check digit from any given number based on the modulo 10 specification.
   *
   * @param String $num
   *  The number you wish to calcule the check digit from.
   * @see Documentation at http:// www.febraban.org.br/Acervo1.asp?id_texto=195&id_pagina=173&palavra=
   * @return String
   *  The check digit number.
   */
  public function modulo_10($num) {
    $numtotal10 = 0;
    $fator = 2;

    //  Separacao dos numeros.
    for ($i = strlen($num); $i > 0; $i--) {
      //  pega cada numero isoladamente.
      $numeros[$i] = substr($num,$i-1,1);
      //  Efetua multiplicacao do numero pelo (falor 10).
      $temp = $numeros[$i] * $fator; 
      $temp0=0;
      foreach (preg_split('// ',$temp,-1,PREG_SPLIT_NO_EMPTY) as $k=>$v){ $temp0+=$v; }
      $parcial10[$i] = $temp0; // $numeros[$i] * $fator;
      //  monta sequencia para soma dos digitos no (modulo 10).
      $numtotal10 += $parcial10[$i];
      if ($fator == 2) {
        $fator = 1;
      }
      else {
        // intercala fator de multiplicacao (modulo 10).
        $fator = 2;
      }
    }
		
    $resto  = $numtotal10 % 10;
    $digito = 10 - $resto;
    
    // make it zero if check digit is 10.
    $digito = ($digito == 10) ? 0 : $digito;

    return $digito;
  }
  
  /**
   * Calculates a check digit from any given number based on the modulo 11 specification.
   *
   * @param string $num
   *  The number you wish to calcule the check digit from
   * @param string $base
   *  Optional. This is defaulted to 9
   * @see Documentation at http:// www.febraban.org.br/Acervo1.asp?id_texto=195&id_pagina=173&palavra=
   * @return array
   *  The returned array keys are digito and resto
   */
  public function modulo_11($num, $base=9){
    $fator = 2;

    $soma  = 0;
    /* Separacao dos numeros */
    for ($i = strlen($num); $i > 0; $i--) {
      //  pega cada numero isoladamente
      $numeros[$i] = substr($num,$i-1,1);
      //  Efetua multiplicacao do numero pelo falor
      $parcial[$i] = $numeros[$i] * $fator;
      //  Soma dos digitos
      $soma += $parcial[$i];
      if ($fator == $base) {
        //  restaura fator de multiplicacao para 2 
        $fator = 1;
      }
      $fator++;
    }
    $result = array(
      'digito' => ($soma * 10) % 11,
      // Remainder.
      'resto'  => $soma % 11,
    );
    if ($result['digito'] == 10){
      $result['digito'] = 0;   
    }
    return $result;
  }

  /**
   * Calculation of "Due Date" field
   * Argument values expected: -1       == Cash against document
   *               Integer Number == Number of days added on top of issuing date
   *               dd-mm-yyy    == Set date
   *               
   * If argument is not present then it adds 5 days on top of issuing date.
   */
  private function data_vencimento(){
    // Set defaults.
    // Making sure we got a dash "-" instead of forward slah "/" for vencimento.
    $this->computed['data_vencimento'] = str_replace('/','-', $this->arguments['data_vencimento']);
    // Adds 5 days on top of issuing date.
    $vencimento = '+5';
    $vencimento_value = date('d-m-Y', strtotime($vencimento.' days'));
    
    // Check if an argument for vencimento has been set.
    if (!empty($this->arguments['data_vencimento'])){
      if (is_numeric($this->arguments['data_vencimento'])){
        // cash against document.
        if ($this->arguments['data_vencimento'] == -1){
          $vencimento_value = 'Contra Apresenta&ccedil;&atilde;o';
        }
        else {
          // For any other integer.
          $vencimento = '+' . $this->arguments['data_vencimento'];
          $vencimento_value = date('d-m-Y', strtotime($vencimento . ' days'));
        }
      }
      else {
        // An actual date was sent through.
        $vencimento_value =  $this->computed['data_vencimento'];
        // Check if date is in a valide format.
        $date_check = explode('-', $vencimento_value);
        if (!checkdate($date_check[1], $date_check[0], $date_check[2])){
          $this->setWarning(array('data_vencimento', 'Invalido. Certifique-se que tenha informado ou -1 ou um numero inteiro ou uma data no formato dd-mm-yyyy.<br>'));
        }        
      }
    }
    $this->computed['data_vencimento']  = $vencimento_value;
  }
  
  /**
   * Calculates the "Due date" 4 digits factor number.
   * It is the positions from 6 to 9 in the Febraban array.
   * 
   * Script from http:// phpbrasil.com/articles/print.php/id/1034
   */
  private function fator_vencimento(){
    $from = $this->settings['fator_vencimento_base'];
    $to   = $this->computed['data_vencimento'];
    
    if ($this->arguments['data_vencimento'] == -1){
      // "Due Date" is Cash against document.
      $days = '0000';
    }
    else {
      // Usar DD-MM-AA ou DD-MM-AAAA.
      list($from_day, $from_month, $from_year) = explode("-", $from); 
      list($to_day, $to_month, $to_year) = explode("-", $to); 
      $from_date = mktime(0, 0, 0, $from_month, $from_day, $from_year); 
      $to_date = mktime(0, 0, 0, $to_month, $to_day, $to_year);
      
      $days = round(($to_date - $from_date) / 86400);
    }
    // assign value to febraban array property.
    $this->febraban['6-9'] = $days;
  }

  /**
   * Calculates the check digit for bank code.
   */
  private function codigo_banco_com_dv() {
    if (!empty($this->arguments['bank_code_cd'])) {
      $this->computed['codigo_banco_com_dv'] = $this->bank_code.'-'.$this->arguments['bank_code_cd'];
    }
    else {
      //  set codigo_banco_com_dv.
      $bank_code_checkDigit = $this->modulo_11($this->bank_code);
      $this->computed['codigo_banco_com_dv'] = $this->bank_code.'-'.$bank_code_checkDigit['digito'];
      
    }
  }

  /**
   * Calculates and construct the FEBRABAN specification.
   * 
   * 01-03 (3)  -> Código do banco sem o digito.
   * 04-04 (1)  -> Código da Moeda (9-Real).
   * 05-05 (1)  -> Dígito verificador do código de barras.
   * 06-09 (4)  -> Fator de vencimento.
   * 10-19 (10) -> Valor Nominal do Título.
   * 20-44 (25) -> Campo Livre.
   *         This is calculated at child's class implementation by febraban20to44().
   *
   * @see Documentation at http://www.febraban.org.br/Acervo1.asp?id_texto=195&id_pagina=173&palavra=
   */
  private function febraban(){
    // Positions 1 to 3.
    $this->febraban['1-3'] = $this->bank_code;
    // Position 4 has a pre set value of 9.
    // Positions 6-9 is done at fator_vencimento().
    
    // Remove decimal separator from valor_cobrado.
    $vc   = str_replace('.','', $this->computed['valor_cobrado']);
    // Positions 10 to 19.
    $this->febraban['10-19'] = str_pad($vc, 10, 0, STR_PAD_LEFT);
 
    if ($this->is_implemented) {
      // Check if method is implemented.
      if (in_array('febraban_20to44', $this->methods['child'])){
        // Positions 20 to 44 vary from bank to bank, so we call the child extention.
        $this->febraban_20to44();
      }
    }
    // Calculate the check digit (position 5) of all 43 number set.
    $checkDigit = '';
    foreach($this->febraban as $value){
      $checkDigit .= $value;  
    }
    $checkDigit = $this->modulo_11($checkDigit);
    $resto = $checkDigit['resto'];
    if ($resto == 0 || $resto == 1 || $resto == 10){
      $checkDigit['digito'] = 1;
    }
    else {
      $checkDigit['digito'] = 11 - $resto;
    }    
    // Position 5 (check digit for the whole set).
    $this->febraban['5-5'] = $checkDigit['digito'];
    
    // Check if febraban property is complying with the rules and
    // Create an array of allowed lenghs for each febraban block.
    $rules = array('1-3' => 3, '4-4' => 1, '5-5' => 1, '6-9' => 4, '10-19' => 10, '20-44' => 25);
    
    foreach($this->febraban as $key => $value){
      $lengh = strlen($value);
      if ($lengh != $rules[$key]){
        $this->setWarning(array("febraban[$key]", "possui $lengh digitos enquanto deveria ter $rules[$key]."));
      }
    }
    
    // Check if child class wants to do any custom stuff before object
    // delivering.
    if ($this->is_implemented) {    
      if (in_array('custom', $this->methods['child'])){
        // When present, this is the last method to be called in the
        // construction chain.
        $this->custom();
      }
    }
  }
  
  /**
   * Assembles the human readable code set (linha digitavel).
   */
  private function linha_digitavel(){
    // Break down febraban positions 20 to 44 into 3 blocks of 5, 10 and 10
    // characters each.
    $blocks = array(
      '20-24' => substr($this->febraban['20-44'], 0, 5),
      '25-34' => substr($this->febraban['20-44'], 5, 10),
      '35-44' => substr($this->febraban['20-44'], 15, 10),
    );

    // Concatenates bankCode + currencyCode + first block of 5 characters and
    // calculates its check digit for part1.
    $checkDigit = $this->modulo_10($this->bank_code.$this->febraban['4-4'].$blocks['20-24']);

    // Shift in a dot on block 20-24 (5 characters) at its 2nd position.
    $blocks['20-24'] = substr_replace($blocks['20-24'], '.', 1, 0);

    // Concatenates bankCode + currencyCode + first block of 5 characters + checkDigit.
    $part1 = $this->bank_code.$this->febraban['4-4'].$blocks['20-24'].$checkDigit;
    
    // Calculates part2 check digit from 2nd block of 10 characters.
    $checkDigit = $this->modulo_10($blocks['25-34']);
     
    $part2 = $blocks['25-34'].$checkDigit;
    // Shift in a dot at its 6th position.
    $part2 = substr_replace($part2, '.', 5, 0);

    // Calculates part3 check digit from 3rd block of 10 characters.
    $checkDigit = $this->modulo_10($blocks['35-44']);
     
    // As part2, we do the same process again for part3.
    $part3 = $blocks['35-44'].$checkDigit;
    $part3 = substr_replace($part3, '.', 5, 0);
     
    // Check digit for the human readable number.
    $cd = $this->febraban['5-5'];
    // Put part4 together.
    $part4  = $this->febraban['6-9'].$this->febraban['10-19'];
     
    // Now put everything together.
    $this->computed['linha_digitavel'] = "$part1 $part2 $part3 $cd $part4";
     
    // Now validates the human readable number.
    $lengh = strlen($this->computed['linha_digitavel']);
    if ($lengh != 54){
      $lengh -= 7; 
      $this->setWarning(array("linha_digitavel", "possui $lengh digitos enquanto deveria ter 47.")); 
    }
  }

  /**
   * Pre settting.
   */
  private function settings(){
    $this->bank_name = 'Ops!!! Aparentemente o banco informado nao esta implementado. No juice for you.';
    $this->settings['bank_logo'] = self::BOLETO_IMAGES . 'bank_logo_default.jpg';
    $this->settings['style'] = '..' . DIRECTORY_SEPARATOR . 'style.css';
    $this->settings['template'] = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'boleto.tpl.php';
  
    // Calculate valor_cobrado (total amount).
    $subtractions = $this->arguments['desconto_abatimento'] + $this->arguments['outras_deducoes'];
    $additions  = $this->arguments['mora_multa'] + $this->arguments['outros_acrescimos'];
    $this->computed['valor_cobrado'] = ($this->arguments['valor_boleto'] - $subtractions) + $additions;
    
    // Format valor_boleto.
    $this->arguments['valor_boleto'] = number_format($this->arguments['valor_boleto'], 2, '.', '');
    // format valor_cobrado.
    $this->computed['valor_cobrado'] = number_format($this->computed['valor_cobrado'], 2, '.', '');
    
    // Check some basic settings.
    if ($this->is_implemented){
      // Check if these files exists.
      $files = array(
        'bank_logo' => array(
          '#file_name' => 'logo.jpg',
          '#required' => TRUE,
        ),
        'template' => array(
          '#file_name' => 'layout.tpl.php',
          '#required' => FALSE,
        ),
        'style' => array(
          '#file_name' => 'style.css',
          '#required' => FALSE,
        ),
        'readme' => array(
          '#file_name' => 'README.txt',
          '#required' => TRUE
        ),
      );
      $location = '..' . DIRECTORY_SEPARATOR . 'bancos' . DIRECTORY_SEPARATOR . $this->bank_code;
      $true_path = dirname(__FILE__). DIRECTORY_SEPARATOR . 'bancos' . DIRECTORY_SEPARATOR .$this->bank_code;
      
      foreach($files as $key => $value){
        $filename = $value['#file_name'];
        
        if (@file_exists($true_path. DIRECTORY_SEPARATOR .$filename)){
          if ($key == 'template'){
            $this->settings[$key] = $true_path. DIRECTORY_SEPARATOR .$filename;
          }
          else {
            $this->settings[$key] = $location. DIRECTORY_SEPARATOR .$filename;  
          }
          
        }
        elseif ($value['#required']){
          // set warning.
          $this->setWarning(array($key, "O arquivo $location/$filename nao pode ser encontrado."));
        }
      }
      // Check if child method is implemented.
      if (in_array('setUp', $this->methods['child']) && in_array('febraban_20to44', $this->methods['child'])){
        $this->setUp();
      }
      else {
        // Set warning.
        $this->setWarning(array('settings', 'Os metodos setUp e febraban_20to44 nao foram encontradas na implementacao do banco. Leia o arquivo readme.txt para mais informacoes.'));
      }
    }
  }

  /**
   * Generate bar code strips.
   */
  private function barcode(){
    // Assemble code from febraban array.
    $code = '';
    foreach($this->febraban as $value){
      $code .= $value;
    }
    
    // Get bar code values from settings.
    $barcodes = $this->settings['bar_code']['bar_codes'];

    // Apply bar codes to the febraban code.
    for($f1=9; $f1>=0; $f1--){ 
      for($f2=9; $f2>=0; $f2--){  
        $f = ($f1 * 10) + $f2 ;
        $texto = '';
        for($i=1; $i<6; $i++){ 
          $texto .=  substr($barcodes[$f1],($i-1),1) . substr($barcodes[$f2],($i-1),1);
        }
        $barcodes[$f] = $texto;
      }
    }    
    // Get bar width from settings.
    $thinner = $this->settings['bar_code']['fino'];
    $thicker = $this->settings['bar_code']['largo'];
    // Get bar height.
    $height = $this->settings['bar_code']['altura'];
    
    // Get the black and white bar images.
    $black = self::BOLETO_IMAGES . $this->settings['bar_code']['black_bar'];
    $white = self::BOLETO_IMAGES . $this->settings['bar_code']['white_bar'];
    
    // Create a sequence of black and white strips.
    $total = $this->settings['bar_code']['#_strips'];
    for($i = 0; $i <= $total; $i++){
      // White for odd numbers and black for even numbers. Actually what matters
      // is black being the first to start off.
      if ($i&1){
        $img_strips[] = $white;
      }
      else {
        $img_strips[] = $black;
      }
    }
    
    // Set strip widths.
    // Start code bit.
    $img_widths = array($thinner, $thinner, $thinner, $thinner);    
    
    // Main code.
    if ((strlen($code) % 2) <> 0){
      $code = "0" . $code;
    }
    while (strlen($code) > 0) {
      $i = round(substr($code,0,2));
      $code = $this->direita($code, strlen($code)-2);
      $f = $barcodes[$i];
      for($i=1;$i<11;$i+=2){
        if (substr($f,($i-1),1) == "0") {
          $f1 = $thinner;
        }
        else {
          $f1 = $thicker ;
        }
        $img_widths[] = $f1;
    
        if (substr($f,$i,1) == "0") {
          $f2 = $thinner;
        }
        else {
          $f2 = $thicker;
        }
        $img_widths[] = $f2;
      }
    }
    // Stop code bit.
    $img_widths[] = $thicker;
    $img_widths[] = $thinner;
    $img_widths[] = $thinner;
    
    // Render the output.
    foreach($img_widths as $key => $width){
      // Rendering.
      $img = $img_strips[$key];
      $this->computed['bar_code']['strips'] .= "<img src=$img width=$width height=$height border=0>";
      
      // Strip widths for debug checking.
      $this->computed['bar_code']['widths'] .=  $width;
    }
  }
  /**
   * Helper function for barcode().
   * 
   * @param String $entra
   *  TODO: Document this.
   * @param String $comp
   *  TODO: Document this.
   * @return String
   *  TODO: Document this.
   */
  private function direita($entra,$comp){
    return substr($entra,strlen($entra)-$comp,$comp);
  }

  /**
   * Render boleto.
   * This method is not trigged at the start up. It gotta be called after
   * instantiation.
   *
   * @param Boolean
   *  Whether or not the array values generated by this method should be
   *  rendered in the template.
   * 
   */
  public function output($render = TRUE){
    // Boleto fields that get printed out in the template.
    $this->output = array(
      'title' => $this->arguments['title'],
      'linha_digitavel' => $this->computed['linha_digitavel'],
      'valor_boleto' => number_format($this->arguments['valor_boleto'], 2, ',', '.'),
      'cpf_cnpj' => $this->arguments['cpf_cnpj'],
      'endereco' => $this->arguments['endereco'],
      'cidade_uf' => $this->arguments['cidade_uf'],
      'bank_logo_path' => $this->settings['bank_logo'],
      'images' => self::BOLETO_IMAGES,
      'style' => $this->settings['style'],
      'codigo_banco_com_dv' => $this->computed['codigo_banco_com_dv'],
      'cedente' => $this->arguments['cedente'],
      'especie' => $this->arguments['especie'],
      'quantidade' => $this->arguments['quantidade'],
      'data_vencimento' => $this->computed['data_vencimento'],
      'desconto_abatimento' => number_format($this->arguments['desconto_abatimento'], 2, ',', '.'),
      'outras_deducoes' => number_format($this->arguments['outras_deducoes'], 2, ',', '.'),
      'mora_multa' => number_format($this->arguments['mora_multa'], 2, ',', '.'),
      'outros_acrescimos' => number_format($this->arguments['outros_acrescimos'], 2, ',', '.'),
      'valor_cobrado' => number_format($this->computed['valor_cobrado'], 2, ',', '.'),
      'sacado' => $this->arguments['sacado'],
      'demonstrativo1' => $this->arguments['demonstrativo1'],
      'demonstrativo2' => $this->arguments['demonstrativo2'],
      'demonstrativo3' => $this->arguments['demonstrativo3'],
      'local_pagamento' => $this->arguments['local_pagamento'],
      'data_documento' => $this->arguments['data_documento'],
      'numero_documento' => $this->arguments['numero_documento'],
      'agencia_codigo_cedente'=> $this->arguments['agencia'].' / '.$this->arguments['conta'].'-'.$this->arguments['conta_dv'],
      'nosso_numero' => $this->computed['nosso_numero'],
      'especie_doc' => $this->arguments['especie_doc'],
      'aceite' => $this->arguments['aceite'],
      'data_processamento'  => $this->arguments['data_processamento'],
      'carteira' => $this->arguments['carteira'],
      'valor_unitario' => $this->arguments['valor_unitario'],
      'instrucoes1' => $this->arguments['instrucoes1'],
      'instrucoes2' => $this->arguments['instrucoes2'],
      'instrucoes3' => $this->arguments['instrucoes3'],
      'instrucoes4' => $this->arguments['instrucoes4'],
      'endereco1' => $this->arguments['endereco1'],
      'endereco2' => $this->arguments['endereco2'],
      'avalista' => $this->arguments['avalista'],
      'codigo_barras' => $this->computed['bar_code']['strips'],
    );
    // Check if merchant logo exists.
    if (!empty($this->arguments['merchant_logo'])) {
      $this->output['merchant_logo'] = $this->arguments['merchant_logo'];
    }
    else {
      // Set default.
      $this->output['merchant_logo'] = self::BOLETO_IMAGES . DIRECTORY_SEPARATOR . 'merchant_logo.png';
    }
    // Check if child class wants to change anything before rendering it out.
    if ($this->is_implemented) {
      if (in_array('outputValues', $this->methods['child'])){
        $this->outputValues();
      }
    }
    // It's time for rendering it. Yaaay!!!
    if ($render){
      include_once($this->settings['template']);  
    }
  }
  
  /**
   * Set Warnings.
   * 
   * @param Array $message
   *  The array key holds the field name and the array Value holds the Message
   *  to be set or unset.
   * @param Boolean $action
   *  Whether or not the current warning should be added to the warning
   *  parameter
   * 
   */  
  public function setWarning($message, $action = TRUE){
    if ($action){
      $this->warnings[$message[0]][] = $message[1];
    }
    else {
      unset($this->warnings[$message[0]]);
    }
  }  
}
