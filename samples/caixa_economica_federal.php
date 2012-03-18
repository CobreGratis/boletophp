<?php

require '../library/BoletoPHP/boletos/CaixaEconomicaFederal.php';

$dias_de_prazo_para_pagamento = 5;
$taxa_boleto = 2.95;
$valor_cobrado = "2950,00"; // Valor - REGRA: Sem pontos na milhar e tanto faz com "." ou "," ou com 1 ou 2 ou sem casa decimal
$valor_cobrado = str_replace(",", ".",$valor_cobrado);


$params = array(
        'data_vencimento' => date("d/m/Y", time() + ($dias_de_prazo_para_pagamento * 86400)),
        'valor_boleto' => number_format($valor_cobrado+$taxa_boleto, 2, ',', ''),
        'agencia' => 1565,
        'conta' => 13877,
        'conta_dv' => 4,
        'carteira' => "SR",
        'conta_cedente' => 87000000414,
        'conta_cedente_dv' => 3,
        'inicio_nosso_numero' => 80,
        'nosso_numero' => 19525086,
        'identificacao' => 'BoletoPhp - Código Aberto de Sistema de Boletos',
        'cpf_cnpj' => '',
        'endereco' => 'Coloque o endereço da sua empresa aqui'
    );
$boleto = new CaixaEconomicaFederal($params);
echo $boleto;