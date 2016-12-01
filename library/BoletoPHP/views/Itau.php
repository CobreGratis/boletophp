<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title><?php echo $identificacao; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
	<style type="text/css">
		body { background-color: #eee; color: #000; margin: 8px 0 8px 8px; }
		.corpo-boleto { background-color: #fff; padding: 5px 25px; border-left: 1px dashed #aaa; border-right: 1px dashed #aaa; margin: 0px 15px; width:666px; }
		.cp { font: bold 10px Arial; color: black; }
		.ti { font: 9px Arial, Helvetica, sans-serif; }
		.ld { font: bold 15px Arial; color: #000; }
		.ct { font: 9px "Arial Narrow"; color: #003; }
		.cn { font: 9px Arial; color: black; }
		.bc { font: bold 20px Arial; color: #000; }
		.ld2 { font: bold 13px Arial; color: #000; }
		@media print {
			body { background-color: #fff; }
			.nao-imprimir { display:none; }
			.corpo-boleto { padding: 0; border: 0; margin: 0; }
		}
	</style>
</head>
<body>
	<div class="corpo-boleto">
		<table width=666 cellspacing=0 cellpadding=0 border=0>
			<tr>
				<td valign=top class=cp>
					<div style="color: green; font-size: 12px; margin: 15px 0;" class="nao-imprimir">
						<b>Poupe papel e tinta, não é necessário imprimir este boleto! Utilize a "Linha Digitável" abaixo para pagar através do 
						internet banking ou nos caixas eletrônicos até o vencimento.</b>
					</div>
					<div align="center" class="nao-imprimir">Caso queira imprimir este boleto, siga as instruções:</div>
					<ul class="nao-imprimir" style="margin: 10px 0 25px 0;">
						<li>Imprima em impressora jato de tinta (ink jet) ou laser, em qualidade normal ou alta (não use o modo econômico).</li>
						<li>Utilize folha A4 (210 x 297 mm) ou Carta (216 x 279 mm) e sem margens na impressão.</li>
						<li>Corte na linha indicada. Não rasure, risque, fure ou dobre a região onde se encontra o código de barras.</li>
					</ul>
					<span class="ld2">
						&nbsp;&nbsp;&nbsp;&nbsp;Linha Digitável: &nbsp;<?php echo $linha_digitavel; ?><br>
						&nbsp;&nbsp;&nbsp;&nbsp;Valor: &nbsp;&nbsp;R$ <?php echo $valor_boleto; ?><br>
					</span>
				</td>
			</tr>
		</table>
		<br>
		<table cellspacing=0 cellpadding=0 width=666 border=0>
			<tbody>
				<tr><td class=ct width=666><img height=1 src="<?php echo $caminho_imagens; ?>/6.png" width=665 border=0 alt=""></td></tr>
				<tr><td class=ct width=666><div align=right><b class=cp>Recibo do Pagador</b></div></td></tr>
			</tbody>
		</table>
		<table width=666 cellspacing=5 cellpadding=0 border=0>
			<tr><td width=41></td></tr>
		</table>
		<table width=666 cellspacing=5 cellpadding=0 border=0>
			<tr>
				<td width=41><img src="<?php echo $logo_cedente; ?>" alt=""></td>
				<td class=ti width=455><?php echo $identificacao; ?> <?php echo isset($cpf_cnpj) ? "<br>" . $cpf_cnpj : '' ?><br><?php echo $endereco; ?><br><?php echo $cidade_uf; ?><br></td>
				<td align=RIGHT width=150 class=ti>&nbsp;</td>
			</tr>
		</table>
		<BR>
		<table cellspacing=0 cellpadding=0 width=666 border=0>
			<tr>
				<td class=cp width=150><span class="campo"><img src="<?php echo $caminho_imagens; ?>/logo-itau.gif" width="150" height="40" border=0 alt="Itaú"></span></td>
				<td width=3 valign=bottom><img height=22 src="<?php echo $caminho_imagens; ?>/3.png" width=2 border=0 alt=""></td>
				<td class=cpt width=58 valign=bottom><div align=center><font class=bc><?php echo $codigo_banco_com_dv; ?></font></div></td>
				<td width=3 valign=bottom><img height=22 src="<?php echo $caminho_imagens; ?>/3.png" width=2 border=0 alt=""></td>
				<td class=ld align=right width=453 valign=bottom><span class=ld><span class="campotitulo"><?php echo $linha_digitavel; ?></span></span></td>
			</tr>
			<tbody>
				<tr><td colspan=5><img height=2 src="<?php echo $caminho_imagens; ?>/2.png" width=666 border=0 alt=""></td></tr>
			</tbody>
		</table>
		<table cellspacing=0 cellpadding=0 border=0>
			<tbody>
				<tr>
					<td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=ct valign=top width=268 height=13>Beneficiário</td>
					<td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=ct valign=top width=156 height=13>Agência/Cód. do Beneficiário</td>
					<td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=ct valign=top width=34 height=13>Espécie</td>
					<td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=ct valign=top width=53 height=13>Quantidade</td>
					<td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=ct valign=top width=120 height=13>Nosso Número</td>
				</tr>
				<tr>
					<td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=cp valign=top width=268 height=12><span class="campo"><?php echo $cedente; ?></span></td>
					<td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=cp valign=top width=156 height=12><span class="campo"><?php echo $agencia_codigo; ?></span></td>
					<td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=cp valign=top  width=34 height=12><span class="campo"><?php echo $especie; ?></span></td>
					<td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=cp valign=top  width=53 height=12><span class="campo"><?php echo $quantidade; ?></span></td>
					<td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=cp valign=top align=right width=120 height=12><span class="campo"><?php echo $nosso_numero; ?></span></td>
				</tr>
				<tr>
					<td valign=top width=7 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=7 border=0 alt=""></td>
					<td valign=top width=268 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=268 border=0 alt=""></td>
					<td valign=top width=7 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=7 border=0 alt=""></td>
					<td valign=top width=156 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=156 border=0 alt=""></td>
					<td valign=top width=7 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=7 border=0 alt=""></td>
					<td valign=top width=34 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=34 border=0 alt=""></td>
					<td valign=top width=7 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=7 border=0 alt=""></td>
					<td valign=top width=53 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=53 border=0 alt=""></td>
					<td valign=top width=7 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=7 border=0 alt=""></td>
					<td valign=top width=120 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=120 border=0 alt=""></td>
				</tr>
			</tbody>
		</table>
		<table cellspacing=0 cellpadding=0 border=0>
			<tbody>
				<tr>
					<td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=ct valign=top colspan=3 height=13>Número do Documento</td>
					<td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=ct valign=top width=132 height=13>CPF/CNPJ</td>
					<td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=ct valign=top width=134 height=13>Vencimento</td>
					<td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=ct valign=top width=180 height=13>Valor do Documento</td>
				</tr>
				<tr>
					<td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=cp valign=top colspan=3 height=12><span class="campo"><?php echo $numero_documento; ?></span></td>
					<td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=cp valign=top width=132 height=12><span class="campo"><?php echo $cpf_cnpj; ?></span></td>
					<td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=cp valign=top width=134 height=12><span class="campo"><?php echo ($data_vencimento != "") ? $data_vencimento : "Contra Apresentação" ?></span></td>
					<td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=cp valign=top align=right width=180 height=12><span class="campo"><?php echo $valor_boleto; ?></span></td>
				</tr>
				<tr>
					<td valign=top width=7 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=7 border=0 alt=""></td>
					<td valign=top width=113 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=113 border=0 alt=""></td>
					<td valign=top width=7 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=7 border=0 alt=""></td>
					<td valign=top width=72 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=72 border=0 alt=""></td>
					<td valign=top width=7 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=7 border=0 alt=""></td>
					<td valign=top width=132 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=132 border=0 alt=""></td>
					<td valign=top width=7 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=7 border=0 alt=""></td>
					<td valign=top width=134 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=134 border=0 alt=""></td>
					<td valign=top width=7 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=7 border=0 alt=""></td>
					<td valign=top width=180 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=180 border=0 alt=""></td>
				</tr>
			</tbody>
		</table>
		<table cellspacing=0 cellpadding=0 border=0>
			<tbody>
				<tr>
					<td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=ct valign=top width=113 height=13>(-) Desconto</td>
					<td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=ct valign=top width=112 height=13>(-) Abatimento</td>
					<td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=ct valign=top width=113 height=13>(+) Mora</td>
					<td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=ct valign=top width=113 height=13>(+) Outros Acréscimos</td>
					<td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=ct valign=top width=180 height=13>(=) Valor Cobrado</td>
				</tr>
				<tr>
					<td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=cp valign=top align=right width=113 height=12></td>
					<td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=cp valign=top align=right width=112 height=12></td>
					<td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=cp valign=top align=right width=113 height=12></td>
					<td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=cp valign=top align=right width=113 height=12></td>
					<td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=cp valign=top align=right width=180 height=12></td>
				</tr>
				<tr>
					<td valign=top width=7 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=7 border=0 alt=""></td>
					<td valign=top width=113 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=113 border=0 alt=""></td>
					<td valign=top width=7 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=7 border=0 alt=""></td>
					<td valign=top width=112 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=112 border=0 alt=""></td>
					<td valign=top width=7 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=7 border=0 alt=""></td>
					<td valign=top width=113 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=113 border=0 alt=""></td>
					<td valign=top width=7 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=7 border=0 alt=""></td>
					<td valign=top width=113 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=113 border=0 alt=""></td>
					<td valign=top width=7 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=7 border=0 alt=""></td>
					<td valign=top width=180 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=180 border=0 alt=""></td>
				</tr>
			</tbody>
		</table>
		<table cellspacing=0 cellpadding=0 border=0>
			<tbody>
				<tr>
					<td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=ct valign=top width=659 height=13>Pagador</td>
				</tr>
				<tr>
					<td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=cp valign=top width=659 height=12><span class="campo"><?php echo $sacado; ?></span></td>
				</tr>
				<tr>
					<td valign=top width=7 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=7 border=0 alt=""></td>
					<td valign=top width=659 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=659 border=0 alt=""></td>
				</tr>
			</tbody>
		</table>
		<table cellspacing=0 cellpadding=0 border=0>
			<tbody>
				<tr>
					<td class=ct width=7 height=12></td>
					<td class=ct width=564>Demonstrativo:</td>
					<td class=ct width=7 height=12></td>
					<td class=ct width=88>Autenticação mecânica</td>
				</tr>
				<tr>
					<td width=7></td>
					<td class=cp width=564><span class="campo"><?php echo $demonstrativo1; ?><br><?php echo $demonstrativo2; ?><br><?php echo $demonstrativo3; ?><br></span></td>
					<td width=7></td>
					<td width=88></td>
				</tr>
			</tbody>
		</table>
		<table cellspacing=0 cellpadding=0 width=666 border=0>
			<tbody>
				<tr>
					<td width=7></td>
					<td width=500 class=cp><br><br><br></td>
					<td width=159></td>
				</tr>
			</tbody>
		</table>
		<table cellspacing=0 cellpadding=0 width=666 border=0>
			<tr><td class=ct width=666></td></tr>
			<tbody>
				<tr><td class=ct width=666><div align=right>Corte na linha pontilhada</div></td></tr>
				<tr><td class=ct width=666><img height=1 src="<?php echo $caminho_imagens; ?>/6.png" width=665 border=0 alt=""></td></tr>
			</tbody>
		</table>


		<br>
		<table cellspacing=0 cellpadding=0 width=666 border=0>
			<tr>
				<td class=cp width=150><span class="campo"><img src="<?php echo $caminho_imagens; ?>/logo-itau.gif" width="150" height="40" border=0 alt="Itaú"></span></td>
				<td width=3 valign=bottom><img height=22 src="<?php echo $caminho_imagens; ?>/3.png" width=2 border=0 alt=""></td>
				<td class=cpt width=58 valign=bottom><div align=center><font class=bc><?php echo $codigo_banco_com_dv; ?></font></div></td>
				<td width=3 valign=bottom><img height=22 src="<?php echo $caminho_imagens; ?>/3.png" width=2 border=0 alt=""></td>
				<td class=ld align=right width=453 valign=bottom><span class=ld><span class="campotitulo"><?php echo $linha_digitavel; ?></span></span></td>
			</tr>
			<tbody>
				<tr><td colspan=5><img height=2 src="<?php echo $caminho_imagens; ?>/2.png" width=666 border=0 alt=""></td></tr>
			</tbody>
		</table>
		<table cellspacing=0 cellpadding=0 border=0>
			<tbody>
				<tr>
					<td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=ct valign=top width=472 height=13>Local de Pagamento</td>
					<td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=ct valign=top width=180 height=13>Vencimento</td>
				</tr>
				<tr>
					<td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=cp valign=top width=472 height=12>Pagável em qualquer Banco até o vencimento</td>
					<td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=cp valign=top align=right width=180 height=12><span class="campo"><?php echo ($data_vencimento != "") ? $data_vencimento : "Contra Apresentação" ?></span></td>
				</tr>
				<tr>
					<td valign=top width=7 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=7 border=0 alt=""></td>
					<td valign=top width=472 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=472 border=0 alt=""></td>
					<td valign=top width=7 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=7 border=0 alt=""></td>
					<td valign=top width=180 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=180 border=0 alt=""></td>
				</tr>
			</tbody>
		</table>
		<table cellspacing=0 cellpadding=0 border=0>
			<tbody>
				<tr>
					<td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=ct valign=top width=472 height=13>Beneficiário</td>
					<td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=ct valign=top width=180 height=13>Agência / Cód. do Beneficiário</td>
				</tr>
				<tr>
					<td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=cp valign=top width=472 height=12><span class="campo"><?php echo $cedente; ?></span></td>
					<td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=cp valign=top align=right width=180 height=12><span class="campo"><?php echo $agencia_codigo; ?></span></td>
				</tr>
				<tr>
					<td valign=top width=7 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=7 border=0 alt=""></td>
					<td valign=top width=472 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=472 border=0 alt=""></td>
					<td valign=top width=7 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=7 border=0 alt=""></td>
					<td valign=top width=180 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=180 border=0 alt=""></td>
				</tr>
			</tbody>
		</table>
		<table cellspacing=0 cellpadding=0 border=0>
			<tbody>
				<tr>
					<td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=ct valign=top width=113 height=13>Data do Documento</td>
					<td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=ct valign=top width=133 height=13>Número do Documento</td>
					<td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=ct valign=top width=62 height=13>Espécie Doc.</td>
					<td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=ct valign=top width=34 height=13>Aceite</td>
					<td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=ct valign=top width=102 height=13>Data do Processamento</td>
					<td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=ct valign=top width=180 height=13>Nosso Número</td>
				</tr>
				<tr>
					<td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=cp valign=top width=113 height=12><div align=left><span class="campo"><?php echo $data_documento; ?></span></div></td>
					<td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=cp valign=top width=133 height=12><span class="campo"><?php echo $numero_documento; ?></span></td>
					<td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=cp valign=top width=62 height=12><div align=left><span class="campo"><?php echo $especie_doc; ?></span></div></td>
					<td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=cp valign=top width=34 height=12><div align=left><span class="campo"><?php echo $aceite; ?></span></div></td>
					<td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=cp valign=top width=102 height=12><div align=left><span class="campo"><?php echo $data_processamento; ?></span></div></td>
					<td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=cp valign=top align=right width=180 height=12><span class="campo"><?php echo $nosso_numero; ?></span></td>
				</tr>
				<tr>
					<td valign=top width=7 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=7 border=0 alt=""></td>
					<td valign=top width=113 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=113 border=0 alt=""></td>
					<td valign=top width=7 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=7 border=0 alt=""></td>
					<td valign=top width=133 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=133 border=0 alt=""></td>
					<td valign=top width=7 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=7 border=0 alt=""></td>
					<td valign=top width=62 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=62 border=0 alt=""></td>
					<td valign=top width=7 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=7 border=0 alt=""></td>
					<td valign=top width=34 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=34 border=0 alt=""></td>
					<td valign=top width=7 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=7 border=0 alt=""></td>
					<td valign=top width=102 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=102 border=0 alt=""></td>
					<td valign=top width=7 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=7 border=0 alt=""></td>
					<td valign=top width=180 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=180 border=0 alt=""></td>
				</tr>
			</tbody>
		</table>
		<table cellspacing=0 cellpadding=0 border=0>
			<tbody>
				<tr>
					<td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=ct valign=top width=113 height=13>Uso do banco</td>

					<td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=ct valign=top width=83 height=13>Carteira</td>

					<td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=ct valign=top width=43 height=13>Espécie</td>
					<td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=ct valign=top width=103 height=13>Quantidade</td>
					<td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=ct valign=top width=102 height=13>Valor</td>
					<td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=ct valign=top width=180 height=13>(=) Valor do Documento</td>
				</tr>
				<tr>
					<td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=cp valign=top width=113 height=12><div align=left></div><div align=left><span class="campo"></span></div></td>

					<td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=cp valign=top width=83 height=12><div align=left></div><div align=left><span class="campo"><?php echo $carteira; ?></span></div></td>

					<td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=cp valign=top width=43><div align=left><span class="campo"><?php echo $especie; ?></span></div></td>
					<td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=cp valign=top width=103><span class="campo"><?php echo $quantidade; ?></span></td>
					<td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=cp valign=top width=102><span class="campo"><?php echo $valor_unitario; ?></span></td>
					<td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=cp valign=top align=right width=180 height=12><span class="campo"><?php echo $valor_boleto; ?></span></td>
				</tr>
				<tr>
					<td valign=top width=7 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=7 border=0 alt=""></td>
					<td valign=top width=113 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=113 border=0 alt=""></td>

					<td valign=top width=7 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=7 border=0 alt=""></td>
					<td valign=top width=83 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=83 border=0 alt=""></td>

					<td valign=top width=7 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=7 border=0 alt=""></td>
					<td valign=top width=43 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=43 border=0 alt=""></td>
					<td valign=top width=7 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=7 border=0 alt=""></td>
					<td valign=top width=103 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=103 border=0 alt=""></td>
					<td valign=top width=7 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=7 border=0 alt=""></td>
					<td valign=top width=102 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=102 border=0 alt=""></td>
					<td valign=top width=7 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=7 border=0 alt=""></td>
					<td valign=top width=180 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=180 border=0 alt=""></td>
				</tr>
			</tbody>
		</table>
		<table cellspacing=0 cellpadding=0 width=666 border=0>
			<tbody>
				<tr>
					<td align=right width=10>
						<table cellspacing=0 cellpadding=0 border=0 align=left>
							<tbody>
								<tr><td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td></tr>
								<tr><td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td></tr>
								<tr><td valign=top width=7 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=1 border=0 alt=""></td></tr>
							</tbody>
						</table>
					</td>
					<td valign=top width=468 rowspan=5>
						<font class=ct>Instruções:</font><br><br>
						<span class=cp><font class=campo><?php echo $instrucoes1; ?><br><?php echo $instrucoes2; ?><br><?php echo $instrucoes3; ?><br><?php echo $instrucoes4; ?></font><br><br></span>
					</td>
					<td align=right width=188>
						<table cellspacing=0 cellpadding=0 border=0>
							<tbody>
								<tr>
									<td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
									<td class=ct valign=top width=180 height=13>(-) Desconto</td>
								</tr>
								<tr>
									<td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
									<td class=cp valign=top align=right width=180 height=12></td>
								</tr>
								<tr>
									<td valign=top width=7 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=7 border=0 alt=""></td>
									<td valign=top width=180 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=180 border=0 alt=""></td>
								</tr>
							</tbody>
						</table>
					</td>
				</tr>
				<tr>
					<td align=right width=10>
						<table cellspacing=0 cellpadding=0 border=0 align=left>
							<tbody>
								<tr><td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td></tr>
								<tr><td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td></tr>
								<tr><td valign=top width=7 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=1 border=0 alt=""></td></tr>
							</tbody>
						</table>
					</td>
					<td align=right width=188>
						<table cellspacing=0 cellpadding=0 border=0>
							<tbody>
								<tr>
									<td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
									<td class=ct valign=top width=180 height=13>(-) Abatimento</td>
								</tr>
								<tr>
									<td class=cp valign=top width=7 height=12> <img height=12 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
									<td class=cp valign=top align=right width=180 height=12></td>
								</tr>
								<tr>
									<td valign=top width=7 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=7 border=0 alt=""></td>
									<td valign=top width=180 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=180 border=0 alt=""></td>
								</tr>
							</tbody>
						</table>
					</td>
				</tr>
				<tr>
					<td align=right width=10>
						<table cellspacing=0 cellpadding=0 border=0 align=left>
							<tbody>
								<tr><td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td></tr>
								<tr><td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td></tr>
								<tr><td valign=top width=7 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=1 border=0 alt=""></td></tr>
							</tbody>
						</table>
					</td>
					<td align=right width=188>
						<table cellspacing=0 cellpadding=0 border=0>
							<tbody>
								<tr>
									<td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
									<td class=ct valign=top width=180 height=13>(+) Mora</td>
								</tr>
								<tr>
									<td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
									<td class=cp valign=top align=right width=180 height=12></td>
								</tr>
								<tr>
									<td valign=top width=7 height=1> <img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=7 border=0 alt=""></td>
									<td valign=top width=180 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=180 border=0 alt=""></td>
								</tr>
							</tbody>
						</table>
					</td>
				</tr>
				<tr>
					<td align=right width=10>
						<table cellspacing=0 cellpadding=0 border=0 align=left>
							<tbody>
								<tr><td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td></tr>
								<tr><td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td></tr>
								<tr><td valign=top width=7 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=1 border=0 alt=""></td></tr>
							</tbody>
						</table>
					</td>
					<td align=right width=188>
						<table cellspacing=0 cellpadding=0 border=0>
							<tbody>
								<tr>
									<td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
									<td class=ct valign=top width=180 height=13>(+) Outros Acréscimos</td>
								</tr>
								<tr>
									<td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
									<td class=cp valign=top align=right width=180 height=12></td>
								</tr>
								<tr>
									<td valign=top width=7 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=7 border=0 alt=""></td>
									<td valign=top width=180 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=180 border=0 alt=""></td>
								</tr>
							</tbody>
						</table>
					</td>
				</tr>
				<tr>
					<td align=right width=10>
						<table cellspacing=0 cellpadding=0 border=0 align=left>
							<tbody>
								<tr><td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td></tr>
								<tr><td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td></tr>
							</tbody>
						</table>
					</td>
					<td align=right width=188>
						<table cellspacing=0 cellpadding=0 border=0>
							<tbody>
								<tr>
									<td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
									<td class=ct valign=top width=180 height=13>(=) Valor Cobrado</td>
								</tr>
								<tr>
									<td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
									<td class=cp valign=top align=right width=180 height=12></td>
								</tr>
							</tbody>
						</table>
					</td>
				</tr>
			</tbody>
		</table>
		<table cellspacing=0 cellpadding=0 width=666 border=0>
			<tbody>
				<tr><td valign=top width=666 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=666 border=0 alt=""></td></tr>
			</tbody>
		</table>
		<table cellspacing=0 cellpadding=0 border=0>
			<tbody>
				<tr>
					<td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=ct valign=top width=659 height=13>Pagador:</td>
				</tr>
				<tr>
					<td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=cp valign=top width=659 height=12><span class="campo"><?php echo $sacado; ?></span></td>
				</tr>
			</tbody>
		</table>
		<table cellspacing=0 cellpadding=0 border=0>
			<tbody>
				<tr>
					<td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=cp valign=top width=659 height=12><span class="campo"><?php echo $endereco1; ?></span></td>
				</tr>
			</tbody>
		</table>
		<table cellspacing=0 cellpadding=0 border=0>
			<tbody>
				<tr>
					<td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=cp valign=top width=472 height=13><span class="campo"><?php echo $endereco2; ?></span></td>
					<td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $caminho_imagens; ?>/1.png" width=1 border=0 alt=""></td>
					<td class=ct valign=top width=180 height=13>Cód. baixa</td>
				</tr>
				<tr>
					<td valign=top width=7 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=7 border=0 alt=""></td>
					<td valign=top width=472 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=472 border=0 alt=""></td>
					<td valign=top width=7 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=7 border=0 alt=""></td>
					<td valign=top width=180 height=1><img height=1 src="<?php echo $caminho_imagens; ?>/2.png" width=180 border=0 alt=""></td>
				</tr>
			</tbody>
		</table>
		<table cellSpacing=0 cellPadding=0 border=0 width=666>
			<tbody>
				<tr>
					<td class=ct width=7 height=12></td>
					<td class=ct width=409>Pagador/Avalista</td>
					<td class=ct width=250><div align=right>Autenticação mecânica - <b class=cp>FICHA DE COMPENSAÇÃO</b></div></td>
				</tr>
				<tr><td class=ct colspan=3></td></tr>
			</tbody>
		</table>
		<table cellSpacing=0 cellPadding=0 width=666 border=0>
			<tbody>
				<tr><td vAlign=bottom align=left height=50><?php echo $codigo_barras; ?></td></tr>
			</tbody>
		</table>
		<table cellSpacing=0 cellPadding=0 width=666 border=0>
			<tr><td class=ct width=666></td></tr>
			<tbody>
				<tr><td class=ct width=666><div align=right>Corte na linha pontilhada</div></td></tr>
				<tr><td class=ct width=666><img height=1 src="<?php echo $caminho_imagens; ?>/6.png" width=665 border=0 alt=""></td></tr>
			</tbody>
		</table>
	</div>
</body>
</html>
