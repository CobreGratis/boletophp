<?php

require_once "../include/funcoes_cef.php";

class TestModulo10 extends PHPUnit_Framework_TestCase {

    function testeDigitoVerificador(){
        $this->assertEquals(modulo_10("104980195"), 2);

        $this->assertEquals(modulo_10("2508615658"), 2);
        $this->assertEquals(modulo_10("7000000414"), 6); 

    }
    function testeDigitoVerificadorErro(){
        $this->assertNotEquals(modulo_10("558855888"), 2);
    }

}


?>
