<?php
// +----------------------------------------------------------------------+
// | BoletoPhp - Versão Beta                                              |
// +----------------------------------------------------------------------+
// | Este arquivo está disponível sob a Licença GPL disponível pela Web   |
// | em http://pt.wikipedia.org/wiki/GNU_General_Public_License           |
// | Você deve ter recebido uma cópia da GNU Public License junto com     |
// | esse pacote; se não, escreva para:                                   |
// |                                                                      |
// | Free Software Foundation, Inc.                                       |
// | 59 Temple Place - Suite 330                                          |
// | Boston, MA 02111-1307, USA.                                          |
// +----------------------------------------------------------------------+

// +----------------------------------------------------------------------+
// | Originado do Projeto BBBoletoFree que tiveram colaborações de Daniel |
// | William Schultz e Leandro Maniezo que por sua vez foi derivado do    |
// | PHPBoleto de João Prado Maia e Pablo Martins F. Costa                |
// |                                                                      |
// | Se vc quer colaborar, nos ajude a desenvolver p/ os demais bancos :-)|
// | Acesse o site do Projeto BoletoPhp: www.boletophp.com.br             |
// +----------------------------------------------------------------------+

// +----------------------------------------------------------------------+
// | Equipe Coordenação Projeto BoletoPhp: <boletophp@boletophp.com.br>   |
// | Desenvolvimento Boleto CEF: Elizeu Alcantara                         |
// +----------------------------------------------------------------------+

?><!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.0 Transitional//EN'>
<html>
<head>
<title><?php echo $dadosboleto["identificacao"]; ?>
</title>
<meta name="Generator"
  content="Projeto BoletoPHP - www.boletophp.com.br - Licença GPL" />
<meta http-equiv="Content-Type content=text/html" charset="ISO-8859-1">
<base href="<?php echo $assetsUrl?>">
<style type="text/css">
<!--
.cp {
  font: bold 10px Arial;
  color: black
}
<!--
.ti {
  font: 9px Arial, Helvetica, sans-serif
}

<!--
.ld {
  font: bold 15px Arial;
  color: #000000
}

<!--
.ct {
  FONT: 9px "Arial Narrow";
  COLOR: #000033
}

<!--
.cn {
  FONT: 9px Arial;
  COLOR: black;
}

<!--
.bc {
  font: bold 20px Arial;
  color: #000000
}

<!--
.ld2 {
  font: bold 12px Arial;
  color: #000000
}
-->
</style>
</head>

<body text="#000000" bgcolor="#ffffff" topmargin="0" rightmargin="0">
  <table width="666" cellspacing="0" cellpadding="0" border="0">
    <tr>
      <td valign="top" class="cp"><div align="CENTER">Instruções
          de Impressão</div></td>
    </tr>
    <tr>
      <td valign="top" class="cp"><div align="left">
          <p></p>
          <li>Imprima em impressora jato de tinta (ink jet) ou laser em
            qualidade normal ou alta (Não use modo econômico).<br></li>
          <li>Utilize folha A4 (210 x 297 mm) ou Carta (216 x 279 mm) e
            margens mínimas à esquerda e à direita do formulário.<br></li>
          <li>Corte na linha indicada. Não rasure, risque, fure ou dobre
            a região onde se encontra o código de barras.<br></li>
          <li>Caso não apareça o código de barras no final, clique em F5
            para atualizar esta tela.</li>
          <li>Caso tenha problemas ao imprimir, copie a seqüencia
            numérica abaixo e pague no caixa eletrônico ou no internet
            banking:<br> <br> <span class="ld2">
              &nbsp;&nbsp;&nbsp;&nbsp;Linha Digitável: &nbsp;<?php echo $dadosboleto["linha_digitavel"]?><br>
              &nbsp;&nbsp;&nbsp;&nbsp;Valor: &nbsp;&nbsp;R$ <?php echo $dadosboleto["valor_boleto"]?><br>
          </span></li>
        </div>
      </td>
    </tr>
  </table>
  <br>
  <table cellspacing="0" cellpadding="0" width="666" border="0">
    <tbody>
      <tr>
        <td class="ct" width="666"><img height="1" src="imagens/6.png"
          width="665" border="0" alt="">
        </td>
      </tr>
      <tr>
        <td class="ct" width="666"><div align="right">
            <b class="cp">RECIBO DO PAGADOR (SACADO)</b>
          </div>
        </td>
      </tr>
    </tbody>
  </table>
  <table width="666" cellspacing="5" cellpadding="0" border="0"
    align="Default">
    <tr>
      <td width="41"><img
        src="<?php echo $logoUrl ?>"
         height="60" alt="">
      </td>
      <td class="ti" width="455"><?php echo $dadosboleto["identificacao"]; ?>
        <?php echo isset($dadosboleto["cpf_cnpj"]) ? "<br>".$dadosboleto["cpf_cnpj"] : '' ?><br>
        <?php echo $dadosboleto["endereco"]; ?><br> <?php echo $dadosboleto["cidade_uf"]; ?>
      </td>
      <td align="RIGHT" width="150" class="ti">&nbsp;</td>
    </tr>
  </table>
  <table cellspacing="0" cellpadding="0" width="666" border="0">
    <tr>
      <td class="cp" width="150"><span class="campo"><img
          src="imagens/logocaixa.jpg" width="150" height="40" border="0"
          alt=""> </span></td>
      <td width="3" valign="bottom"><img height="22"
        src="imagens/3.png" width="2" border="0" alt="">
      </td>
      <td class="cpt" width="58" valign="bottom"><div align="center">
          <font class="bc"><?php echo $dadosboleto["codigo_banco_com_dv"]?>
          </font>
        </div>
      </td>
      <td width="3" valign="bottom"><img height="22"
        src="imagens/3.png" width="2" border="0" alt="">
      </td>
      <td class="ld" align="right" width="453" valign="bottom"><span
        class="ld"> <span class="campotitulo"> <?php echo $dadosboleto["linha_digitavel"]?>
        </span> </span>
      </td>
    </tr>
    <tbody>
      <tr>
        <td colspan="5"><img height="2" src="imagens/2.png" width="666"
          border="0" alt="">
        </td>
      </tr>
    </tbody>
  </table>
  <table cellspacing="0" cellpadding="0" border="0">
    <tbody>
      <tr>
        <td class="ct" valign="top" width="7" height="13"><img
          height="13" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="ct" valign="top" width="268" height="13">Nome do Beneficiário</td>
        <td class="ct" valign="top" width="7" height="13"><img
          height="13" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="ct" valign="top" width="156" height="13">Agência/Código do Beneficiário</td>
        <td class="ct" valign="top" width="7" height="13"><img
          height="13" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="ct" valign="top" width="34" height="13">Espécie</td>
        <td class="ct" valign="top" width="7" height="13"><img
          height="13" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="ct" valign="top" width="53" height="13">Quantidade</td>
        <td class="ct" valign="top" width="7" height="13"><img
          height="13" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="ct" valign="top" width="120" height="13">Nosso
          número</td>
      </tr>
      <tr>
        <td class="cp" valign="top" width="7" height="24"><img
          height="24" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="cp" valign="top" width="268" height="12"><span
          class="campo"><?php echo $dadosboleto["cedente"]; ?> </span>
        </td>
        <td class="cp" valign="top" width="7" height="24"><img
          height="24" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="cp" valign="top" width="156" height="12"><span
          class="campo"> <?php echo $dadosboleto["agencia_codigo"]?> </span>
        </td>
        <td class="cp" valign="top" width="7" height="24"><img
          height="24" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="cp" valign="top" width="34" height="12"><span
          class="campo"> <?php echo $dadosboleto["especie"]?> </span></td>
        <td class="cp" valign="top" width="7" height="24"><img
          height="24" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="cp" valign="top" width="53" height="12"><span
          class="campo"> <?php echo $dadosboleto["quantidade"]?> </span></td>
        <td class="cp" valign="top" width="7" height="24"><img
          height="24" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="cp" valign="top" align="right" width="120" height="12"><span
          class="campo"> <?php echo substr($dadosboleto["nosso_numero"], 0, -1) . '-' . substr($dadosboleto["nosso_numero"], -1)?> </span>
        </td>
      </tr>
      <tr>
        <td valign="top" width="7" height="1"><img height="1"
          src="imagens/2.png" width="7" border="0" alt="">
        </td>
        <td valign="top" width="268" height="1"><img height="1"
          src="imagens/2.png" width="268" border="0" alt="">
        </td>
        <td valign="top" width="7" height="1"><img height="1"
          src="imagens/2.png" width="7" border="0" alt="">
        </td>
        <td valign="top" width="156" height="1"><img height="1"
          src="imagens/2.png" width="156" border="0" alt="">
        </td>
        <td valign="top" width="7" height="1"><img height="1"
          src="imagens/2.png" width="7" border="0" alt="">
        </td>
        <td valign="top" width="34" height="1"><img height="1"
          src="imagens/2.png" width="34" border="0" alt="">
        </td>
        <td valign="top" width="7" height="1"><img height="1"
          src="imagens/2.png" width="7" border="0" alt="">
        </td>
        <td valign="top" width="53" height="1"><img height="1"
          src="imagens/2.png" width="53" border="0" alt="">
        </td>
        <td valign="top" width="7" height="1"><img height="1"
          src="imagens/2.png" width="7" border="0" alt="">
        </td>
        <td valign="top" width="120" height="1"><img height="1"
          src="imagens/2.png" width="120" border="0" alt="">
        </td>
      </tr>
    </tbody>
  </table>

  <!-- Endereço do Beneficiário -->
  <table cellspacing="0" cellpadding="0" border="0">
    <tbody>
      <tr>
        <td class="ct" valign="top" width="7" height="13"><img
          height="13" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="ct" valign="top" colspan="3" height="13">Endereço do Beneficiário</td>
        <td class="ct" valign="top" width="7" height="13"><img
          height="13" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="ct" valign="top" width="50" height="13">UF</td>
        <td class="ct" valign="top" width="7" height="13"><img
          height="13" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="ct" valign="top" width="134" height="13">CEP</td>
      </tr>
      <tr>
        <td class="cp" valign="top" width="7" height="12"><img
          height="12" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="cp" valign="top" colspan="3" height="12"><span
          class="campo"> <?php echo $dadosboleto["endereco"]?>
        </span>
        </td>
        <td class="cp" valign="top" width="7" height="12"><img
          height="12" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="cp" valign="top" width="50" height="12"><span
          class="campo"> <?php echo $dadosboleto["cedente_uf"]?> </span>
        </td>
        <td class="cp" valign="top" width="7" height="12"><img
          height="12" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="cp" valign="top" width="134" height="12"><span
          class="campo"> <?php echo $dadosboleto["cedente_cep"] ?>
        </span>
        </td>
      </tr>
      <tr>
        <td valign="top" width="7" height="1"><img height="1"
          src="imagens/2.png" width="7" border="0" alt="">
        </td>
        <td valign="top" width="381" height="1"><img height="1"
          src="imagens/2.png" width="381" border="0" alt="">
        </td>
        <td valign="top" width="7" height="1"><img height="1"
          src="imagens/2.png" width="7" border="0" alt="">
        </td>
        <td valign="top" width="72" height="1"><img height="1"
          src="imagens/2.png" width="72" border="0" alt="">
        </td>
        <td valign="top" width="7" height="1"><img height="1"
          src="imagens/2.png" width="7" border="0" alt="">
        </td>
        <td valign="top" width="50" height="1"><img height="1"
          src="imagens/2.png" width="50" border="0" alt="">
        </td>
        <td valign="top" width="7" height="1"><img height="1"
          src="imagens/2.png" width="7" border="0" alt="">
        </td>
        <td valign="top" width="134" height="1"><img height="1"
          src="imagens/2.png" width="134" border="0" alt="">
        </td>
      </tr>
    </tbody>
  </table>


  <table cellspacing="0" cellpadding="0" border="0">
    <tbody>
      <tr>
        <td class="ct" valign="top" width="7" height="13"><img
          height="13" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="ct" valign="top" colspan="3" height="13">Número do
          documento</td>
        <td class="ct" valign="top" width="7" height="13"><img
          height="13" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="ct" valign="top" width="132" height="13">CPF/CNPJ do Beneficiário</td>
        <td class="ct" valign="top" width="7" height="13"><img
          height="13" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="ct" valign="top" width="134" height="13">Vencimento</td>
        <td class="ct" valign="top" width="7" height="13"><img
          height="13" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="ct" valign="top" width="180" height="13">Valor documento</td>
      </tr>
      <tr>
        <td class="cp" valign="top" width="7" height="12"><img
          height="12" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="cp" valign="top" colspan="3" height="12"><span
          class="campo"> <?php echo $dadosboleto["numero_documento"]?>
        </span>
        </td>
        <td class="cp" valign="top" width="7" height="12"><img
          height="12" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="cp" valign="top" width="132" height="12"><span
          class="campo"> <?php echo $dadosboleto["cpf_cnpj"]?> </span>
        </td>
        <td class="cp" valign="top" width="7" height="12"><img
          height="12" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="cp" valign="top" width="134" height="12"><span
          class="campo"> <?php echo ($dadosboleto["data_vencimento"] != "") ? $dadosboleto["data_vencimento"] : "Contra Apresentação" ?>
        </span>
        </td>
        <td class="cp" valign="top" width="7" height="12"><img
          height="12" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="cp" valign="top" align="right" width="180" height="12"><span
          class="campo"> <?php echo $dadosboleto["valor_boleto"]?> </span>
        </td>
      </tr>
      <tr>
        <td valign="top" width="7" height="1"><img height="1"
          src="imagens/2.png" width="7" border="0" alt="">
        </td>
        <td valign="top" width="113" height="1"><img height="1"
          src="imagens/2.png" width="113" border="0" alt="">
        </td>
        <td valign="top" width="7" height="1"><img height="1"
          src="imagens/2.png" width="7" border="0" alt="">
        </td>
        <td valign="top" width="72" height="1"><img height="1"
          src="imagens/2.png" width="72" border="0" alt="">
        </td>
        <td valign="top" width="7" height="1"><img height="1"
          src="imagens/2.png" width="7" border="0" alt="">
        </td>
        <td valign="top" width="132" height="1"><img height="1"
          src="imagens/2.png" width="132" border="0" alt="">
        </td>
        <td valign="top" width="7" height="1"><img height="1"
          src="imagens/2.png" width="7" border="0" alt="">
        </td>
        <td valign="top" width="134" height="1"><img height="1"
          src="imagens/2.png" width="134" border="0" alt="">
        </td>
        <td valign="top" width="7" height="1"><img height="1"
          src="imagens/2.png" width="7" border="0" alt="">
        </td>
        <td valign="top" width="180" height="1"><img height="1"
          src="imagens/2.png" width="180" border="0" alt="">
        </td>
      </tr>
    </tbody>
  </table>
  <table cellspacing="0" cellpadding="0" border="0">
    <tbody>
      <tr>
        <td class="ct" valign="top" width="7" height="13"><img
          height="13" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="ct" valign="top" width="88" height="13">(-)
          Desconto </td>
        <td class="ct" valign="top" width="7" height="13"><img
          height="13" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="ct" valign="top" width="137" height="13">(-) Outras
          deduções / Abatimentos</td>
        <td class="ct" valign="top" width="7" height="13"><img
          height="13" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="ct" valign="top" width="113" height="13">(+) Mora /
          Multa / Juros</td>
        <td class="ct" valign="top" width="7" height="13"><img
          height="13" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="ct" valign="top" width="113" height="13">(+) Outros
          acréscimos</td>
        <td class="ct" valign="top" width="7" height="13"><img
          height="13" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="ct" valign="top" width="180" height="13">(=) Valor
          cobrado</td>
      </tr>
      <tr>
        <td class="cp" valign="top" width="7" height="12"><img
          height="12" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="cp" valign="top" align="right" width="88" height="12"></td>
        <td class="cp" valign="top" width="7" height="12"><img
          height="12" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="cp" valign="top" align="right" width="137" height="12"></td>
        <td class="cp" valign="top" width="7" height="12"><img
          height="12" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="cp" valign="top" align="right" width="113" height="12"></td>
        <td class="cp" valign="top" width="7" height="12"><img
          height="12" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="cp" valign="top" align="right" width="113" height="12"></td>
        <td class="cp" valign="top" width="7" height="12"><img
          height="12" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="cp" valign="top" align="right" width="180" height="12"></td>
      </tr>
      <tr>
        <td valign="top" width="7" height="1"><img height="1"
          src="imagens/2.png" width="7" border="0" alt="">
        </td>
        <td valign="top" width="88" height="1"><img height="1"
          src="imagens/2.png" width="88" border="0" alt="">
        </td>
        <td valign="top" width="7" height="1"><img height="1"
          src="imagens/2.png" width="7" border="0" alt="">
        </td>
        <td valign="top" width="137" height="1"><img height="1"
          src="imagens/2.png" width="137" border="0" alt="">
        </td>
        <td valign="top" width="7" height="1"><img height="1"
          src="imagens/2.png" width="7" border="0" alt="">
        </td>
        <td valign="top" width="113" height="1"><img height="1"
          src="imagens/2.png" width="113" border="0" alt="">
        </td>
        <td valign="top" width="7" height="1"><img height="1"
          src="imagens/2.png" width="7" border="0" alt="">
        </td>
        <td valign="top" width="113" height="1"><img height="1"
          src="imagens/2.png" width="113" border="0" alt="">
        </td>
        <td valign="top" width="7" height="1"><img height="1"
          src="imagens/2.png" width="7" border="0" alt="">
        </td>
        <td valign="top" width="180" height="1"><img height="1"
          src="imagens/2.png" width="180" border="0" alt="">
        </td>
      </tr>
    </tbody>
  </table>
  <table cellspacing="0" cellpadding="0" border="0">
    <tbody>
      <tr>
        <td class="ct" valign="top" width="7" height="13"><img
          height="13" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="ct" valign="top" width="659" height="13">Sacado</td>
      </tr>
      <tr>
        <td class="cp" valign="top" width="7" height="12"><img
          height="12" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="cp" valign="top" width="659" height="12"><span
          class="campo"> <?php echo $dadosboleto["sacado"]?> </span>
        </td>
      </tr>
      <tr>
        <td valign="top" width="7" height="1"><img height="1"
          src="imagens/2.png" width="7" border="0" alt="">
        </td>
        <td valign="top" width="659" height="1"><img height="1"
          src="imagens/2.png" width="659" border="0" alt="">
        </td>
      </tr>
    </tbody>
  </table>
  <table cellspacing="0" cellpadding="0" border="0">
    <tbody>
      <tr>
        <td class="ct" width="7" height="12"></td>
        <td class="ct" width="364">Demonstrativo</td>
        <td class="ct" width="7" height="12"></td>
        <td class="ct" width="288" style="text-align:right;">Autenticação mecânica - RECIBO DO PAGADOR (SACADO)</td>
      </tr>
      <tr>
        <td width="7"></td>
        <td class="cp" colspan="3"><span class="campo"> <?php echo $dadosboleto["demonstrativo1"]?><br>
            <?php echo $dadosboleto["demonstrativo2"]?><br> <?php echo $dadosboleto["demonstrativo3"]?>

          <div style="width:400px; margin-top:10px;">
            SAC CAIXA: 0800 726 0101 (informações, reclamações, sugestões e elogios)<br />
            Para pessoas com deficiência auditiva ou de fala: 0800 726 2492<br />
            Ouvidoria: 0800 725 7474<br />
            caixa.gov.br
          </div>
        </span></td>
      </tr>
    </tbody>
  </table>
  <table cellspacing="0" cellpadding="0" width="666" border="0">
    <tbody>
      <tr>
        <td width="7"></td>
        <td width="500" class="cp"><br></td>
        <td width="159"></td>
      </tr>
    </tbody>
  </table>
  <table cellspacing="0" cellpadding="0" width="666" border="0">
    <tr>
      <td class="ct" width="666"></td>
    </tr>
    <tbody>
      <tr>
        <td class="ct" width="666">
          <div align="right">Corte na linha pontilhada</div>
        </td>
      </tr>
      <tr>
        <td class="ct" width="666"><img height="1" src="imagens/6.png"
          width="665" border="0" alt="">
        </td>
      </tr>
    </tbody>
  </table>
  <br>
  <table cellspacing="0" cellpadding="0" width="666" border="0">
    <tr>
      <td class="cp" width="150"><span class="campo"><img
          src="imagens/logocaixa.jpg" width="150" height="40" border="0"
          alt=""> </span></td>
      <td width="3" valign="bottom"><img height="22"
        src="imagens/3.png" width="2" border="0" alt="">
      </td>
      <td class="cpt" width="58" valign="bottom"><div align="center">
          <font class="bc"><?php echo $dadosboleto["codigo_banco_com_dv"]?>
          </font>
        </div>
      </td>
      <td width="3" valign="bottom"><img height="22"
        src="imagens/3.png" width="2" border="0" alt="">
      </td>
      <td class="ld" align="right" width="453" valign="bottom"><span
        class="ld"> <span class="campotitulo"> <?php echo $dadosboleto["linha_digitavel"]?>
        </span> </span>
      </td>
    </tr>
    <tbody>
      <tr>
        <td colspan="5"><img height="2" src="imagens/2.png" width="666"
          border="0" alt="">
        </td>
      </tr>
    </tbody>
  </table>
  <table cellspacing="0" cellpadding="0" border="0">
    <tbody>
      <tr>
        <td class="ct" valign="top" width="7" height="13"><img
          height="13" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="ct" valign="top" width="472" height="13">Local de
          pagamento</td>
        <td class="ct" valign="top" width="7" height="13"><img
          height="13" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="ct" valign="top" width="180" height="13">Vencimento</td>
      </tr>
      <tr>
        <td class="cp" valign="top" width="7" height="12"><img
          height="12" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="cp" valign="top" width="472" height="12">PREFERENCIALMENTE
          NAS CASAS LOTÉRICAS ATÉ O VALOR LIMITE</td>
        <td class="cp" valign="top" width="7" height="12"><img
          height="12" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="cp" valign="top" align="right" width="180" height="12"><span
          class="campo"> <?php echo ($dadosboleto["data_vencimento"] != "") ? $dadosboleto["data_vencimento"] : "Contra Apresentação" ?>
        </span>
        </td>
      </tr>
      <tr>
        <td valign="top" width="7" height="1"><img height="1"
          src="imagens/2.png" width="7" border="0" alt="">
        </td>
        <td valign="top" width="472" height="1"><img height="1"
          src="imagens/2.png" width="472" border="0" alt="">
        </td>
        <td valign="top" width="7" height="1"><img height="1"
          src="imagens/2.png" width="7" border="0" alt="">
        </td>
        <td valign="top" width="180" height="1"><img height="1"
          src="imagens/2.png" width="180" border="0" alt="">
        </td>
      </tr>
    </tbody>
  </table>
  <table cellspacing="0" cellpadding="0" border="0">
    <tbody>
      <tr>
        <td class="ct" valign="top" width="7" height="13"><img
          height="13" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="ct" valign="top" width="315" height="13">Nome do Beneficiário</td>
        <td class="ct" valign="top" width="7" height="13"><img
          height="13" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="ct" valign="top" width="150" height="13">CPF/CNPJ do Beneficiário</td>
        <td class="ct" valign="top" width="7" height="13"><img
          height="13" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="ct" valign="top" width="180" height="13">Agência/Código do Beneficiário</td>
      </tr>
      <tr>
        <td class="cp" valign="top" width="7" height="24"><img
          height="24" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="cp" valign="top" width="315" height="12"><span
          class="campo"> <?php echo $dadosboleto["cedente"]?> </span>
        </td>
        <td class="cp" valign="top" width="7" height="24"><img
          height="24" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="cp" valign="top" width="150" height="12"><span
          class="campo"> <?php echo $dadosboleto["cpf_cnpj"]?> </span>
        </td>
        <td class="cp" valign="top" width="7" height="24"><img
          height="24" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="cp" valign="top" align="right" width="180" height="12"><span
          class="campo"> <?php echo $dadosboleto["agencia_codigo"]?> </span>
        </td>
      </tr>
      <tr>
        <td valign="top" width="7" height="1"><img height="1"
          src="imagens/2.png" width="7" border="0" alt="">
        </td>
        <td valign="top" width="315" height="1"><img height="1"
          src="imagens/2.png" width="315" border="0" alt="">
        </td>
        <td valign="top" width="7" height="1"><img height="1"
          src="imagens/2.png" width="7" border="0" alt="">
        </td>
        <td valign="top" width="150" height="1"><img height="1"
          src="imagens/2.png" width="150" border="0" alt="">
        </td>
        <td valign="top" width="7" height="1"><img height="1"
          src="imagens/2.png" width="7" border="0" alt="">
        </td>
        <td valign="top" width="180" height="1"><img height="1"
          src="imagens/2.png" width="180" border="0" alt="">
        </td>
      </tr>
    </tbody>
  </table>
  <table cellspacing="0" cellpadding="0" border="0">
    <tbody>
      <tr>
        <td class="ct" valign="top" width="7" height="13"><img
          height="13" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="ct" valign="top" width="113" height="13">Data do
          documento</td>
        <td class="ct" valign="top" width="7" height="13"><img
          height="13" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="ct" valign="top" width="133" height="13">Número do 
          documento</td>
        <td class="ct" valign="top" width="7" height="13"><img
          height="13" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="ct" valign="top" width="62" height="13">Espécie doc.</td>
        <td class="ct" valign="top" width="7" height="13"><img
          height="13" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="ct" valign="top" width="34" height="13">Aceite</td>
        <td class="ct" valign="top" width="7" height="13"><img
          height="13" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="ct" valign="top" width="102" height="13">Data
          processamento</td>
        <td class="ct" valign="top" width="7" height="13"><img
          height="13" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="ct" valign="top" width="180" height="13">Nosso
          número</td>
      </tr>
      <tr>
        <td class="cp" valign="top" width="7" height="12"><img
          height="12" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="cp" valign="top" width="113" height="12"><div
            align="left">
            <span class="campo"> <?php echo $dadosboleto["data_documento"]?>
            </span>
          </div>
        </td>
        <td class="cp" valign="top" width="7" height="12"><img
          height="12" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="cp" valign="top" width="133" height="12"><span
          class="campo"> <?php echo $dadosboleto["numero_documento"]?>
        </span>
        </td>
        <td class="cp" valign="top" width="7" height="12"><img
          height="12" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="cp" valign="top" width="62" height="12"><div
            align="left">
            <span class="campo"> <?php echo $dadosboleto["especie_doc"]?>
            </span>
          </div>
        </td>
        <td class="cp" valign="top" width="7" height="12"><img
          height="12" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="cp" valign="top" width="34" height="12"><div
            align="left">
            <span class="campo"> <?php echo $dadosboleto["aceite"]?> </span>
          </div>
        </td>
        <td class="cp" valign="top" width="7" height="12"><img
          height="12" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="cp" valign="top" width="102" height="12"><div
            align="left">
            <span class="campo"> <?php echo $dadosboleto["data_processamento"]?>
            </span>
          </div>
        </td>
        <td class="cp" valign="top" width="7" height="12"><img
          height="12" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="cp" valign="top" align="right" width="180" height="12"><span
          class="campo"> <?php echo substr($dadosboleto["nosso_numero"], 0, -1) . '-' . substr($dadosboleto["nosso_numero"], -1)?> </span>
        </td>
      </tr>
      <tr>
        <td valign="top" width="7" height="1"><img height="1"
          src="imagens/2.png" width="7" border="0" alt="">
        </td>
        <td valign="top" width="113" height="1"><img height="1"
          src="imagens/2.png" width="113" border="0" alt="">
        </td>
        <td valign="top" width="7" height="1"><img height="1"
          src="imagens/2.png" width="7" border="0" alt="">
        </td>
        <td valign="top" width="133" height="1"><img height="1"
          src="imagens/2.png" width="133" border="0" alt="">
        </td>
        <td valign="top" width="7" height="1"><img height="1"
          src="imagens/2.png" width="7" border="0" alt="">
        </td>
        <td valign="top" width="62" height="1"><img height="1"
          src="imagens/2.png" width="62" border="0" alt="">
        </td>
        <td valign="top" width="7" height="1"><img height="1"
          src="imagens/2.png" width="7" border="0" alt="">
        </td>
        <td valign="top" width="34" height="1"><img height="1"
          src="imagens/2.png" width="34" border="0" alt="">
        </td>
        <td valign="top" width="7" height="1"><img height="1"
          src="imagens/2.png" width="7" border="0" alt="">
        </td>
        <td valign="top" width="102" height="1"><img height="1"
          src="imagens/2.png" width="102" border="0" alt="">
        </td>
        <td valign="top" width="7" height="1"><img height="1"
          src="imagens/2.png" width="7" border="0" alt="">
        </td>
        <td valign="top" width="180" height="1"><img height="1"
          src="imagens/2.png" width="180" border="0" alt="">
        </td>
      </tr>
    </tbody>
  </table>
  <table cellspacing="0" cellpadding="0" border="0">
    <tbody>
      <tr>
        <td class="ct" valign="top" width="7" height="13"><img
          height="13" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="ct" valign="top" colspan="3" height="13">Uso do
          banco</td>
        <td class="ct" valign="top" height="13" width="7"><img
          height="13" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="ct" valign="top" width="83" height="13">Carteira</td>
        <td class="ct" valign="top" height="13" width="7"><img
          height="13" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="ct" valign="top" width="63" height="13">Espécie Moeda</td>
        <td class="ct" valign="top" height="13" width="7"><img
          height="13" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="ct" valign="top" width="83" height="13">Qtde Moeda</td>
        <td class="ct" valign="top" height="13" width="7"><img
          height="13" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="ct" valign="top" width="102" height="13">Valor documento</td>
        <td class="ct" valign="top" width="7" height="13"><img
          height="13" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="ct" valign="top" width="180" height="13">(=) Valor
          documento</td>
      </tr>
      <tr>
        <td class="cp" valign="top" width="7" height="12"><img
          height="12" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td valign="top" class="cp" height="12" colspan="3"><div
            align="left"></div></td>
        <td class="cp" valign="top" width="7" height="12"><img
          height="12" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="cp" valign="top" width="83">
          <div align="left">
            <span class="campo"> <?php echo $dadosboleto["carteira"]?>
            </span>
          </div>
        </td>
        <td class="cp" valign="top" width="7" height="12"><img
          height="12" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="cp" valign="top" width="63"><div align="left">
            <span class="campo"> <?php echo $dadosboleto["especie"]?> </span>
          </div>
        </td>
        <td class="cp" valign="top" width="7" height="12"><img
          height="12" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="cp" valign="top" width="83"><span class="campo">
            <?php echo $dadosboleto["quantidade"]?> </span></td>
        <td class="cp" valign="top" width="7" height="12"><img
          height="12" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="cp" valign="top" width="102"><span class="campo">
            <?php echo $dadosboleto["valor_unitario"]?> </span>
        </td>
        <td class="cp" valign="top" width="7" height="12"><img
          height="12" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="cp" valign="top" align="right" width="180" height="12"><span
          class="campo"> <?php echo $dadosboleto["valor_boleto"]?></span>
        </td>
      </tr>
      <tr>
        <td valign="top" width="7" height="1"><img height="1"
          src="imagens/2.png" width="7" border="0" alt="">
        </td>
        <td valign="top" width="7" height="1"><img height="1"
          src="imagens/2.png" width="75" border="0" alt="">
        </td>
        <td valign="top" width="7" height="1"><img height="1"
          src="imagens/2.png" width="7" border="0" alt="">
        </td>
        <td valign="top" width="31" height="1"><img height="1"
          src="imagens/2.png" width="31" border="0" alt="">
        </td>
        <td valign="top" width="7" height="1"><img height="1"
          src="imagens/2.png" width="7" border="0" alt="">
        </td>
        <td valign="top" width="83" height="1"><img height="1"
          src="imagens/2.png" width="83" border="0" alt="">
        </td>
        <td valign="top" width="7" height="1"><img height="1"
          src="imagens/2.png" width="7" border="0" alt="">
        </td>
        <td valign="top" width="63" height="1"><img height="1"
          src="imagens/2.png" width="63" border="0" alt="">
        </td>
        <td valign="top" width="7" height="1"><img height="1"
          src="imagens/2.png" width="7" border="0" alt="">
        </td>
        <td valign="top" width="83" height="1"><img height="1"
          src="imagens/2.png" width="83" border="0" alt="">
        </td>
        <td valign="top" width="7" height="1"><img height="1"
          src="imagens/2.png" width="7" border="0" alt="">
        </td>
        <td valign="top" width="102" height="1"><img height="1"
          src="imagens/2.png" width="102" border="0" alt="">
        </td>
        <td valign="top" width="7" height="1"><img height="1"
          src="imagens/2.png" width="7" border="0" alt="">
        </td>
        <td valign="top" width="180" height="1"><img height="1"
          src="imagens/2.png" width="180" border="0" alt="">
        </td>
      </tr>
    </tbody>
  </table>
  <table cellspacing="0" cellpadding="0" width="666" border="0">
    <tbody>
      <tr>
        <td align="right" width="10"><table cellspacing="0"
            cellpadding="0" border="0" align="left">
            <tbody>
              <tr>
                <td class="ct" valign="top" width="7" height="13"><img
                  height="13" src="imagens/1.png" width="1" border="0" alt="">
                </td>
              </tr>
              <tr>
                <td class="cp" valign="top" width="7" height="12"><img
                  height="12" src="imagens/1.png" width="1" border="0" alt="">
                </td>
              </tr>
              <tr>
                <td valign="top" width="7" height="1"><img height="1"
                  src="imagens/2.png" width="1" border="0" alt="">
                </td>
              </tr>
            </tbody>
          </table>
        </td>
        <td valign="top" width="468" rowspan="5"><font class="ct">Instruções
            (Texto de responsabilidade do cedente)</font><br> 
            <div style="margin-top:10px;"><span
          class="cp"> <font class="campo"> <?php echo $dadosboleto["instrucoes1"]; ?><br>
              <?php echo $dadosboleto["instrucoes2"]; ?><br> <?php echo $dadosboleto["instrucoes3"]; ?><br>
              <?php echo $dadosboleto["instrucoes4"]; ?> </font></span>
            </div>
        </td>
        <td align="right" width="188"><table cellspacing="0"
            cellpadding="0" border="0">
            <tbody>
              <tr>
                <td class="ct" valign="top" width="7" height="13"><img
                  height="13" src="imagens/1.png" width="1" border="0" alt="">
                </td>
                <td class="ct" valign="top" width="180" height="13">(-)
                  Desconto</td>
              </tr>
              <tr>
                <td class="cp" valign="top" width="7" height="12"><img
                  height="12" src="imagens/1.png" width="1" border="0" alt="">
                </td>
                <td class="cp" valign="top" align="right" width="180"
                  height="12"></td>
              </tr>
              <tr>
                <td valign="top" width="7" height="1"><img height="1"
                  src="imagens/2.png" width="7" border="0" alt="">
                </td>
                <td valign="top" width="180" height="1"><img height="1"
                  src="imagens/2.png" width="180" border="0" alt="">
                </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
      <tr>
        <td align="right" width="10">
          <table cellspacing="0" cellpadding="0" border="0" align="left">
            <tbody>
              <tr>
                <td class="ct" valign="top" width="7" height="13"><img
                  height="13" src="imagens/1.png" width="1" border="0" alt="">
                </td>
              </tr>
              <tr>
                <td class="cp" valign="top" width="7" height="12"><img
                  height="12" src="imagens/1.png" width="1" border="0" alt="">
                </td>
              </tr>
              <tr>
                <td valign="top" width="7" height="1"><img height="1"
                  src="imagens/2.png" width="1" border="0" alt="">
                </td>
              </tr>
            </tbody>
          </table>
        </td>
        <td align="right" width="188"><table cellspacing="0"
            cellpadding="0" border="0">
            <tbody>
              <tr>
                <td class="ct" valign="top" width="7" height="13"><img
                  height="13" src="imagens/1.png" width="1" border="0" alt="">
                </td>
                <td class="ct" valign="top" width="180" height="13">(-)
                  Outras deduções / Abatimentos</td>
              </tr>
              <tr>
                <td class="cp" valign="top" width="7" height="12"><img
                  height="12" src="imagens/1.png" width="1" border="0" alt="">
                </td>
                <td class="cp" valign="top" align="right" width="180"
                  height="12"></td>
              </tr>
              <tr>
                <td valign="top" width="7" height="1"><img height="1"
                  src="imagens/2.png" width="7" border="0" alt="">
                </td>
                <td valign="top" width="180" height="1"><img height="1"
                  src="imagens/2.png" width="180" border="0" alt="">
                </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
      <tr>
        <td align="right" width="10">
          <table cellspacing="0" cellpadding="0" border="0" align="left">
            <tbody>
              <tr>
                <td class="ct" valign="top" width="7" height="13"><img
                  height="13" src="imagens/1.png" width="1" border="0" alt="">
                </td>
              </tr>
              <tr>
                <td class="cp" valign="top" width="7" height="12"><img
                  height="12" src="imagens/1.png" width="1" border="0" alt="">
                </td>
              </tr>
              <tr>
                <td valign="top" width="7" height="1"><img height="1"
                  src="imagens/2.png" width="1" border="0" alt="">
                </td>
              </tr>
            </tbody>
          </table>
        </td>
        <td align="right" width="188">
          <table cellspacing="0" cellpadding="0" border="0">
            <tbody>
              <tr>
                <td class="ct" valign="top" width="7" height="13"><img
                  height="13" src="imagens/1.png" width="1" border="0" alt="">
                </td>
                <td class="ct" valign="top" width="180" height="13">(+)
                  Mora / Multa / Juros</td>
              </tr>
              <tr>
                <td class="cp" valign="top" width="7" height="12"><img
                  height="12" src="imagens/1.png" width="1" border="0" alt="">
                </td>
                <td class="cp" valign="top" align="right" width="180"
                  height="12"></td>
              </tr>
              <tr>
                <td valign="top" width="7" height="1"><img height="1"
                  src="imagens/2.png" width="7" border="0" alt="">
                </td>
                <td valign="top" width="180" height="1"><img height="1"
                  src="imagens/2.png" width="180" border="0" alt="">
                </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
      <tr>
        <td align="right" width="10"><table cellspacing="0"
            cellpadding="0" border="0" align="left">
            <tbody>
              <tr>
                <td class="ct" valign="top" width="7" height="13"><img
                  height="13" src="imagens/1.png" width="1" border="0" alt="">
                </td>
              </tr>
              <tr>
                <td class="cp" valign="top" width="7" height="12"><img
                  height="12" src="imagens/1.png" width="1" border="0" alt="">
                </td>
              </tr>
              <tr>
                <td valign="top" width="7" height="1"><img height="1"
                  src="imagens/2.png" width="1" border="0" alt="">
                </td>
              </tr>
            </tbody>
          </table>
        </td>
        <td align="right" width="188">
          <table cellspacing="0" cellpadding="0" border="0">
            <tbody>
              <tr>
                <td class="ct" valign="top" width="7" height="13"><img
                  height="13" src="imagens/1.png" width="1" border="0" alt="">
                </td>
                <td class="ct" valign="top" width="180" height="13">(+)
                  Outros acréscimos</td>
              </tr>
              <tr>
                <td class="cp" valign="top" width="7" height="12"><img
                  height="12" src="imagens/1.png" width="1" border="0" alt="">
                </td>
                <td class="cp" valign="top" align="right" width="180"
                  height="12"></td>
              </tr>
              <tr>
                <td valign="top" width="7" height="1"><img height="1"
                  src="imagens/2.png" width="7" border="0" alt="">
                </td>
                <td valign="top" width="180" height="1"><img height="1"
                  src="imagens/2.png" width="180" border="0" alt="">
                </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
      <tr>
        <td align="right" width="10"><table cellspacing="0"
            cellpadding="0" border="0" align="left">
            <tbody>
              <tr>
                <td class="ct" valign="top" width="7" height="13"><img
                  height="13" src="imagens/1.png" width="1" border="0" alt="">
                </td>
              </tr>
              <tr>
                <td class="cp" valign="top" width="7" height="12"><img
                  height="12" src="imagens/1.png" width="1" border="0" alt="">
                </td>
              </tr>
            </tbody>
          </table>
        </td>
        <td align="right" width="188"><table cellspacing="0"
            cellpadding="0" border="0">
            <tbody>
              <tr>
                <td class="ct" valign="top" width="7" height="13"><img
                  height="13" src="imagens/1.png" width="1" border="0" alt="">
                </td>
                <td class="ct" valign="top" width="180" height="13">(=)
                  Valor cobrado</td>
              </tr>
              <tr>
                <td class="cp" valign="top" width="7" height="12"><img
                  height="12" src="imagens/1.png" width="1" border="0" alt="">
                </td>
                <td class="cp" valign="top" align="right" width="180"
                  height="12"></td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
  <table cellspacing="0" cellpadding="0" width="666" border="0">
    <tbody>
      <tr>
        <td valign="top" width="666" height="1"><img height="1"
          src="imagens/2.png" width="666" border="0" alt="">
        </td>
      </tr>
    </tbody>
  </table>
  <table cellspacing="0" cellpadding="0" border="0">
    <tbody>
      <tr>
        <td class="ct" valign="top" width="7" height="13"><img
          height="13" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="ct" valign="top" width="659" height="13">Sacado</td>
      </tr>
      <tr>
        <td class="cp" valign="top" width="7" height="12"><img
          height="12" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="cp" valign="top" width="659" height="12"><span
          class="campo"> <?php echo $dadosboleto["sacado"]?> </span></td>
      </tr>
    </tbody>
  </table>
  <table cellspacing="0" cellpadding="0" border="0">
    <tbody>
      <tr>
        <td class="cp" valign="top" width="7" height="12"><img
          height="12" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="cp" valign="top" width="659" height="12"><span
          class="campo"> <?php echo $dadosboleto["endereco1"]?> </span></td>
      </tr>
    </tbody>
  </table>
  <table cellspacing="0" cellpadding="0" border="0">
    <tbody>
      <tr>
        <td class="ct" valign="top" width="7" height="13"><img
          height="13" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="cp" valign="top" width="472" height="13"><span
          class="campo"> <?php echo $dadosboleto["endereco2"]?> </span>
        </td>
        <td class="ct" valign="top" width="7" height="13"><img
          height="13" src="imagens/1.png" width="1" border="0" alt="">
        </td>
        <td class="ct" valign="top" width="180" height="13">Cód. baixa</td>
      </tr>
      <tr>
        <td valign="top" width="7" height="1"><img height="1"
          src="imagens/2.png" width="7" border="0" alt="">
        </td>
        <td valign="top" width="472" height="1"><img height="1"
          src="imagens/2.png" width="472" border="0" alt="">
        </td>
        <td valign="top" width="7" height="1"><img height="1"
          src="imagens/2.png" width="7" border="0" alt="">
        </td>
        <td valign="top" width="180" height="1"><img height="1"
          src="imagens/2.png" width="180" border="0" alt="">
        </td>
      </tr>
    </tbody>
  </table>
  <table cellspacing="0" cellpadding="0" border="0" width="666">
    <tbody>
      <tr>
        <td class="ct" width="7" height="12"></td>
        <td class="ct" width="409">Sacador/Avalista</td>
        <td class="ct" width="250"><div align="right">
            Autenticação mecânica - <b class="cp">Ficha de Compensação</b>
          </div>
        </td>
      </tr>
      <tr>
        <td class="ct" colspan="3"></td>
      </tr>
    </tbody>
  </table>
  <table style="margin-top:15px;margin-left:10px;" cellspacing="0" cellpadding="0" width="666" border="0">
    <tbody>
      <tr>
        <td valign="bottom" align="left" height="50"><?php fbarcode($dadosboleto["codigo_barras"]); ?>
        </td>
      </tr>
    </tbody>
  </table>
  <table style="margin-top:5px;" cellspacing="0" cellpadding="0" width="666" border="0">
    <tr>
      <td class="ct" width="666"></td>
    </tr>
    <tbody>
      <tr>
        <td class="ct" width="666"><div align="right">Corte na
            linha pontilhada</div></td>
      </tr>
      <tr>
        <td class="ct" width="666"><img height="1" src="imagens/6.png"
          width="665" border="0" alt="">
        </td>
      </tr>
    </tbody>
  </table>
</body>
</html>