<?php
 /**
 * This code is released under the GNU General Public License.
 * See COPYRIGHT.txt and LICENSE.txt.
 *
 * This library is built based on Boletophp v0.17
 * Many thanks to the mantainers and collaborators of Boletophp project at boletophp.com.br.
 * 
 * @file Implementation of Bank 237 - Bradesco SA
 * @copyright 2012 boletophp.com.br
 * @package Boletophp
 * @version 1.237.0
 */

class Banco_237 extends Boleto{
  public function setUp(){
    $this->bank_name = 'Bradesco SA';
  }

  /**
   * Implementation of Febraban free range set from position 20 to 44.
   */
  public function febraban_20to44(){
    // 20-23 -> Código da Agencia (sem dígito)  4
    // 24-25 -> Número da Carteira              2
    // 26-36 -> Nosso Número (sem dígito)      11
    // 37-43 -> Conta do Cedente (sem dígito)   7
    // 44-44 -> Zero (Fixo)                     1

    // Positons 20 to 23.
    $this->febraban['20-44'] = str_pad($this->arguments['agencia'], 4, 0, STR_PAD_LEFT);
    // Positions 24 to 25.
    $this->febraban['20-44'] .= $this->arguments['carteira'];
    // Positions 26 to 36.
    $this->febraban['20-44'] .= $this->computed['nosso_numero'] = str_pad($this->arguments['nosso_numero'], 11, 0, STR_PAD_LEFT);

    // Positions 37 to 43 + a fixed 0 for position 44.
    $this->febraban['20-44'] .= str_pad($this->arguments['conta'], 7, 0, STR_PAD_LEFT).'0';

  }
  
  /**
   * Customize object to meet specific needs.
   */
  public function custom(){
    // Get nosso_numero pieces and bits together.
    $checkDigit = $this->arguments['carteira_nosso_numero'] . $this->computed['nosso_numero'];

    // Calcule check digit.
    $checkDigit = $this->modulo_11($checkDigit, 7);
    // Concatenate nosso_numero_com_dv plus check digit.
    $this->computed['nosso_numero'] = $this->arguments['carteira_nosso_numero'] . '/' . $this->computed['nosso_numero'] . '-' . $checkDigit['digito'];  
         
  }
  
  /**
   * Manipulate output fields before them getting rendered. This method is called by output().
   */
  public function outputValues(){  
    $this->output['agencia_codigo_cedente'] = $this->arguments['agencia'] . '-' . $this->arguments['agencia_dv'] .
    ' / ' . $this->arguments['conta'] . '-' . $this->arguments['conta_dv'];

  }
}
