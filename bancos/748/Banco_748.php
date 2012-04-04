<?php
 /**
 * This code is released under the GNU General Public License.
 * See COPYRIGHT.txt and LICENSE.txt.
 *
 * This library is built based on Boletophp v0.17
 * Many thanks to the mantainers and collaborators of Boletophp project at boletophp.com.br.
 * 
 * @file Implementation of Bank 748 - Sicredi
 * @copyright 2012 boletophp.com.br
 * @package Boletophp
 *    
 */

class Banco_748 extends Boleto{
  /**
   * Implementation of setUp().
   */
  private function setUp(){
    $this->bank_name  = 'Sicredi';
  }

  /**
   * Implementation of Febraban free range set from position 20 to 44
   * 
   * Posição Tam Conteúdo
   * 20 – 20 01 Código numérico correspondente ao tipo de cobrança: “3” –
   *            SICREDI.
   * 21 – 21 01 Código numérico correspondente ao tipo de carteira: “1” -
   *            carteira simples
   * 22 – 30 09 Nosso número
   * 31 – 34 04 Cooperativa de crédito/agência cedente
   * 35 – 36 02 Posto da cooperativa de crédito/agência cedente
   * 37 – 41 05 Código do cedente (Numero da conta do cedente sem o digito
   *            verificador)
   * 42 – 42 01 Filler - zeros (Obs.: será 1 (um) quando houver valor expresso
   *            no campo “valor
   *            do documento”
   * 43 – 43 01 Filler – zeros
   * 44 – 44 01 DV do campo livre calculado por módulo 11 com aproveitamento
   *            total (resto igual a
   *            0 ou 1 DV cai para 0)
   */
  protected function febraban_20to44() {
   /**
    * Read carteira_nosso_numero field.
    * format a-b-cc-d
    *    a = codigo numerico do tipo de cobrança.
    *    b = codigo numerico do tipo de carteira.
    *    cc = Posto da cooperativa.
    *    d = indicador de geração do nosso numero.
    */
   $cnn = explode('-', $this->arguments['carteira_nosso_numero']);
  
   $lenght = array(1, 1, 2, 1);
   foreach($cnn as $key => $value){
     if(empty($cnn[$key]) || strlen($cnn[$key]) != $lenght[$key] || !is_numeric($cnn[$key])){
       $cnn[$key] = self::BOLETO_WARNING;
     }
   }
  
   if(in_array(self::BOLETO_WARNING, $cnn)) {
     $this->setWarning(array('carteira_nosso_numero', 'Valor invalido ou mal formado.'));
   }
  
   // Make it available for other methods to use it.
   $this->computed['carteira_nosso_numero'] = $cnn;
  
   // Make sure conta has 5 digits.
   $conta = $this->computed['conta'] = str_pad($this->arguments['conta'], 5, 0, STR_PAD_LEFT);
  
   // Get values to mount the base number to calculate the check digit for Nosso
   // Numero.
   $agencia = $this->arguments['agencia'];
   $posto_cooperativa = $this->computed['carteira_nosso_numero'][2];
   $conta = $this->computed['conta'];
   $ano = date("y");
   $indicador_geracao = $this->computed['carteira_nosso_numero'][3];
   $nosso_numero = str_pad($this->arguments['nosso_numero'], 5, 0, STR_PAD_LEFT);
  
   $cd_base = $agencia . $posto_cooperativa . $conta . $ano . $indicador_geracao . $nosso_numero;

   // Calculate nosso_numero check digit.
   $cd = $this->modulo_11($cd_base);
   // Construct nosso_numero
   $this->computed['nosso_numero'] = "$ano/$indicador_geracao" . "$nosso_numero-" . $cd['digito'];
  
   // 20 to 21 tipo de cobrança and tipo de carteira.
   $this->febraban['20-44'] = $cnn[0].$cnn[1];

   // 22 to 30 Nosso Numero.
   $this->febraban['20-44'] .= $ano . $indicador_geracao . $nosso_numero . $cd['digito'];

   // 31 to 34 Agencia.
   $this->febraban['20-44'] .= $this->arguments['agencia']; 

   // 35 to 36 Posto da cooperativa cedente.
   $this->febraban['20-44'] .= $cnn[2];
  
   // 37 to 41 Código do cedente (Numero da conta do cedente sem o digito
   // verificador)
   $this->febraban['20-44'] .= $conta;
  
   // 42 to 43 Filters
   $this->febraban['20-44'] .= 10;
  
   // 44 to 44 Check Digit of febraban 20 to 43
   $cd = $this->modulo_11($this->febraban['20-44']);
   $this->febraban['20-44'] .= $cd['digito'];
 }

  /**
   * Implements outputValues() method.
   */
  protected function outputValues(){
    $this->output['nosso_numero'] = $this->computed['nosso_numero'];
  }
}
