<?php

		// DADOS DO BOLETO PARA O SEU CLIENTE
		$dias_de_prazo_para_pagamento = 7;
		$taxa_boleto = 0;
		$data_venc = "14/05/2013";
		$valor_cobrado = "1,00"; 
		$valor_cobrado = str_replace(",", ".",$valor_cobrado);
		$valor_boleto=number_format($valor_cobrado+$taxa_boleto, 2, ',', '');


		if(!function_exists('formata_numdoc'))
		{
			function formata_numdoc($num,$tamanho)
			{
				while(strlen($num)<$tamanho)
				{
					$num="0".$num; 
				}
			return $num;
			}
		}

		$IdDoSeuSistemaAutoIncremento = '2';
		$agencia = "3087";
		$conta = "4593";
		$convenio = "56235";
		$NossoNumero = formata_numdoc($IdDoSeuSistemaAutoIncremento,7);
		$qtde_nosso_numero = strlen($NossoNumero);
		$sequencia = formata_numdoc($agencia,4).formata_numdoc(str_replace("-","",$convenio),10).formata_numdoc($NossoNumero,7);
		$cont=0;
		$calculoDv = '';
			for($num=0;$num<=strlen($sequencia);$num++)
			{
				$cont++;
				if($cont == 1)
				{
					$constante = 3;
				}
				if($cont == 2)
				{
					$constante = 1;
				}
				if($cont == 3)
				{
					$constante = 9;
				}
				if($cont == 4)
				{
					$constante = 7;
					$cont = 0;
				}
				$calculoDv = $calculoDv + (substr($sequencia,$num,1) * $constante);
			}
		$Resto = $calculoDv % 11;
		$Dv = 11 - $Resto;
		if ($Dv == 0) $Dv = 0;
		if ($Dv == 1) $Dv = 0;
		if ($Dv > 9) $Dv = 0;
		$dadosboleto["nosso_numero"] = $NossoNumero . $Dv;


		$dadosboleto["numero_documento"] = "12";
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
		$dadosboleto["quantidade"] = "10";
		$dadosboleto["valor_unitario"] = "10";
		$dadosboleto["aceite"] = "N";		
		$dadosboleto["especie"] = "R$";
		$dadosboleto["especie_doc"] = "DM";


		// DADOS ESPECIFICOS DO SICOOB
		$dadosboleto["modalidade_cobranca"] = "02";
		$dadosboleto["numero_parcela"] = "901";


		// DADOS DA SUA CONTA - BANCO SICOOB
		$dadosboleto["agencia"] = $agencia;
		$dadosboleto["conta"] = $conta;

		// DADOS PERSONALIZADOS - SICOOB
		$dadosboleto["convenio"] = $convenio;
		$dadosboleto["carteira"] = "1";

		// SEUS DADOS
		$dadosboleto["identificacao"] = "BoletoPhp - Código Aberto de Sistema de Boletos";
		$dadosboleto["cpf_cnpj"] = "";
		$dadosboleto["endereco"] = "Coloque o endereço da sua empresa aqui";
		$dadosboleto["cidade_uf"] = "Cidade / Estado";
		$dadosboleto["cedente"] = "Coloque a Razão Social da sua empresa aqui";

		// NÃO ALTERAR!
		include("include/function/bancoob.php");
		include("include/layout/bancoob.php");
?>
