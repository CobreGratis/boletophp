<?php

require_once "../include/funcoes_cef.php";

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
	
	
}