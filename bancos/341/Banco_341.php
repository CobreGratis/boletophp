<?php
 /**
 * This code is released under the GNU General Public License.
 * See COPYRIGHT.txt and LICENSE.txt.
 *
 * @author Francisco Luz <franciscoferreiraluz@yahoo.com.au>
 */

class Banco_341 extends Boleto{
  /**
   * Implementation of setUp().
   */
  function setUp(){
    $this->bank_name = 'Itau';
  }
  
  /**
   * Implementation of Febraban free range set from position 20 to 44.
   */
  function febraban_20to44(){
    // 20-22 (3) -> Carteira 175
    // 23-30 (8) -> Nosso Numero
    // 31-31 (1) -> modulo_10( agencia . conta . carteira . nosso numero )
    // 32-35 (4) -> Agencia
    // 36-40 (5) -> Conta
    // 41-41 (1) -> modulo_10( agencia . conta)
    // 42-44 (3) -> Fixed zeros
    
    $carteira = str_pad($this->arguments['carteira'], 3, 0, STR_PAD_LEFT);
    $nosso_numero = str_pad($this->arguments['nosso_numero'], 8, 0, STR_PAD_LEFT);
    $agencia = str_pad($this->arguments['agencia'], 4, 0, STR_PAD_LEFT);
    $conta = str_pad($this->arguments['conta'], 5, 0, STR_PAD_LEFT);
    $nosso_numero_dv = $this->modulo_10($agencia . $conta . $carteira . $nosso_numero);
    
    // Positions 20 to 22.
    $this->febraban['20-44'] = $carteira;
    // Positions 23 to 30.
    $this->febraban['20-44'] .= $nosso_numero;
    // Positions 31 to 31.
    $this->febraban['20-44'] .= $nosso_numero_dv;
    // Positions 32 to 35.
    $this->febraban['20-44'] .= $agencia;
    // Positions 36 to 40.
    $this->febraban['20-44'] .= $conta;
    // Positions 41 to 41 and the 3 fixed zeros at the end (42 to 44).
    $this->febraban['20-44'] .= $this->modulo_10($agencia.$conta) . '000';

    // Save nosso numero.
    $this->computed['nosso_numero'] = $carteira . '/' . $nosso_numero . '-' . $nosso_numero_dv;
  }
}
