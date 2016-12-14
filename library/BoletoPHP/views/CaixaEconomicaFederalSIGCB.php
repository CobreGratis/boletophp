<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.0 Transitional//EN'>
<html>
  <head>
    <title><?php echo $identificacao; ?></title>
    <meta http-equiv=Content-Type content=text/html charset=utf-8>
    <meta name="Generator" content="Projeto BoletoPHP - www.boletophp.com.br - Licen�a GPL" />
    <style type=text/css>
      <!--.cp {  font: bold 10px Arial; color: black}
        <!--.ti {  font: 9px Arial, Helvetica, sans-serif}
        <!--.ld { font: bold 15px Arial; color: #000000}
        <!--.ct { font: 9px "Arial Narrow"; COLOR: #000033}
        <!--.cn { font: 9px Arial; COLOR: black }
        <!--.bc { font: bold 20px Arial; color: #000000 }
        <!--.ld2 { font: bold 12px Arial; color: #000000 }
        -->
    </style>
  </head>
  <body text="#000000" bgColor="#ffffff" topMargin="0" rightMargin="0" >
    <table width="666" cellspacing="0" cellpadding="0" border="0" >
      <tr>
        <td valign="top" class="cp">
          <div align="center">
            Instruções de Impressão
          </div>
        </td>
      </tr>
      <tr>
        <td valign="top" class="cp">
          <div align="left">
            <p>
            <li>
              Imprima em impressora jato de tinta (ink jet) ou laser em qualidade normal ou alta (Não use modo econômico).
            </li>
            <li>
              Utilize folha A4 (210 x 297 mm) ou Carta (216 x 279 mm) e margens mínimas à esquerda e à direita do formulário.
            </li>
            <li>
              Corte na linha indicada. Não rasure, risque, fure ou dobre a região onde se encontra o código de barras.
            </li>
            <li>
              Caso não apareça o código de barras no final, clique em F5 para atualizar esta tela.
            </li>
            <li>
              Caso tenha problemas ao imprimir, copie a sequencia numérica abaixo e pague no caixa eletrônico ou no internet banking:
            </li>
            </p>
            <br />
            <span class="ld2">
            &nbsp;&nbsp;&nbsp;&nbsp;Linha Digitável: &nbsp;<?php echo $linha_digitavel; ?>
            <br />
            &nbsp;&nbsp;&nbsp;&nbsp;Valor: &nbsp;&nbsp;R$ <?php echo $valor_boleto; ?>
            <br>
            </span>
          </div>
        </td>
      </tr>
    </table>
    <br />
    <table cellspacing="0" cellpadding="0" width="666" border="0">
      <tbody>
        <tr>
          <td class=ct width=666>
            <img height=1 src=../imagens/6.png width=665 border=0>
          </td>
        </tr>
        <tr>
          <td class=ct width=666>
            <div align=right>
              <b class=cp>
              Recibo do Sacado
              </b>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
    <table width="666" cellspacing="5" cellpadding="0" border="0">
      <tr>
        <td width="41"></td>
      </tr>
    </table>
    
    <br />
    <table cellspacing="0" cellpadding="0" width="666" border="0">
      <tr>
        <td class="cp" width="150">
          <span class="campo">
          <img src="../imagens/logocaixa.jpg" width="130" height="30" border="0" />
          </span>
        </td>
        <td width="3" valign="bottom">
          <img height="22" src="../imagens/3.png" width="2" border="0" />
        </td>
        <td class="cpt" width="68" valign="bottom">
          <div align="center">
            <font class="bc">
            <?php echo $codigo_banco_com_dv; ?>
            </font>
          </div>
        </td>
        <td width="3" valign="bottom">
          <img height="22" src="../imagens/3.png" width="2" border="0" />
        </td>
        <td class="ld" align="right" width="453" valign="bottom">
          <span class="ld">
          <span class="campotitulo">
          <?php echo $linha_digitavel; ?>
          </span>
          </span>
        </td>
      </tr>
      <tbody>
        <tr>
          <td colspan="5">
            <img height="2" src="../imagens/2.png" width="666" border="0">
          </td>
        </tr>
      </tbody>
    </table>
    <table cellspacing="0" cellpadding="0" border="0">
      <tbody>
        <tr>
          <td class="ct" valign="top" width="7" height="13"><img height="13" src="../imagens/1.png" width="1" border="0"></td>
          <td class="ct" valign="top" width="368" height="13">Beneficiário</td>
          <td class="ct" valign="top" width="7" height="13"><img height="13" src="../imagens/1.png" width="1" border="0"></td>
          <td class="ct" valign="top" width="136" height="13">
            CPF/CNPJ
          </td>
          <td class="ct" valign="top" width="7" height="13"><img height="13" src="../imagens/1.png" width="1" border="0"></td>
          <td class="ct" valign="top" width="134" height="13">Agência / Código do Beneficiário</td>
        </tr>
        <tr>
          <td class="cp" valign="top" width="7" height="12"><img height="12" src="../imagens/1.png" width="1" border="0"></td>
          <td class="cp" valign="top" width="368" height="12">
            <span class="campo"><?php echo $cedente; ?></span>
          </td>
          <td class="cp" valign="top" width="7" height="12"><img height="12" src="../imagens/1.png" width="1" border="0"></td>
          <td class="cp" valign="top" width="156" height="12">
            <span class="campo">
            <?php echo $cpf_cnpj; ?>
            </span>
          </td>
          <td class="cp" valign="top" width="7" height="12"><img height="12" src="../imagens/1.png" width="1" border="0"></td>
          <td class="cp" valign="top"  width="134" height="12"><span class="campo">
            <?php echo $agencia_codigo; ?>
            </span>
          </td>

        </tr>
        <tr>
          <td valign=top width=7 height=1><img height=1 src="../imagens/2.png" width=7 border=0></td>
          <td valign=top width=368 height=1><img height=1 src="../imagens/2.png" width=368 border=0></td>
          <td valign=top width=7 height=1><img height=1 src="../imagens/2.png" width=7 border=0></td>
          <td valign=top width=156 height=1><img height=1 src="../imagens/2.png" width=156 border=0></td>
          <td valign=top width=7 height=1><img height=1 src="../imagens/2.png" width=7 border=0></td>
          <td valign=top width=120 height=1><img height=1 src="../imagens/2.png" width=120 border=0></td>
        </tr>
      </tbody>
    </table>
    <table cellspacing="0" cellpadding="0" border="0">
      <tbody>
        <tr>
          <td class="ct" valign="top" width="7" height="13"><img height="13" src="../imagens/1.png" width="1" border="0"></td>
          <td class="ct" valign="top" width="490" height="13">Endereço do Beneficiário</td>
          <td class="ct" valign="top" width="7" height="13"><img height="13" src="../imagens/1.png" width="1" border="0"></td>
          <td class="ct" valign="top" width="34" height="13">UF</td>
          <td class="ct" valign="top" width="7" height="13"><img height="13" src="../imagens/1.png" width="1" border="0"></td>
          <td class="ct" valign="top" width="107" height="13">CEP</td>
        </tr>
        <tr>
          <td class="cp" valign="top" width="7" height="12"><img height="12" src="../imagens/1.png" width="1" border="0"></td>
          <td class="cp" valign="top" width="490" height="12">
            <span class="campo"><?= $endereco; ?></span>
          </td>
          <td class="cp" valign="top" width="7" height="12"><img height="12" src="../imagens/1.png" width="1" border="0"></td>
          <td class="cp" valign="top" width="34" height="12">
            <span class="campo">
            <?= $uf ?>
            </span>
          </td>
          <td class="cp" valign="top" width="7" height="12"><img height="12" src="../imagens/1.png" width="1" border="0"></td>
          <td class="cp" valign="top"  width="107" height="12"><span class="campo">
            <?= $cep ?>
            </span>
          </td>
        </tr>
        <tr>
          <td valign=top width=7 height=1><img height=1 src="../imagens/2.png" width=7 border=0></td>
          <td valign=top width=490 height=1><img height=1 src="../imagens/2.png" width=490 border=0></td>
          <td valign=top width=7 height=1><img height=1 src="../imagens/2.png" width=7 border=0></td>
          <td valign=top width=34 height=1><img height=1 src="../imagens/2.png" width=34 border=0></td>
          <td valign=top width=7 height=1><img height=1 src="../imagens/2.png" width=7 border=0></td>
          <td valign=top width=120 height=1><img height=1 src="../imagens/2.png" width=120 border=0></td>
        </tr>
      </tbody>
    </table>
    <table cellspacing=0 cellpadding=0 border=0>
      <tbody>
        <tr>
          <td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.png" width=1 border=0></td>
          <td class=ct valign=top width=90 height=13>
            Data do documento
          </td>
          <td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.png" width=1 border=0></td>
          <td class=ct valign=top width=132 height=13>Nr. do documento</td>
          <td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.png" width=1 border=0></td>
          <td class=ct valign=top width=134 height=13>Aceite</td>
          <td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.png" width=1 border=0></td>
          <td class=ct valign=top width=154 height=13>
            Data de processamento
          </td>
          <td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.png" width=1 border=0></td>
          <td class=ct valign=top width=120 height=13>
            Nosso Número
          </td>
        </tr>
        <tr>
          <td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.png" width=1 border=0></td>
          <td class=cp valign=top width=90 height=12>
            <span class="campo">
            <?= $data_documento ?>
            </span>
          </td>
          <td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.png" width=1 border=0></td>
          <td class=cp valign=top width=132 height=12>
            <span class="campo">
            <?= $numero_documento ?>
            </span>
          </td>
          <td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.png" width=1 border=0></td>
          <td class=cp valign=top width=134 height=12>
            <span class="campo">
            <?= $aceite ?>
            </span>
          </td>
          <td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.png" width=1 border=0></td>
          <td class=cp valign=top width=154 height=12>
            <span class="campo">
            <?= $data_processamento ?>
            </span>
          </td>
          <td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.png" width=1 border=0></td>
          <td class=cp valign=top width=120 height=12>
            <span class="campo">
            <?php echo $nosso_numero; ?>
            </span>
          </td>
        </tr>
        <tr>
          <td valign=top width=7 height=1><img height=1 src="../imagens/2.png" width=7 border=0></td>
          <td valign=top width=90 height=1><img height=1 src="../imagens/2.png" width=90 border=0></td>
          <td valign=top width=7 height=1><img height=1 src="../imagens/2.png" width=7 border=0></td>
          <td valign=top width=132 height=1><img height=1 src="../imagens/2.png" width=132 border=0></td>
          <td valign=top width=7 height=1><img height=1 src="../imagens/2.png" width=7 border=0></td>
          <td valign=top width=134 height=1><img height=1 src="../imagens/2.png" width=134 border=0></td>
          <td valign=top width=7 height=1><img height=1 src="../imagens/2.png" width=7 border=0></td>
          <td valign=top width=154 height=1><img height=1 src="../imagens/2.png" width=154 border=0></td>
          <td valign=top width=7 height=1><img height=1 src="../imagens/2.png" width=7 border=0></td>
          <td valign=top width=120 height=1><img height=1 src="../imagens/2.png" width=120 border=0></td>
        </tr>
      </tbody>
    </table>

    <table cellspacing=0 cellpadding=0 border=0 height="200">
      <tbody >
        <tr>
          <td class=ct  width=7 height=12></td>
          <td class=ct  width=564 ><strong>Instruções (Texto de Responsabilidade do Beneficiário):</strong></td>
          <td class=ct  width=7 height=12></td>
          <td class=ct  width=88 >
          </td>
        </tr>
        <tr height="20">
          <td  width=7 ></td>
          <td class=cp width=564>
            <span class="campo">
            <?php echo $demonstrativo1; ?><br>
            </span>
          </td>
          <td  width=7 ></td>
          <td  width=88 ></td>
        </tr>
        <tr height="20">
          <td  width=7 ></td>
          <td class=cp width=564>
            <span class="campo">
            <?php echo $demonstrativo2; ?><br>
            </span>
          </td>
          <td  width=7 ></td>
          <td  width=88 ></td>
        </tr>
        <tr height="20">
          <td  width=7 ></td>
          <td class=cp width=564>
            <span class="campo">
            <?php echo $demonstrativo3; ?><br>
            </span>
          </td>
          <td  width=7 ></td>
          <td  width=88 ></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      </tbody>
    </table>
    <table cellspacing="0" cellpadding="0" width="666" border="0">
      <tbody>
        <tr>
          <td colspan="5">
            <img height="1" src="../imagens/2.png" width="666" border="0">
          </td>
        </tr>
      </tbody>
    </table>

    <!-- AQUI NOVOS -->
    <table cellspacing="0" cellpadding="0" border="0">
      <tbody>
        <tr>
          <td class="ct" valign="top" width="7" height="13"><img height="13" src="../imagens/1.png" width="1" border="0"></td>
          <td class="ct" valign="top" width="490" height="13">Pagador: </td>
          <td class="ct" valign="top" width="43" height="13">CPF/CNPJ: </td>
          <td class="ct" valign="top" width="127" height="13"><?= $cpf_cnpj; ?></td>
        </tr>
        <tr>
          <td class="cp" valign="top" width="7" height="12"><img height="12" src="../imagens/1.png" width="1" border="0"></td>
          <td class="cp" valign="top" width="490" height="12">
            <span class="campo"><?= $pagador; ?></span>
          </td>
          <td class="ct" valign="top" width="43" height="12">
            <span class="campo">
            UF:
            </span>
          </td>
          <td class="ct" valign="top"  width="127" height="12"><span class="campo">
            CEP:
            </span>
          </td>
        </tr>
        <tr>
          <td valign=top width=7 height=1><img height=1 src="../imagens/2.png" width=7 border=0></td>
          <td valign=top width=490 height=1><img height=1 src="../imagens/2.png" width=490 border=0></td>
          <td valign=top width=43 height=1><img height=1 src="../imagens/2.png" width=43 border=0></td>
          <td valign=top width=127 height=1><img height=1 src="../imagens/2.png" width=127 border=0></td>
        </tr>
      </tbody>
    </table>
    <table cellspacing="0" cellpadding="0" border="0">
      <tbody>
        <tr>
          <td class="ct" valign="top" width="7" height="13"><img height="13" src="../imagens/1.png" width="1" border="0"></td>
          <td class="ct" valign="top" width="80" height="13">
            Carteira
          </td>
          <td class="ct" valign="top" width="7" height="13"><img height="13" src="../imagens/1.png" width="1" border="0"></td>
          <td class="ct" valign="top" width="102" height="13">Espécie</td>
          <td class="ct" valign="top" width="7" height="13"><img height="13" src="../imagens/1.png" width="1" border="0"></td>
          <td class="ct" valign="top" width="144" height="13">Vencimento</td>
          <td class="ct" valign="top" width="7" height="13"><img height="13" src="../imagens/1.png" width="1" border="0"></td>
          <td class="ct" valign="top" width="164" height="13">
            Valor do Documento
          </td>
          <td class="ct" valign="top" width="7" height="13"><img height="13" src="../imagens/1.png" width="1" border="0"></td>
          <td class="ct" valign="top" width="140" height="13">
            Valor Cobrado
          </td>
        </tr>
        <tr>
          <td class="cp" valign="top" width="7" height="16"><img height="16" src="../imagens/1.png" width="1" border="0"></td>
          <td class="cp" valign="top" width="80" height="16">
            <span class="campo">
            <?= $carteira ?>
            </span>
          </td>
          <td class="cp" valign="top" width="7" height="16"><img height="16" src="../imagens/1.png" width="1" border="0"></td>
          <td class="cp" valign="top" width="102" height="16">
            <span class="campo">
              <?= $especie; ?>
            </span>
          </td>
          <td class="cp" valign="top" width="7" height="16"><img height="16" src="../imagens/1.png" width="1" border="0"></td>
          <td class="cp" valign="top" width="144" height="16">
            <span class="campo">
            <?= $data_vencimento ?>
            </span>
          </td>
          <td class="cp" valign="top" width="7" height="16"><img height="16" src="../imagens/1.png" width="1" border="0"></td>
          <td class="cp" valign="top" width="164" height="16">
            <span class="campo">
              <?= $valor_boleto ?>
            </span>
          </td>
          <td class="cp" valign="top" width="7" height="16"><img height="16" src="../imagens/1.png" width="1" border="0"></td>
          <td class="cp" valign="top" width="140" height="16">
            <span class="campo">
            240000000000000195  </span>
          </td>
        </tr>
        <tr>
          <td valign="top" width="7" height="1"><img height="1" src="../imagens/2.png" width="7" border="0"></td>
          <td valign="top" width="80" height="1"><img height="1" src="../imagens/2.png" width="80" border="0"></td>
          <td valign="top" width="7" height="1"><img height="1" src="../imagens/2.png" width="7" border="0"></td>
          <td valign="top" width="102" height="1"><img height="1" src="../imagens/2.png" width="102" border="0"></td>
          <td valign="top" width="7" height="1"><img height="1" src="../imagens/2.png" width="7" border="0"></td>
          <td valign="top" width="144" height="1"><img height="1" src="../imagens/2.png" width="144" border="0"></td>
          <td valign="top" width="7" height="1"><img height="1" src="../imagens/2.png" width="7" border="0"></td>
          <td valign="top" width="164" height="1"><img height="1" src="../imagens/2.png" width="164" border="0"></td>
          <td valign="top" width="7" height="1"><img height="1" src="../imagens/2.png" width="7" border="0"></td>
          <td valign="top" width="140" height="1"><img height="1" src="../imagens/2.png" width="140" border="0"></td>
        </tr>
      </tbody>
    </table>
    <table cellpadding="2" cellspacing="0" border="0">
      <tbody>
          <tr>
            <td width="400" align="center" style="font: normal 10px Arial;">
              <strong class="campo" align="center">
                SAC CAIXA:
              </strong>
               0800 726 0101 (informações, reclamações, sugestões e elogios)
            </td>
            <td width="266" align="center" style="font: normal 10px Arial;">
              Autenticação Mecânica - <strong>Recibo do Pagador</strong>
            </td>
          </tr>
          <tr>
            <td width="400" align="center" style="font: normal 10px Arial;" >
              <strong class="campo" align="center" >
                Para pessoas com deficiência auditiva ou de fala:
              </strong>
               0800 726 2492
            </td>
            <td class="cp" width="266">
            </td>
          </tr>
          <tr>
            <td width="400"  align="center" style="font: normal 10px Arial;">
              <strong class="campo" align="center">
                Ouvidoria:
              </strong>
               0800 725 7474
            </td>
            <td class="cp" width="266">
            </td>
          </tr>
          <tr>
            <td class="cp" width="400"  align="center">
              <span class="campo" style="color: blue;">
                caixa.gov.br
              </span>
            </td>
            <td class="cp" width="266">
            </td>
          </tr>
      </tbody>
    </table>

    <!-- INICIO LINHA PONTILHADA -->
    <table cellspacing=0 cellpadding=0 width=666 border=0>
      <tbody>
        <tr>
          <td width=7></td>
          <td  width=500 class=cp>
          </td>
          <td width=159></td>
        </tr>
      </tbody>
    </table>
    <table cellspacing=0 cellpadding=0 width=666 border=0>
      <tr>
        <td class=ct width=666></td>
      </tr>
      <tbody>
        <tr>
          <td class=ct width=666>
            <div align=right>Corte na linha pontilhada</div>
          </td>
        </tr>
        <tr>
          <td class=ct width=666><img height=1 src="../imagens/6.png" width=665 border=0></td>
        </tr>
      </tbody>
    </table>
    <br>
    <table cellspacing=0 cellpadding=0 width=666 border=0>
      <tr>
        <td class=cp width=150>
          <span class="campo"><IMG
            src="../imagens/logocaixa.jpg" width="150" height="40"
            border=0></span>
        </td>
        <td width=3 valign=bottom><img height=22 src="../imagens/3.png" width=2 border=0></td>
        <td class=cpt width=58 valign=bottom>
          <div align=center><font class=bc><?php echo $codigo_banco_com_dv; ?></font></div>
        </td>
        <td width=3 valign=bottom><img height=22 src="../imagens/3.png" width=2 border=0></td>
        <td class=ld align=right width=453 valign=bottom><span class=ld>
          <span class="campotitulo">
          <?php echo $linha_digitavel; ?>
          </span></span>
        </td>
      </tr>
      <tbody>
        <tr>
          <td colspan=5><img height=2 src="../imagens/2.png" width=666 border=0></td>
        </tr>
      </tbody>
    </table>
    <table cellspacing=0 cellpadding=0 border=0>
      <tbody>
        <tr>
          <td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.png" width=1 border=0></td>
          <td class=ct valign=top width=472 height=13>Local
            de pagamento
          </td>
          <td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.png" width=1 border=0></td>
          <td class=ct valign=top width=180 height=13>Vencimento</td>
        </tr>
        <tr>
          <td class=cp valign=top width=7 height=12>
              <img height=12 src="../imagens/1.png" width=1 border=0>
            </td>
          <td class=cp valign=top width=472 height=12>Pagável
            em qualquer Banco até o vencimento
          </td>
          <td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.png" width=1 border=0></td>
          <td class=cp valign=top align=right width=180 height=12>
            <span class="campo">
            <?php echo ($data_vencimento != "") ? $data_vencimento : "Contra Apresenta��o" ?>
            </span>
          </td>
        </tr>
        <tr>
          <td valign=top width=7 height=1><img height=1 src="../imagens/2.png" width=7 border=0></td>
          <td valign=top width=472 height=1><img height=1 src="../imagens/2.png" width=472 border=0></td>
          <td valign=top width=7 height=1><img height=1 src="../imagens/2.png" width=7 border=0></td>
          <td valign=top width=180 height=1><img height=1 src="../imagens/2.png" width=180 border=0></td>
        </tr>
      </tbody>
    </table>
    <table cellspacing=0 cellpadding=0 border=0>
      <tbody>
        <tr>
          <td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.png" width=1 border=0></td>
          <td class=ct valign=top width=472 height=13>Beneficiário: </td>
          <td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.png" width=1 border=0></td>
          <td class=ct valign=top width=180 height=13>Agência/Código
            do Beneficiário
          </td>
        </tr>
        <tr>
          <td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.png" width=1 border=0></td>
          <td class=cp valign=top width=472 height=12>
            <span class="campo">
            <?php echo $cedente; ?>
            </span>
          </td>
          <td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.png" width=1 border=0></td>
          <td class=cp valign=top align=right width=180 height=12>
            <span class="campo">
            <?php echo $agencia_codigo; ?>
            </span>
          </td>
        </tr>
        <tr>
          <td valign=top width=7 height=1><img height=1 src="../imagens/2.png" width=7 border=0></td>
          <td valign=top width=472 height=1><img height=1 src="../imagens/2.png" width=472 border=0></td>
          <td valign=top width=7 height=1><img height=1 src="../imagens/2.png" width=7 border=0></td>
          <td valign=top width=180 height=1><img height=1 src="../imagens/2.png" width=180 border=0></td>
        </tr>
      </tbody>
    </table>
    <table cellspacing=0 cellpadding=0 border=0>
      <tbody>
        <tr>
          <td class=ct valign=top width=7 height=13>
            <img height=13 src="../imagens/1.png" width=1 border=0>
          </td>
          <td class=ct valign=top width=113 height=13>Data
            do documento
          </td>
          <td class=ct valign=top width=7 height=13> <img height=13 src="../imagens/1.png" width=1 border=0></td>
          <td class=ct valign=top width=133 height=13>Nr. do
            documento
          </td>
          <td class=ct valign=top width=7 height=13> <img height=13 src="../imagens/1.png" width=1 border=0></td>
          <td class=ct valign=top width=62 height=13>Espécie
            DOC
          </td>
          <td class=ct valign=top width=7 height=13> <img height=13 src="../imagens/1.png" width=1 border=0></td>
          <td class=ct valign=top width=34 height=13>Aceite</td>
          <td class=ct valign=top width=7 height=13>
            <img height=13 src="../imagens/1.png" width=1 border=0>
          </td>
          <td class=ct valign=top width=102 height=13>Data de
            processamento
          </td>
          <td class=ct valign=top width=7 height=13> <img height=13 src="../imagens/1.png" width=1 border=0></td>
          <td class=ct valign=top width=180 height=13>Nosso
            número
          </td>
        </tr>
        <tr>
          <td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.png" width=1 border=0></td>
          <td class=cp valign=top  width=113 height=12>
            <div align=left>
              <span class="campo">
              <?php echo $data_documento; ?>
              </span>
            </div>
          </td>
          <td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.png" width=1 border=0></td>
          <td class=cp valign=top width=133 height=12>
            <span class="campo">
            <?php echo $numero_documento; ?>
            </span>
          </td>
          <td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.png" width=1 border=0></td>
          <td class=cp valign=top  width=62 height=12>
            <div align=left><span class="campo">
              <?php echo $especie_doc; ?>
              </span>
            </div>
          </td>
          <td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.png" width=1 border=0></td>
          <td class=cp valign=top  width=34 height=12>
            <div align=left><span class="campo">
              <?php echo $aceite; ?>
              </span>
            </div>
          </td>
          <td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.png" width=1 border=0></td>
          <td class=cp valign=top  width=102 height=12>
            <div align=left>
              <span class="campo">
              <?php echo $data_processamento; ?>
              </span>
            </div>
          </td>
          <td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.png" width=1 border=0></td>
          <td class=cp valign=top align=right width=180 height=12>
            <span class="campo">
            <?php echo $nosso_numero; ?>
            </span>
          </td>
        </tr>
        <tr>
          <td valign=top width=7 height=1><img height=1 src="../imagens/2.png" width=7 border=0></td>
          <td valign=top width=113 height=1><img height=1 src="../imagens/2.png" width=113 border=0></td>
          <td valign=top width=7 height=1>
            <img height=1 src="../imagens/2.png" width=7 border=0>
          </td>
          <td valign=top width=133 height=1><img height=1 src="../imagens/2.png" width=133 border=0></td>
          <td valign=top width=7 height=1>
            <img height=1 src="../imagens/2.png" width=7 border=0>
          </td>
          <td valign=top width=62 height=1><img height=1 src="../imagens/2.png" width=62 border=0></td>
          <td valign=top width=7 height=1>
            <img height=1 src="../imagens/2.png" width=7 border=0>
          </td>
          <td valign=top width=34 height=1><img height=1 src="../imagens/2.png" width=34 border=0></td>
          <td valign=top width=7 height=1>
            <img height=1 src="../imagens/2.png" width=7 border=0>
          </td>
          <td valign=top width=102 height=1><img height=1 src="../imagens/2.png" width=102 border=0></td>
          <td valign=top width=7 height=1>
            <img height=1 src="../imagens/2.png" width=7 border=0>
          </td>
          <td valign=top width=180 height=1>
            <img height=1 src="../imagens/2.png" width=180 border=0>
          </td>
        </tr>
      </tbody>
    </table>
    <table cellspacing=0 cellpadding=0 border=0>
      <tbody>
        <tr>
          <td class=ct valign=top width=7 height=13> <img height=13 src="../imagens/1.png" width=1 border=0></td>
          <td class=ct valign=top COLSPAN="3" height=13>Uso
            do Banco
          </td>
          <td class=ct valign=top height=13 width=7> <img height=13 src="../imagens/1.png" width=1 border=0></td>
          <td class=ct valign=top width=133 height=13>Carteira</td>
          <td class=ct valign=top height=13 width=7>
            <img height=13 src="../imagens/1.png" width=1 border=0>
          </td>
          <td class=ct valign=top width=63 height=13>Espécie Moeda</td>
          <td class=ct valign=top height=13 width=7>
            <img height=13 src="../imagens/1.png" width=1 border=0>
          </td>
          <td class=ct valign=top width=33 height=13>Qtde moeda</td>
          <td class=ct valign=top height=13 width=7>
            <img height=13 src="../imagens/1.png" width=1 border=0>
          </td>
          <td class=ct valign=top width=82 height=13>
            xValor
          </td>
          <td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.png" width=1 border=0></td>
          <td class=ct valign=top width=180 height=13>(=)
            Valor documento
          </td>
        </tr>
        <tr>
          <td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.png" width=1 border=0></td>
          <td valign=top class=cp height=12 COLSPAN="3">
            <div align=left>
            </div>
          </td>
          <td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.png" width=1 border=0></td>
          <td class=cp valign=top  width=133>
            <div align=left> <span class="campo">
              <?php echo $carteira; ?>
              </span>
            </div>
          </td>
          <td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.png" width=1 border=0></td>
          <td class=cp valign=top  width=63>
            <div align=left><span class="campo">
              <?php echo $especie; ?>
              </span>
            </div>
          </td>
          <td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.png" width=1 border=0></td>
          <td class=cp valign=top  width=53><span class="campo">
            <?php echo $quantidade; ?>
            </span>
          </td>
          <td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.png" width=1 border=0></td>
          <td class=cp valign=top  width=82>
            <span class="campo">
            <?php echo $valor_unitario; ?>
            </span>
          </td>
          <td class=cp valign=top width=7 height=12> <img height=12 src="../imagens/1.png" width=1 border=0></td>
          <td class=cp valign=top align=right width=180 height=12>
            <span class="campo">
            <?php echo $valor_boleto; ?>
            </span>
          </td>
        </tr>
        <tr>
          <td valign=top width=7 height=1> <img height=1 src="../imagens/2.png" width=7 border=0></td>
          <td valign=top width=7 height=1><img height=1 src="../imagens/2.png" width=75 border=0></td>
          <td valign=top width=7 height=1><img height=1 src="../imagens/2.png" width=7 border=0></td>
          <td valign=top width=31 height=1><img height=1 src="../imagens/2.png" width=31 border=0></td>
          <td valign=top width=7 height=1>
            <img height=1 src="../imagens/2.png" width=7 border=0>
          </td>
          <td valign=top width=133 height=1><img height=1 src="../imagens/2.png" width=133 border=0></td>
          <td valign=top width=7 height=1>
            <img height=1 src="../imagens/2.png" width=7 border=0>
          </td>
          <td valign=top width=63 height=1><img height=1 src="../imagens/2.png" width=63 border=0></td>
          <td valign=top width=7 height=1>
            <img height=1 src="../imagens/2.png" width=7 border=0>
          </td>
          <td valign=top width=53 height=1><img height=1 src="../imagens/2.png" width=53 border=0></td>
          <td valign=top width=7 height=1>
            <img height=1 src="../imagens/2.png" width=7 border=0>
          </td>
          <td valign=top width=82 height=1><img height=1 src="../imagens/2.png" width=82 border=0></td>
          <td valign=top width=7 height=1>
            <img height=1 src="../imagens/2.png" width=7 border=0>
          </td>
          <td valign=top width=160 height=1><img height=1 src="../imagens/2.png" width=180 border=0></td>
        </tr>
      </tbody>
    </table>
    <table cellspacing=0 cellpadding=0 width=666 border=0>
      <tbody>
        <tr>
          <td align=right width=10>
            <table cellspacing=0 cellpadding=0 border=0 align=left>
              <tbody>
                <tr>
                  <td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.png" width=1 border=0></td>
                </tr>
                <tr>
                  <td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.png" width=1 border=0></td>
                </tr>
                <tr>
                  <td valign=top width=7 height=1><img height=1 src="../imagens/2.png" width=1 border=0></td>
                </tr>
              </tbody>
            </table>
          </td>
          <td valign=top width=468 rowspan=5><font class=ct>Instruções
            (Texto de responsabilidade do cedente)</font><br><br><span class=cp> <FONT class=campo>
            <?php echo $instrucoes1; ?><br>
            <?php echo $instrucoes2; ?><br>
            <?php echo $instrucoes3; ?><br>
            <?php echo $instrucoes4; ?></FONT><br><br>
            </span>
          </td>
          <td align=right width=188>
            <table cellspacing=0 cellpadding=0 border=0>
              <tbody>
                <tr>
                  <td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.png" width=1 border=0></td>
                  <td class=ct valign=top width=180 height=13>(-)
                    Desconto / Abatimentos
                  </td>
                </tr>
                <tr>
                  <td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.png" width=1 border=0></td>
                  <td class=cp valign=top align=right width=180 height=12></td>
                </tr>
                <tr>
                  <td valign=top width=7 height=1><img height=1 src="../imagens/2.png" width=7 border=0></td>
                  <td valign=top width=180 height=1><img height=1 src="../imagens/2.png" width=180 border=0></td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
        <tr>
          <td align=right width=10>
            <table cellspacing=0 cellpadding=0 border=0 align=left>
              <tbody>
                <tr>
                  <td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.png" width=1 border=0></td>
                </tr>
                <tr>
                  <td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.png" width=1 border=0></td>
                </tr>
                <tr>
                  <td valign=top width=7 height=1>
                    <img height=1 src="../imagens/2.png" width=1 border=0>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
          <td align=right width=188>
            <table cellspacing=0 cellpadding=0 border=0>
              <tbody>
                <tr>
                  <td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.png" width=1 border=0></td>
                  <td class=ct valign=top width=180 height=13>(-)
                    Outras deduções
                  </td>
                </tr>
                <tr>
                  <td class=cp valign=top width=7 height=12> <img height=12 src="../imagens/1.png" width=1 border=0></td>
                  <td class=cp valign=top align=right width=180 height=12></td>
                </tr>
                <tr>
                  <td valign=top width=7 height=1><img height=1 src="../imagens/2.png" width=7 border=0></td>
                  <td valign=top width=180 height=1><img height=1 src="../imagens/2.png" width=180 border=0></td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
        <tr>
          <td align=right width=10>
            <table cellspacing=0 cellpadding=0 border=0 align=left>
              <tbody>
                <tr>
                  <td class=ct valign=top width=7 height=13>
                    <img height=13 src="../imagens/1.png" width=1 border=0>
                  </td>
                </tr>
                <tr>
                  <td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.png" width=1 border=0></td>
                </tr>
                <tr>
                  <td valign=top width=7 height=1><img height=1 src="../imagens/2.png" width=1 border=0></td>
                </tr>
              </tbody>
            </table>
          </td>
          <td align=right width=188>
            <table cellspacing=0 cellpadding=0 border=0>
              <tbody>
                <tr>
                  <td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.png" width=1 border=0></td>
                  <td class=ct valign=top width=180 height=13>(+)
                    Mora / Multa
                  </td>
                </tr>
                <tr>
                  <td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.png" width=1 border=0></td>
                  <td class=cp valign=top align=right width=180 height=12></td>
                </tr>
                <tr>
                  <td valign=top width=7 height=1> <img height=1 src="../imagens/2.png" width=7 border=0></td>
                  <td valign=top width=180 height=1>
                    <img height=1 src="../imagens/2.png" width=180 border=0>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
        <tr>
          <td align=right width=10>
            <table cellspacing=0 cellpadding=0 border=0 align=left>
              <tbody>
                <tr>
                  <td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.png" width=1 border=0></td>
                </tr>
                <tr>
                  <td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.png" width=1 border=0></td>
                </tr>
                <tr>
                  <td valign=top width=7 height=1><img height=1 src="../imagens/2.png" width=1 border=0></td>
                </tr>
              </tbody>
            </table>
          </td>
          <td align=right width=188>
            <table cellspacing=0 cellpadding=0 border=0>
              <tbody>
                <tr>
                  <td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.png" width=1 border=0></td>
                  <td class=ct valign=top width=180 height=13>(+)
                    Outros acréscimos
                  </td>
                </tr>
                <tr>
                  <td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.png" width=1 border=0></td>
                  <td class=cp valign=top align=right width=180 height=12></td>
                </tr>
                <tr>
                  <td valign=top width=7 height=1><img height=1 src="../imagens/2.png" width=7 border=0></td>
                  <td valign=top width=180 height=1><img height=1 src="../imagens/2.png" width=180 border=0></td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
        <tr>
          <td align=right width=10>
            <table cellspacing=0 cellpadding=0 border=0 align=left>
              <tbody>
                <tr>
                  <td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.png" width=1 border=0></td>
                </tr>
                <tr>
                  <td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.png" width=1 border=0></td>
                </tr>
              </tbody>
            </table>
          </td>
          <td align=right width=188>
            <table cellspacing=0 cellpadding=0 border=0>
              <tbody>
                <tr>
                  <td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.png" width=1 border=0></td>
                  <td class=ct valign=top width=180 height=13>(=)
                    Valor cobrado
                  </td>
                </tr>
                <tr>
                  <td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.png" width=1 border=0></td>
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
        <tr>
          <td valign=top width=666 height=1><img height=1 src="../imagens/2.png" width=666 border=0></td>
        </tr>
      </tbody>
    </table>
    <table cellspacing=0 cellpadding=0 border=0>
      <tbody>
        <tr>
          <td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.png" width=1 border=0></td>
          <td class=ct valign=top width=300 height=13>PAGADOR</td>
          <td class=ct valign=top width=359 height=13>CPF/CNPJ</td>
        </tr>
        <tr>
          <td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.png" width=1 border=0></td>
          <td class=cp valign=top width=300 height=12><span class="campo">
            <?php echo $sacado; ?>
            </span>
          </td>
          <td class=cp valign=top width=359 height=12><span class="campo">
            <?php echo $pagador_cpf; ?>
            </span>
          </td>
        </tr>
      </tbody>
    </table>
    <table cellspacing=0 cellpadding=0 border=0>
      <tbody>
        <tr>
          <td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.png" width=1 border=0></td>
          <td class=cp valign=top width=659 height=12><span class="campo">
            <?php echo $endereco1; ?>
            </span>
          </td>
        </tr>
      </tbody>
    </table>
    <table cellspacing=0 cellpadding=0 border=0>
      <tbody>
        <tr>
          <td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.png" width=1 border=0></td>
          <td class=cp valign=top width=472 height=13>
            <span class="campo">
            <?php echo $endereco2; ?>
            </span>
          </td>
          <td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.png" width=1 border=0></td>
          <td class=ct valign=top width=180 height=13>Cód.
            baixa
          </td>
        </tr>
        <tr>
          <td valign=top width=7 height=1><img height=1 src="../imagens/2.png" width=7 border=0></td>
          <td valign=top width=472 height=1><img height=1 src="../imagens/2.png" width=472 border=0></td>
          <td valign=top width=7 height=1><img height=1 src="../imagens/2.png" width=7 border=0></td>
          <td valign=top width=180 height=1><img height=1 src="../imagens/2.png" width=180 border=0></td>
        </tr>
      </tbody>
    </table>
    <table cellSpacing=0 cellPadding=0 border=0 width=666>
      <tbody>
        <tr>
          <td class=ct  width=7 height=12></td>
          <td class=ct  width=309 >Sacador/Avalista</td>
          <td class=ct  width=100 >CPF/CNPJ</td>
          <td class=ct  width=250 >
            <div align=right>Autenticação
              mecânica - <b class=cp>Ficha de Compensação</b>
            </div>
          </td>
        </tr>
        <tr>
          <td class=ct  colspan=3 ></td>
        </tr>
      </tbody>
    </table>
    <table cellSpacing=0 cellPadding=0 width=666 border=0>
      <tbody>
        <tr>
          <td vAlign=bottom align=left height=50><?php echo $codigo_barras; ?>
          </td>
        </tr>
      </tbody>
    </table>
    <table cellSpacing=0 cellPadding=0 width=666 border=0>
      <tr>
        <td class=ct width=666></td>
      </tr>
      <tbody>
        <tr>
          <td class=ct width=666>
            <div align=right>Corte
              na linha pontilhada
            </div>
          </td>
        </tr>
        <tr>
          <td class=ct width=666><img height=1 src="../imagens/6.png" width=665 border=0></td>
        </tr>
      </tbody>
    </table>
  </body>
</html>
