<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.0 Transitional//EN'>
<html>
   <head>
      <title><?php echo $dadosboleto["identificacao"]; ?></title>
      <meta http-equiv=Content-Type content=text/html charset=ISO-8859-1>
      <meta name="Generator" content="Projeto BoletoPHP - www.boletophp.com.br - Licen�a GPL" />
      <link rel="stylesheet" href="include/css/sudameris.css"/>
   </head>

   
   <body text=#000000 bgColor=#ffffff topMargin=0 rightMargin=0>
      <table width=666 cellspacing=0 cellpadding=0 border=0>
         <tr>
            <td valign=top class=cp>
               <DIV ALIGN="CENTER">Instru��es 
                  de Impress�o
               </DIV>
            </TD>
         </TR>
         <TR>
            <TD valign=top class=cp>
               <DIV ALIGN="left">
                  <p>
                  <li>Imprima em impressora jato de tinta (ink jet) ou laser em qualidade normal ou alta (N�o use modo econ�mico).<br>
                  <li>Utilize folha A4 (210 x 297 mm) ou Carta (216 x 279 mm) e margens m�nimas � esquerda e � direita do formul�rio.<br>
                  <li>Corte na linha indicada. N�o rasure, risque, fure ou dobre a regi�o onde se encontra o c�digo de barras.<br>
                  <li>Caso n�o apare�a o c�digo de barras no final, clique em F5 para atualizar esta tela.
                  <li>
                     Caso tenha problemas ao imprimir, copie a seq�encia num�rica abaixo e pague no caixa eletr�nico ou no internet banking:<br><br>
                     <span class="ld2">
                     &nbsp;&nbsp;&nbsp;&nbsp;Linha Digit�vel: &nbsp;<?php echo $dadosboleto["linha_digitavel"]?><br>
                     &nbsp;&nbsp;&nbsp;&nbsp;Valor: &nbsp;&nbsp;R$ <?php echo $dadosboleto["valor_boleto"]?><br>
                     </span>
               </DIV>
            </td>
         </tr>
      </table>
      <br><table cellspacing=0 cellpadding=0 width=666 border=0><TBODY><TR><TD class=ct width=666><img height=1 src=imagens/6.png width=665 border=0></TD></TR><TR><TD class=ct width=666><div align=right><b class=cp>Recibo 
      do Sacado</b></div></TD></tr></tbody></table><table width=666 cellspacing=5 cellpadding=0 border=0><tr><td width=41></TD></tr></table>
      <table width=666 cellspacing=5 cellpadding=0 border=0 align=Default>
      <tr>
      <td width=41><IMG SRC="imagens/logo_empresa.png"></td>
      <td class=ti width=455><?php echo $dadosboleto["identificacao"]; ?> <?php echo isset($dadosboleto["cpf_cnpj"]) ? "<br>".$dadosboleto["cpf_cnpj"] : '' ?><br>
      <?php echo $dadosboleto["endereco"]; ?><br>
      <?php echo $dadosboleto["cidade_uf"]; ?><br>
      </td>
      <td align=RIGHT width=150 class=ti>&nbsp;</td>
      </tr>
      </table>
      <br>
      <table cellspacing=0 cellpadding=0 border=0>
      <tr>
      <td width=160 class=cp><img src="imagens/logosudameris.jpg" alt="Sudameris" width="150" height="27"></td>
      <td width=3 valign=bottom><img height=22 src=imagens/3.png width=2></td>
      <td width=60 class=bc valign=bottom align=center><?php echo $dadosboleto["codigo_banco_com_dv"]?></td>
      <td width=3 valign=bottom><img height=22 src=imagens/3.png width=2></td>
      <td width=440 class=ld align=right valign=bottom><?php echo $dadosboleto["linha_digitavel"]?></td>
      </tr>
      <tr><td colspan=5><img height=1 src=imagens/2.png width=666></td></tr>
      </table>
      <table cellspacing=0 cellpadding=0 border=0>
      <tr>
      <td width=7 height=1><img src=imagens/1.png width=7 height=1></td>
      <td width=112><img src=imagens/1.png width=112 height=1></td>
      <td width=7><img src=imagens/1.png width=7 height=1></td>
      <td width=113><img src=imagens/1.png width=113 height=1></td>
      <td width=7><img src=imagens/1.png width=7 height=1></td>
      <td width=53><img src=imagens/1.png width=53 height=1></td>
      <td width=7><img src=imagens/1.png width=7 height=1></td>
      <td width=53><img src=imagens/1.png width=53 height=1></td>
      <td width=7><img src=imagens/1.png width=7 height=1></td>
      <td width=113><img src=imagens/1.png width=113 height=1></td>
      <td width=7><img src=imagens/1.png width=7 height=1></td>
      <td width=180><img src=imagens/1.png width=180 height=1></td>
      </tr>
      <tr>
      <td height=13><img src=imagens/1.png width=1 height=13></td>
      <td colspan=7 class=ct>Cedente</td>
      <td><img src=imagens/1.png width=1 height=13></td>
      <td class=ct>Ag�ncia/C�digo do Cedente</td>
      <td><img src=imagens/1.png width=1 height=13></td>
      <td class=ct>Vencimento</td>
      </tr>
      <tr>
      <td height=12><img src=imagens/1.png width=1 height=12></td>
      <td colspan=7 class=cp><?php echo $dadosboleto["cedente"]?></td>
      <td><img src=imagens/1.png width=1 height=12></td>
      <td class=cp><?php echo $dadosboleto["agencia_codigo"]?></td>
      <td><img src=imagens/1.png width=1 height=12></td>
      <td class=cp align=right><?php echo $dadosboleto["data_vencimento"]?></td>
      </tr>
      <tr><td colspan=12 height=1><img src=imagens/2.png width=666 height=1></td></tr>
      <tr>
      <td height=13><img src=imagens/1.png width=1 height=13></td>
      <td class=ct>CPF/CNPJ</td>
      <td><img src=imagens/1.png width=1 height=13></td>
      <td class=ct>N�mero do documento</td>
      <td><img src=imagens/1.png width=1 height=13></td>
      <td class=ct>Esp�cie</td>
      <td><img src=imagens/1.png width=1 height=13></td>
      <td class=ct>Quantidade</td>
      <td><img src=imagens/1.png width=1 height=13></td>
      <td class=ct>Valor</td>
      <td><img src=imagens/1.png width=1 height=13></td>
      <td class=ct>Valor documento</td>
      </tr>
      <tr>
      <td height=13><img src=imagens/1.png width=1 height=13></td>
      <td class=cp><?php echo $dadosboleto["cpf_cnpj"]?></td>
      <td><img src=imagens/1.png width=1 height=13></td>
      <td class=cp><?php echo $dadosboleto["numero_documento"]?></td>
      <td><img src=imagens/1.png width=1 height=13></td>
      <td class=cp><?php echo $dadosboleto["especie"]?></td>
      <td><img src=imagens/1.png width=1 height=13></td>
      <td class=cp><?php echo $dadosboleto["quantidade"]?></td>
      <td><img src=imagens/1.png width=1 height=13></td>
      <td class=cp><?php echo $dadosboleto["valor_unitario"]?></td>
      <td><img src=imagens/1.png width=1 height=13></td>
      <td class=cp align=right><?php echo $dadosboleto["valor_boleto"]?></td>
      </tr>
      <tr><td colspan=12 height=1><img src=imagens/2.png width=666 height=1></td></tr>
      <tr>
      <td height=13><img src=imagens/1.png width=1 height=13></td>
      <td class=ct>(-) Desconto / Abatimentos</td>
      <td><img src=imagens/1.png width=1 height=13></td>
      <td class=ct>(-) Outras dedu��es</td>
      <td><img src=imagens/1.png width=1 height=13></td>
      <td colspan=3 class=ct>(+) Mora / Multa</td>
      <td><img src=imagens/1.png width=1 height=13></td>
      <td class=ct>(+) Outros acr�scimos</td>
      <td><img src=imagens/1.png width=1 height=13></td>
      <td class=ct>(=) Valor cobrado</td>
      </tr>
      <tr>
      <td height=12><img src=imagens/1.png width=1 height=12></td>
      <td class=cp>&nbsp;</td>
      <td><img src=imagens/1.png width=1 height=12></td>
      <td class=cp>&nbsp;</td>
      <td><img src=imagens/1.png width=1 height=12></td>
      <td colspan=3 class=cp>&nbsp;</td>
      <td><img src=imagens/1.png width=1 height=12></td>
      <td class=cp align=right>&nbsp;</td>
      <td><img src=imagens/1.png width=1 height=12></td>
      <td class=cp align=right>&nbsp;</td>
      </tr>
      <tr><td colspan=12 height=1><img src=imagens/2.png width=666 height=1></td></tr>
      <tr>
      <td height=13><img src=imagens/1.png width=1 height=13></td>
      <td colspan=9 class=ct>Sacado</td>
      <td><img src=imagens/1.png width=1 height=13></td>
      <td class=ct>Nosso n�mero</td>
      </tr>
      <tr>
      <td height=12><img src=imagens/1.png width=1 height=12></td>
      <td colspan=9 class=cp><?php echo $dadosboleto["sacado"]?></td>
      <td><img src=imagens/1.png width=1 height=12></td>
      <td class=cp align=right><?php echo $dadosboleto["nosso_numero"]?></td>
      </tr>
      <tr><td colspan=12 height=1><img src=imagens/2.png width=666 height=1></td></tr>
      </table>
      <table cellspacing=0 cellpadding=0 border=0>
      <tr>
      <td width=7 height=12 class=ct>&nbsp;</td>
      <td width=564 class=ct>Demonstrativo</td>
      <td width=7 class=ct>&nbsp;</td>
      <td width=88 class=ct>Autentica��o mec�nica</td>
      </tr>
      <tr>
      <td>&nbsp;</td>
      <td class=cp><?php echo $dadosboleto["demonstrativo1"] . '<br>' . $dadosboleto["demonstrativo2"] . '<br>' . $dadosboleto["demonstrativo3"]?><br>&nbsp;<br>&nbsp;<br>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      </tr>
      <tr><td colspan=4 class=ct align=right>Corte na linha pontilhada</td></tr>
      <tr><td colspan=4><img src=imagens/6.png width=665 height=1></td></tr>
      </table>
      &nbsp;<br>
      <table cellspacing=0 cellpadding=0 border=0>
      <tr>
      <td width=160 class=cp><img src="imagens/logosudameris.jpg" alt="Sudameris" width="150" height="27"></td>
      <td width=3 valign=bottom><img height=22 src=imagens/3.png width=2></td>
      <td width=60 class=bc valign=bottom align=center><?php echo $dadosboleto["codigo_banco_com_dv"]?></td>
      <td width=3 valign=bottom><img height=22 src=imagens/3.png width=2></td>
      <td width=440 class=ld align=right valign=bottom><?php echo $dadosboleto["linha_digitavel"]?></td>
      </tr>
      <tr><td colspan=5><img height=1 src=imagens/2.png width=666></td></tr>
      </table>
      <table cellspacing=0 cellpadding=0 border=0 height="2">
      <tr>
      <td width=7 height=1><img src=imagens/2.png width=7 height=1></td>
      <td width=100><img src=imagens/2.png width=100 height=1></td>
      <td width=7><img src=imagens/2.png width=7 height=1></td>
      <td width=74><img src=imagens/2.png width=74 height=1></td>
      <td width=7><img src=imagens/2.png width=7 height=1></td>
      <td width=73><img src=imagens/2.png width=73 height=1></td>
      <td width=7><img src=imagens/2.png width=7 height=1></td>
      <td width=55><img src=imagens/2.png width=55 height=1></td>
      <td width=7><img src=imagens/2.png width=7 height=1></td>
      <td width=35><img src=imagens/2.png width=35 height=1></td>
      <td width=7><img src=imagens/2.png width=7 height=1></td>
      <td width=100><img src=imagens/2.png width=100 height=1></td>
      <td width=7><img src=imagens/2.png width=7 height=1></td>
      <td width=180><img src=imagens/2.png width=180 height=1></td>
      </tr>
      <tr>
      <td height=13><img src=imagens/1.png width=1 height=13></td>
      <td colspan=11 class=ct>Local de pagamento</td>
      <td><img src=imagens/1.png width=1 height=13></td>
      <td class=ct>Vencimento</td>
      </tr>
      <tr>
      <td height=12><img src=imagens/1.png width=1 height=12></td>
      <td colspan=11 class=cp>Pag�vel em qualquer Banco at� o vencimento.</td>
      <td><img src=imagens/1.png width=1 height=12></td>
      <td class=cp align=right><?php echo $dadosboleto["data_vencimento"]?></td>
      </tr>
      <tr><td colspan=14 height=1><img src=imagens/2.png width=666 height=1></td></tr>
      <tr>
      <td height=13><img src=imagens/1.png width=1 height=13></td>
      <td colspan=11 class=ct>Cedente</td>
      <td><img src=imagens/1.png width=1 height=13></td>
      <td class=ct>Ag�ncia/C�digo cedente</td>
      </tr>
      <tr>
      <td height=12><img src=imagens/1.png width=1 height=12></td>
      <td colspan=11  class=cp><?php echo $dadosboleto["cedente"]?></td>
      <td><img src=imagens/1.png width=1 height=12></td>
      <td class=cp align=right><?php echo $dadosboleto["agencia_codigo"]?></td>
      </tr>
      <tr><td colspan=14 height=1><img src=imagens/2.png width=666 height=1></td></tr>
      <tr>
      <td height=13><img src=imagens/1.png width=1 height=13></td>
      <td class=ct>Data do documento</td>
      <td><img src=imagens/1.png width=1 height=13></td>
      <td colspan=3 class=ct>N�mero do documento</td>
      <td><img src=imagens/1.png width=1 height=13></td>
      <td class=ct>Esp�cie doc.</td>
      <td><img src=imagens/1.png width=1 height=13></td>
      <td class=ct>Aceite</td>
      <td><img src=imagens/1.png width=1 height=13></td>
      <td class=ct>Data processamento</td>
      <td><img src=imagens/1.png width=1 height=13></td>
      <td class=ct>Nosso n�mero</td>
      </tr>
      <tr>
      <td height=12><img src=imagens/1.png width=1 height=12></td>
      <td class=cp><?php echo $dadosboleto["data_documento"]?></td>
      <td><img src=imagens/1.png width=1 height=12></td>
      <td colspan=3 class=cp><?php echo $dadosboleto["numero_documento"]?></td>
      <td><img src=imagens/1.png width=1 height=12></td>
      <td class=cp><?php echo $dadosboleto["especie_doc"]?></td>
      <td><img src=imagens/1.png width=1 height=12></td>
      <td class=cp><?php echo $dadosboleto["aceite"]?></td>
      <td><img src=imagens/1.png width=1 height=12></td>
      <td class=cp><?php echo $dadosboleto["data_processamento"]?></td>
      <td><img src=imagens/1.png width=1 height=12></td>
      <td class=cp align=right><?php echo $dadosboleto["nosso_numero"]?></td>
      </tr>
      <tr><td colspan=14 height=1><img src=imagens/2.png width=666 height=1></td></tr>
      <tr>
      <td height=13><img src=imagens/1.png width=1 height=13></td>
      <td class=ct>Uso do banco</td>
      <td><img src=imagens/1.png width=1 height=13></td>
      <td class=ct>Carteira</td>
      <td><img src=imagens/1.png width=1 height=13></td>
      <td class=ct>Esp�cie</td>
      <td><img src=imagens/1.png width=1 height=13></td>
      <td colspan=3 class=ct>Quantidade</td>
      <td><img src=imagens/1.png width=1 height=13></td>
      <td class=ct>Valor</td>
      <td><img src=imagens/1.png width=1 height=13></td>
      <td class=ct>(=) Valor documento</td>
      </tr>
      <tr>
      <td height=12><img src=imagens/1.png width=1 height=12></td>
      <td class=cp height=12>&nbsp;</td>
      <td><img src=imagens/1.png width=1 height=12></td>
      <td class=cp><?php echo $dadosboleto["carteira"]?></td>
      <td><img src=imagens/1.png width=1 height=12></td>
      <td class=cp><?php echo $dadosboleto["especie"]?></td>
      <td><img src=imagens/1.png width=1 height=12></td>
      <td colspan=3 class=cp><?php echo $dadosboleto["quantidade"]?></td>
      <td><img src=imagens/1.png width=1 height=12></td>
      <td class=cp><?php echo $dadosboleto["valor_unitario"]?></td>
      <td><img src=imagens/1.png width=1 height=12></td>
      <td class=cp align=right><?php echo $dadosboleto["valor_boleto"]?></td>
      </tr>
      <tr><td colspan=14 height=1><img src=imagens/2.png width=666 height=1></td></tr>
      </table>
      <table cellspacing=0 cellpadding=0 border=0>
      <tr>
      <td width=7 height=26><img src=imagens/1.png width=1 height=26></td>
      <td width=472 rowspan=9 valign=top>
      <span class=ct>Instru��es (Texto de responsabilidade do cedente)</span><br>
      &nbsp;<br>
      <span class=cp><?php echo $dadosboleto["instrucoes1"] . '<br>' . $dadosboleto["instrucoes2"] . '<br>' . $dadosboleto["instrucoes3"] . '<br>' . $dadosboleto["instrucoes4"]?></span>
      </td>
      <td width=7><img src=imagens/2.png width=1 height=26></td>
      <td width=180 class=ct>(-) Desconto / Abatimentos</td>
      </tr>
      <tr><td height=1><img src=imagens/2.png width=1 height=1></td><td><img src=imagens/2.png width=7 height=1></td><td><img src=imagens/2.png width=180 height=1></td></tr>
      <tr>
      <td height=26><img src=imagens/1.png width=1 height=26></td>
      <td><img src=imagens/2.png width=1 height=26></td>
      <td class=ct>(-) Outras dedu��es</td>
      </tr>
      <tr><td height=1><img src=imagens/1.png width=1 height=1></td><td><img src=imagens/2.png width=7 height=1></td><td><img src=imagens/2.png width=180 height=1></td></tr>
      <tr>
      <td height=26><img src=imagens/1.png width=1 height=26></td>
      <td><img src=imagens/2.png width=1 height=26></td>
      <td class=ct>(+) Mora / Multa</td>
      </tr>
      <tr><td height=1><img src=imagens/1.png width=1 height=1></td><td><img src=imagens/2.png width=7 height=1></td><td><img src=imagens/2.png width=180 height=1></td></tr>
      <tr>
      <td height=26><img src=imagens/1.png width=1 height=26></td>
      <td><img src=imagens/2.png width=1 height=26></td>
      <td class=ct>(+) Outros acr�scimos</td>
      </tr>
      <tr><td height=1><img src=imagens/1.png width=1 height=1></td><td><img src=imagens/2.png width=7 height=1></td><td><img src=imagens/2.png width=180 height=1></td></tr>
      <tr>
      <td height=26><img src=imagens/1.png width=1 height=26></td>
      <td><img src=imagens/2.png width=1 height=26></td>
      <td class=ct>(=) Valor cobrado</td>
      </tr>
      <tr><td colspan=4 height=1><img src=imagens/2.png width=666 height=1></td></tr>
      <tr>
      <td height=13><img src=imagens/1.png width=1 height=13></td>
      <td class=ct>Sacado</td>
      <td><img src=imagens/b.png width=1 height=1></td>
      <td><img src=imagens/b.png width=1 height=1></td>
      </tr>
      <tr>
      <td height=39><img src=imagens/1.png width=1 height=39></td>
      <td class=cp><?php echo $dadosboleto["sacado"] . '<br>' . $dadosboleto["endereco1"] . '<br>' . $dadosboleto["endereco2"]?></td>
      <td valign=bottom><img src=imagens/1.png width=1 height=13></td>
      <td valign=bottom><span class=ct>C�d. baixa</span></td>
      </tr>
      <tr><td colspan=4 height=1><img src=imagens/2.png width=666 height=1></td></tr>
      </table>
      <table cellspacing=0 cellpadding=0 border=0>
      <tr>
      <td width=333 class=ct>Sacador/Avalista</td>
      <td width=333 class=ct align=right>Autentica��o mec�nica - <span class=cp>Ficha de Compensa��o</span></td>
      </tr>
      <tr><td height=50 colspan=2><?php fbarcode($dadosboleto["codigo_barras"]); ?></td></tr>
      <tr><td colspan=2 class=ct align=right>Corte na linha pontilhada</td></tr>
      <tr><td colspan=2 height=1><img src=imagens/6.png width=665 height=1></td></tr>
      </table>
   </body>
</html>