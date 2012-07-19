<?php
/**
* @file
* Unit testing.
*/

require_once "../../../unit-testing/boleto.test.php";

class TestOf341 extends BoletoTestCase{
  protected $mockingArguments;

  function mockingArguments() {
    $this->mockingArguments = array(
      array(
        'bank_code' => '341',
        'agencia' => 1234,
        'carteira' => '157',
      ),
    );
  }
}
