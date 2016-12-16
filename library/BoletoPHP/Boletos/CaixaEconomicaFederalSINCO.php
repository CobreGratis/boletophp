<?php

namespace BoletoPHP\Boletos;

class CaixaEconomicaFederalSINCO extends Boleto
{
    public $params         = array(
        'data_vencimento',
        'valor_boleto',
        'agencia',
        'conta',
        'conta_dv',
        'carteira',
        'conta_cedente',
        'conta_cedente_dv',
        'campo_fixo_obrigatorio',
        'inicio_nosso_numero',
        'nosso_numero',
        'identificacao',
        'cpf_cnpj',
        'endereco',
        'cidade_uf',
        'cedente',
        'especie',
        'quantidade',
        'numero_documento',
        'sacado',
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
        'endereco1',
        'endereco2',
    );
    protected $codigobanco = 104;
    private $nummoeda      = 9;
    private $nossonumero_dv;
    private $campo_livre;

    public function __construct($params, Pagador $pagador = null,
                                Beneficiario $beneficiario = null)
    {
        parent::__construct($params, $pagador, $beneficiario);
        $this->geraNossoNumeroDv();
        $this->geraNossoNumero();
        $this->geraCampoLivre();
        $this->geraDv();
        $this->geraLinha();
        $this->geraAgenciaCodigo();
        $this->geraLinhaDigitavel();
        $this->geraCodigoDeBarras();
    }

    protected function geraContaCedente()
    {
        $this->conta_cedente = $this->formataNumero($this->beneficiario->getContaCedente(),
            6, 0);
    }

    protected function geraContaCedenteDv()
    {
        $this->conta_cedente_dv = $this->formataNumero($this->beneficiario->getContaCedenteDv(),
            1, 0);
    }

    protected function geraNNum()
    {
        $this->nnum = $this->params['inicio_nosso_numero'].$this->formataNumero($this->params['nosso_numero'],
                17, 0);
    }

    protected function geraNossoNumero()
    {
        $this->nossonumero = substr($this->nossonumero_dv, 0, 18).'-'.substr($this->nossonumero_dv,
                18, 1);
    }

    protected function geraDv()
    {
        $this->dv = $this->digitoVerificadorBarra("{$this->codigobanco}{$this->nummoeda}{$this->fator_vencimento}{$this->valor}{$this->campo_livre}",
            9, 0);
    }

    protected function geraLinha()
    {
        $this->linha = "{$this->codigobanco}{$this->nummoeda}{$this->dv}{$this->fator_vencimento}{$this->valor}{$this->campo_livre}";
    }

    private function geraNossoNumeroDv()
    {
        $dv_nosso_numero      = $this->digitoVerificadorNossonumero($this->nnum);
        $this->nossonumero_dv = "{$this->nnum}{$dv_nosso_numero}";
    }

    private function geraCampoLivre()
    {
        $this->campo_livre = "{$this->params['campo_fixo_obrigatorio']}{$this->conta_cedente}{$this->nnum}";
    }
}