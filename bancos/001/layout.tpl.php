<?php
// +----------------------------------------------------------------------+
// | BoletoPhp - Versao Beta                                              |
// +----------------------------------------------------------------------+
// | Este arquivo esta disponivel sob a Licenca GPL disponivel pela Web   |
// | em http://pt.wikipedia.org/wiki/GNU_General_Public_License           |
// | Voce deve ter recebido uma copia da GNU Public License junto com     |
// | esse pacote; se nao, escreva para:                                   |
// |                                                                      |
// | Free Software Foundation, Inc.                                       |
// | 59 Temple Place - Suite 330                                          |
// | Boston, MA 02111-1307, USA.                                          |
// +----------------------------------------------------------------------+

// +----------------------------------------------------------------------+
// | Originado do Projeto BBBoletoFree que tiveram colaboracoes de Daniel |
// | William Schultz e Leandro Maniezo que por sua vez foi derivado do	  |
// | PHPBoleto de Joao Prado Maia e Pablo Martins F. Costa                |
// |                                                                      |
// | Se vc quer colaborar, nos ajude a desenvolver p/ os demais bancos :-)|
// | Acesse o site do Projeto BoletoPhp: www.boletophp.com.br             |
// +----------------------------------------------------------------------+

// +---------------------------------------------------------------------------------+
// | Equipe Coordenacao Projeto BoletoPhp: <boletophp@boletophp.com.br>              |
// | Desenvolvimento Boleto Banco do Brasil: Daniel William Schultz / Leandro Maniezo|
// |                                         Francisco Luz                           |
// +---------------------------------------------------------------------------------+

//convert array into string variables
foreach($this->output as $key => $value){
  ${$key} = $value;
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<title><?php echo $title; ?></title>
<META http-equiv=Content-Type content=text/html charset=ISO-8859-1>
<meta name="Generator" content="Projeto BoletoPHP - www.boletophp.com.br - Licen�a GPL" />

	
<style type="text/css">
<!--
/* *** CABECALHO *** */

#instr_header {
	background: url('<?php echo $merchant_logo; ?>') no-repeat top left;
}
-->
</style>
<link type="text/css" rel="stylesheet" media="all" href="<?php echo $style; ?>" /> 
</HEAD>
<BODY>
<STYLE>



</STYLE>

</head>
<body>

<div id="container">

	<div id="instr_header">
		<h1><?php echo $cedente; ?>
		 <?php echo $cpf_cnpj; ?></h1>
		<address><?php echo $endereco; ?><br></address>
		<address><?php echo $cidade_uf; ?></address>
	</div>	<!-- id="instr_header" -->

	<div id="">
<!--
  Use no lugar do <div id=""> caso queira imprimir sem o logotipo e instru��es
  <div id="instructions">
 -->
		
		<div id="instr_content">
			<p>
				O pagamento deste boleto tamb&eacute;m poder&aacute; ser efetuado 
				nos terminais de Auto-Atendimento BB.
			</p>
			
			<h2>Instru&ccedil;&otilde;es</h2>
			<ol>
			<li>
				Imprima em impressora jato de tinta (ink jet) ou laser, em 
				qualidade normal ou alta. N&atilde;o use modo econ&ocirc;mico. 
				<p class="notice">Por favor, configure margens esquerda e direita
				para 17mm.</p>
			</li>
			<li>
				Utilize folha A4 (210 x 297 mm) ou Carta (216 x 279 mm) e margens
				m&iacute;nimas &agrave; esquerda e &agrave; direita do 
				formul&aacute;rio.
			</li>
			<li>
				Corte na linha indicada. N&atilde;o rasure, risque, fure ou dobre 
				a regi&atilde;o onde se encontra o c&oacute;digo de barras
			</li>
			</ol>
		</div>	<!-- id="instr_content" -->
	</div>	<!-- id="instructions" -->
	
	<div id="boleto">
		<div class="cut">
			<p>Corte na linha pontilhada</p>
		</div>
    <table cellspacing=0 cellpadding=0 width=666 border=0><TBODY><TR><TD class=ct width=666><div align=right><b class=cp>Recibo
do Sacado</b></div></TD></tr></tbody></table>
		<table class="header" border=0 cellspacing="0" cellpadding="0">
		<tbody>
		<tr>
			<td width=150><IMG SRC="<?php echo $bank_logo_path; ?>"></td>
			<td width=50>
        <div class="field_cod_banco"><?php echo $codigo_banco_com_dv?></div>
			</td>
			<td class="linha_digitavel"><?php echo $linha_digitavel?></td>
		</tr>
		</tbody>
		</table>

		<table class="line" cellspacing="0" cellpadding="0">
		<tbody>
		<tr class="titulos">
			<td class="cedente">Cedente</TD>
			<td class="ag_cod_cedente">Ag&ecirc;ncia / C&oacute;digo do Cedente</td>
			<td class="especie">Esp&eacute;cie</TD>
			<td class="qtd">Quantidade</TD>
			<td class="nosso_numero">Nosso n&uacute;mero</td>
		</tr>

		<tr class="campos">
			<td class="cedente"><?php echo $cedente; ?>&nbsp;</td>
			<td class="ag_cod_cedente"><?php echo $agencia_codigo_cedente; ?> &nbsp;</td>
			<td class="especie"><?php echo $especie?>&nbsp;</td>
			<TD class="qtd"><?php echo $quantidade?>&nbsp;</td>
			<TD class="nosso_numero"><?php echo $nosso_numero?>&nbsp;</td>
		</tr>
		</tbody>
		</table>

		<table class="line" cellspacing="0" cellPadding="0">
		<tbody>
		<tr class="titulos">
			<td class="num_doc">N&uacute;mero do documento</td>
			<td class="contrato">Contrato</TD>
			<td class="cpf_cei_cnpj">CPF/CEI/CNPJ</TD>
			<td class="vencmento">Vencimento</TD>
			<td class="valor_doc">Valor documento</TD>
		</tr>
		<tr class="campos">
			<td class="num_doc"><?php echo $numero_documento?></td>
			<td class="contrato"><?php echo $contrato; ?></td>
			<td class="cpf_cei_cnpj"><?php echo $cpf_cnpj?></td>
			<td class="vencimento"><?php echo $data_vencimento?></td>
			<td class="valor_doc"><?php echo $valor_boleto?></td>
		</tr>
      </tbody>
      </table>

		<table class="line" cellspacing="0" cellPadding="0">
		<tbody>
		<tr class="titulos">
			<td class="desconto">(-) Desconto / Abatimento</td>
			<td class="outras_deducoes">(-) Outras dedu&ccedil;&otilde;es</td>
			<td class="mora_multa">(+) Mora / Multa</td>
			<td class="outros_acrescimos">(+) Outros acr&eacute;scimos</td>
			<td class="valor_cobrado">(=) Valor cobrado</td>
		</tr>
		<tr class="campos">
			<td class="desconto"><?php echo $desconto_abatimento; ?>&nbsp;</td>
			<td class="outras_deducoes"><?php echo $outras_deducoes; ?>&nbsp;</td>
			<td class="mora_multa"><?php echo $mora_multa; ?>&nbsp;</td>
			<td class="outros_acrescimos"><?php echo $outros_acrescimos; ?>&nbsp;</td>
			<td class="valor_cobrado"><?php echo $valor_cobrado; ?>&nbsp;</td>
		</tr>
		</tbody>
		</table>

      
		<table class="line" cellspacing="0" cellpadding="0">
		<tbody>
		<tr class="titulos">
			<td class="sacado">Sacado</td>
		</tr>
		<tr class="campos">
			<td class="sacado"><?php echo $sacado?></td>
		</tr>
		</tbody>
		</table>
		
		<div class="footer">
			<p>Autentica&ccedil;&atilde;o mec&acirc;nica</p>
		</div>

		
		
		<div class="cut">
			<p>Corte na linha pontilhada</p>
		</div>


		<table class="header" border=0 cellspacing="0" cellpadding="0">
		<tbody>
		<tr>
			<td width=150><IMG SRC="<?php echo $bank_logo_path; ?>"></td>
			<td width=50>
        <div class="field_cod_banco"><?php echo $codigo_banco_com_dv?></div>
			</td>
			<td class="linha_digitavel"><?php echo $linha_digitavel?></td>
		</tr>
		</tbody>
		</table>

		<table class="line" cellspacing="0" cellpadding="0">
		<tbody>
		<tr class="titulos">
			<td class="local_pagto">Local de pagamento</td>
			<td class="vencimento2">Vencimento</td>
		</tr>
		<tr class="campos">
			<td class="local_pagto">QUALQUER BANCO AT&Eacute; O VENCIMENTO</td>
			<td class="vencimento2"><?php echo $data_vencimento?></td>
		</tr>
		</tbody>
		</table>
		
		<table class="line" cellspacing="0" cellpadding="0">
		<tbody>
		<tr class="titulos">
			<td class="cedente2">Cedente</td>
			<td class="ag_cod_cedente2">Ag&ecirc;ncia/C&oacute;digo cedente</td>
		</tr>
		<tr class="campos">
			<td class="cedente2"><?php echo $cedente?></td>
			<td class="ag_cod_cedente2"><?php echo $agencia_codigo_cedente; ?></td>
		</tr>
		</tbody>
		</table>

		<table class="line" cellspacing="0" cellpadding="0">
		<tbody>
		<tr class="titulos">
			<td class="data_doc">Data do documento</td>
			<td class="num_doc2">No. documento</td>
			<td class="especie_doc">Esp&eacute;cie doc.</td>
			<td class="aceite">Aceite</td>
			<td class="data_process">Data process.</td>
			<td class="nosso_numero2">Nosso n&uacute;mero</td>
		</tr>
		<tr class="campos">
			<td class="data_doc"><?php echo $data_documento?></td>
			<td class="num_doc2"><?php echo $numero_documento?></td>
			<td class="especie_doc"><?php echo $especie_doc?></td>
			<td class="aceite"><?php echo $aceite?></td>
			<td class="data_process"><?php echo $data_processamento?></td>
			<td class="nosso_numero2"><?php echo $nosso_numero?></td>
		</tr>
		</tbody>
		</table>

		<table class="line" cellspacing="0" cellPadding="0">
		<tbody>
		<tr class="titulos">
			<td class="reservado">Uso do  banco</td>
			<td class="carteira">Carteira</td>
			<td class="especie2">Esp&eacute;cie</td>
			<td class="qtd2">Quantidade</td>
			<td class="xvalor">x Valor</td>
			<td class="valor_doc2">(=) Valor documento</td>
		</tr>
		<tr class="campos">
			<td class="reservado">&nbsp;</td>
			<td class="carteira"><?php echo $carteira?> <?php echo isset($variacao_carteira) ? $variacao_carteira : '&nbsp;' ?></td>
			<td class="especie2"><?php echo $especie?></td>
			<td class="qtd2"><?php echo $quantidade?></td>
			<td class="xvalor"><?php echo $valor_unitario?></td>
			<td class="valor_doc2"><?php echo $valor_boleto?></td>
		</tr>
		</tbody>
		</table>
		
		
		<table class="line" cellspacing="0" cellpadding="0">
		<tbody>
		<tr><td class="last_line" rowspan="6">
			<table class="line" cellspacing="0" cellpadding="0">
			<tbody>
			<tr class="titulos">
				<td class="instrucoes">
						Instru&ccedil;&otilde;es (Texto de responsabilidade do cedente)
				</td>
			</tr>
			<tr class="campos">
				<td class="instrucoes" rowspan="5">
					<p><?php echo $demonstrativo1; ?></p>		
					<p><?php echo $demonstrativo2; ?></p>
					<p><?php echo $demonstrativo3; ?></p>
					<p><?php echo $instrucoes1; ?></p>
					<p><?php echo $instrucoes2; ?></p>
					<p><?php echo $instrucoes3; ?></p>
					<p><?php echo $instrucoes4; ?></p>
				</td>
			</tr>
			</tbody>
			</table>
		</td></tr>
		
		<tr><td>
			<table class="line" cellspacing="0" cellpadding="0">
			<tbody>
			<tr class="titulos">
				<td class="desconto2">(-) Desconto / Abatimento</td>
			</tr>
			<tr class="campos">
				<td class="desconto2"><?php echo $desconto_abatimento; ?>&nbsp;</td>
			</tr>
			</tbody>
			</table>
		</td></tr>
		
		<tr><td>
			<table class="line" cellspacing="0" cellpadding="0">
			<tbody>
			<tr class="titulos">
				<td class="outras_deducoes2">(-) Outras dedu&ccedil;&otilde;es</td>
			</tr>
			<tr class="campos">
				<td class="outras_deducoes2"><?php echo $outras_deducoes; ?>&nbsp;</td>
			</tr>
			</tbody>
			</table>
		</td></tr>

		<tr><td>
			<table class="line" cellspacing="0" cellpadding="0">
			<tbody>
			<tr class="titulos">
				<td class="mora_multa2">(+) Mora / Multa</td>
			</tr>
			<tr class="campos">
				<td class="mora_multa2"><?php echo $mora_multa; ?>&nbsp;</td>
			</tr>
			</tbody>
			</table>
		</td></tr>

		<tr><td>
			<table class="line" cellspacing="0" cellpadding="0">
			<tbody>
			<tr class="titulos">
				<td class="outros_acrescimos2">(+) Outros Acr&eacute;scimos</td>
			</tr>
			<tr class="campos">
				<td class="outros_acrescimos2"><?php echo $outros_acrescimos; ?>&nbsp;</td>
			</tr>
			</tbody>
			</table>
		</td></tr>

		<tr><td class="last_line">
			<table class="line" cellspacing="0" cellpadding="0">
			<tbody>
			<tr class="titulos">
				<td class="valor_cobrado2">(=) Valor cobrado</td>
			</tr>
			<tr class="campos">
				<td class="valor_cobrado2"><?php echo $valor_cobrado; ?>&nbsp;</td>
			</tr>
			</tbody>
			</table>
		</td></tr>
		</tbody>
		</table>
		
		
		<table class="line" cellspacing="0" cellPadding="0">
		<tbody>
		<tr class="titulos">
			<td class="sacado2">Sacado</td>
		</tr>
		<tr class="campos">
			<td class="sacado2">
				<p><?php echo $sacado?></p>
				<p><?php echo $endereco1?></p>
				<p><?php echo $endereco2?></p>
			</td>
		</tr>
		</tbody>
		</table>		
		
		<table class="line" cellspacing="0" cellpadding="0">
		<tbody>
		<tr class="titulos">
			<td class="sacador_avalista" colspan="2">Sacador/Avalista</td>
		</tr>
		<tr class="campos">
			<td class="sacador_avalista"><?php echo $avalista; ?>&nbsp;</td>
			<td class="cod_baixa">C&oacute;d. baixa</td>
		</tr>
		</tbody>
		</table>		
    <table cellspacing=0 cellpadding=0 width=666 border=0><TBODY><TR><TD width=666 align=right ><font style="font-size: 10px;">Autentica&ccedil;&atilde;o mec&acirc;nica - Ficha de Compensa&ccedil;&atilde;o</font></TD></tr></tbody></table>
		<div class="barcode">
			<p><?php echo $codigo_barras; ?></p>
		</div>
		<div class="cut">
			<p>Corte na linha pontilhada</p>
		</div>

	</div>

</div>

</body>

</html>
