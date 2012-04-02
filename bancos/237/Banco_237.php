<?php
 /**
 * This code is released under the GNU General Public License.
 * See COPYRIGHT.txt and LICENSE.txt.
 *
 * This library is built based on Boletophp v0.17
 * Many thanks to the mantainers and collaborators of Boletophp project at boletophp.com.br.
 * 
 * @file Implementation of Bank 237 - Bradesco SA
 * @copyright 2011 Drupalista.com.br
 * @author Francisco Luz <franciscoferreiraluz at yahoo dot com dot au>
 * @package Bradesco
 * @version 1.237.0
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
 *    
 */
class Banco_237 extends Boleto{
    function setUp($boleto){
        $boleto->bank_name             = 'Bradesco SA';
    }
    
    //Implementation of Febraban free range set from position 20 to 44
    function febraban_20to44($boleto){
	// 20-23    -> Código da Agencia (sem dígito)  4
	// 24-25    -> Número da Carteira              2
	// 26-36    -> Nosso Número (sem dígito)      11
	// 37-43    -> Conta do Cedente (sem dígito)   7
	// 44-44    -> Zero (Fixo)                     1

        //positons 20 to 23
        $boleto->febraban['20-44'] = str_pad($boleto->arguments['agencia'], 4, 0, STR_PAD_LEFT);
        //positons 24 to 25
        $boleto->febraban['20-44'] .= $boleto->arguments['carteira'];
        //positons 26 to 36
        $boleto->febraban['20-44'] .= $boleto->computed['nosso_numero'] = str_pad($boleto->arguments['nosso_numero'], 11, 0, STR_PAD_LEFT);

        //positons 37 to 43 + a fixed 0 for position 44
        $boleto->febraban['20-44'] .= str_pad($boleto->arguments['conta'], 7, 0, STR_PAD_LEFT).'0';

    }
    
    //customize object to meet specific needs
    function custom($boleto){
          /** get nosso_numero pieces and bits together **/
        $checkDigit = $boleto->arguments['carteira_nosso_numero'].$boleto->computed['nosso_numero'];

        //calcule check digit
        $checkDigit = $boleto->modulo_11($checkDigit, 7);
        //concatenate nosso_numero_com_dv plus check digit
        $boleto->computed['nosso_numero'] = $boleto->arguments['carteira_nosso_numero'].'/'.$boleto->computed['nosso_numero'].'-'.$checkDigit['digito'];  
               
    }
    
    //manipulate output fields before them getting rendered. This method is called by output().
    function outputValues($boleto){    
        $boleto->output['agencia_codigo_cedente'] = $boleto->arguments['agencia'].'-'.$boleto->arguments['agencia_dv'].' / '.$boleto->arguments['conta'].'-'.$boleto->arguments['conta_dv'];

    }
}
?>