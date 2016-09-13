<?php
require_once __DIR__."/../vendor/autoload.php";

use BoletoPHP\Boletos\Boleto;
use BoletoPHP\Types\{EspecieDoc, Carteira, Aceite};
use BoletoPHP\Boletos\CaixaEconomicaFederalSIGCB;

header('Content-type: text/html; charset=ISO-8859-1');

$dias_de_prazo_para_pagamento = 5;
$taxa_boleto = 2.95;
$valor_cobrado = "2950,00"; // Valor - REGRA: Sem pontos na milhar e tanto faz com "." ou "," ou com 1 ou 2 ou sem casa decimal
$valor_cobrado = str_replace(",", ".",$valor_cobrado);
$valor_boleto=number_format($valor_cobrado+$taxa_boleto, 2, ',', '');

$params = array(
        'data_vencimento' => date("d/m/Y", time() + ($dias_de_prazo_para_pagamento * 86400)),
        'valor_boleto' => number_format($valor_cobrado+$taxa_boleto, 2, ',', ''),
        'agencia' => 1234,
        'conta' => 123,
        'conta_dv' => 0,
        'carteira' => Carteira::COM_REGISTRO,
        'conta_cedente' => 123456,
        'nosso_numero1' => '000',
        'nosso_numero_const1' => '1',
        'nosso_numero2' => '000',
        'nosso_numero_const2' => '4',
        'nosso_numero3' => '000000019',
        'identificacao' => 'BoletoPhp - C�digo Aberto de Sistema de Boletos',
        'cpf_cnpj' => '0212164-545/0000',
        'endereco' => 'Coloque o endere�o da sua empresa aqui',
        'cidade_uf' => 'Cidade / Estado',
        'cedente' => 'Coloque a Raz�o Social da sua empresa aqui',
        'especie' => 'R$',
        'quantidade' => '',
        'numero_documento' => '27.030195.10',
        'sacado' => 'Nome do seu Cliente',
        'demonstrativo1' => 'Pagamento de Compra na Loja Nonononono',
        'demonstrativo2' => 'Mensalidade referente a nonon nonooon nononon<br>Taxa banc�ria - R$ ' . number_format($taxa_boleto, 2, ',', ''),
        'demonstrativo3' =>"BoletoPhp - http://www.boletophp.com.br",
        'data_documento' => date("d/m/Y"),
        'especie_doc' => EspecieDoc::DUPLICATA_MERCANTIL,
        'aceite' => Aceite::COM_ACEITE,
        'data_processamento' => date("d/m/Y"),
        'valor_unitario' => '',
        'instrucoes1' => '- Sr. Caixa, cobrar multa de 2% ap�s o vencimento',
        'instrucoes2' => '- Receber at� 10 dias ap�s o vencimento',
        'instrucoes3' => '- Em caso de d�vidas entre em contato conosco: xxxx@xxxx.com.br',
        'instrucoes4' => '&nbsp; Emitido pelo sistema Projeto BoletoPhp - www.boletophp.com.br',
        'endereco1' => 'Endere�o do seu Cliente',
        'endereco2' => 'Cidade - Estado -  CEP: 00000-000',
        'pagador_nome' => 'Luiz Fernando Popota',
        'pagador_cpf' => '265.857.562-90',
        'pagador_endereco' => 'Av. 24 de Outubro'
    );

try {

    $boleto = new BoletoPHP\Boletos\CaixaEconomicaFederalSIGCB($params);
    echo $boleto->gerarBoleto();
    $boleto->salvarRemessa();
// $boleto->salvarRemessa();
} catch(\RuntimeException $e)
{
    echo $e->getMessage();die;
}
