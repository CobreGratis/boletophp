<?php
/**
 * For detailed information about what Boleto is, please visit http://en.wikipedia.org/wiki/Boleto
 *
 * This file shows you how to instantiate an object of Boleto and render its html into the user's browser.
 * 
 * IMPORTANT: Your application must validate the data arguments before passing them in.
 *            The specifications for each argument field below are general and you should check out readme.txt for particular needs that
 *            each issuer bank might have
 *
 * If you would like to collaborate by suggesting code or documentantation enhancements or
 * by extending new issuer bank implamentation then please check out readme.txt for instructions
 *
 * Take a look at /boleto-lib/banks folder to find out which banks are already implemented. The number appended to the end of each file named
 * Banco_BANKCODE.php is the bank code. For a full list of bank codes visit http://www.febraban.org.br/Arquivo/Bancos/sitebancos2-0.asp
 *
 * @author Francisco Luz <franciscoferreiraluz at yahoo dot com dot au>
 * @copyright 2011 Drupalista.com.br
 *
 * See change_log.txt for details about the latest version of this library package
 * See COPYRIGHT.txt and LICENSE.txt for information regarded to Copyrights
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

/**
 *  Creating an array of arguments.
 *
 *  You can comment out elements you dont want to set as well as uncomment those ones you need.
 *
 *  The argument array down below has a full list of all possible arguments that can be passed when
 *  instantiating an object of Boleto.
 *  
 *  Nevertheless, validation and requirement rules vary from bank to bank, so you are strongly advised to read readme file at
 *  ../boleto-lib/bancos/BANKCODE/readme.txt for details on each bank implementation as well as the library's readme file at
 *  ../readme.txt.
 *
 */

$myArguments = array('library_location'       => 'boleto-lib', //adjust to the location where you have stored Boleto's library. If it is outside your current application folder you gotta use ../ 
                     'bank_code'              => '001', //Merchant's bank code (NO check digit). Note that this is not the same as the branch number
                     'agencia'                => 2626, //Merchant's branch number (NO check digit)
                     //'agencia_dv'           => 2,
                     'conta'                  => 87414, //Merchant's account number (NO check digit)
                     'conta_dv'               => 3, //check digit of Merchant's account number
                     'valor_boleto'           => '2952.95', //No thousand separator. Full stop for decimal separator. This is the total amount before deductions/additions
                     'numero_documento'       => '27.030195.10', //Generally this is used for placing the order number
                     'endereco'               => 'street name and number', //Merchant's address
                     'cidade_uf'              => 'city and state', //Merchant's city and state
                     'cedente'                => 'ABC Company Ltd', //Merchant's name
                     'sacado'                 => 'John Doe', //Client's name (payer)
                     'merchant_logo'          => 'images/logo.jpg', //Image location of merchant's logo
                     'carteira'               => '18', //vary from bank to bank, so see readme file at boleto-lib/bancos/BANKCODE/readme.txt                     
                     'carteira_nosso_numero'  => '1397615-17831605', //vary from bank to bank, so see readme file at boleto-lib/bancos/BANKCODE/readme.txt
                     'nosso_numero'           => '888', //vary from bank to bank, so see readme file at boleto-lib/bancos/BANKCODE/readme.txt
                     //'desconto_abatimento'  => '0.00', //Comma as decimal separator. This is the discount field (-)
                     //'outras_deducoes'      => '0.00', //Comma as decimal separator. Combined general deductions (-)
                     //'mora_multa'           => '0.00', //Comma as decimal separator. Interest and overdue fees (+)
                     //'outros_acrescimos'    => '50.55', //Comma as decimal separator. Combined general additions (+)
                     'cpf_cnpj'               => '000.000.000-00', //Merchant's tax file number, see http://en.wikipedia.org/wiki/CNPJ for more info
                     //'data_vencimento'      => '25-07-2011', //'dd-mm-yyyy', //This is the "Due to" date field. Default == 5 days from issuing. Set -1 to make it "Contra Apresentação" which means "cash against document"
                     'endereco1'              => 'street name and number', //Client's address line 1, includes street name and number
                     'endereco2'              => 'city and state', //Client's address line 2, includes city, state and zip code
                     'demonstrativo1'         => 'Your text here', //check with your issuer bank for instructions on how to fill up this line
                     'demonstrativo2'         => 'Your text here', //check with your issuer bank for instructions on how to fill up this line
                     'demonstrativo3'         => 'Your text here', //check with your issuer bank for instructions on how to fill up this line
                     'instrucoes1'            => 'Your text here', //check with your issuer bank for instructions on how to fill up this line
                     'instrucoes2'            => 'Your text here', //check with your issuer bank for instructions on how to fill up this line
                     'instrucoes3'            => 'Your text here', //check with your issuer bank for instructions on how to fill up this line
                     'instrucoes4'            => 'Your text here', //check with your issuer bank for instructions on how to fill up this line
                     //'title'               => 'My title', //Default == Merchant's name (cedente), this is the value that goes in the html head <title>My title</title>
                     //'local_pagamento'     => 'Your text here', //Default == Pagável em qualquer Banco até o vencimento
                     //'especie'             => 'Your value here', //Default == R$ for BRL currency dollar sign
                     //'quantidade'          => 'Your value here', //Default == empty
                     //'valor_unitario'      => 'Your value here', //default empty
                     //'especie_doc'         => 'Your value here', //Default == empty
                     //'data_processamento'  => 'dd/mm/yyy', //Default == issueing date.
                     //'avalista'            => 'Michael Jackson', //guarantor's name. Default empty
                     //'aceite'              => 'Your value here', //Default == N (possible values are S for YES and N for NO)
                     );


//Include boleto class file
include_once($myArguments['library_location'].'/Boleto.class.php');

//instantiate an object and send the array of arguments through
$myBoleto = new Boleto($myArguments);
//$myBoleto->settings['bank_logo']  = 'teste';

echo '<pre>';
print_r($myBoleto);

//if you wanna print out the html then call
$myBoleto->output();

//Use $myBoleto->output(FALSE); to only populate the output property without rendering the html

?>