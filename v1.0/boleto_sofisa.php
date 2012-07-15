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
// | William Schultz e Leandro Maniezo que por sua vez foi derivado do	  |
// | PHPBoleto de João Prado Maia e Pablo Martins F. Costa                |
// |                                                                      |
// | Se vc quer colaborar, nos ajude a desenvolver p/ os demais bancos :-)|
// | Acesse o site do Projeto BoletoPhp: www.boletophp.com.br             |
// +----------------------------------------------------------------------+

// +----------------------------------------------------------------------+
// | Equipe Coordenação Projeto BoletoPhp: <boletophp@boletophp.com.br>   |
// | Desenvolvimento Boleto Bradesco: Ramon Soares                        |
// +----------------------------------------------------------------------+

/**
 * Boleto Sofisa para carteira 121
 *
 * @package     BoletoPhp
 * @author      Diego M. Agudo ( diego@agudo.eti.br )
 */


// DADOS DO BOLETO PARA O SEU CLIENTE
$taxa_boleto                        = 0;
$data_venc                          = $data_vencimento;
$valor_cobrado                      = $valor_boleto_aux;
$valor_cobrado                      = str_replace(",", ".",$valor_cobrado);
$valor_boleto                       = number_format($valor_cobrado+$taxa_boleto, 2, ',', '');

$dadosboleto["nosso_numero"]        = $nosso_numero;                // Nosso numero DV - REGRA: Máximo de 10 caracteres!
$dadosboleto["numero_documento"]    = $dadosboleto["nosso_numero"]; // Num do pedido ou do documento = Nosso numero
$dadosboleto["data_vencimento"]     = $data_venc;                   // Data de Vencimento do Boleto - REGRA: Formato DD/MM/AAAA

$dadosboleto["data_documento"]      = $data_geracao;    // Data de processamento do boleto (opcional)
$dadosboleto["data_processamento"]  = $data_geracao;    // Data de processamento do boleto (opcional)

$dadosboleto["valor_boleto"]        = $valor_boleto;    // Valor do Boleto - REGRA: Com vírgula e sempre com duas casas depois da virgula

// DADOS DO SEU CLIENTE
$dadosboleto["sacado"]              = $sacado_nome;
$dadosboleto["endereco1"]           = $sacado_endereco;
$dadosboleto["endereco2"]           = $sacado_cidade_uf_cep;

// INFORMACOES PARA O CLIENTE

$dadosboleto["demonstrativo1"]      = "";
$dadosboleto["demonstrativo2"]      = "";
$dadosboleto["demonstrativo3"]      = "";

$dadosboleto["instrucoes1"]         = "- Sr. Caixa, não receber após o vencimento.";
# $dadosboleto["instrucoes2"]         = "- Receber até 10 dias após o vencimento";
# $dadosboleto["instrucoes3"]         = "- Em caso de dúvidas entre em contato conosco: xxxx@xxxx.com.br";
# $dadosboleto["instrucoes4"]         = "&nbsp; Emitido pelo sistema Projeto BoletoPhp - www.boletophp.com.br";

// DADOS OPCIONAIS DE ACORDO COM O BANCO OU CLIENTE
$dadosboleto["quantidade"]          = "001";
$dadosboleto["valor_unitario"]      = $valor_boleto;
$dadosboleto["aceite"]              = "";
$dadosboleto["especie"]             = "R$";
$dadosboleto["especie_doc"]         = "REC";


// ---------------------- DADOS FIXOS DE CONFIGURAÇÃO DO SEU BOLETO --------------- //


// DADOS DA SUA CONTA
$dadosboleto["agencia"]             = $agencia;     // Num da agencia, sem digito
$dadosboleto["agencia_dv"]          = $agencia_dv;  // Digito do Num da agencia
$dadosboleto["conta"]               = $conta;       // Num da conta, sem digito
$dadosboleto["conta_dv"]            = $conta_dv;    // Digito do Num da conta

// DADOS PERSONALIZADOS
$dadosboleto["conta_cedente"]       = $dadosboleto["conta"];    // ContaCedente do Cliente, sem digito (Somente Números)
$dadosboleto["conta_cedente_dv"]    = $dadosboleto["conta_dv"]; // Digito da ContaCedente do Cliente
$dadosboleto["carteira"]            = "121";                    // Código da Carteira: 121

// SEUS DADOS
$dadosboleto["identificacao"]       = $cedente_identificacao;
$dadosboleto["cpf_cnpj"]            = $cedente_cnpj;
$dadosboleto["endereco"]            = $cedente_endereco;
$dadosboleto["cidade_uf"]           = $cedente_cidade_uf;
$dadosboleto["cedente"]             = $cedente_razao_soscial;


// NÃO ALTERAR!
include("include/funcoes_sofisa.php"); 
include("include/layout_sofisa.php");
?>
