<?php

namespace BoletoPHP\Boletos;

class CaixaEconomicaFederalTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        $dias_de_prazo_para_pagamento = 5;
        $taxa_boleto = 2.95;
        $valor_cobrado = "2950,00"; // Valor - REGRA: Sem pontos na milhar e tanto faz com "." ou "," ou com 1 ou 2 ou sem casa decimal
        $valor_cobrado = str_replace(",", ".",$valor_cobrado);
        $valor_boleto=number_format($valor_cobrado+$taxa_boleto, 2, ',', '');
        $time = 1342356619;

        $params = array(
            'data_vencimento' => date("d/m/Y", $time + ($dias_de_prazo_para_pagamento * 86400)),
            'valor_boleto' => number_format($valor_cobrado+$taxa_boleto, 2, ',', ''),
            'agencia' => 1565,
            'conta' => 13877,
            'conta_dv' => 4,
            'carteira' => "SR",
            'conta_cedente' => 87000000414,
            'conta_cedente_dv' => 3,
            'inicio_nosso_numero' => 80,
            'nosso_numero' => 19525086,
            'identificacao' => 'BoletoPhp - Código Aberto de Sistema de Boletos',
            'cpf_cnpj' => '',
            'endereco' => 'Coloque o endereço da sua empresa aqui',
            'cidade_uf' => 'Cidade / Estado',
            'cedente' => 'Coloque a Razão Social da sua empresa aqui',
            'especie' => 'R$',
            'quantidade' => '',
            'numero_documento' => '27.030195.10',
            'sacado' => 'Nome do seu Cliente',
            'demonstrativo1' => 'Pagamento de Compra na Loja Nonononono',
            'demonstrativo2' => 'Mensalidade referente a nonon nonooon nononon<br>Taxa bancária - R$ ' . number_format($taxa_boleto, 2, ',', ''),
            'demonstrativo3' =>"BoletoPhp - http://www.boletophp.com.br",
            'data_documento' => date("d/m/Y", $time),
            'especie_doc' => '',
            'aceite' => '',
            'data_processamento' => date("d/m/Y", $time),
            'carteira' => 'SR',
            'valor_unitario' => '',
            'instrucoes1' => '- Sr. Caixa, cobrar multa de 2% após o vencimento',
            'instrucoes2' => '- Receber até 10 dias após o vencimento',
            'instrucoes3' => '- Em caso de dúvidas entre em contato conosco: xxxx@xxxx.com.br',
            'instrucoes4' => '&nbsp; Emitido pelo sistema Projeto BoletoPhp - www.boletophp.com.br',
            'endereco1' => 'Endereço do seu Cliente',
            'endereco2' => 'Cidade - Estado -  CEP: 00000-000'

        );
        $this->boleto = new CaixaEconomicaFederal($params);
    }

    public function testGetViewVars()
    {
        $view_vars = $this->boleto->getViewVars();
        $this->assertEquals($view_vars['identificacao'], 'BoletoPhp - Código Aberto de Sistema de Boletos');
        $this->assertEquals($view_vars['linha_digitavel'], '10498.01952 25086.156582 70000.004146 5 54000000295295');
        $this->assertEquals($view_vars['valor_boleto'], '2952,95');
        $this->assertEquals($view_vars['cpf_cnpj'], '');
        $this->assertEquals($view_vars['endereco'], 'Coloque o endereço da sua empresa aqui');
        $this->assertEquals($view_vars['cidade_uf'], 'Cidade / Estado');
        $this->assertEquals($view_vars['codigo_banco_com_dv'], '104-0');
        $this->assertEquals($view_vars['cedente'], 'Coloque a Razão Social da sua empresa aqui');
        $this->assertEquals($view_vars['agencia_codigo'], '1565 / 87000000414-3');
        $this->assertEquals($view_vars['especie'], 'R$');
        $this->assertEquals($view_vars['quantidade'], '');
        $this->assertEquals($view_vars['nosso_numero'], '8019525086-7');
        $this->assertEquals($view_vars['numero_documento'], '27.030195.10');
        $this->assertEquals($view_vars['data_vencimento'], '20/07/2012');
        $this->assertEquals($view_vars['sacado'], 'Nome do seu Cliente');
        $this->assertEquals($view_vars['demonstrativo1'], 'Pagamento de Compra na Loja Nonononono');
        $this->assertEquals($view_vars['demonstrativo2'], 'Mensalidade referente a nonon nonooon nononon<br>Taxa bancária - R$ 2,95');
        $this->assertEquals($view_vars['demonstrativo3'], 'BoletoPhp - http://www.boletophp.com.br');
        $this->assertEquals($view_vars['data_documento'], '15/07/2012');
        $this->assertEquals($view_vars['especie_doc'], '');
        $this->assertEquals($view_vars['aceite'], '');
        $this->assertEquals($view_vars['data_processamento'], '15/07/2012');
        $this->assertEquals($view_vars['carteira'], 'SR');
        $this->assertEquals($view_vars['valor_unitario'], '');
        $this->assertEquals($view_vars['instrucoes1'], '- Sr. Caixa, cobrar multa de 2% após o vencimento');
        $this->assertEquals($view_vars['instrucoes2'], '- Receber até 10 dias após o vencimento');
        $this->assertEquals($view_vars['instrucoes3'], '- Em caso de dúvidas entre em contato conosco: xxxx@xxxx.com.br');
        $this->assertEquals($view_vars['instrucoes4'], '&nbsp; Emitido pelo sistema Projeto BoletoPhp - www.boletophp.com.br');
        $this->assertEquals($view_vars['endereco1'], 'Endereço do seu Cliente');
        $this->assertEquals($view_vars['endereco1'], 'Endereço do seu Cliente');
        $this->assertEquals($view_vars['endereco2'], 'Cidade - Estado -  CEP: 00000-000');
        $this->assertEquals($view_vars['codigo_barras'], file_get_contents('fixtures/codigo_de_barras_caixa_economica_federal'));
    }
}
