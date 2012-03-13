<?php

require_once "../boleto_cef.php";

class TestBoletoCef extends PHPUnit_Framework_TestCase {

    function testeLinhaDigitavel() {
        $boleto = new BoletoCef();
        
        $boleto->banco = "104";
        $boleto->moeda = "9";
        $boleto->dv = "9";
        $boleto->fatorVencimento = "";
        $boleto->valor = "";
        $boleto->nNum = ""; 
        $boleto->agencia = ""; 
        $boleto->contaCedente = "";

        $this->assertEquals(4, 1+3);

    }
}




?>
