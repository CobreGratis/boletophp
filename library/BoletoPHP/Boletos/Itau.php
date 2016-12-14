<?php

namespace BoletoPHP\Boletos;

class Itau extends Boleto
{
    public $params = array(
        'data_vencimento',
        'valor_boleto',
        'carteira',
        'inicio_nosso_numero',
        'nosso_numero',
        'identificacao',
        'cedente',
        'especie',
        'quantidade',
        'numero_documento',
        'demonstrativo1',
        'demonstrativo2',
        'demonstrativo3',
        'data_documento',
        'especie_doc',
        'aceite',
        'data_processamento',
        'carteira',
        'valor_unitario',
        'instrucoes1',
        'instrucoes2',
        'instrucoes3',
        'instrucoes4',
    );

    protected $codigobanco = 341;
    private $nummoeda = 9;

    public function  __construct($params, Pagador $pagador = null, Beneficiario $beneficiario = null)
    {
        parent::__construct($params, $pagador, $beneficiario);
        $this->geraNossoNumero();
        $this->geraDv();
        $this->geraLinha();
        $this->geraAgenciaCodigo();
        $this->geraLinhaDigitavel();
        $this->geraCodigoDeBarras();
    }

    protected function geraContaCedente()
    {
        $this->conta_cedente = $this->formataNumero($this->beneficiario->getContaCedente(), 11, 0);
    }

    protected function geraContaCedenteDv()
    {
        $this->conta_cedente_dv = $this->formataNumero($this->params['conta_cedente_dv'], 1, 0);
    }

    protected function geraNNum()
    {
        $this->nnum = $this->params['inicio_nosso_numero'] . $this->formataNumero($this->params['nosso_numero'], 8, 0);
    }

    protected function geraNossoNumero()
    {
        $this->nossonumero = $this->nnum .'-'. $this->digitoVerificadorNossonumero($this->nnum);
    }

    protected function geraDv()
    {
        $this->dv = $this->digitoVerificadorBarra("{$this->codigobanco}{$this->nummoeda}{$this->fator_vencimento}{$this->valor}{$this->nnum}{$this->agencia}{$this->conta_cedente}", 9, 0);
    }

    protected function geraLinha()
    {
        $this->linha = "{$this->codigobanco}{$this->nummoeda}{$this->dv}{$this->fator_vencimento}{$this->valor}{$this->nnum}{$this->agencia}{$this->conta_cedente}";
    }
}
