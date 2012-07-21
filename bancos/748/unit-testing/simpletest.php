<?php
/**
* @file
* Unit testing.
*/

require_once "../../../unit-testing/boleto.test.php";

class TestOf748 extends BoletoTestCase{
  protected $mockingArguments;

  function mockingArguments() {
    $this->mockingArguments = array(
      array(
        'bank_code' => '748',
        'agencia' => 1234,
        'conta' => 12345,
        'carteira_nosso_numero' => '3-1-18-2',
        'nosso_numero' => '13871',
      ),
    );
  }
}
