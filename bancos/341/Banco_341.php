<?php
 /**
 * This code is released under the GNU General Public License.
 * See COPYRIGHT.txt and LICENSE.txt.
 *
 * This library is built based on Boletophp v0.17
 * Many thanks to the mantainers and collaborators of Boletophp project at boletophp.com.br.
 * 
 * @file Implementation of Bank 341 - Itau
 * @copyright 2011 Drupalista.com.br
 * @author Francisco Luz <franciscoferreiraluz at yahoo dot com dot au>
 * @package Bradesco
 * @version 1.341.0
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
class Banco_341 extends Boleto{
    function setUp($boleto){
        $boleto->bank_name  = 'Itau';
    }
    
    //Implementation of Febraban free range set from position 20 to 44
    function febraban_20to44($boleto){
	// 20-22 (3) -> Carteira 175
	// 23-30 (8) -> Nosso Numero
	// 31-31 (1) -> modulo_10( agencia . conta . carteira . nosso numero )
	// 32-35 (4) -> Agencia
	// 36-40 (5) -> Conta
        // 41-41 (1) -> modulo_10( agencia . conta)
        // 42-44 (3) -> Fixed zeros
        
        $carteira        = str_pad($boleto->arguments['carteira'], 3, 0, STR_PAD_LEFT);
        $nosso_numero    = str_pad($boleto->arguments['nosso_numero'], 8, 0, STR_PAD_LEFT);
        $agencia         = str_pad($boleto->arguments['agencia'], 4, 0, STR_PAD_LEFT);
        $conta           = str_pad($boleto->arguments['conta'], 5, 0, STR_PAD_LEFT);
        $nosso_numero_dv = $boleto->modulo_10($agencia.$conta.$carteira.$nosso_numero);
        
        //positons 20 to 22
        $boleto->febraban['20-44'] = $carteira;
        //positons 23 to 30
        $boleto->febraban['20-44'] .= $nosso_numero;
        //positons 31 to 31
        $boleto->febraban['20-44'] .= $nosso_numero_dv;
        //positons 32 to 35
        $boleto->febraban['20-44'] .= $agencia;
        //positons 36 to 40
        $boleto->febraban['20-44'] .= $conta;
        //positons 41 to 41 and the 3 fixed zeros at the end (42 to 44)
        $boleto->febraban['20-44'] .= $boleto->modulo_10($agencia.$conta).'000';
        
        //save nosso numero
        $boleto->computed['nosso_numero'] = $carteira.'/'.$nosso_numero.'-'.$nosso_numero_dv;

    }

}
?>