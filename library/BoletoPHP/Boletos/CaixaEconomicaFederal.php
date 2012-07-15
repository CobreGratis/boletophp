<?php

namespace BoletoPHP\Boletos;

class CaixaEconomicaFederal extends Boleto {

    public $params = array(
        'data_vencimento',
        'valor_boleto',
        'agencia',
        'conta',
        'conta_dv',
        'carteira',
        'conta_cedente',
        'conta_cedente_dv',
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
        'endereco2'
    );
    protected $codigobanco = 104;
    private $nummoeda = 9;

    public function  __construct($params) {
        parent::__construct($params);
        $this->geraDv();
        $this->geraLinha();
        $this->geraAgenciaCodigo();
        $this->geraLinhaDigitavel();
        $this->geraCodigoDeBarras();
    }

    public function gerarBoleto() {
        extract($this->getViewVars());
        include dirname(dirname(__FILE__)) . '/views/CaixaEconomicaFederal.php';
    }

    protected function geraContaCedente(){
        $this->conta_cedente = $this->formata_numero($this->params['conta_cedente'], 11, 0);
    }

    protected function geraContaCedenteDv(){
        $this->conta_cedente_dv = $this->formata_numero($this->params['conta_cedente_dv'], 1, 0);
    }

    protected function geraNNum(){
        $this->nnum = $this->params['inicio_nosso_numero'] . $this->formata_numero($this->params['nosso_numero'], 8, 0);
    }

    protected function geraNossoNumero(){
        $this->nossonumero = $this->nnum .'-'. $this->digitoVerificador_nossonumero($this->nnum);
    }

    protected function geraDv(){
        $this->dv = $this->digitoVerificador_barra("{$this->codigobanco}{$this->nummoeda}{$this->fator_vencimento}{$this->valor}{$this->nnum}{$this->agencia}{$this->conta_cedente}", 9, 0);
    }

    protected function geraLinha(){
        $this->linha = "{$this->codigobanco}{$this->nummoeda}{$this->dv}{$this->fator_vencimento}{$this->valor}{$this->nnum}{$this->agencia}{$this->conta_cedente}";
    }
}