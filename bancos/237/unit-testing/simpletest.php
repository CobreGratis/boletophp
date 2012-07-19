<?php
/**
* @file
* Unit testing.
*/

require_once "../../../unit-testing/boleto.test.php";

class TestOf237 extends BoletoTestCase{
  protected $mockingArguments;

  function mockingArguments() {
    $this->mockingArguments = array(
      array(
        'bank_code' => '237',
        'agencia' => 1234,
        'carteira' => '18',
        'nosso_numero' => '12345678901',
      ),
    );
  }
}
