<?php

require_once "../include/funcoes_cef.php";

class TestModulo10 extends PHPUnit_Framework_TestCase {
    
	function testeDigitoVerificador(){
		
		$dados['codigo_banco']	 	= '104';
		$dados['codigo_moeda']		= '9';
		$dados['fator_vencimento']  = '5296';
		$dados['valor'] 		  	= '0000295295';
		$dados['carteira_cobranca'] = '80';
		$dados['nosso_numero'] 		= '19525086';
		$dados['agencia']			= '1565';
		$dados['conta_cedente'] 	= '87000000414';
		
		//Retorna digito verificador do codigo de barra - Trocar nome do metodo para retornaDigitoVerificador
		$dv = digitoVerificador_barra(implode($dados));
		
		
		$this->assertEquals($dv, 1);
         
        
    }
    
}


?>
