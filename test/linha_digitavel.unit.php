<?php

require_once "../include/funcoes.php";

class TestLinhaDigitavel extends PHPUnit_Framework_TestCase{

	function testeDigitoVerificador(){
		$dados['codigo_banco']	 	= '104';
		$dados['codigo_moeda']		= '9';
		$dados['dv']				= '1';
		$dados['fator_vencimento']  = '5296';
		$dados['valor'] 		  	= '0000295295';
		$dados['carteira_cobranca'] = '80';
		$dados['nosso_numero'] 		= '19525086';
		$dados['agencia']			= '1565';
		$dados['conta_cedente'] 	= '87000000414';

		$div = monta_linha_digitavel(implode($dados));
		$this->assertEquals($div, '10498.01952 25086.156582 70000.004146 1 52960000295295');
	}

	function testeSIGCB(){
		$dados = Array(
				'codigo_banco' => '104',
				'codigo_moeda' => '9',
				'dv' => '4',
				'fator_vencimento' => '5345',
				'valor' => '0000295295',
				'conta_cedente' => '123456',
				'conta_cedente_dv' => '0',
				'nosso_numero1' => '000',
				'nosso_numero_const1' => '2',
				'nosso_numero2' => '000',
				'nosso_numero_const2' => '4',
				'nosso_numero3' => '000000019',
				'dv_verif_campo_livre' => '0',
			      );

		$div = monta_linha_digitavel(implode($dados));
		$this->assertEquals($div, '10491.23456 60000.200042 00000.001909 4 53450000295295');
	}

}
