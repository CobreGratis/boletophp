<?php

require_once "../include/funcoes.php";

class TestDigitoCodigoBarra extends PHPUnit_Framework_TestCase {

	
    function testeCEF(){
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
	
    function testeSIGCB(){
        $dados['codigo_banco']	 	= '104';
        $dados['codigo_moeda']		= '9';
        $dados['fator_vencimento']  = '5338';
        $dados['valor'] 		  	= '0000295295';
        $dados['conta_cedente']     = '123456';
        $dados['conta_cedente_dv']	= '0';
        $dados['nosso_numero1']			= '000';
        $dados['nosso_numero_const1']	= '2';
        $dados['nosso_numero2']			= '000';
        $dados['nosso_numero_const2']	= '4';
        $dados['nosso_numero3']		= '000000019';
        $dados['dv_verif_campo_livre']	= '0';

        //Retorna digito verificador do codigo de barra - Trocar nome do metodo para retornaDigitoVerificador
        $dv = digitoVerificador_barra(implode($dados));

        $this->assertEquals($dv, 6);
    }
}


?>
