<?php
namespace BoletoPHP\Types;

use BoletoPHP\Types\Beneficiario;

class BeneficiarioTest extends \PHPUnit_Framework_TestCase
{

    public function testHydrate()
    {
        $beneficiario = new Beneficiario();
        $beneficiario->hydrate([
            'cedente' => 'Coloque a Razão Social da sua empresa aqui',
            'cidade_uf' => 'Cidade / Estado',
            'cpf_cnpj' => '0212164-545/0000',
            'endereco' => 'Coloque o endereço da sua empresa aqui',
            'agencia' => 1234,
            'conta' => 123,
            'conta_dv' => 0,
            'conta_cedente' => 123456,
            'nosso_numero1' => '000',
            'nosso_numero_const1' => '1',
            'nosso_numero2' => '000',
            'nosso_numero_const2' => '4',
            'nosso_numero3' => '000000019'
        ]);

        $this->assertEquals('Cidade', $beneficiario->getCidade());
        $this->assertEquals('Estado', $beneficiario->getEstado());
        $this->assertEquals(123, $beneficiario->getConta());
        $this->assertEquals(0, $beneficiario->getContaDv());
        $this->assertEquals(123456, $beneficiario->getContaCedente());
        $this->assertEquals(1234, $beneficiario->getAgencia());
        $this->assertEquals('Coloque o endereço da sua empresa aqui', $beneficiario->getEndereco());
        $this->assertEquals('0212164-545/0000', $beneficiario->getCpfCpnj());
        $this->assertEquals('Coloque a Razão Social da sua empresa aqui', $beneficiario->getRazaoSocial());
    }

    public function testGetCidadeEstado()
    {
        $beneficiario = new Beneficiario();
        $beneficiario->setCidade('Goiânia')
                     ->setEstado('Goiás');

        $this->assertEquals('Goiânia / Goiás', $beneficiario->getCidadeEstado());
    }

}
