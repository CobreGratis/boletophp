<?php
 /**
 * This code is released under the GNU General Public License.
 * See COPYRIGHT.txt and LICENSE.txt.
 *
 * This library is built based on Boletophp v0.17
 * Many thanks to the mantainers and collaborators of Boletophp project at boletophp.com.br.
 * 
 * @file Implementation of Bank 104 - Caixa Economica Federal
 * @copyright 2011 Drupalista.com.br
 * @author Francisco Luz <franciscoferreiraluz at yahoo dot com dot au>
 * @package Caixa Economica Federal
 * @version 1.104.0
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
class Banco_104 extends Boleto{
    function setUp($boleto){
        $boleto->bank_name             = 'Caixa Econ&ocirc;mica Federal';
    }
    //Implementation of Febraban free range set from position 20 to 44
    function febraban_20to44($boleto){
        //concatenate carteira_nosso_numero and nosso_numero
        $boleto->computed['nosso_numero'] = $boleto->arguments['carteira_nosso_numero'].$boleto->arguments['nosso_numero'];
 
        //positons 20 to 29
        $boleto->febraban['20-44'] = $boleto->computed['nosso_numero'];
        //positons 30 to 33
        $boleto->febraban['20-44'] .= $boleto->arguments['agencia'];
        //positons 34 to 43
        $boleto->febraban['20-44'] .= str_pad($boleto->arguments['conta'], 10, 0, STR_PAD_LEFT);
    }

    //customize object to meet specific needs
    function custom($boleto){
         //set nosso_numero check digit
        $checkDigit = $boleto->modulo_11($boleto->computed['nosso_numero']);
        //now concatenate nosso_numero_com_dv with its check digit
        $boleto->computed['nosso_numero'] = $boleto->computed['nosso_numero'].'-'.$checkDigit['digito'];      
               
    }

    //manipulate output fields before them getting rendered. This method is called by output().
    function outputValues($boleto){
        $boleto->output['nosso_numero'] = $boleto->computed['nosso_numero'];
    }
}
?>