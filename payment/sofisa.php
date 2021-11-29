<?php

    // DADOS DO BOLETO PARA O SEU CLIENTE
    $taxa_boleto = 0;
    $data_venc = $data_vencimento;
    $valor_cobrado = $valor_boleto_aux;
    $valor_cobrado = str_replace(",", ".",$valor_cobrado);
    $valor_boleto = number_format($valor_cobrado+$taxa_boleto, 2, ',', '');

    $dadosboleto["nosso_numero"] = $nosso_numero;
    $dadosboleto["numero_documento"] = $dadosboleto["nosso_numero"];
    $dadosboleto["data_vencimento"] = $data_venc;
    $dadosboleto["data_documento"] = $data_geracao;
    $dadosboleto["data_processamento"] = $data_geracao;
    $dadosboleto["valor_boleto"] = $valor_boleto;

    // DADOS DO SEU CLIENTE
    $dadosboleto["sacado"] = $sacado_nome;
    $dadosboleto["endereco1"] = $sacado_endereco;
    $dadosboleto["endereco2"] = $sacado_cidade_uf_cep;

    // INFORMACOES PARA O CLIENTE
    $dadosboleto["demonstrativo1"] = "";
    $dadosboleto["demonstrativo2"] = "";
    $dadosboleto["demonstrativo3"] = "";

    // INSTRUÇÕES PARA O CAIXA
    $dadosboleto["instrucoes1"] = "- Sr. Caixa, não receber após o vencimento.";
    $dadosboleto["instrucoes2"] = "- Receber até 10 dias após o vencimento";
    $dadosboleto["instrucoes3"] = "- Em caso de dúvidas entre em contato conosco: xxxx@xxxx.com.br";
    $dadosboleto["instrucoes4"] = "&nbsp; Emitido pelo sistema Projeto BoletoPhp - www.boletophp.com.br";

    // DADOS OPCIONAIS DE ACORDO COM O BANCO OU CLIENTE
    $dadosboleto["quantidade"] = "001";
    $dadosboleto["valor_unitario"] = $valor_boleto;
    $dadosboleto["aceite"] = "";
    $dadosboleto["especie"] = "R$";
    $dadosboleto["especie_doc"] = "REC";


    // DADOS DA SUA CONTA
    $dadosboleto["agencia"] = $agencia;
    $dadosboleto["agencia_dv"] = $agencia_dv;
    $dadosboleto["conta"] = $conta;
    $dadosboleto["conta_dv"] = $conta_dv;

    // DADOS PERSONALIZADOS
    $dadosboleto["conta_cedente"] = $dadosboleto["conta"];
    $dadosboleto["conta_cedente_dv"] = $dadosboleto["conta_dv"];
    $dadosboleto["carteira"] = "121";

    // SEUS DADOS
    $dadosboleto["identificacao"] = $cedente_identificacao;
    $dadosboleto["cpf_cnpj"] = $cedente_cnpj;
    $dadosboleto["endereco"] = $cedente_endereco;
    $dadosboleto["cidade_uf"] = $cedente_cidade_uf;
    $dadosboleto["cedente"] = $cedente_razao_soscial;


    // NÃO ALTERAR!
    include("include/function/sofisa.php"); 
    include("include/layout/sofisa.php");
?>
