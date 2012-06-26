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
// | PHPBoleto de Jo�o Prado Maia e Pablo Martins F. Costa                |
// |                                                                      |
// | Se vc quer colaborar, nos ajude a desenvolver p/ os demais bancos :-)|
// | Acesse o site do Projeto BoletoPhp: www.boletophp.com.br             |
// +----------------------------------------------------------------------+

// +----------------------------------------------------------------------+
// | Equipe Coordena��o Projeto BoletoPhp: <boletophp@boletophp.com.br>   |
// | Desenvolvimento Boleto BANCOOB/SICOOB: Marcelo de Souza              |
// | Ajuste de algumas rotinas: Anderson Nuernberg                        |
// +----------------------------------------------------------------------+

include_once 'funcoes.php';

$codigobanco = "756";
$codigo_banco_com_dv = geraCodigoBanco($codigobanco);
$nummoeda = "9";
$fator_vencimento = fator_vencimento($dadosboleto["data_vencimento"]);

//valor tem 10 digitos, sem virgula
$valor = formata_numero($dadosboleto["valor_boleto"],10,0,"valor");
//agencia � sempre 4 digitos
$agencia = formata_numero($dadosboleto["agencia"],4,0);
//conta � sempre 8 digitos
$conta = formata_numero($dadosboleto["conta"],8,0);

$carteira = $dadosboleto["carteira"];

//Zeros: usado quando convenio de 7 digitos
$livre_zeros='000000';
$modalidadecobranca = $dadosboleto["modalidade_cobranca"];
$numeroparcela      = $dadosboleto["numero_parcela"];

$convenio = formata_numero($dadosboleto["convenio"],7,0);

//agencia e conta
$agencia_codigo = $agencia ." / ". $convenio;

// Nosso n�mero de at� 8 d�gitos - 2 digitos para o ano e outros 6 numeros sequencias por ano 
// deve ser gerado no programa boleto_bancoob.php
$nossonumero = formata_numero($dadosboleto["nosso_numero"],8,0);
$campolivre  = "$modalidadecobranca$convenio$nossonumero$numeroparcela";

$dv=digitoVerificador_barra("$codigobanco$nummoeda$fator_vencimento$valor$carteira$agencia$campolivre");

$linha="$codigobanco$nummoeda$dv$fator_vencimento$valor$carteira$agencia$campolivre";

$dadosboleto["codigo_barras"] = $linha;
$dadosboleto["linha_digitavel"] = monta_linha_digitavel($linha);
$dadosboleto["agencia_codigo"] = $agencia_codigo;
$dadosboleto["nosso_numero"] = $nossonumero;
$dadosboleto["codigo_banco_com_dv"] = $codigo_banco_com_dv;

function geraCodigoBanco($numero) {
    $parte1 = substr($numero, 0, 3);
    $parte2 = modulo_11($parte1);
    return $parte1 . "-" . $parte2;
}

?>
