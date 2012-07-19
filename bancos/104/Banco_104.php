<?php
 /**
 * This code is released under the GNU General Public License.
 * See COPYRIGHT.txt and LICENSE.txt.
 *
 * @author Francisco Luz <franciscoferreiraluz@yahoo.com.au>
 */
 
class Banco_104 extends Boleto{
  /**
   * Implementation of setUp().
   */
  public function setUp(){
    $this->bank_name = 'Caixa Econ&ocirc;mica Federal';
  }
  
  /**
   * Implementation of Febraban free range set from position 20 to 44.
   */
  function febraban_20to44(){
    // Concatenate carteira_nosso_numero and nosso_numero.
    $this->computed['nosso_numero'] = $this->arguments['carteira_nosso_numero'] . $this->arguments['nosso_numero'];
 
    // Positons 20 to 29.
    $this->febraban['20-44'] = $this->computed['nosso_numero'];
    //positons 30 to 33
    $this->febraban['20-44'] .= $this->arguments['agencia'];
    //positons 34 to 43
    $this->febraban['20-44'] .= str_pad($this->arguments['conta'], 10, 0, STR_PAD_LEFT);
  }

  /**
   * Customize object to meet specific needs.
   */
  public function custom(){
    // Set nosso_numero check digit.
    $checkDigit = $this->modulo_11($this->computed['nosso_numero']);
    // Now concatenate nosso_numero_com_dv with its check digit.
    $this->computed['nosso_numero'] = $this->computed['nosso_numero'] . '-' . $checkDigit['digito'];    
  }

  /**
   * Manipulate output fields before them getting rendered. This method is
   * called by output().
   */
  public function outputValues(){
    $this->output['nosso_numero'] = $this->computed['nosso_numero'];
  }
}
