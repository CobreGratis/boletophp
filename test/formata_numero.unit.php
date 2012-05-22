<?php

require_once "../include/funcoes.php";

class TestFormataNumero extends PHPUnit_Framework_TestCase {

    function testeGeral(){
        $this->assertEquals(formata_numero("12345", 7), "0012345");
    }
    function testeValor(){
        $this->assertEquals(formata_numero("123,45", 7), "0012345");
    }

}


?>
