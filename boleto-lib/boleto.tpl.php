<?php 
 /**
 * This code is released under the GNU General Public License.
 * See COPYRIGHT.txt and LICENSE.txt.
 *
 * This library is built based on Boletophp v0.17
 * Many thanks to the mantainers and collaborators of Boletophp project at boletophp.com.br.
 * 
 * @file Html template that renders the Boleto output.
 * @link http://www.drupalista.com.br/downloads/bibliotecas/boleto
 * @copyright 2011 Drupalista.com.br
 * @author Francisco Luz <franciscoferreiraluz at yahoo dot com dot au>
 * @package Boleto
 * @version 1.0 Beta
 *
 *  --------------------------------C O N T R A T A C A O ---------------------------------------------------
 *  
 * - Estou dispon&iacute;vel para trabalhos freelance, contrato temporario ou permanente. (falo ingles fluente)
 * - Aberto para propostas de parcerias. Nao quer dizer necessariamente que vou aceita-las :)
 * - Tambem presto servi&ccedil;os de treinamento em Drupal para empresas e profissionais da &aacute;rea de
 *   desenvolvimento web ou para empresas / pessoas usuarias da plataforma Drupal que queiram capacitar
 *   sua equipe interna para tirar o maximo proveito do poder do Drupal.
 * - Trabalho com solu&ccedil;&otilde;es como o Open Public (http://openpublicapp.com), ideal para prefeituras e
 *   autarquias publicas.
 * - Trabalho ainda com o Open Publish (http://openpublishapp.com), uma solucao completa de websites
 *   para canais de tv, jornais, revistas, not&iacute;cias, etc...
 *
 *   Acesse o meu website http://www.drupalista.com.br para me contactar.
 *
 *   Francisco Luz
 *   Junho / 2011 
 * 
 */

//convert array into string variables
foreach($this->output as $key => $value){
  ${$key} = $value;
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
  <HEAD>
    <TITLE><?php echo $title; ?></TITLE>
      <META http-equiv=Content-Type content=text/html charset=ISO-8859-1>
      <meta name="Generator" content="Projeto BoletoPHP - www.boletophp.com.br - Licen&ccedil;a GPL" />
      <link type="text/css" rel="stylesheet" media="all" href="<?php echo $style; ?>" /> 
  </head>
<BODY>
  <table cellspacing=0 cellpadding=0 border=0 width=666>
    <tr>
      <td valign=top class=cp><DIV ALIGN="CENTER">Instru&ccedil;&otilde;es de Impress&atilde;o</DIV></TD>
    </TR>
    <TR>
      <TD valign=top class=cp><DIV ALIGN="left"><p>
	<li>Imprima em impressora jato de tinta (ink jet) ou laser em qualidade normal ou alta (N&atilde;o use modo econômico).<br>
	<li>Utilize folha A4 (210 x 297 mm) ou Carta (216 x 279 mm) e margens m&iacute;nimas &agrave; esquerda e &agrave; direita do formul&aacute;rio.<br>
	<li>Corte na linha indicada. N&atilde;o rasure, risque, fure ou dobre a regi&atilde;o onde se encontra o c&oacute;digo de barras.<br>
	<li>Caso n&atilde;o apare&ccedil;a o c&oacute;digo de barras no final, clique em F5 para atualizar esta tela.
	<li>Caso tenha problemas ao imprimir, copie a seqüencia num&eacute;rica abaixo e pague no caixa eletrônico ou no internet banking:<br><br>
	<span class="ld2">
	  &nbsp;&nbsp;&nbsp;&nbsp;Linha Digit&aacute;vel: &nbsp;<?php echo $linha_digitavel; ?><br>
	  &nbsp;&nbsp;&nbsp;&nbsp;Valor: &nbsp;&nbsp;R$ <?php echo $valor_cobrado; ?><br>
	</span></DIV>
      </td>
    </tr>
  </table>
  <br>
  <table cellspacing=0 cellpadding=0 border=0 width=666>
    <TBODY>
      <TR><TD class="ct"><img height=1 src="<?php echo $images; ?>/6.png" width=665 border=0></TD>
      </TR>
      <TR><TD class=ct width=666><div align=right>
	    <b class=cp>Recibo do Sacado</b></div>
	  </TD>
      </tr>
    </tbody>
  </table>
  <table cellspacing=5 cellpadding=0 border=0 width=666>
    <tr><td width=41></TD>
    </tr>
  </table>
  <table cellspacing=5 cellpadding=0 border=0 width=666 align=Default>
    <tr>
      <td width=41><IMG src="<?php echo $merchant_logo; ?>"></td>
      <td class=ti width=455><?php echo $cedente; ?><br>
                             <?php echo $cpf_cnpj; ?><br>
			     <?php echo $endereco; ?><br>
	                     <?php echo $cidade_uf; ?><br>
      </td>
      <td align=RIGHT width=150 class=ti>&nbsp;</td>
    </tr>
  </table>
  <BR>
<table cellspacing=0 cellpadding=0 border=0 width=666>
  <tr><td class=cp width=150> 
        <span class="campo"><IMG src="<?php echo $bank_logo_path; ?>" width="150" height="40" border=0></span></td>
      <td width=3 valign=bottom><img height=22 src="<?php echo $images; ?>/3.png" width=2 border=0></td>
      <td class=cpt width=58 valign=bottom><div align=center><font class=bc><?php echo $codigo_banco_com_dv; ?></font></div></td>
      <td width=3 valign=bottom><img height=22 src="<?php echo $images; ?>/3.png" width=2 border=0></td>
      <td class=ld align=right width=453 valign=bottom><span class=ld><span class="campotitulo"><?php echo $linha_digitavel; ?></span></span></td>
  </tr>
  <tbody>
    <tr>
	<td colspan=5><img height=2 src="<?php echo $images; ?>/2.png" width=666 border=0></td>
    </tr>
  </tbody>
</table>
<table cellspacing=0 cellpadding=0 border=0>
  <tbody>
    <tr>
	<td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
	<td class=ct valign=top width=268 height=13>Cedente</td>
	<td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
	<td class=ct valign=top width=156 height=13>Ag&ecirc;ncia/C&oacute;digo do Cedente</td>
	<td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
	<td class=ct valign=top width=34 height=13>Esp&eacute;cie</td>
	<td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
	<td class=ct valign=top width=53 height=13>Quantidade</td>
	<td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
	<td class=ct valign=top width=120 height=13>Nosso n&uacute;mero</td>
    </tr>
      <tr>
	<td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
	<td class=cp valign=top width=268 height=12><span class="campo"><?php echo $cedente; ?></span></td>
	<td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
	<td class=cp valign=top width=156 height=12><span class="campo"><?php echo $agencia_codigo_cedente; ?></span></td>
	<td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
	<td class=cp valign=top width=34 height=12><span class="campo"><?php echo $especie; ?></span></td>
	<td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
	<td class=cp valign=top width=53 height=12><span class="campo"><?php echo $quantidade; ?></span> 
   </td>
	<td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
	<td class=cp valign=top align=right width=120 height=12><span class="campo"><?php echo $nosso_numero; ?></span></td>
    </tr>
      <tr>
	<td valign=top width=7 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=7 border=0></td>
	<td valign=top width=268 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=268 border=0></td>
	<td valign=top width=7 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=7 border=0></td>
	<td valign=top width=156 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=156 border=0></td>
	<td valign=top width=7 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=7 border=0></td>
	<td valign=top width=34 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=34 border=0></td>
	<td valign=top width=7 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=7 border=0></td>
	<td valign=top width=53 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=53 border=0></td>
	<td valign=top width=7 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=7 border=0></td>
	<td valign=top width=120 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=120 border=0></td>
    </tr>
  </tbody>
</table>
<table cellspacing=0 cellpadding=0 border=0>
  <tbody>
      <tr>
	<td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
	<td class=ct valign=top colspan=3 height=13>N&uacute;mero do documento</td>
	<td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
	<td class=ct valign=top width=132 height=13>CPF/CNPJ</td>
	<td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
	<td class=ct valign=top width=134 height=13>Vencimento</td>
	<td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
	<td class=ct valign=top width=180 height=13>Valor documento</td>
    </tr>
      <tr>
	<td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
	<td class=cp valign=top colspan=3 height=12><span class="campo"><?php echo $numero_documento; ?></span></td>
	<td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
	<td class=cp valign=top width=132 height=12><span class="campo"><?php echo $cpf_cnpj; ?></span></td>
	<td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
	<td class=cp valign=top width=134 height=12><span class="campo"><?php echo $data_vencimento; ?></span></td>
	<td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
	<td class=cp valign=top align=right width=180 height=12><span class="campo"><?php echo $valor_boleto; ?></span></td>
    </tr>
      <tr>
	<td valign=top width=7 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=7 border=0></td>
	<td valign=top width=113 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=113 border=0></td>
	<td valign=top width=7 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=7 border=0></td>
	<td valign=top width=72 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=72 border=0></td>
	<td valign=top width=7 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=7 border=0></td>
	<td valign=top width=132 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=132 border=0></td>
	<td valign=top width=7 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=7 border=0></td>
	<td valign=top width=134 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=134 border=0></td>
	<td valign=top width=7 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=7 border=0></td>
	<td valign=top width=180 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=180 border=0></td>
    </tr>
  </tbody>
</table>
<table cellspacing=0 cellpadding=0 border=0>
  <tbody>
      <tr>
	<td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
	<td class=ct valign=top width=113 height=13>(-) Desconto / Abatimentos</td>
	<td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
	<td class=ct valign=top width=112 height=13>(-) Outras dedu&ccedil;&otilde;es</td>
	<td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
	<td class=ct valign=top width=113 height=13>(+) Mora / Multa</td>
	<td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
	<td class=ct valign=top width=113 height=13>(+) Outros acr&eacute;scimos</td>
	<td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
	<td class=ct valign=top width=180 height=13>(=) Valor cobrado</td>
    </tr>
      <tr>
	<td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
	<td class=cp valign=top align=right width=113 height=12><?php echo $desconto_abatimento; ?></td>
	<td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
	<td class=cp valign=top align=right width=112 height=12><?php echo $outras_deducoes; ?></td>
	<td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
	<td class=cp valign=top align=right width=113 height=12><?php echo $mora_multa; ?></td>
	<td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
	<td class=cp valign=top align=right width=113 height=12><?php echo $outros_acrescimos; ?></td>
	<td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
	<td class=cp valign=top align=right width=180 height=12><?php echo $valor_cobrado; ?></td>
    </tr>
      <tr>
	<td valign=top width=7 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=7 border=0></td>
	<td valign=top width=113 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=113 border=0></td>
	<td valign=top width=7 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=7 border=0></td>
	<td valign=top width=112 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=112 border=0></td>
	<td valign=top width=7 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=7 border=0></td>
	<td valign=top width=113 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=113 border=0></td>
	<td valign=top width=7 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=7 border=0></td>
	<td valign=top width=113 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=113 border=0></td>
	<td valign=top width=7 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=7 border=0></td>
	<td valign=top width=180 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=180 border=0></td>
    </tr>
  </tbody>
</table>
<table cellspacing=0 cellpadding=0 border=0>
  <tbody>
      <tr>
	<td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
	<td class=ct valign=top width=659 height=13>Sacado</td>
    </tr>
      <tr>
	<td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
	<td class=cp valign=top width=659 height=12><span class="campo"><?php echo $sacado; ?></span></td>
    </tr>
      <tr>
	<td valign=top width=7 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=7 border=0></td>
	<td valign=top width=659 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=659 border=0></td>
    </tr>
  </tbody>
</table>
<table cellspacing=0 cellpadding=0 border=0>
  <tbody>
      <tr>
	<td class=ct width=7 height=12></td>
	<td class=ct width=564>Demonstrativo</td>
	<td class=ct width=7 height=12></td>
	<td class=ct width=88>Autentica&ccedil;&atilde;o mec&acirc;nica</td>
    </tr>
      <tr>
	<td width=7></td>
	<td class=cp width=564>
	  <span class="campo">
	        <?php echo $demonstrativo1; ?>
	    <br><?php echo $demonstrativo2; ?>
	    <br><?php echo $demonstrativo3; ?>
	    <br>
	  </span>
	</td>
	<td width=7></td>
	<td width=88></td>
    </tr>
  </tbody>
</table>
<table cellspacing=0 cellpadding=0 border=0 width=666>
  <tbody>
      <tr>
	<td width=7></td>
	<td width=500 class=cp><br><br><br></td>
	<td width=159></td>
    </tr>
  </tbody>
</table>
<table cellspacing=0 cellpadding=0 border=0 width=666>
  <tr>
      <td class=ct width=666></td>
  </tr>
  <tbody>
      <tr>
	<td class=ct width=666><div align=right>Corte na linha pontilhada</div></td>
    </tr>
      <tr>
	<td class=ct width=666><img height=1 src="<?php echo $images; ?>/6.png" width=665 border=0></td>
    </tr>
  </tbody>
</table>
<br>
<table cellspacing=0 cellpadding=0 border=0 width=666>
  <tr>
      <td class=cp width=150><span class="campo"><IMG src="<?php echo $bank_logo_path; ?>" width="150" height="40" border=0></span></td>
      <td width=3 valign=bottom><img height=22 src="<?php echo $images; ?>/3.png" width=2 border=0></td>
      <td class=cpt width=58 valign=bottom><div align=center><font class=bc><?php echo $codigo_banco_com_dv; ?></font></div></td>
      <td width=3 valign=bottom><img height=22 src="<?php echo $images; ?>/3.png" width=2 border=0></td>
      <td class=ld align=right width=453 valign=bottom><span class=ld><span class="campotitulo"><?php echo $linha_digitavel; ?></span></span></td>
  </tr>
  <tbody>
      <tr>
	<td colspan=5><img height=2 src="<?php echo $images; ?>/2.png" width=666 border=0></td>
    </tr>
  </tbody>
</table>
<table cellspacing=0 cellpadding=0 border=0>
  <tbody>
      <tr>
	<td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
	<td class=ct valign=top width=472 height=13>Local de pagamento</td>
	<td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
	<td class=ct valign=top width=180 height=13>Vencimento</td>
    </tr>
      <tr>
	<td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
	<td class=cp valign=top width=472 height=12>Pag&aacute;vel em qualquer Banco at&eacute; o vencimento</td>
	<td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
	<td class=cp valign=top align=right width=180 height=12>
	  <span class="campo"><?php echo $data_vencimento; ?></span>
	</td>
    </tr>
      <tr>
	<td valign=top width=7 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=7 border=0></td>
	<td valign=top width=472 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=472 border=0></td>
	<td valign=top width=7 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=7 border=0></td>
	<td valign=top width=180 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=180 border=0></td>
    </tr>
  </tbody>
</table>
<table cellspacing=0 cellpadding=0 border=0>
  <tbody>
      <tr>
	<td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
	<td class=ct valign=top width=472 height=13>Cedente</td>
	<td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
	<td class=ct valign=top width=180 height=13>Ag&ecirc;ncia/C&oacute;digo cedente</td>
    </tr>
      <tr>
	<td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
	<td class=cp valign=top width=472 height=12><span class="campo"><?php echo $cedente; ?></span></td>
	<td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
	<td class=cp valign=top align=right width=180 height=12><span class="campo"><?php echo $agencia_codigo_cedente; ?></span></td>
    </tr>
      <tr>
	<td valign=top width=7 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=7 border=0></td>
	<td valign=top width=472 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=472 border=0></td>
	<td valign=top width=7 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=7 border=0></td>
	<td valign=top width=180 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=180 border=0></td>
    </tr>
  </tbody>
</table>
<table cellspacing=0 cellpadding=0 border=0>
<tbody>
    <tr>
      <td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
      <td class=ct valign=top width=113 height=13>Data do documento</td>
      <td class=ct valign=top width=7 height=13> <img height=13 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
      <td class=ct valign=top width=133 height=13>N<u>o</u> documento</td>
      <td class=ct valign=top width=7 height=13> <img height=13 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
      <td class=ct valign=top width=62 height=13>Esp&eacute;cie doc.</td>
      <td class=ct valign=top width=7 height=13> <img height=13 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
      <td class=ct valign=top width=34 height=13>Aceite</td>
      <td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
      <td class=ct valign=top width=102 height=13>Data processamento</td>
      <td class=ct valign=top width=7 height=13> <img height=13 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
      <td class=ct valign=top width=180 height=13>Nosso n&uacute;mero</td>
  </tr>
    <tr>
      <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
      <td class=cp valign=top width=113 height=12><div align=left><span class="campo"><?php echo $data_documento; ?></span></div></td>
      <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
      <td class=cp valign=top width=133 height=12>
    <span class="campo"><?php echo $numero_documento; ?></span></td>
        <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
      <td class=cp valign=top width=62 height=12><div align=left><span class="campo"><?php echo $especie_doc; ?></span></div></td>
      <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
      <td class=cp valign=top width=34 height=12><div align=left><span class="campo"><?php echo $aceite; ?></span></div></td>
      <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
      <td class=cp valign=top width=102 height=12><div align=left>
   <span class="campo"><?php echo $data_processamento; ?></span></div></td>
      <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
      <td class=cp valign=top align=right width=180 height=12><span class="campo"><?php echo $nosso_numero; ?></span></td>
  </tr>
    <tr>
      <td valign=top width=7 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=7 border=0></td>
      <td valign=top width=113 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=113 border=0></td>
      <td valign=top width=7 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=7 border=0></td>
      <td valign=top width=133 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=133 border=0></td>
      <td valign=top width=7 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=7 border=0></td>
      <td valign=top width=62 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=62 border=0></td>
      <td valign=top width=7 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=7 border=0></td>
      <td valign=top width=34 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=34 border=0></td>
      <td valign=top width=7 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=7 border=0></td>
      <td valign=top width=102 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=102 border=0></td>
      <td valign=top width=7 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=7 border=0></td>
      <td valign=top width=180 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=180 border=0></td>
  </tr>
</tbody>
</table>
<table cellspacing=0 cellpadding=0 border=0>
<tbody>
    <tr>
      <td class=ct valign=top width=7 height=13> <img height=13 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
      <td class=ct valign=top COLSPAN="3" height=13>Uso do banco</td>
      <td class=ct valign=top height=13 width=7> <img height=13 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
      <td class=ct valign=top width=83 height=13>Carteira</td>
      <td class=ct valign=top height=13 width=7><img height=13 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
      <td class=ct valign=top width=43 height=13>Esp&eacute;cie</td>
      <td class=ct valign=top height=13 width=7><img height=13 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
      <td class=ct valign=top width=103 height=13>Quantidade</td>
      <td class=ct valign=top height=13 width=7><img height=13 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
      <td class=ct valign=top width=102 height=13>Valor Documento</td>
      <td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
      <td class=ct valign=top width=180 height=13>(=) Valor documento</td>
  </tr>
    <tr>
      <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
      <td valign=top class=cp height=12 COLSPAN="3"><div align=left> </div></td>
      <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
      <td class=cp valign=top width=83><div align=left> <span class="campo"><?php echo $carteira; ?></span></div></td>
      <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
      <td class=cp valign=top width=43><div align=left><span class="campo"><?php echo $especie; ?></span> 
 </div></td>
      <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
      <td class=cp valign=top width=103><span class="campo"><?php echo $quantidade; ?></span> 
 </td>
       <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
      <td class=cp valign=top width=102>
   <span class="campo"><?php echo $valor_unitario; ?></span></td>
       <td class=cp valign=top width=7 height=12> <img height=12 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
      <td class=cp valign=top align=right width=180 height=12><span class="campo"><?php echo $valor_boleto; ?></span></td>
  </tr>
    <tr>
      <td valign=top width=7 height=1> <img height=1 src="<?php echo $images; ?>/2.png" width=7 border=0></td>
      <td valign=top width=7 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=75 border=0></td>
      <td valign=top width=7 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=7 border=0></td>
      <td valign=top width=31 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=31 border=0></td>
      <td valign=top width=7 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=7 border=0></td>
      <td valign=top width=83 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=83 border=0></td>
      <td valign=top width=7 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=7 border=0></td>
      <td valign=top width=43 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=43 border=0></td>
      <td valign=top width=7 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=7 border=0></td>
      <td valign=top width=103 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=103 border=0></td>
      <td valign=top width=7 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=7 border=0></td>
      <td valign=top width=102 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=102 border=0></td>
      <td valign=top width=7 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=7 border=0></td>
      <td valign=top width=180 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=180 border=0></td>
  </tr>
</tbody> 

</table>
<table cellspacing=0 cellpadding=0 border=0 width=666>
<tbody>
    <tr>
      <td align=right width=10>
<table cellspacing=0 cellpadding=0 border=0 align=left>
<tbody> 
    <tr>       <td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
  </tr>
    <tr> 
      <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
  </tr>
    <tr> 
      <td valign=top width=7 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=1 border=0></td>
  </tr>
</tbody>
</table></td>
      <td valign=top width=468 rowspan=5>
        <font class=ct>Instru&ccedil;&otilde;es (Texto de responsabilidade do cedente)</font>
        <br><br>
        <span class=cp><FONT class=campo><?php echo $instrucoes1; ?>
        <br><?php echo $instrucoes2; ?>
        <br><?php echo $instrucoes3; ?>
        <br><?php echo $instrucoes4; ?>
        </FONT>
        <br><br> 
        </span>
      </td>
      <td align=right width=188>
<table cellspacing=0 cellpadding=0 border=0>
<tbody>
  <tr>
      <td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
      <td class=ct valign=top width=180 height=13>(-) Desconto / Abatimentos</td>
  </tr>
    <tr>
      <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
      <td class=cp valign=top align=right width=180 height=12><?php echo $desconto_abatimento; ?></td>
  </tr>
    <tr> 
      <td valign=top width=7 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=7 border=0></td>
      <td valign=top width=180 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=180 border=0></td>
  </tr>
</tbody>
</table></td>
  </tr>
    <tr>
      <td align=right width=10> 

<table cellspacing=0 cellpadding=0 border=0 align=left>
<tbody>
    <tr>
      <td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
  </tr>
    <tr>
      <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
  </tr>
    <tr>
      <td valign=top width=7 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=1 border=0></td>
  </tr>
</tbody>
</table></td>
      <td align=right width=188>
<table cellspacing=0 cellpadding=0 border=0>
<tbody> 
    <tr>
      <td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
      <td class=ct valign=top width=180 height=13>(-) Outras dedu&ccedil;&otilde;es</td>
  </tr>
    <tr>
      <td class=cp valign=top width=7 height=12> <img height=12 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
      <td class=cp valign=top align=right width=180 height=12><?php echo $outras_deducoes; ?></td>
  </tr>
    <tr>
      <td valign=top width=7 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=7 border=0></td>
      <td valign=top width=180 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=180 border=0></td>
  </tr>
</tbody>
</table></td>
  </tr>
    <tr>
      <td align=right width=10> 
<table cellspacing=0 cellpadding=0 border=0 align=left>
<tbody>
    <tr>
      <td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
  </tr>
    <tr>
      <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
  </tr>
    <tr>
      <td valign=top width=7 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=1 border=0></td>
  </tr>
</tbody>
</table></td>
      <td align=right width=188> 

<table cellspacing=0 cellpadding=0 border=0>
<tbody>
    <tr>
      <td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
      <td class=ct valign=top width=180 height=13>(+) Mora / Multa</td>
  </tr>
    <tr>
      <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
      <td class=cp valign=top align=right width=180 height=12><?php echo $mora_multa; ?></td>
  </tr>
    <tr> 
      <td valign=top width=7 height=1> <img height=1 src="<?php echo $images; ?>/2.png" width=7 border=0></td>
      <td valign=top width=180 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=180 border=0></td>
  </tr>
</tbody>
</table></td>
  </tr>
    <tr>
      <td align=right width=10>
<table cellspacing=0 cellpadding=0 border=0 align=left>
<tbody>
    <tr> 
      <td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
  </tr>
    <tr>
      <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
  </tr>
    <tr>
      <td valign=top width=7 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=1 border=0></td>
  </tr>
</tbody>
</table></td>
      <td align=right width=188> 

<table cellspacing=0 cellpadding=0 border=0>
<tbody>
    <tr>
      <td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
      <td class=ct valign=top width=180 height=13>(+) Outros acr&eacute;scimos</td>
  </tr>
    <tr>
      <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
      <td class=cp valign=top align=right width=180 height=12><?php echo $outros_acrescimos; ?></td>
  </tr>
    <tr>
      <td valign=top width=7 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=7 border=0></td>
      <td valign=top width=180 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=180 border=0></td>
  </tr>
</tbody>
</table></td>
  </tr>
    <tr>
      <td align=right width=10>
<table cellspacing=0 cellpadding=0 border=0 align=left>
<tbody>
    <tr>
      <td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
  </tr>
    <tr>
      <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
  </tr>
</tbody>
</table></td>
      <td align=right width=188>
<table cellspacing=0 cellpadding=0 border=0>
<tbody>
    <tr>
      <td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
      <td class=ct valign=top width=180 height=13>(=) Valor cobrado</td>
  </tr>
    <tr>
      <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
      <td class=cp valign=top align=right width=180 height=12><?php echo $valor_cobrado; ?></td>
  </tr>
</tbody> 
</table></td>
  </tr>
</tbody>
</table>
<table cellspacing=0 cellpadding=0 border=0 width=666>
<tbody>
    <tr>
      <td valign=top width=666 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=666 border=0></td>
  </tr>
</tbody>
</table>
<table cellspacing=0 cellpadding=0 border=0>
<tbody>
    <tr>
      <td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
      <td class=ct valign=top width=659 height=13>Sacado</td>
  </tr>
    <tr>
      <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
      <td class=cp valign=top width=659 height=12><span class="campo"><?php echo $sacado; ?></span></td>
    </tr>
</tbody>
</table>
<table cellspacing=0 cellpadding=0 border=0>
<tbody>
    <tr>
      <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
      <td class=cp valign=top width=659 height=12><span class="campo"><?php echo $endereco1; ?></span></td>
  </tr>
</tbody>
</table>
<table cellspacing=0 cellpadding=0 border=0>
<tbody>
    <tr>
      <td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
      <td class=cp valign=top width=472 height=13><span class="campo"><?php echo $endereco2; ?></span></td>
      <td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $images; ?>/1.png" width=1 border=0></td>
      <td class=ct valign=top width=180 height=13>C&oacute;d. baixa</td>
  </tr>
    <tr>
      <td valign=top width=7 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=7 border=0></td>
      <td valign=top width=472 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=472 border=0></td>
      <td valign=top width=7 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=7 border=0></td>
      <td valign=top width=180 height=1><img height=1 src="<?php echo $images; ?>/2.png" width=180 border=0></td>
  </tr>
</tbody>
</table>
<table cellSpacing=0 cellPadding=0 border=0 width=666>
<tbody>
    <tr>
      <td class=ct width=7 height=12></TD>
      <td class=ct width=409>Sacador/Avalista</TD>
      <td class=ct width=250><div align=right>Autentica&ccedil;&atilde;o mec&acirc;nica - <b class=cp>Ficha de Compensa&ccedil;&atilde;o</b></div></TD>
    </tr>
    <tr>
      <td class=ct  colspan=3><?php echo $avalista; ?></TD>
      <td class=ct  colspan=3></TD>
      <td class=ct  colspan=3></TD>
  </tr>
</tbody>
</table>
<table cellSpacing=0 cellPadding=0 border=0 width=666>
<tbody>
    <tr>
      <td vAlign=bottom align=left height=50><?php echo $codigo_barras; ?></TD>
  </tr>
</tbody>
</table>
<table cellSpacing=0 cellPadding=0 border=0 width=666>
    <tr>
      <td class=ct width=666></TD>
  </tr>
<tbody>
    <tr>
      <td class=ct width=666><div align=right>Corte na linha pontilhada</div></TD>
  </tr>
    <tr>
      <td class=ct width=666><img height=1 src="<?php echo $images; ?>/6.png" width=665 border=0></TD>
  </tr>
</tbody>
</table>
</BODY>
</HTML>
