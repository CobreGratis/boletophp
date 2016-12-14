<?php

namespace BoletoPHP\Types;

/**
 * Beneficiario class - Classe para representação de beneficiario
 */
class Beneficiario
{
    /**
     * Nome razão social completo
     * @var string
     */
    private $razaoSocial;

    /**
     * Endereço completo
     * @var string
     */
    private $endereco;

    /**
     * Cidade de beneficiario
     * @var string
     */
    private $cidade;

    /**
     * Estado do beneficiário - ex: SP
     * @var string
     */
    private $estado;

    /**
     * CPNPJ completo - ex: 0212164-545/0000
     * @var string
     */
    private $cpf_cpnj;

    /**
     * Numero de agencia
     * @var int
     */
    private $agencia;

    /**
     * Numero de conta
     * @var int
     */
    private $conta;

    /**
     * Digito verificador de conta
     * @var int
     */
    private $contaDv;

    /**
     * Conta cedente
     * @var int
     */
    private $contaCedente;

    /**
     * Conta cedente dv
     * @var int
     */
    private $contaCedenteDv;

    /**
     * Numero do beneficiario 1
     * @var string
     */
    private $nossoNumero1;

    /**
     * Numero do beneficiario 2
     * @var string
     */
    private $nossoNumero2;

    /**
     * Numero do beneficiario 3
     * @var string
     */
    private $nossoNumero3;

    /**
     * Nosso numero constant 1
     * @var string
     */
    private $numeroConst1;

    /**
     * Nosso numero constant 2
     * @var string
     */
    private $numeroConst2;

    /**
     * hidrata objeto recebendo array de dados
     * @param array $dados
     * @return Beneficiario
     */
    public function hydrate(array $dados)
    {
        $cidadeUfArray = explode(' / ', $dados['cidade_uf']);
        return $this->setEndereco($dados['endereco'])
                ->setRazaoSocial($dados['cedente'])
                ->setAgencia($dados['agencia'])
                ->setConta($dados['conta'])
                ->setContaCedente($dados['conta_cedente'])
                ->setContaCedenteDv(array_key_exists('conta_cedente_dv', $dados)
                            ? $dados['conta_cedente_dv'] : 0)
                ->setContaDv($dados['conta_dv'])
                ->setCpfCpnj($dados['cpf_cnpj'])
                ->setCidade(current($cidadeUfArray))
                ->setEstado(end($cidadeUfArray))
                ->setNossoNumero1(array_key_exists('nosso_numero1', $dados) ? $dados['nosso_numero1']
                            : null)
                ->setNossoNumero2(array_key_exists('nosso_numero2', $dados) ? $dados['nosso_numero2']
                            : null)
                ->setNossoNumero3(array_key_exists('nosso_numero3', $dados) ? $dados['nosso_numero3']
                            : null)
                ->setNumeroConst1(array_key_exists('nosso_numero_const1', $dados)
                            ? $dados['nosso_numero_const1'] : null)
                ->setNumeroConst2(array_key_exists('nosso_numero_const2', $dados)
                            ? $dados['nosso_numero_const2'] : null);
    }

    public function getCidadeEstado()
    {
        return $this->getCidade().' / '.$this->getEstado();
    }

    /**
     * @return string
     */
    public function getRazaoSocial()
    {
        return $this->razaoSocial;
    }

    /**
     * @param string $razaoSocial
     *
     * @return static
     */
    public function setRazaoSocial($razaoSocial)
    {
        $this->razaoSocial = $razaoSocial;
        return $this;
    }

    /**
     * @return string
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * @param string $endereco
     *
     * @return static
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
        return $this;
    }

    /**
     * @return string
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * @param string $cidade
     *
     * @return static
     */
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
        return $this;
    }

    /**
     * @return string
     */
    public function getCpfCpnj()
    {
        return $this->cpf_cpnj;
    }

    /**
     * @param string $cpf_cpnj
     *
     * @return static
     */
    public function setCpfCpnj($cpf_cpnj)
    {
        $this->cpf_cpnj = $cpf_cpnj;
        return $this;
    }

    /**
     * @return int
     */
    public function getAgencia()
    {
        return $this->agencia;
    }

    /**
     * @param int $agencia
     *
     * @return static
     */
    public function setAgencia($agencia)
    {
        $this->agencia = $agencia;
        return $this;
    }

    /**
     * @return int
     */
    public function getConta()
    {
        return $this->conta;
    }

    /**
     * @param int $conta
     *
     * @return static
     */
    public function setConta($conta)
    {
        $this->conta = $conta;
        return $this;
    }

    /**
     * @return string
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param string $estado
     *
     * @return static
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
        return $this;
    }

    /**
     * @return int
     */
    public function getContaDv()
    {
        return $this->contaDv;
    }

    /**
     * @param int $contaDv
     *
     * @return static
     */
    public function setContaDv($contaDv)
    {
        $this->contaDv = $contaDv;
        return $this;
    }

    /**
     * @return string
     */
    public function getNossoNumero1()
    {
        return $this->nossoNumero1;
    }

    /**
     * @param string $nossoNumero1
     *
     * @return static
     */
    public function setNossoNumero1($nossoNumero1)
    {
        $this->nossoNumero1 = $nossoNumero1;
        return $this;
    }

    /**
     * @return string
     */
    public function getNossoNumero2()
    {
        return $this->nossoNumero2;
    }

    /**
     * @param string $nossoNumero2
     *
     * @return static
     */
    public function setNossoNumero2($nossoNumero2)
    {
        $this->nossoNumero2 = $nossoNumero2;
        return $this;
    }

    /**
     * @return string
     */
    public function getNossoNumero3()
    {
        return $this->nossoNumero3;
    }

    /**
     * @param string $nossoNumero3
     *
     * @return static
     */
    public function setNossoNumero3($nossoNumero3)
    {
        $this->nossoNumero3 = $nossoNumero3;
        return $this;
    }

    /**
     * @return string
     */
    public function getNumeroConst1()
    {
        return $this->numeroConst1;
    }

    /**
     * @param string $numeroConst1
     *
     * @return static
     */
    public function setNumeroConst1($numeroConst1)
    {
        $this->numeroConst1 = $numeroConst1;
        return $this;
    }

    /**
     * @return string
     */
    public function getNumeroConst2()
    {
        return $this->numeroConst2;
    }

    /**
     * @param string $numeroConst2
     *
     * @return static
     */
    public function setNumeroConst2($numeroConst2)
    {
        $this->numeroConst2 = $numeroConst2;
        return $this;
    }

    /**
     * @return int
     */
    public function getContaCedente()
    {
        return $this->contaCedente;
    }

    /**
     * @param int $contaCedente
     *
     * @return static
     */
    public function setContaCedente($contaCedente)
    {
        $this->contaCedente = $contaCedente;
        return $this;
    }

    /**
     * @return int
     */
    public function getContaCedenteDv()
    {
        return $this->contaCedenteDv;
    }

    /**
     * @param int $contaCedenteDv
     *
     * @return static
     */
    public function setContaCedenteDv($contaCedenteDv)
    {
        $this->contaCedenteDv = $contaCedenteDv;
        return $this;
    }

    public function toArray()
    {
        return [
            'endereco' => $this->getEndereco(),
            'cidade_uf' => $this->getCidade().'/'.$this->getEstado(),
            'cedente' => $this->getRazaoSocial(),
            'agencia' => $this->getAgencia(),
            'conta' => $this->getConta(),
            'conta_dv' => $this->getContaDv(),
            'conta_cedente' => $this->getContaCedente(),
            'nosso_numero1' => $this->getNossoNumero1(),
            'nosso_numero_const1' => $this->getNumeroConst1(),
            'nosso_numero2' => $this->getNossoNumero2(),
            'nosso_numero_const2' => $this->getNumeroConst2(),
            'nosso_numero3' => $this->getNossoNumero3(),
            'demonstrativo1' => $this->getDemonstrativo1(),
            'demonstrativo2' => $this->getDemonstrativo2(),
            'demonstrativo3' => $this->getDemonstrativo3()
        ];
    }
}