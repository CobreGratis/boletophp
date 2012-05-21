<?php

require_once "../include/funcoes.php";

class TestFatorVencimento extends PHPUnit_Framework_TestCase {
    function testeDataPreenchida(){
        $this->assertTrue(fator_vencimento("24/03/2012") !== '+5282');
        $this->assertEquals(fator_vencimento("24/03/2012"), "5282");
        $this->assertEquals(fator_vencimento("14/06/2010"), "4633");
    }

    function testeDataVazia(){
        $this->assertEquals(fator_vencimento(""), "0000");
    }

    function testeDataAbaixoDaDataMinima_07_10_97(){
        $this->setExpectedException('InvalidArgumentException');
        fator_vencimento("07/10/1995");
    }
}

?>
