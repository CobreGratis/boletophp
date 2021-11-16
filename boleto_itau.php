<?php

//Importando a classe BoletoItau
require_once("./Class/BoletoItau.php");

//Instanciando a classe Boleto
$boleto = new BoletoItau();

// -------------------------------

//Informe quantos dias o comprador terá para pagar o boleto
$boleto->setVencimento(5);

//Informe o valor da taxa do boleto, que será somada ao valor final
$boleto->setTaxa('2,99');

//Informe o valor do boleto
$boleto->setValor('199,90');

//Informe aqui os dados referente ao boleto
$boleto->setDadosBoleto([
    'nosso_numero'=>'12345678',
    'numero_documento'=>'0123',
    'agencia'=>'3159',
    'conta'=>'30220',
    'conta_dv'=>'4',
    'carteira'=>'175'
]);

//Informe aqui os dados do comprador
$boleto->setDadosCliente([
    'sacado'=>'Nome do seu cliente',
    'endereco1'=>'Primeira linha do endereço',
    'endereco2'=>'Segunda linha do endereço'
]);

//Informe aqui as mensagens de informações do boleto. Limite de três linhas.
$boleto->setInformacoes([
    'Primeira linha de demonstrativo do boleto',
    'Segunda linha de demonstrativo do boleto',
    'Terceira linha de demonstrativo do boleto'
]);

//Informe aqui as instruções do pagamento do boleto. Limite de quatro linhas.
$boleto->setInstrucoes([
    'Primeira linha das instruções', 
    'Segunda linha das instruções',
    'Terceira linha das instruções',
    'Quarta linha das instruções'
]);

//Informe aqui as informações do cedente (sua empresa)
$boleto->setCedente([
    'identificacao'=>'BoletoPhp - Modificação para Banco Itaú por Roberto Griel Filho',
    'cpf_cnpj'=>'00.000.000/0001-00',
    'endereco'=>'Endereço da Empresa',
    'cidade_uf'=>'Cidade, Estado',
    'cedente'=>'Razão Social da Empresa'
]);

//Informações opcionais do boleto
$boleto->setOpcionais([
    /**
     * Dados opcionais do boleto, de acordo com o banco ou cliente.
     * Remova o comentário da linha cuja informação precise ser alterada.
     * Ou permaneça como está para utilizar os valores padrão.
     */

    //'quantidade'=>'1',
    //'valor_unitario'=>'',
    //'aceite'=>'',
    //'especie'=>'US$',
    //'especie_doc'=>''
]);

//Gerando o código de barras
$boleto->criarCodigoDeBarras();

//Reunindo os dados e importando o layout do boleto
$dados = $boleto->getDados();
include("include/layout_itau.php");