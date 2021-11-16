<?php

// +----------------------------------------------------------------------+
// | BoletoPhp - Versão Beta                                              |
// +----------------------------------------------------------------------+
// | Este arquivo esté disponível sob a Licença GPL disponível pela Web   |
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
// | William Schultz e Leandro Maniezo que por sua vez foi derivado do	  |
// | PHPBoleto de João Prado Maia e Pablo Martins F. Costa		  		  |
// | 																	  |
// | Se vc quer colaborar, nos ajude a desenvolver p/ os demais bancos :-)|
// | Acesse o site do Projeto BoletoPhp: www.boletophp.com.br             |
// +----------------------------------------------------------------------+

// +----------------------------------------------------------------------+
// | Equipe Coordenação Projeto BoletoPhp: <boletophp@boletophp.com.br>   |
// | Desenvolvimento Boleto Itaú: Glauber Portella		                  |
// | Conversão para POO: Roberto Griel Filho      		                  |
// +----------------------------------------------------------------------+

    require_once($_SERVER['DOCUMENT_ROOT'] . '/boleto_itau.php');

    $boleto = new BoletoItau();

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="Generator" content="Projeto BoletoPHP - www.boletophp.com.br - Licença GPL" />
    <title><?php echo $dados["identificacao"]; ?></title>
    <style>
        .instrucoes {
            max-width: 600px;
            font-family: 'Arial', Helvetica, sans-serif;
            font-weight: bold;
            font-size: 10px;
        }
        .empresa {
            display: flex;
            flex-direction: row;
        }
        .empresa img {
            width: auto;
            height: 41px;
        }
        .empresa .text {
            flex-direction: column;
            margin: 0 10px;
        }
        .empresa .text p {
            margin: 0;
        }

        .boleto img {
            border: none;
        }
        tr {
            line-height: 0px;
        }

        .cp {  font: bold 10px Arial; color: black}
        .ti {  font: 9px Arial, Helvetica, sans-serif}
        .ld { font: bold 15px Arial; color: #000000}
        .ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
        .cn { FONT: 9px Arial; COLOR: black }
        .bc { font: bold 20px Arial; color: #000000 }
        .ld2 { font: bold 12px Arial; color: #000000 }
    </style>
</head>
<body>

    <div class="instrucoes">
        <p>Instruções de Impressão</p>
        <ul>
            <li>Imprima em impressora jato de tinta (ink jet) ou laser em qualidade normal ou alta (Não use modo econômico).</li>
            <li>Utilize folha A4 (210 x 29"7" mm) ou Carta (216 x 279 mm) e margens mínimas à esquerda e à direita do formulário.</li>
            <li>Corte na linha indicada. Não rasure, risque, fure ou dobre a região onde se encontra o código de barras.</li>
            <li>Caso não apareça o código de barras no final, clique em F5 para atualizar esta tela.</li>
            <li>Caso tenha problemas ao imprimir, copie a sequencia numérica abaixo e pague no caixa eletrônico ou no internet banking:</li>
        </ul>
        <p><b>Linha digitável:</b> <?php echo $dados["linha_digitavel"]?></p>
        <p><b>Valor do Boleto:</b> <?php echo $dados["valor_boleto"]?></p>
        <img src="imagens/6.png" alt="Linha pontilhada" />

        <div class="empresa">
            <img src="imagens/logo_empresa.png" alt=<?php echo $dados["identificacao"]; ?> />
            <div class="text">
                <p><?php echo $dados["identificacao"]; ?></p>
                <p><?php echo isset($dados["cpf_cnpj"]) ? $dados["cpf_cnpj"] : '' ?></p>
                <p><?php echo $dados["endereco"]; ?></p>
                <p><?php echo $dados["cidade_uf"]; ?></p>
            </div>
        </div>
    </div>

    <div class="boleto">
        <table cellspacing="0" cellpadding="0" width="666">
            <tr>
                <td class="cp" width="150">
                    <span class="campo">
                        <img src="imagens/logoitau.jpg" width="150" height="40" />
                    </span>
                </td>
                <td width="3" valign="bottom">
                    <img height="22" src="imagens/3.png" width="2" />
                </td>
                <td class="cp"t width=58 valign=bottom>
                    <div style="align: center;">
                        <span class=bc>
                            <?php echo $dados["codigo_banco_com_dv"]?>
                        </span>
                    </div>
                </td>
                <td width="3" valign="bottom">
                    <img height="22" src="imagens/3.png" width="2" />
                </td>
                <td class=ld style="align:right;" width="453" valign="bottom">
                    <span class=ld>
                        <span class="campotitulo">
                            <?php echo $dados["linha_digitavel"]?>
                        </span>
                    </span>
                </td>
            </tr>
        <tbody>
            <tr>
                <td colspan="5">
                    <img height="2" src="imagens/2.png" width="666" />
                </td>
            </tr>
        </tbody>
    </table>

    <table cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <td class="ct" valign="top" width="7" height="13">
                    <img height="13" src="imagens/1.png" width="1" />
                </td>
                <td class="ct" valign="top" width="298" height="13">
                    <span>Cedente</span>
                </td>
                <td class="ct" valign="top" width="7" height="13">
                    <img height="13" src="imagens/1.png" width="1" />
                </td>
                <td class="ct" valign="top" width="126" height="13">
                    <span>Agência/Código do Cedente</span>
                </td>
                <td class="ct" valign="top" width="7" height="13">
                    <img height="13" src="imagens/1.png" width="1" />
                </td>
                <td class="ct" valign="top" width="34" height="13">
                    <span>Espécie</span>
                </td>
                <td class="ct" valign="top" width="7" height="13">
                    <img height="13" src="imagens/1.png" width="1" />
                </td>
                <td class="ct" valign="top" width="53" height="13">
                    <span>Quantidade</span>
                </td>
                <td class="ct" valign="top" width="7" height="13">
                    <img height="13" src="imagens/1.png" width="1" />
                </td
                ><td class="ct" valign="top" width="120" height="13">
                    <span>Nosso número</span>
                </td>
            </tr>
            <tr>
                <td class="cp" valign="top" width="7" height="12">
                    <img height="12" src="imagens/1.png" width="1" />
                </td>
                <td class="cp" valign="top" width=298 height="12">
                    <span class="campo"><?php echo $dados["cedente"]; ?></span>
                </td>
                <td class="cp" valign="top" width="7" height="12">
                    <img height="12" src="imagens/1.png" width="1" />
                </td>
                <td class="cp" valign="top" width="126" height="12">
                    <span class="campo"><?php echo $dados["agencia_codigo"]?></span>
                </td>
                <td class="cp" valign="top" width="7" height="12">
                    <img height="12" src="imagens/1.png" width="1" />
                </td>
                <td class="cp" valign="top" width="34" height="12">
                    <span class="campo"><?php echo $dados["especie"]?></span>
                </td>
                <td class="cp" valign="top" width="7" height="12">
                    <img height="12" src="imagens/1.png" width="1" />
                </td>
                <td class="cp" valign="top" width="53" height="12">
                    <span class="campo"><?php echo $dados["quantidade"]?></span>
                </td>
                <td class="cp" valign="top" width="7" height="12">
                    <img height="12" src="imagens/1.png" width="1" />
                </td>
                <td class="cp" valign="top" style="align: right;" width="120" height="12">
                    <span class="campo"><?php echo $dados["nosso_numero"]?></span>
                </td>
            </tr>
            <tr>
                <td valign="top" width="7" height="1">
                    <img height="1" src="imagens/2.png" width="7" />
                </td>
                <td valign="top" width=298 height="1">
                    <img height="1" src="imagens/2.png" width=298 />
                </td>
                <td valign="top" width="7" height="1">
                    <img height="1" src="imagens/2.png" width="7" />
                </td>
                <td valign="top" width="126" height="1">
                    <img height="1" src="imagens/2.png" width="126" />
                </td>
                <td valign="top" width="7" height="1">
                    <img height="1" src="imagens/2.png" width="7" />
                </td>
                <td valign="top" width="34" height="1">
                    <img height="1" src="imagens/2.png" width="34" />
                </td>
                <td valign="top" width="7" height="1">
                    <img height="1" src="imagens/2.png" width="7" />
                </td>
                <td valign="top" width="53" height="1">
                    <img height="1" src="imagens/2.png" width="53" />
                </td>
                <td valign="top" width="7" height="1">
                    <img height="1" src="imagens/2.png" width="7" />
                </td>
                <td valign="top" width="120" height="1">
                    <img height="1" src="imagens/2.png" width="120" />
                </td>
            </tr>
        </tbody>
    </table>

    <table cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <td class="ct" valign="top" width="7" height="13">
                    <img height="13" src="imagens/1.png" width="1" />
                </td>
                <td class="ct" valign="top" colspan="3" height="13">
                    <span>Número do documento</span>
                </td>
                <td class="ct" valign="top" width="7" height="13">
                    <img height="13" src="imagens/1.png" width="1" />
                </td>
                <td class="ct" valign="top" width=132 height="13">
                    <span>CPF/CNPJ</span>
                </td>
                <td class="ct" valign="top" width="7" height="13">
                    <img height="13" src="imagens/1.png" width="1" />
                </td>
                <td class="ct" valign="top" width=134 height="13">
                    <span>Vencimento</span>
                </td>
                <td class="ct" valign="top" width="7" height="13">
                    <img height="13" src="imagens/1.png" width="1" />
                </td>
                <td class="ct" valign="top" width="180" height="13">
                    <span>Valor documento</span>
                </td>
            </tr>
            <tr>
                <td class="cp" valign="top" width="7" height="12">
                    <img height="12" src="imagens/1.png" width="1" />
                </td>
                <td class="cp" valign="top" colspan="3" height="12">
                    <span class="campo"><?php echo $dados["numero_documento"]?></span>
                </td>
                <td class="cp" valign="top" width="7" height="12">
                    <img height="12" src="imagens/1.png" width="1" />
                </td>
                <td class="cp" valign="top" width=132 height="12">
                    <span class="campo"><?php echo $dados["cpf_cnpj"]?></span>
                </td>
                <td class="cp" valign="top" width="7" height="12">
                    <img height="12" src="imagens/1.png" width="1" />
                </td>
                <td class="cp" valign="top" width=134 height="12">
                    <span class="campo"><?php echo $dados["data_vencimento"]?></span>
                </td>
                <td class="cp" valign="top" width="7" height="12">
                    <img height="12" src="imagens/1.png" width="1" />
                </td>
                <td class="cp" valign="top" style="align:right;" width="180" height="12">
                    <span class="campo"><?php echo $dados["valor_boleto"]?></span>
                </td>
            </tr>
            <tr>
                <td valign="top" width="7" height="1">
                    <img height="1" src="imagens/2.png" width="7" />
                </td>
                <td valign="top" width="113" height="1">
                    <img height="1" src="imagens/2.png" width="113" />
                </td>
                <td valign="top" width="7" height="1">
                    <img height="1" src="imagens/2.png" width="7" />
                </td>
                <td valign="top" width="72" height="1">
                    <img height="1" src="imagens/2.png" width="72" />
                </td>
                <td valign="top" width="7" height="1">
                    <img height="1" src="imagens/2.png" width="7" />
                </td>
                <td valign="top" width=132 height="1">
                    <img height="1" src="imagens/2.png" width=132 />
                </td>
                <td valign="top" width="7" height="1">
                    <img height="1" src="imagens/2.png" width="7" />
                </td>
                <td valign="top" width=134 height="1">
                    <img height="1" src="imagens/2.png" width=134 />
                </td>
                <td valign="top" width="7" height="1">
                    <img height="1" src="imagens/2.png" width="7" />
                </td>
                <td valign="top" width="180" height="1">
                    <img height="1" src="imagens/2.png" width="180" />
                </td>
            </tr>
        </tbody>
    </table>

    <table cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <td class="ct" valign="top" width="7" height="13">
                    <img height="13" src="imagens/1.png" width="1" />
                </td>
                <td class="ct" valign="top" width="113" height="13">
                    <span>(-) Desconto / Abatimentos</span>
                </td>
                <td class="ct" valign="top" width="7" height="13">
                    <img height="13" src="imagens/1.png" width="1" />
                </td>
                <td class="ct" valign="top" width="112" height="13">
                    <span>(-) Outras deduções</span>
                </td>
                <td class="ct" valign="top" width="7" height="13">
                    <img height="13" src="imagens/1.png" width="1" />
                </td>
                <td class="ct" valign="top" width="113" height="13">
                    <span>(+) Mora / Multa<span>
                </td>
                <td class="ct" valign="top" width="7" height="13">
                    <img height="13" src="imagens/1.png" width="1" />
                </td>
                <td class="ct" valign="top" width="113" height="13">
                    <span>(+) Outros acréscimos</span>
                </td>
                <td class="ct" valign="top" width="7" height="13">
                    <img height="13" src="imagens/1.png" width="1" />
                </td>
                <td class="ct" valign="top" width="180" height="13">
                    <span>(=) Valor cobrado</span>
                </td>
            </tr>
            <tr>
                <td class="cp" valign="top" width="7" height="12">
                    <img height="12" src="imagens/1.png" width="1" />
                </td>
                <td class="cp" valign="top" style="align:right;" width="113" height="12"></td>
                <td class="cp" valign="top" width="7" height="12">
                    <img height="12" src="imagens/1.png" width="1" />
                </td>
                <td class="cp" valign="top" style="align:right;" width="112" height="12"></td>
                <td class="cp" valign="top" width="7" height="12">
                    <img height="12" src="imagens/1.png" width="1" />
                </td>
                <td class="cp" valign="top" style="align:right;" width="113" height="12"></td>
                <td class="cp" valign="top" width="7" height="12">
                    <img height="12" src="imagens/1.png" width="1" />
                </td>
                <td class="cp" valign="top" style="align:right;" width="113" height="12"></td>
                <td class="cp" valign="top" width="7" height="12">
                    <img height="12" src="imagens/1.png" width="1" />
                </td>
                <td class="cp" valign="top" style="align:right;" width="180" height="12"></td>
            </tr>
            <tr>
                <td valign="top" width="7" height="1">
                    <img height="1" src="imagens/2.png" width="7" />
                </td>
                <td valign="top" width="113" height="1">
                    <img height="1" src="imagens/2.png" width="113" />
                </td>
                <td valign="top" width="7" height="1">
                    <img height="1" src="imagens/2.png" width="7" />
                </td>
                <td valign="top" width="112" height="1">
                    <img height="1" src="imagens/2.png" width="112" />
                </td>
                <td valign="top" width="7" height="1">
                    <img height="1" src="imagens/2.png" width="7" />
                </td>
                <td valign="top" width="113" height="1">
                    <img height="1" src="imagens/2.png" width="113" />
                </td>
                <td valign="top" width="7" height="1">
                    <img height="1" src="imagens/2.png" width="7" />
                </td>
                <td valign="top" width="113" height="1">
                    <img height="1" src="imagens/2.png" width="113" />
                </td>
                <td valign="top" width="7" height="1">
                    <img height="1" src="imagens/2.png" width="7" />
                </td>
                <td valign="top" width="180" height="1">
                    <img height="1" src="imagens/2.png" width="180" />
                </td>
            </tr>
        </tbody>
    </table>

    <table cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <td class="ct" valign="top" width="7" height="13">
                    <img height="13" src="imagens/1.png" width="1" />
                </td>
                <td class="ct" valign="top" width="659" height="13">
                    <span>Sacado</span>
                </td>
            </tr>
            <tr>
                <td class="cp" valign="top" width="7" height="12">
                    <img height="12" src="imagens/1.png" width="1" />
                </td>
                <td class="cp" valign="top" width="659" height="12">
                    <span class="campo"><?php echo $dados["sacado"]?></span>
                </td>
            </tr>
            <tr>
                <td valign="top" width="7" height="1">
                    <img height="1" src="imagens/2.png" width="7" />
                </td>
                <td valign="top" width="659" height="1">
                    <img height="1" src="imagens/2.png" width="659" />
                </td>
            </tr>
        </tbody>
    </table>

    <table cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <td class="ct" width="7" height="12"></td>
                <td class="ct" width="564">
                    <span>Demonstrativo</span>
                </td>
                <td class="ct" width="7" height="12"></td>
                <td class="ct" width="88" >
                    <span>Autenticação mecânica</span>
                </td>
            </tr>
            <tr>
                <td  width="7"></td>
                <td class="cp" width="564">
                    <span class="campo">
                        <?php for ($i = 1; $i <= 3; $i++) {
                            echo $dados["demonstrativo$i"] . "<br/>";
                        } ?>
                    </span>
                </td>
                <td width="7"></td>
                <td width="88"></td>
            </tr>
        </tbody>
    </table>

    <table cellspacing="0" cellpadding="0" width="666">
        <tbody>
            <tr>
                <td width="7"></td>
                <td width="500" class="cp"><br/><br/><br/></td>
                <td width="159"></td>
            </tr>
        </tbody>
    </table>

    <table cellspacing="0" cellpadding="0" width="666">
        <tr>
            <td class="ct" width="666"></td>
        </tr>
        <tbody>
            <tr>
                <td class="ct" width="666">
                    <div style="align:right;">Corte na linha pontilhada</div>
                </td>
            </tr>
            <tr>
                <td class="ct" width="666">
                    <img height="1" src="imagens/6.png" width="665" />
                </td>
            </tr>
        </tbody>
    </table>
    <br/>
    <table cellspacing="0" cellpadding="0" width="666">
        <tr>
            <td class="cp" width="150">
                <span class="campo"><img src="imagens/logoitau.jpg" width="150" height="40" /></span>
            </td>
            <td width="3" valign="bottom">
                <img height="22" src="imagens/3.png" width="2" />
            </td>
            <td class="cpt" width="58" valign="bottom">
                <div style="align:center;">
                    <span class="bc"><?php echo $dados["codigo_banco_com_dv"]?></span>
                </div>
            </td>
            <td width="3" valign="bottom">
                <img height="22" src="imagens/3.png" width="2" />
            </td>
            <td class="ld" style="align:right;" width="453" valign="bottom">
                <span class="ld">
                    <span class="campotitulo">
                        <?php echo $dados["linha_digitavel"]?>
                    </span>
                </span>
            </td>
        </tr>
        <tbody>
            <tr>
                <td colspan="5">
                    <img height="2" src="imagens/2.png" width="666" />
                </td>
            </tr>
        </tbody>
    </table>
    
    <table cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <td class="ct" valign="top" width="7" height="13">
                    <img height="13" src="imagens/1.png" width="1" />
                </td>
                <td class="ct" valign="top" width="472" height="13">
                    <span>Local de pagamento</span>
                </td>
                <td class="ct" valign="top" width="7" height="13">
                    <img height="13" src="imagens/1.png" width="1" />
                </td>
                <td class="ct" valign="top" width="180" height="13">
                    <span>Vencimento</span>
                </td>
            </tr>
            <tr>
                <td class="cp" valign="top" width="7" height="12">
                    <img height="12" src="imagens/1.png" width="1" />
                </td>
                <td class="cp" valign="top" width="472" height="12">
                    <span>Pagável em qualquer Banco até o vencimento</span>
                </td>
                <td class="cp" valign="top" width="7" height="12">
                    <img height="12" src="imagens/1.png" width="1" />
                </td>
                <td class="cp" valign="top" style="align:right;" width="180" height="12">
                    <span class="campo"><?php echo $dados["data_vencimento"]?></span>
                </td>
            </tr>
            <tr>
                <td valign="top" width="7" height="1">
                    <img height="1" src="imagens/2.png" width="7" />
                </td>
                <td valign="top" width="472" height="1">
                    <img height="1" src="imagens/2.png" width="472" />
                </td>
                <td valign="top" width="7" height="1">
                    <img height="1" src="imagens/2.png" width="7" />
                </td>
                <td valign="top" width="180" height="1">
                    <img height="1" src="imagens/2.png" width="180" />
                </td>
            </tr>
        </tbody>
    </table>

    <table cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <td class="ct" valign="top" width="7" height="13">
                    <img height="13" src="imagens/1.png" width="1" />
                </td>
                <td class="ct" valign="top" width="472" height="13">
                    <span>Cedente</span>
                </td>
                <td class="ct" valign="top" width="7" height="13">
                    <img height="13" src="imagens/1.png" width="1" />
                </td>
                <td class="ct" valign="top" width="180" height="13">
                    <span>Agência/Código Cedente</span>
                </td>
            </tr>
            <tr>
                <td class="cp" valign="top" width="7" height="12">
                    <img height="12" src="imagens/1.png" width="1" />
                </td>
                <td class="cp" valign="top" width="472" height="12">
                    <span class="campo"><?php echo $dados["cedente"]?> </span>
                </td>
                <td class="cp" valign="top" width="7" height="12">
                    <img height="12" src="imagens/1.png" width="1" />
                </td>
                <td class="cp" valign="top" style="align;right;" width="180" height="12">
                    <span class="campo"><?php echo $dados["agencia_codigo"]?></span>
                </td>
            </tr>
            <tr>
                <td valign="top" width="7" height="1">
                    <img height="1" src="imagens/2.png" width="7">
                </td>
                <td valign="top" width="472" height="1">
                    <img height="1" src="imagens/2.png" width="472">
                </td>
                <td valign="top" width="7" height="1">
                    <img height="1" src="imagens/2.png" width="7">
                </td>
                <td valign="top" width="180" height="1">
                    <img height="1" src="imagens/2.png" width="180">
                </td>
            </tr>
        </tbody>
    </table>

    <table cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <td class="ct" valign="top" width="7" height="13">
                    <img height="13" src="imagens/1.png" width="1" />
                </td>
                <td class="ct" valign="top" width="113" height="13">
                    <span>Data do documento</span>
                </td>
                <td class="ct" valign="top" width="7" height="13">
                    <img height="13" src="imagens/1.png" width="1" />
                </td>
                <td class="ct" valign="top" width="153" height="13">
                    <span>N<sup>o</sup> documento</span>
                </td>
                <td class="ct" valign="top" width="7" height="13">
                    <img height="13" src="imagens/1.png" width="1" />
                </td>
                <td class="ct" valign="top" width="62" height="13">
                    <span>Espécie doc.</span>
                </td>
                <td class="ct" valign="top" width="7" height="13">
                    <img height="13" src="imagens/1.png" width="1" />
                </td>
                <td class="ct" valign="top" width="34" height="13">
                    <span>Aceite</span>
                </td>
                <td class="ct" valign="top" width="7" height="13">
                    <img height="13" src="imagens/1.png" width="1" />
                </td>
                <td class="ct" valign="top" width="82" height="13">
                    <span>Data processamento</span>
                </td>
                <td class="ct" valign="top" width="7" height="13">
                    <img height="13" src="imagens/1.png" width="1" />
                </td>
                <td class="ct" valign="top" width="180" height="13">
                    <span>Nosso número</span>
                </td>
            </tr>
            <tr>
                <td class="cp" valign="top" width="7" height="12">
                    <img height="12" src="imagens/1.png" width="1" />
                </td>
                <td class="cp" valign="top" width="113" height="12">
                    <div style="align:left;">
                        <span class="campo"><?php echo $dados["data_documento"]?></span>
                    </div>
                </td>
                <td class="cp" valign="top" width="7" height="12">
                    <img height="12" src="imagens/1.png" width="1" />
                </td>
                <td class="cp" valign="top" width="153" height="12">
                    <span class="campo"><?php echo $dados["numero_documento"]?></span>
                </td>
                <td class="cp" valign="top" width="7" height="12">
                    <img height="12" src="imagens/1.png" width="1" />
                </td>
                <td class="cp" valign="top" width="62" height="12">
                    <div style="align:left;">
                        <span class="campo"><?php echo $dados["especie_doc"]?></span>
                    </div>
                </td>
                <td class="cp" valign="top" width="7" height="12">
                    <img height="12" src="imagens/1.png" width="1" />
                </td>
                <td class="cp" valign="top" width="34" height="12">
                    <div style="align:left;">
                        <span class="campo"><?php echo $dados["aceite"]?></span>
                    </div>
                </td>
                <td class="cp" valign="top" width="7" height="12">
                    <img height="12" src="imagens/1.png" width="1" />
                </td>
                <td class="cp" valign="top" width="82" height="12">
                    <div style="align:left;">
                        <span class="campo"><?php echo $dados["data_processamento"]?></span>
                    </div>
                </td>
                <td class="cp" valign="top" width="7" height="12">
                    <img height="12" src="imagens/1.png" width="1" />
                </td>
                <td class="cp" valign="top" style="align:right;" width="180" height="12">
                    <span class="campo"><?php echo $dados["nosso_numero"]?></span>
                </td>
            </tr>
            <tr>
                <td valign="top" width="7" height="1">
                    <img height="1" src="imagens/2.png" width="7">
                </td>
                <td valign="top" width="113" height="1">
                    <img height="1" src="imagens/2.png" width="113">
                </td>
                <td valign="top" width="7" height="1">
                    <img height="1" src="imagens/2.png" width="7">
                </td>
                <td valign="top" width="153" height="1">
                    <img height="1" src="imagens/2.png" width="153">
                </td>
                <td valign="top" width="7" height="1">
                    <img height="1" src="imagens/2.png" width="7">
                </td>
                <td valign="top" width="62" height="1">
                    <img height="1" src="imagens/2.png" width="62">
                </td>
                <td valign="top" width="7" height="1">
                    <img height="1" src="imagens/2.png" width="7">
                </td>
                <td valign="top" width="34" height="1">
                    <img height="1" src="imagens/2.png" width="34">
                </td>
                <td valign="top" width="7" height="1">
                    <img height="1" src="imagens/2.png" width="7">
                </td>
                <td valign="top" width="82" height="1">
                    <img height="1" src="imagens/2.png" width="82">
                </td><td valign="top" width="7" height="1">
                    <img height="1" src="imagens/2.png" width="7">
                </td>
                <td valign="top" width="180" height="1">
                    <img height="1" src="imagens/2.png" width="180">
                </td>
            </tr>
        </tbody>
    </table>

    <table cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <td class="ct" valign="top" width="7" height="13">
                    <img height="13" src="imagens/1.png" width="1" />
                </td>
                <td class="ct" valign="top" colspan="3" height="13">
                    <span>Uso do banco</span>
                </td>
                <td class="ct" valign="top" height="13" width="7">
                    <img height="13" src="imagens/1.png" width="1" />
                </td>
                <td class="ct" valign="top" width="83" height="13">
                    <span>Carteira</span>
                </td>
                <td class="ct" valign="top" height="13" width="7">
                    <img height="13" src="imagens/1.png" width="1" />
                </td>
                <td class="ct" valign="top" width="53" height="13">
                    <span>Espécie</span>
                </td>
                <td class="ct" valign="top" height="13" width="7">
                    <img height="13" src="imagens/1.png" width="1" />
                </td>
                <td class="ct" valign="top" width="123" height="13">
                    <span>Quantidade</span>
                </td>
                <td class="ct" valign="top" height="13" width="7">
                    <img height="13" src="imagens/1.png" width="1" />
                </td>
                <td class="ct" valign="top" width="72" height="13">
                    <span>Valor Documento</span>
                </td>
                <td class="ct" valign="top" width="7" height="13">
                    <img height="13" src="imagens/1.png" width="1" />
                </td>
                <td class="ct" valign="top" width="180" height="13">
                    <span>(=) Valor documento</span>
                </td>
            </tr>
            <tr>
                <td class="cp" valign="top" width="7" height="12">
                    <img height="12" src="imagens/1.png" width="1" />
                </td>
                <td valign="top" class="cp" height="12" colspan="3">
                    <div style="align:left;"></div>
                </td>
                <td class="cp" valign="top" width="7" height="12">
                    <img height="12" src="imagens/1.png" width="1" />
                </td>
                <td class="cp" valign="top" width=83>
                    <div style="align:left;">
                        <span class="campo"><?php echo $dados["carteira"]?></span>
                    </div>
                </td>
                <td class="cp" valign="top" width="7" height="12">
                    <img height="12" src="imagens/1.png" width="1" />
                </td>
                <td class="cp" valign="top" width=53>
                    <div style="align:left;">
                        <span class="campo"><?php echo $dados["especie"]?></span>
                    </div>
                </td>
                <td class="cp" valign="top" width="7" height="12">
                    <img height="12" src="imagens/1.png" width="1" />
                </td>
                <td class="cp" valign="top" width=123>
                    <span class="campo"><?php echo $dados["quantidade"]?></span>
                </td>
                <td class="cp" valign="top" width="7" height="12">
                    <img height="12" src="imagens/1.png" width="1" />
                </td>
                <td class="cp" valign="top" width=72>
                    <span class="campo"><?php echo $dados["valor_unitario"]?></span>
                </td>
                <td class="cp" valign="top" width="7" height="12">
                    <img height="12" src="imagens/1.png" width="1" />
                </td>
                <td class="cp" valign="top" style="align:right;" width="180" height="12">
                    <span class="campo"><?php echo $dados["valor_boleto"]?></span>
                </td>
            </tr>
            <tr>
                <td valign="top" width="7" height="1">
                    <img height="1" src="imagens/2.png" width="7" />
                </td>
                <td valign="top" width="7" height="1">
                    <img height="1" src="imagens/2.png" width="75" />
                </td>
                <td valign="top" width="7" height="1">
                    <img height="1" src="imagens/2.png" width="7" />
                </td>
                <td valign="top" width="31" height="1">
                    <img height="1" src="imagens/2.png" width="31" />
                </td>
                <td valign="top" width="7" height="1">
                    <img height="1" src="imagens/2.png" width="7" />
                </td>
                <td valign="top" width="83" height="1">
                    <img height="1" src="imagens/2.png" width="83" />
                </td>
                <td valign="top" width="7" height="1">
                    <img height="1" src="imagens/2.png" width="7" />
                </td>
                <td valign="top" width="53" height="1">
                    <img height="1" src="imagens/2.png" width="53" />
                </td>
                <td valign="top" width="7" height="1">
                    <img height="1" src="imagens/2.png" width="7" />
                </td>
                <td valign="top" width="123" height="1">
                    <img height="1" src="imagens/2.png" width="123" />
                </td>
                <td valign="top" width="7" height="1">
                    <img height="1" src="imagens/2.png" width="7" />
                </td>
                <td valign="top" width="72" height="1">
                    <img height="1" src="imagens/2.png" width="72" />
                </td>
                <td valign="top" width="7" height="1">
                    <img height="1" src="imagens/2.png" width="7" />
                </td>
                <td valign="top" width="180" height="1">
                    <img height="1" src="imagens/2.png" width="180" />
                </td>
            </tr>
        </tbody>
    </table>

    <table cellspacing="0" cellpadding="0" width="666">
        <tbody>
            <tr>
                <td style="align:right;" width="10">
                    <table cellspacing="0" cellpadding="0" style="align:left;">
                        <tbody>
                            <tr>
                                <td class="ct" valign="top" width="7" height="13">
                                    <img height="13" src="imagens/1.png" width="1" />
                                </td>
                            </tr>
                            <tr>
                                <td class="cp" valign="top" width="7" height="12">
                                    <img height="12" src="imagens/1.png" width="1" />
                                </td>
                            </tr>
                            <tr>
                                <td valign="top" width="7" height="1">
                                    <img height="1" src="imagens/2.png" width="1" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td valign="top" width="468" rowspan="5">
                    <span class=ct>Instruções (Texto de responsabilidade do cedente)</span>
                    <br><br>
                    <span class="cp">
                        <span class=campo>
                            <?php

                                for ($i = 1; $i <= 4; $i++) {
                                    echo $dados["instrucoes$i"] . "<br/>";
                                }

                            ?>
                        </span>
                        <br><br>
                    </span>
                </td>
                <td style="align:right;" width="188">
                    <table cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <td class="ct" valign="top" width="7" height="13">
                                    <img height="13" src="imagens/1.png" width="1" />
                                </td>
                                <td class="ct" valign="top" width="180" height="13">
                                    <span>(-) Desconto / Abatimentos</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="cp" valign="top" width="7" height="12">
                                    <img height="12" src="imagens/1.png" width="1" />
                                </td>
                                <td class="cp" valign="top" style="align:right;" width="180" height="12"></td>
                            </tr>
                            <tr>
                                <td valign="top" width="7" height="1">
                                    <img height="1" src="imagens/2.png" width="7" />
                                </td>
                                <td valign="top" width="180" height="1">
                                    <img height="1" src="imagens/2.png" width="180" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="align:right;" width="10">
                    <table cellspacing="0" cellpadding="0" style="align:left;">
                        <tbody>
                            <tr>
                                <td class="ct" valign="top" width="7" height="13">
                                    <img height="13" src="imagens/1.png" width="1" />
                                </td>
                            </tr>
                            <tr>
                                <td class="cp" valign="top" width="7" height="12">
                                    <img height="12" src="imagens/1.png" width="1" />
                                </td>
                            </tr>
                            <tr>
                                <td valign="top" width="7" height="1">
                                    <img height="1" src="imagens/2.png" width="1" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td style="align:right;" width="188">
                    <table cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <td class="ct" valign="top" width="7" height="13">
                                    <img height="13" src="imagens/1.png" width="1" />
                                </td>
                                <td class="ct" valign="top" width="180" height="13">
                                    <span>(-) Outras deduções</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="cp" valign="top" width="7" height="12">
                                    <img height="12" src="imagens/1.png" width="1" />
                                </td>
                                <td class="cp" valign="top" style="align:right;" width="180" height="12"></td>
                            </tr>
                            <tr>
                                <td valign="top" width="7" height="1">
                                    <img height="1" src="imagens/2.png" width="7" />
                                </td>
                                <td valign="top" width="180" height="1">
                                    <img height="1" src="imagens/2.png" width="180" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="align:right;" width="10">
                    <table cellspacing="0" cellpadding="0" style="align:left;">
                        <tbody>
                            <tr>
                                <td class="ct" valign="top" width="7" height="13">
                                    <img height="13" src="imagens/1.png" width="1" />
                                </td>
                            </tr>
                            <tr>
                                <td class="cp" valign="top" width="7" height="12">
                                    <img height="12" src="imagens/1.png" width="1" />
                                </td>
                            </tr>
                            <tr>
                                <td valign="top" width="7" height="1">
                                    <img height="1" src="imagens/2.png" width="1" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td style="align:right;" width="188">
                    <table cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <td class="ct" valign="top" width="7" height="13">
                                    <img height="13" src="imagens/1.png" width="1" />
                                </td>
                                <td class="ct" valign="top" width="180" height="13">
                                    <span>(+) Mora / Multa</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="cp" valign="top" width="7" height="12">
                                    <img height="12" src="imagens/1.png" width="1" />
                                </td>
                                <td class="cp" valign="top" style="align:right;" width="180" height="12"></td>
                            </tr>
                            <tr>
                                <td valign="top" width="7" height="1">
                                    <img height="1" src="imagens/2.png" width="7" />
                                </td>
                                <td valign="top" width="180" height="1">
                                    <img height="1" src="imagens/2.png" width="180" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="align:right;" width="10">
                    <table cellspacing="0" cellpadding="0" style="align:left;">
                        <tbody>
                            <tr>
                                <td class="ct" valign="top" width="7" height="13">
                                    <img height="13" src="imagens/1.png" width="1" />
                                </td>
                            </tr>
                            <tr>
                                <td class="cp" valign="top" width="7" height="12">
                                    <img height="12" src="imagens/1.png" width="1" />
                                </td>
                            </tr>
                            <tr>
                                <td valign="top" width="7" height="1">
                                    <img height="1" src="imagens/2.png" width="1" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td style="align:right;" width="188">
                    <table cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <td class="ct" valign="top" width="7" height="13">
                                    <img height="13" src="imagens/1.png" width="1" />
                                </td>
                                <td class="ct" valign="top" width="180" height="13">
                                    <span>(+) Outros acréscimos</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="cp" valign="top" width="7" height="12">
                                    <img height="12" src="imagens/1.png" width="1" />
                                </td>
                                <td class="cp" valign="top" style="align:right;" width="180" height="12"></td>
                            </tr>
                            <tr>
                                <td valign="top" width="7" height="1">
                                    <img height="1" src="imagens/2.png" width="7" />
                                </td>
                                <td valign="top" width="180" height="1">
                                    <img height="1" src="imagens/2.png" width="180" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="align:right;" width="10">
                    <table cellspacing="0" cellpadding="0" style="align:left;">
                        <tbody>
                            <tr>
                                <td class="ct" valign="top" width="7" height="13">
                                    <img height="13" src="imagens/1.png" width="1" />
                                </td>
                            </tr>
                            <tr>
                                <td class="cp" valign="top" width="7" height="12">
                                    <img height="12" src="imagens/1.png" width="1" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td style="align:right;" width="188">
                    <table cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <td class="ct" valign="top" width="7" height="13">
                                    <img height="13" src="imagens/1.png" width="1" />
                                </td>
                                <td class="ct" valign="top" width="180" height="13">
                                    <span>(=) Valor cobrado</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="cp" valign="top" width="7" height="12">
                                    <img height="12" src="imagens/1.png" width="1" />
                                </td>
                                <td class="cp" valign="top" style="align:right;" width="180" height="12"></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    <table cellspacing="0" cellpadding="0" width="666">
        <tbody>
            <tr>
                <td valign="top" width="666" height="1">
                    <img height="1" src="imagens/2.png" width="666" />
                </td>
            </tr>
        </tbody>
    </table>
    <table cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <td class="ct" valign="top" width="7" height="13">
                    <img height="13" src="imagens/1.png" width="1" />
                </td>
                <td class="ct" valign="top" width=659 height="13">
                    <span>Sacado</span>
                </td>
            </tr>
            <tr>
                <td class="cp" valign="top" width="7" height="12">
                    <img height="12" src="imagens/1.png" width="1" />
                </td>
                <td class="cp" valign="top" width=659 height="12">
                    <span class="campo"><?php echo $dados["sacado"]?></span>
                </td>
            </tr>
        </tbody>
    </table>
    <table cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <td class="cp" valign="top" width="7" height="12">
                    <img height="12" src="imagens/1.png" width="1" />
                </td>
                <td class="cp" valign="top" width=659 height="12">
                    <span class="campo"><?php echo $dados["endereco1"]?></span>
                </td>
            </tr>
        </tbody>
    </table>
    <table cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <td class="ct" valign="top" width="7" height="13">
                    <img height="13" src="imagens/1.png" width="1" />
                </td>
                <td class="cp" valign="top" width=472 height="13">
                    <span class="campo"><?php echo $dados["endereco2"]?></span>
                </td>
                <td class="ct" valign="top" width="7" height="13">
                    <img height="13" src="imagens/1.png" width="1" />
                </td>
                <td class="ct" valign="top" width="180" height="13">
                    <span>Cód. baixa</span>
                </td>
            </tr>
            <tr>
                <td valign="top" width="7" height="1">
                    <img height="1" src="imagens/2.png" width="7" />
                </td>
                <td valign="top" width=472 height="1">
                    <img height="1" src="imagens/2.png" width=472 />
                </td>
                <td valign="top" width="7" height="1">
                    <img height="1" src="imagens/2.png" width="7" />
                </td>
                <td valign="top" width="180" height="1">
                    <img height="1" src="imagens/2.png" width="180" />
                </td>
            </tr>
        </tbody>
    </table>
    <table cellspacing="0" cellpadding="0" width="666">
        <tbody>
            <tr>
                <td class="ct" width="7" height="12"></td>
                <td class="ct" width="409">
                    <span>Sacador/Avalista</span>
                </td>
                <td class="ct" width="250">
                    <div style="align:right;">
                        <span>Autenticação mecânica - <b class="cp">Ficha de Compensação</b></span>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="ct" colspan="3"></td>
            </tr>
        </tbody>
    </table>
    <table cellspacing="0" cellpadding="0" width="666">
        <tbody>
            <tr>
                <td valign=bottom style="align:left;" height=50>
                    <?php $boleto->fbarcode($dados["linha_digitavel"]); ?>
                </td>
            </tr>
        </tbody>
    </table>
    <table cellspacing="0" cellpadding="0" width="666">
        <tr>
            <td class="ct" width="666"></td>
        </tr>
        <tbody>
            <tr>
                <td class="ct" width="666">
                    <div style="align:right;">
                        <span>Corte na linha pontilhada</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="ct" width="666">
                    <img height="1" src="imagens/6.png" width="665" />
                </td>
            </tr>
        </tbody>
    </table>
        
    </div>
    
</body>
</html>


