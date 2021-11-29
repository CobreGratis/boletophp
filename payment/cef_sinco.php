<?php

    // DADOS DO BOLETO PARA O SEU CLIENTE
    $dias_de_prazo_para_pagamento = 5;
    $taxa_boleto = 2.95;
    $data_venc = date("d/m/Y", time() + ($dias_de_prazo_para_pagamento * 86400));
    $valor_cobrado = "2950,00";
    $valor_cobrado = str_replace(",", ".",$valor_cobrado);
    $valor_boleto=number_format($valor_cobrado+$taxa_boleto, 2, ',', '');

    $dadosboleto["campo_fixo_obrigatorio"] = "1";
    $dadosboleto["inicio_nosso_numero"] = "9"; 
    $dadosboleto["nosso_numero"] = "19525086";
    $dadosboleto["numero_documento"] = "27.030195.10";
    $dadosboleto["data_vencimento"] = $data_venc;
    $dadosboleto["data_documento"] = date("d/m/Y");
    $dadosboleto["data_processamento"] = date("d/m/Y");
    $dadosboleto["valor_boleto"] = $valor_boleto;

    // DADOS DO SEU CLIENTE
    $dadosboleto["sacado"] = "Nome do seu Cliente";
    $dadosboleto["endereco1"] = "Endereço do seu Cliente";
    $dadosboleto["endereco2"] = "Cidade - Estado -  CEP: 00000-000";

    // INFORMACOES PARA O CLIENTE
    $dadosboleto["demonstrativo1"] = "Pagamento de Compra na Loja Nonononono";
    $dadosboleto["demonstrativo2"] = "Mensalidade referente a nonon nonooon nononon<br>Taxa bancária - R$ ".number_format($taxa_boleto, 2, ',', '');
    $dadosboleto["demonstrativo3"] = "BoletoPhp - http://www.boletophp.com.br";

    // INSTRUÇÕES PARA O CAIXA
    $dadosboleto["instrucoes1"] = "- Sr. Caixa, cobrar multa de 2% após o vencimento";
    $dadosboleto["instrucoes2"] = "- Receber até 10 dias após o vencimento";
    $dadosboleto["instrucoes3"] = "- Em caso de dúvidas entre em contato conosco: xxxx@xxxx.com.br";
    $dadosboleto["instrucoes4"] = "&nbsp; Emitido pelo sistema Projeto BoletoPhp - www.boletophp.com.br";

    // DADOS OPCIONAIS DE ACORDO COM O BANCO OU CLIENTE
    $dadosboleto["quantidade"] = "";
    $dadosboleto["valor_unitario"] = "";
    $dadosboleto["aceite"] = "";		
    $dadosboleto["especie"] = "R$";
    $dadosboleto["especie_doc"] = "";


    // DADOS DA SUA CONTA - CEF
    $dadosboleto["agencia"] = "1565";
    $dadosboleto["conta"] = "13877";
    $dadosboleto["conta_dv"] = "4";

    // DADOS PERSONALIZADOS - CEF
    $dadosboleto["conta_cedente"] = "057335";
    $dadosboleto["conta_cedente_dv"] = "";
    $dadosboleto["carteira"] = "SR";

    // SEUS DADOS
    $dadosboleto["identificacao"] = "BoletoPhp - Código Aberto de Sistema de Boletos";
    $dadosboleto["cpf_cnpj"] = "";
    $dadosboleto["endereco"] = "Coloque o endereço da sua empresa aqui";
    $dadosboleto["cidade_uf"] = "Cidade / Estado";
    $dadosboleto["cedente"] = "Coloque a Razão Social da sua empresa aqui";

    // NÃO ALTERAR!
    include("include/function/cef_sinco.php"); 
    include("include/layout/cef_sinco.php");
?>
