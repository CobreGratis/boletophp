<?php
// +----------------------------------------------------------------------+
// | BoletoPhp - Vers�o Beta                                              |
// +----------------------------------------------------------------------+
// | Este arquivo est� dispon�vel sob a Licen�a GPL dispon�vel pela Web   |
// | em http://pt.wikipedia.org/wiki/GNU_General_Public_License           |
// | Voc� deve ter recebido uma c�pia da GNU Public License junto com     |
// | esse pacote; se n�o, escreva para:                                   |
// |                                                                      |
// | Free Software Foundation, Inc.                                       |
// | 59 Temple Place - Suite 330                                          |
// | Boston, MA 02111-1307, USA.                                          |
// +----------------------------------------------------------------------+
// +----------------------------------------------------------------------+
// | Originado do Projeto BBBoletoFree que tiveram colabora��es de Daniel |
// | William Schultz e Leandro Maniezo que por sua vez foi derivado do	  |
// | PHPBoleto de Jo�o Prado Maia e Pablo Martins F. Costa				        |
// | 																	                                    |
// | Se vc quer colaborar, nos ajude a desenvolver p/ os demais bancos :-)|
// | Acesse o site do Projeto BoletoPhp: www.boletophp.com.br             |
// +----------------------------------------------------------------------+
// +----------------------------------------------------------------------+
// | Equipe Coordena��o Projeto BoletoPhp: <boletophp@boletophp.com.br>   |
// | Desenvolvimento Boleto Real: Juan Basso         		                  |
// +----------------------------------------------------------------------+
// ------------------------- DADOS DIN�MICOS DO SEU CLIENTE PARA A GERA��O DO BOLETO (FIXO OU VIA GET) -------------------- //
// Os valores abaixo podem ser colocados manualmente ou ajustados p/ formul�rio c/ POST, GET ou de BD (MySql,Postgre,etc)	//
// DADOS DO BOLETO PARA O SEU CLIENTE
$dias_de_prazo_para_pagamento = 5;
$taxa_boleto                  = 2.95;
$data_venc                    = date("d/m/Y",
    time() + ($dias_de_prazo_para_pagamento * 86400));  // Prazo de X dias OU informe data: "13/04/2006";
$valor_cobrado                = "2950,00"; // Valor - REGRA: Sem pontos na milhar e tanto faz com "." ou "," ou com 1 ou 2 ou sem casa decimal
$valor_cobrado                = str_replace(",", ".", $valor_cobrado);
$valor_boleto                 = number_format($valor_cobrado + $taxa_boleto, 2,
    ',', '');

$dadosboleto["nosso_numero"]       = "0000000123456";  // Nosso numero - REGRA: M�ximo de 13 caracteres!
$dadosboleto["numero_documento"]   = "1234567"; // Num do pedido ou do documento
$dadosboleto["data_vencimento"]    = $data_venc; // Data de Vencimento do Boleto - REGRA: Formato DD/MM/AAAA
$dadosboleto["data_documento"]     = date("d/m/Y"); // Data de emiss�o do Boleto
$dadosboleto["data_processamento"] = date("d/m/Y"); // Data de processamento do boleto (opcional)
$dadosboleto["valor_boleto"]       = $valor_boleto;  // Valor do Boleto - REGRA: Com v�rgula e sempre com duas casas depois da virgula
// DADOS DO SEU CLIENTE
$dadosboleto["sacado"]    = "Nome do seu Cliente";
$dadosboleto["endereco1"] = "Endere�o do seu Cliente";
$dadosboleto["endereco2"] = "Cidade - Estado -  CEP: 00000-000";

// INFORMACOES PARA O CLIENTE
$dadosboleto["demonstrativo1"] = "Pagamento de Compra na Loja Nonononono";
$dadosboleto["demonstrativo2"] = "Mensalidade referente a nonon nonooon nononon<br>Taxa banc�ria - R$ ".number_format($taxa_boleto,
        2, ',', '');
$dadosboleto["demonstrativo3"] = "BoletoPhp - http://www.boletophp.com.br";
$dadosboleto["instrucoes1"]    = "- Sr. Caixa, cobrar multa de 2% ap�s o vencimento";
$dadosboleto["instrucoes2"]    = "- Receber at� 10 dias ap�s o vencimento";
$dadosboleto["instrucoes3"]    = "- Em caso de d�vidas entre em contato conosco: xxxx@xxxx.com.br";
$dadosboleto["instrucoes4"]    = "&nbsp; Emitido pelo sistema Projeto BoletoPhp - www.boletophp.com.br";

// DADOS OPCIONAIS DE ACORDO COM O BANCO OU CLIENTE
$dadosboleto["quantidade"]     = "";
$dadosboleto["valor_unitario"] = "";
$dadosboleto["aceite"]         = "N";
$dadosboleto["especie"]        = "R$";
$dadosboleto["especie_doc"]    = "";


// ---------------------- DADOS FIXOS DE CONFIGURA��O DO SEU BOLETO --------------- //
// DADOS DA SUA CONTA - REAL
$dadosboleto["agencia"]  = "1234"; // Num da agencia, sem digito
$dadosboleto["conta"]    = "0012345";  // Num da conta, sem digito
$dadosboleto["carteira"] = "57";  // C�digo da Carteira
// SEUS DADOS
$dadosboleto["identificacao"] = "BoletoPhp - C�digo Aberto de Sistema de Boletos";
$dadosboleto["cpf_cnpj"]      = "";
$dadosboleto["endereco"]      = "Coloque o endere�o da sua empresa aqui";
$dadosboleto["cidade_uf"]     = "Cidade / Estado";
$dadosboleto["cedente"]       = "Coloque a Raz�o Social da sua empresa aqui";

// N�O ALTERAR!
include("include/funcoes_real.php");
include("include/layout_real.php");
?>
