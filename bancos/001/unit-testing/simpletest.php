<?php
/**
* @file
* Unit testing.
*/

require_once "../../../unit-testing/boleto.test.php";

class TestOf001 extends BoletoTestCase{
  protected $mockingArguments;

  function mockingArguments() {
    $this->mockingArguments = array(
      array(
        'bank_code' => '001',
        'agencia' => 1234,
        'conta' => 12345678,
        // Carteira 18 and Convenio number with 6 digits.
        'carteira_nosso_numero' => '222222-333333',
        'carteira' => '18',
      ),
      array(
        'bank_code' => '001',
        'agencia' => 1234,
        'conta' => 12345678,
        // Carteira 18 and Convenio number with 6 digits and servico 21.
        'carteira_nosso_numero' => '222222-333333-21',
        'carteira' => '18-1234',
      ),
      array(
        'bank_code' => '001',
        'agencia' => 1234,
        'conta' => 12345678,
        // Carteira 18 and Convenio number with 7 digits.
        'carteira_nosso_numero' => '1234567-333333',
        'carteira' => '18-1234',
      ),
      array(
        'bank_code' => '001',
        'agencia' => 1234,
        'conta' => 12345678,
        // Carteira 18 and Convenio number with 7 digits and servico 21.
        'carteira_nosso_numero' => '1234567-333333-21',
        'carteira' => '18-1234',
      ),
      array(
        'bank_code' => '001',
        'agencia' => 1234,
        'conta' => 12345678,
        // Carteira 18 and Convenio number with 8 digits.
        'carteira_nosso_numero' => '12345678-333333',
        'carteira' => '18-1234',
      ),
      array(
        'bank_code' => '001',
        'agencia' => 1234,
        'conta' => 12345678,
        // Carteira 18 and Convenio number with 8 digits and servico 21.
        'carteira_nosso_numero' => '12345678-333333-21',
        'carteira' => '18-1234',
      ),
    );
  }
}
