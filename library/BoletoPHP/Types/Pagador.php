<?php
namespace BoletoPHP\Types;

class Pagador
{
    /**
     * @var string $nome
     */
    private $nome;

    /**
     * @var string $cpfCnpj
     */
    private $cpfCnpj;

    /**
     * @var string $endereco
     */
    private $endereco;

    /**
     * @var string $cidade
     */
    private $cidade;

    /**
     * @var string $estado
     */
    private $estado;

    /**
     * @var string $cep
     */
    private $cep;

    /**
     * hidrata objeto recebendo array de dados
     * @param array $dados
     * @return Pagador
     */
    public function hydrate(array $dados)
    {
        $enderecoArray = explode(' - ', $dados['endereco2']);
        $enderecoArray[2] = str_replace('CEP: ', '', end($enderecoArray));

        return $this->setNome($dados['pagador_nome'])
                    ->setCpfCnpj($dados['pagador_cpf_cnpj'])
                    ->setEndereco($dados['endereco1'])
                    ->setCidade($enderecoArray[0])
                    ->setEstado($enderecoArray[1])
                    ->setCep($enderecoArray[2]);
    }

    public function getEnderecoSegundaLinha()
    {
        return $this->getCidade() . ' - ' .
                $this->getEstado() . ' - CEP: ' .
                $this->getCep();
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
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     *
     * @return static
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return string
     */
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * @param string $cep
     *
     * @return static
     */
    public function setCep($cep)
    {
        $this->cep = $cep;
        return $this;
    }

    /**
     * @return string
     */
    public function getCpfCnpj()
    {
        return $this->cpfCnpj;
    }

    /**
     * @param string $cpfCnpj
     *
     * @return static
     */
    public function setCpfCnpj($cpfCnpj)
    {
        $this->cpfCnpj = $cpfCnpj;
        return $this;
    }
}
