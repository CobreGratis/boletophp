<?php
namespace BoletoPHP\Types;

use BoletoPHP\Types\Pagador;

class PagadorTest extends \PHPUnit_Framework_TestCase
{

    public function testHydrate()
    {
        $pagador = new Pagador();
        $pagador->hydrate([
            'pagador_nome' => 'Nome do Pagador Aqui',
            'pagador_cpf_cnpj' => '265.857.562-90',
            'endereco1' => 'Endereço do seu Cliente',
            'endereco2' => 'Cidade - Estado - CEP: 00000-000'
        ]);

        $this->assertEquals('Cidade', $pagador->getCidade());
        $this->assertEquals('Estado', $pagador->getEstado());
        $this->assertEquals('00000-000', $pagador->getCep());
        $this->assertEquals('Endereço do seu Cliente', $pagador->getEndereco());
        $this->assertEquals('265.857.562-90', $pagador->getCpfCnpj());
        $this->assertEquals('Nome do Pagador Aqui', $pagador->getNome());
    }

    public function testGetEnderecoSegundaLinha()
    {
        $pagador = new Pagador();
        $pagador->setCidade('Goiânia')
                 ->setEstado('Goiás')
                 ->setCep('74000-000');

        $this->assertEquals('Goiânia - Goiás - CEP: 74000-000', $pagador->getEnderecoSegundaLinha());
    }

}
