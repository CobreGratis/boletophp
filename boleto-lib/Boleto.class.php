<?php
/**
 * Project:  Boletophp
 * File:     Boleto.class.php
 *
 * This code is released under the GNU General Public License.
 * See COPYRIGHT.txt and LICENSE.txt.
 *
 * This library was built based on Boletophp v0.17
 * Many thanks to the mantainers and collaborators of Boletophp project at boletophp.com.br.
 *
 * If you would like to collaborate by suggesting code and documentation enhancements or
 * by extending new issuer bank implamentations then please check out readme.txt
 *  
 * @file This is the main Boleto class
 * @copyright 2011 Drupalista.com.br 
 * @author Francisco Luz <franciscoferreiraluz at yahoo dot com dot au>
 * @package Boleto
 * @version 1.0 Beta
 *
 *  --------------------------------C O N T R A T A C A O ---------------------------------------------------
 *  
 * - Estou disponível para trabalhos freelance, contrato temporario ou permanente. (falo ingles fluente)
 * - Tambem presto serviços de treinamento em Drupal para empresas e profissionais da área de
 *   desenvolvimento web ou para empresas / pessoas usuarias da plataforma Drupal que queiram capacitar
 *   sua equipe interna para tirar o maximo proveito do poder do Drupal.
 * - Trabalho com soluções como o Open Public (http://openpublicapp.com), ideal para prefeituras e
 *   autarquias publicas.
 * - Trabalho ainda com o Open Publish (http://openpublishapp.com), uma solucao completa de websites
 *   para canais de tv, jornais, revistas, notícias, etc...
 *
 *   Acesse o meu website http://www.drupalista.com.br para me contactar.
 *
 *   Francisco Luz
 *   Junho / 2011
 */

class Boleto {
    //issuer bank info
    public $bank_code;
    public $bank_name;
    private $is_implemented = TRUE;
    
    //warnings
    public $warnings = array();
    
    //Method registration
    private $methods = array('child'  => '',
                             'parent' => '',); 
    
    //General settings
    public $settings = array('bank_logo'             => '',
                             'images'                => '', //folder location for images
                             'style'                 => '',
                             'fator_vencimento_base' => '07-10-1997',
                             'template'              => '', //location and name of the html template file to render the output
                             'bar_code'              => array('fino'      => 1, //thinner bar width
                                                              'largo'     => 3, //thicker bar width
                                                              'altura'    => 50, //bar height
                                                              'black_bar' => 'p.png',
                                                              'white_bar' => 'b.png',
                                                              '#_strips'  => 226,
                                                              'bar_codes' => array('00110',
                                                                                   '10001',
                                                                                   '01001',
                                                                                   '11000',
                                                                                   '00101',
                                                                                   '10100',
                                                                                   '01100',
                                                                                   '00011',
                                                                                   '10010',
                                                                                   '01010',
                                                                                   ),
                                                        ),
                             );
    //Boleto fields
    public $arguments = array('library_location'      => '',
                              'merchant_logo'         => '',
                              'nosso_numero'          => '',
                              'agencia'               => '',
                              'agencia_dv'            => '',
                              'conta'                 => '',
                              'conta_dv'              => '',
                              'valor_boleto'          => '',
                              'numero_documento'      => '',
                              'endereco'              => '',
                              'cidade_uf'             => '',
                              'cedente'               => '',
                              'sacado'                => '',
                              'carteira_nosso_numero' => '',
                              'cpf_cnpj'              => '',
                              'endereco1'             => '', //Client's address line 1, includes street name and number
                              'endereco2'             => '', //Client's address line 2, includes city, state and zip code
                              'demonstrativo1'        => '',
                              'demonstrativo2'        => '',
                              'demonstrativo3'        => '',
                              'instrucoes1'           => '',
                              'instrucoes2'           => '',
                              'instrucoes3'           => '',
                              'instrucoes4'           => '',
                              'data_documento'        => '',
                              'data_vencimento'       => '',
                              'data_processamento'    => '',
                              'carteira'              => 'SR',
                              'title'                 => '',
                              'local_pagamento'       => 'Pag&aacute;vel em qualquer Banco at&eacute; o vencimento',
                              'especie'               => 'R$',
                              'quantidade'            => '',
                              'valor_unitario'        => '',
                              'especie_doc'           => '',
                              'avalista'              => '',
                              'aceite'                => 'N',
                              'desconto_abatimento'   => '0.00',
                              'outras_deducoes'       => '0.00',
                              'mora_multa'            => '0.00',
                              'outros_acrescimos'     => '0.00',
                              );
    //values that go through processing
    public $computed = array('codigo_banco_com_dv' => '',
                             'valor_cobrado'       => '',
                             'data_vencimento'     => '',
                             'linha_digitavel'     => '',  //human readable line
                             'nosso_numero'        => '',
                             'bar_code'            => array('strips' => '', //final drawn
                                                            'widths' => ''), //strip widths for debug checking
                             );
    //febraban specifications
    public $febraban = array('1-3'   => '', //Codigo do banco sem o digito
                             '4-4'   => 9,  //Codigo da Moeda (9-Real)
                             '5-5'   => '', //Dígito verificador do código de barras
                             '6-9'   => '', //Fator de vencimento
                             '10-19' => '', //Valor Nominal do Titulo
                             '20-44' => '', //Campo Livre. Set by child class (issuer bank implementation).
                              );
    //see output()
    public $output = array();
    
    public function __construct($arguments){
        $this->arguments['data_documento']     = date('d-m-Y');
        $this->arguments['data_processamento'] = $this->arguments['data_documento'];
        
        //assign the arguments sent through
        foreach($arguments as $argument => $value){
            $this->arguments[$argument] = $value;
        }
        //set default html head title
        if(!isset($arguments['title'])){
            $this->arguments['title'] = $this->arguments['cedente'];   
        }
        $this->bank_code = trim($arguments['bank_code']);

        //check if the issuer bank is implemented by a child class   
        if(!@file_exists(getcwd().'/boleto-lib/bancos/'.$this->bank_code.'/Banco_'.$this->bank_code.'.php') ) {
            $this->is_implemented = 0;
        }else{
            //include class implementation file
            include_once(getcwd().'/boleto-lib/bancos/'.$this->bank_code.'/Banco_'.$this->bank_code.'.php');
            //get methods declared at child class
            $methods = get_class_methods('Banco_'.$this->bank_code);
            $child = TRUE;
            foreach($methods as $key => $method){
                //everything listed before construct belongs to the child implementation
                if($method == '__construct'){
                    $child = FALSE;
                }
                if($child){
                    $this->methods['child'][] = $method;
                    
                }else{
                    $this->methods['parent'][] = $method;
                }
            }
        }
        //Call start up methods
        $startUp = array('settings',
                         'data_vencimento',
                         'fator_vencimento',
                         'codigo_banco_com_dv',
                         'febraban',
                         'linha_digitavel',
                         'barcode', //generate bar code strips
                         );

        foreach($startUp as $methodName){
            call_user_func(array('Boleto', $methodName));
        }
     }

    // Documentation at http://www.febraban.org.br/Acervo1.asp?id_texto=195&id_pagina=173&palavra=
    public function modulo_10($num) {
	$numtotal10 = 0;
        $fator      = 2;

        // Separacao dos numeros
        for ($i = strlen($num); $i > 0; $i--) {
            // pega cada numero isoladamente
            $numeros[$i] = substr($num,$i-1,1);
            // Efetua multiplicacao do numero pelo (falor 10)
            $temp = $numeros[$i] * $fator; 
            $temp0=0;
            foreach (preg_split('//',$temp,-1,PREG_SPLIT_NO_EMPTY) as $k=>$v){ $temp0+=$v; }
            $parcial10[$i] = $temp0; //$numeros[$i] * $fator;
            // monta sequencia para soma dos digitos no (modulo 10)
            $numtotal10 += $parcial10[$i];
            if ($fator == 2) {
                $fator = 1;
            } else {
                $fator = 2; //intercala fator de multiplicacao (modulo 10)
            }
        }
		
        $resto  = $numtotal10 % 10;
        $digito = 10 - $resto;

        return $digito;
    }
    
    /**
     * @return array The returned array keys are digito and resto
     *
     * Documentation at http://www.febraban.org.br/Acervo1.asp?id_texto=195&id_pagina=173&palavra=
     */
    public function modulo_11($num, $base=9){
        $fator = 2;

        $soma  = 0;
        /* Separacao dos numeros */
        for ($i = strlen($num); $i > 0; $i--) {
            // pega cada numero isoladamente
            $numeros[$i] = substr($num,$i-1,1);
            // Efetua multiplicacao do numero pelo falor
            $parcial[$i] = $numeros[$i] * $fator;
            // Soma dos digitos
            $soma += $parcial[$i];
            if ($fator == $base) {
                // restaura fator de multiplicacao para 2 
                $fator = 1;
            }
            $fator++;
        }
        $result = array('digito' => ($soma * 10) % 11,
                        'resto'  => $soma % 11, //Remainder 
                        );
        if($result['digito'] == 10){
            $result['digito'] = 0;   
        }
        
        return $result;
    }

    /**
     * Calculation of "Due Date" field
     * Argument values expected: -1             == Cash against document
     *                           Integer Number == Number of days added on top of issuing date
     *                           dd-mm-yyy      == Set date
     *                           
     * If argument is not present then it adds 5 days on top of issuing date.
     */
    public function data_vencimento(){
        /** set defaults**/
        //making sure we got a dash "-" instead of forward slah "/" for vencimento
        $this->computed['data_vencimento'] = str_replace('/','-', $this->arguments['data_vencimento']);
        //adds 5 days on top of issuing date
        $vencimento            = '+5';
        $vencimento_value      = date('d-m-Y', strtotime($vencimento.' days'));
        
        //check if an argument for vencimento has been set
        if(!empty($this->arguments['data_vencimento'])){
            if(is_numeric($this->arguments['data_vencimento'])){
                //cash against document
                if($this->arguments['data_vencimento'] == -1){
                    $vencimento_value = 'Contra Apresenta&ccedil;&atilde;o';
                }else{
                    //for any other integer
                    $vencimento       = '+'.$this->arguments['data_vencimento'];
                    $vencimento_value = date('d-m-Y', strtotime($vencimento.' days'));
                }
            }else{
                //an actual date was sent through
                $vencimento_value =  $this->computed['data_vencimento'];
                //check if date is in a valide format
                $date_check = explode('-', $vencimento_value);
                if(!checkdate($date_check[1], $date_check[0], $date_check[2])){
                    $this->setWarning(array('data_vencimento', 'Invalido. Certifique-se que tenha informado ou -1 ou um numero inteiro ou uma data no formato dd-mm-yyyy.<br>'));
                }                
            }
        }
        $this->computed['data_vencimento']    = $vencimento_value;
    }
    
    /**
     * Calculates the "Due date" 4 digits factor number.
     * It is the positions from 6 to 9 in Febraban array
     * 
     * script from http://phpbrasil.com/articles/print.php/id/1034
     */
    function fator_vencimento(){
        $from = $this->settings['fator_vencimento_base'];
        $to   = $this->computed['data_vencimento'];
        
        if($this->arguments['data_vencimento'] == -1){
            //"Due Date" is Cash against document
            $days = '0000';
        }else{
            /* Usar DD-MM-AA ou DD-MM-AAAA */
            list($from_day, $from_month, $from_year) = explode("-", $from); 
            list($to_day, $to_month, $to_year) = explode("-", $to); 
            $from_date = mktime(0, 0, 0, $from_month, $from_day, $from_year); 
            $to_date = mktime(0, 0, 0, $to_month, $to_day, $to_year);
            
            $days = ceil(($to_date - $from_date) / 86400);
        }
        //assign value to febraban array property
        $this->febraban['6-9'] = $days;
    }

    //calculates the check digit for bank code  
    public function codigo_banco_com_dv(){
        //set codigo_banco_com_dv
        $bank_code_checkDigit                    = $this->modulo_11($this->bank_code);
        $this->computed['codigo_banco_com_dv']   = $this->bank_code.'-'.$bank_code_checkDigit['digito'];
    }

    // Documentation at http://www.febraban.org.br/Acervo1.asp?id_texto=195&id_pagina=173&palavra=    
    public function febraban(){
        /** calculates FEBRABAN specifications **/
	// 01-03 (3)  -> Código do banco sem o digito
	// 04-04 (1)  -> Código da Moeda (9-Real)
	// 05-05 (1)  -> Dígito verificador do código de barras
	// 06-09 (4)  -> Fator de vencimento
	// 10-19 (10) -> Valor Nominal do Título
	// 20-44 (25) -> Campo Livre. This is calculated at child's class implementation by febraban20to44().

        //postions 1 to 3
        $this->febraban['1-3'] = $this->bank_code;
        //position 4 has a pre set value of 9
        //positions 6-9 is done at fator_vencimento()
        
        //remove decimal separator from valor_cobrado
        $vc   = str_replace('.','', $this->computed['valor_cobrado']);
        //positions 10 to 19
        $this->febraban['10-19'] = str_pad($vc, 10, 0, STR_PAD_LEFT);
 
        if($this->is_implemented) {
            //check if method is implemented
            if(in_array('febraban_20to44', $this->methods['child'])){
                //positions 20 to 44 vary from bank to bank, so we call the child extention
                $child = 'Banco_'.$this->bank_code;
                $child::febraban_20to44();
            }
        }
        //calculate the check digit (position 5) of all 43 number set
        $checkDigit = '';
        foreach($this->febraban as $value){
            $checkDigit .= $value;    
        }
        $checkDigit = $this->modulo_11($checkDigit);
        $resto      = $checkDigit['resto'];
        if($resto == 0 || $resto == 1 || $resto == 10){
            $checkDigit['digito'] = 1;
        }else{
            $checkDigit['digito'] = 11 - $resto;
        }        
        //position 5 (check digit for the whole set)
        $this->febraban['5-5'] = $checkDigit['digito'];
        
        /** check if febraban property is complying with the rules **/
        //create an array of allowed lenghs for each febraban block
        $rules = array('1-3' => 3, '4-4' => 1, '5-5' => 1, '6-9' => 4, '10-19' => 10, '20-44' => 25);
        
        foreach($this->febraban as $key => $value){
            $lengh = strlen($value);
            if($lengh != $rules[$key]){
                $this->setWarning(array("febraban[$key]", "possui $lengh digitos enquanto deveria ter $rules[$key]."));
            }
        }
        
        //check if child class wants to do any custom stuff before object delivering
        if($this->is_implemented) {        
            if(in_array('custom', $this->methods['child'])){
                //when present, this is the last method to be called in the construction chain
                $childClass = 'Banco_'.$this->bank_code;
                $childClass::custom();
            }
        }

    }
    
    //assembles the human readable code set (linha digitavel)
    public function linha_digitavel(){
       //break down febraban positions 20 to 44 into 3 blocks of 5, 10 and 10 characters each
       $blocks = array('20-24' => substr($this->febraban['20-44'], 0, 5), 
                       '25-34' => substr($this->febraban['20-44'], 5, 10),
                       '35-44' => substr($this->febraban['20-44'], 15, 10), 
                       );

       //concatenates bankCode + currencyCode + first block of 5 characters
       //and calculates its check digit for part1
       $checkDigit = $this->modulo_10($this->bank_code.$this->febraban['4-4'].$blocks['20-24']);

       //shift in a dot on block 20-24 (5 characters) at its 2nd position
       $blocks['20-24'] = substr_replace($blocks['20-24'], '.', 1, 0);
       
       //concatenates bankCode + currencyCode + first block of 5 characters + checkDigit
       $part1 = $this->bank_code.$this->febraban['4-4'].$blocks['20-24'].$checkDigit;
        
       //calculates part2 check digit from 2nd block of 10 characters
       $checkDigit = $this->modulo_10($blocks['25-34']);
       
       $part2 = $blocks['25-34'].$checkDigit;
       //shift in a dot at its 6th position
       $part2 = substr_replace($part2, '.', 5, 0);
       
       //calculates part3 check digit from 3rd block of 10 characters
       $checkDigit = $this->modulo_10($blocks['35-44']);
       
       //as part2, we do the same process again for part3
       $part3 = $blocks['35-44'].$checkDigit;
       $part3 = substr_replace($part3, '.', 5, 0);
       
       //check digit for the human readable number
       $cd = $this->febraban['5-5'];
       //put part4 together
       $part4  = $this->febraban['6-9'].$this->febraban['10-19'];
       
       //now put everything together
       $this->computed['linha_digitavel'] = "$part1 $part2 $part3 $cd $part4";
    }
    
    //pre set stuff
    public function settings(){
        $this->bank_name             = 'Ops!!! Aparentemente o banco informado nao esta implementado. No juice for you.';
        $this->settings['images']    = $this->arguments['library_location'].'/imagens';
        $this->settings['bank_logo'] = $this->settings['images'].'/bank_logo_default.jpg';
        $this->settings['style']     = $this->arguments['library_location'].'/style.css';
        $this->settings['template']  = $this->arguments['library_location'].'/boleto.tpl.php';
  
        //calculate valor_cobrado (total amount)
        $subtractions = $this->arguments['desconto_abatimento'] + $this->arguments['outras_deducoes'];
        $additions    = $this->arguments['mora_multa'] + $this->arguments['outros_acrescimos'];
        $this->computed['valor_cobrado'] = ($this->arguments['valor_boleto'] - $subtractions) + $additions;
        
        //format valor_boleto
        $this->arguments['valor_boleto'] = number_format($this->arguments['valor_boleto'], 2, '.', '');
        //format valor_cobrado
        $this->computed['valor_cobrado'] = number_format($this->computed['valor_cobrado'], 2, '.', '');
        
        //check some basic settings
        if($this->is_implemented){
            //check if these files exists
            $files = array('bank_logo' => array('#file_name' => 'logo.jpg',
                                                '#required'  => 1,),
                           'template'  => array('#file_name' => 'layout.tpl.php',
                                                '#required'  => 0,),
                           'style'     => array('#file_name' => 'style.css',
                                                '#required'  => 0),
                           'readme'    => array('#file_name' => 'readme.txt',
                                                '#required'  => 1),
                          );
            $location = $this->arguments['library_location'].'/bancos/'.$this->bank_code;
            
            foreach($files as $key => $value){
                $filename = $value['#file_name'];
                $required = $value['#required'];
                
                if(@file_exists($location.'/'.$filename)){
                    $this->settings[$key] = $location.'/'.$filename;
                }elseif($required){
                    //set warning
                    $this->setWarning(array($key, "O arquivo $location/$filename nao pode ser encontrado."));
                }
            }

            //check if child method is implemented
            if(in_array('setUp', $this->methods['child']) && in_array('febraban_20to44', $this->methods['child'])){
                $childClass = 'Banco_'.$this->bank_code;
                $childClass::setUp();
            }else{
                //set warning
                $this->setWarning(array('settings', 'Os metodos setUp e febraban_20to44 nao foram encontradas na implementacao do banco. Leia o arquivo readme.txt para mais informacoes.'));
            }
        }
    }

    //generate bar code strips
    public function barcode(){
        //assemble code from febraban array
        $code = '';
        foreach($this->febraban as $value){
            $code .= $value;
        }
        
        //get bar code values from settings
        $barcodes = array();
        foreach($this->settings['bar_code']['bar_codes'] as $value){
            $barcodes[] = $value;    
        }
        //apply bar codes to the febraban code
        for($f1=9;$f1>=0;$f1--){ 
          for($f2=9;$f2>=0;$f2--){  
            $f = ($f1 * 10) + $f2 ;
            $texto = '';
            for($i=1;$i<6;$i++){ 
              $texto .=  substr($barcodes[$f1],($i-1),1) . substr($barcodes[$f2],($i-1),1);
            }
            $barcodes[$f] = $texto;
          }
        }        
        //get bar width from settings
        $thinner = $this->settings['bar_code']['fino'];
        $thicker = $this->settings['bar_code']['largo'];
        //get bar height
        $height = $this->settings['bar_code']['altura'];
        
        //get the black and white bar images
        $black = $this->settings['images'].'/'.$this->settings['bar_code']['black_bar'];
        $white = $this->settings['images'].'/'.$this->settings['bar_code']['white_bar'];
        
        //create a sequence of black and white strips
        $total = $this->settings['bar_code']['#_strips'];
        for($i = 0; $i <= $total; $i++){
            //white for odd numbers and black for even numbers. Actually what matters is black being the first to start off.
            if($i&1){
                $img_strips[] = $white;
            }else{
                $img_strips[] = $black;
            }
        }
        
        /**set strip widths **/
        //start code bit
        $img_widths = array($thinner, $thinner, $thinner, $thinner);        
        
        //main code
	if((strlen($code) % 2) <> 0){
		$code = "0" . $code;
	}
	while (strlen($code) > 0) {
		$i = round(substr($code,0,2));
		$code = $this->direita($code, strlen($code)-2);
		$f = $barcodes[$i];
		for($i=1;$i<11;$i+=2){
			if (substr($f,($i-1),1) == "0") {
			  $f1 = $thinner;
			}else{
			  $f1 = $thicker ;
			}
                        $img_widths[] = $f1;
                        
			if (substr($f,$i,1) == "0") {
			  $f2 = $thinner;
			}else{
			  $f2 = $thicker;
			}
                        $img_widths[] = $f2;
		}
	}
        //stop code bit
        $img_widths[] = $thicker;
        $img_widths[] = $thinner;
        $img_widths[] = $thinner;
        
        //render the output
        foreach($img_widths as $key => $width){
            //rendering
            $img = $img_strips[$key];
            $this->computed['bar_code']['strips'] .= "<img src=$img width=$width height=$height border=0>";
            
            //strip widths for debug checking
            $this->computed['bar_code']['widths'] .=  $width;
        }
    }
    //helper function for barcode()
    private function direita($entra,$comp){
	return substr($entra,strlen($entra)-$comp,$comp);
    }

    //Render boleto. This method is not trigged at start up. It gotta be called after instantiation
    public function output($render = TRUE){
        //Boleto fields that get printed out in the template
        $this->output = array('title'                 => $this->arguments['title'],
                              'linha_digitavel'       => $this->computed['linha_digitavel'],
                              'valor_boleto'          => number_format($this->arguments['valor_boleto'], 2, ',', '.'),
                              'cpf_cnpj'              => $this->arguments['cpf_cnpj'],
                              'endereco'              => $this->arguments['endereco'],
                              'cidade_uf'             => $this->arguments['cidade_uf'],
                              'bank_logo_path'        => $this->settings['bank_logo'],
                              'images'                => $this->settings['images'],
                              'style'                 => $this->settings['style'],
                              'codigo_banco_com_dv'   => $this->computed['codigo_banco_com_dv'],
                              'cedente'               => $this->arguments['cedente'],
                              'especie'               => $this->arguments['especie'],
                              'quantidade'            => $this->arguments['quantidade'],
                              'data_vencimento'       => $this->computed['data_vencimento'],
                              'desconto_abatimento'   => number_format($this->arguments['desconto_abatimento'], 2, ',', '.'),
                              'outras_deducoes'       => number_format($this->arguments['outras_deducoes'], 2, ',', '.'),
                              'mora_multa'            => number_format($this->arguments['mora_multa'], 2, ',', '.'),
                              'outros_acrescimos'     => number_format($this->arguments['outros_acrescimos'], 2, ',', '.'),
                              'valor_cobrado'         => number_format($this->computed['valor_cobrado'], 2, ',', '.'),
                              'sacado'                => $this->arguments['sacado'],
                              'demonstrativo1'        => $this->arguments['demonstrativo1'],
                              'demonstrativo2'        => $this->arguments['demonstrativo2'],
                              'demonstrativo3'        => $this->arguments['demonstrativo3'],
                              'local_pagamento'       => $this->arguments['local_pagamento'],
                              'data_documento'        => $this->arguments['data_documento'],
                              'numero_documento'      => $this->arguments['numero_documento'],
                              'agencia_codigo_cedente'=> $this->arguments['agencia'].' / '.$this->arguments['conta'].'-'.$this->arguments['conta_dv'],
                              'nosso_numero'          => $this->computed['nosso_numero'],
                              'especie_doc'           => $this->arguments['especie_doc'],
                              'aceite'                => $this->arguments['aceite'],
                              'data_processamento'    => $this->arguments['data_processamento'],
                              'carteira'              => $this->arguments['carteira'],
                              'valor_unitario'        => $this->arguments['valor_unitario'],
                              'instrucoes1'           => $this->arguments['instrucoes1'],
                              'instrucoes2'           => $this->arguments['instrucoes2'],
                              'instrucoes3'           => $this->arguments['instrucoes3'],
                              'instrucoes4'           => $this->arguments['instrucoes4'],
                              'endereco1'             => $this->arguments['endereco1'],
                              'endereco2'             => $this->arguments['endereco2'],
                              'avalista'              => $this->arguments['avalista'],
                              'codigo_barras'         => $this->computed['bar_code']['strips'],
                              );
        //check if merchant logo exists
        if(@file_exists($this->arguments['merchant_logo'])){
            $this->output['merchant_logo'] = $this->arguments['merchant_logo'];
        }else{
            //set default
            $this->output['merchant_logo'] = $this->settings['images'].'/merchant_logo.png';
            //set warning
            $this->setWarning(array('merchant_logo', 'Logomarca do sacado nao foi informada ou o caminho informado esta errado.'));
        }
        //check if child class wants to change anything before rendering it out
        if($this->is_implemented) {
            if(in_array('outputValues', $this->methods['child'])){
                $childClass = 'Banco_'.$this->bank_code;
                //call child class method
                $childClass::outputValues();
            }
        }
        //it's time for rendering it. Yaaay!!!
        if($render){
            include_once(getcwd().'/'.$this->settings['template']);    
        }
    }
    /**
     * Set Warnings
     * 
     * @param $message == (array) Key holds the field name and Value holds the Message to be set or unset
     * @param $action  == 1 sets, 0 unsets
     * 
     */    
    public function setWarning($message, $action = 1){
        if($action){
            $this->warnings[$message[0]] = $message[1];
        }else{
            unset($this->warnings[$message[0]]);
        }
    }    
}
?>