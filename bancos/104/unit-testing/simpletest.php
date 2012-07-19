<?php
/**
* @file
* Unit testing.
*/

require_once "../../../unit-testing/boleto.test.php";

class TestOf104 extends BoletoTestCase{
  protected $mockingArguments;

  function mockingArguments() {
    $this->mockingArguments = array(
      'bank_code' => '104',
      'agencia' => 1234,
      'conta' => 12345678901,
      'carteira_nosso_numero' => '80',
      'nosso_numero' => '12345678',
    );
  }
}
