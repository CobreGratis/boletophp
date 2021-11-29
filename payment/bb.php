<?php

    // DADOS DO BOLETO PARA O SEU CLIENTE
    $dias_de_prazo_para_pagamento = 5;
    $taxa_boleto = 2.95;
    $data_venc = date("d/m/Y", time() + ($dias_de_prazo_para_pagamento * 86400));
    $valor_cobrado = "2950,00";
    $valor_cobrado = str_replace(",", ".",$valor_cobrado);
    $valor_boleto=number_format($valor_cobrado+$taxa_boleto, 2, ',', '');

    $dadosboleto["nosso_numero"] = "87654";
    $dadosboleto["numero_documento"] = "27.030195.10";
    $dadosboleto["data_vencimento"] = $data_venc;
    $dadosboleto["data_documento"] = date("d/m/Y");
    $dadosboleto["data_processamento"] = date("d/m/Y");
    $dadosboleto["valor_boleto"] = $valor_boleto; depois da virgula

    // DADOS DO SEU CLIENTE
    $dadosboleto["sacado"] = "Nome do seu Cliente";
    $dadosboleto["endereco1"] = "Endere�o do seu Cliente";
    $dadosboleto["endereco2"] = "Cidade - Estado -  CEP: 00000-000";

    // INFORMACOES PARA O CLIENTE
    $dadosboleto["demonstrativo1"] = "Pagamento de Compra na Loja Nonononono";
    $dadosboleto["demonstrativo2"] = "Mensalidade referente a nonon nonooon nononon<br>Taxa banc�ria - R$ ".number_format($taxa_boleto, 2, ',', '');
    $dadosboleto["demonstrativo3"] = "BoletoPhp - http://www.boletophp.com.br";

    // INSTRUÇÕES PARA O CAIXA
    $dadosboleto["instrucoes1"] = "- Sr. Caixa, cobrar multa de 2% após o vencimento";
    $dadosboleto["instrucoes2"] = "- Receber até 10 dias após o vencimento";
    $dadosboleto["instrucoes3"] = "- Em caso de dúvidas entre em contato conosco: xxxx@xxxx.com.br";
    $dadosboleto["instrucoes4"] = "&nbsp; Emitido pelo sistema Projeto BoletoPhp - www.boletophp.com.br";

    // DADOS OPCIONAIS DE ACORDO COM O BANCO OU CLIENTE
    $dadosboleto["quantidade"] = "10";
    $dadosboleto["valor_unitario"] = "10";
    $dadosboleto["aceite"] = "N";		
    $dadosboleto["especie"] = "R$";
    $dadosboleto["especie_doc"] = "DM";


    // DADOS DA SUA CONTA - BANCO DO BRASIL
    $dadosboleto["agencia"] = "9999";
    $dadosboleto["conta"] = "99999";

    // DADOS PERSONALIZADOS - BANCO DO BRASIL
    $dadosboleto["convenio"] = "7777777";
    $dadosboleto["contrato"] = "999999";
    $dadosboleto["carteira"] = "18";
    $dadosboleto["variacao_carteira"] = "-019";

    // TIPO DO BOLETO
    $dadosboleto["formatacao_convenio"] = "7";
    $dadosboleto["formatacao_nosso_numero"] = "2";


    // SEUS DADOS
    $dadosboleto["identificacao"] = "BoletoPhp - Código Aberto de Sistema de Boletos";
    $dadosboleto["cpf_cnpj"] = "";
    $dadosboleto["endereco"] = "Coloque o endereço da sua empresa aqui";
    $dadosboleto["cidade_uf"] = "Cidade / Estado";
    $dadosboleto["cedente"] = "Coloque a Razão Social da sua empresa aqui";

    // NÃO ALTERAR!
    include("include/function/bb.php"); 
    include("include/layout/bb.php");
?>
