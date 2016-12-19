<?php

namespace BoletoPHP\Boletos;

use BoletoPHP\Model\Remessa;
use BoletoPHP\Types\Pagador;
use BoletoPHP\Types\Beneficiario;

class Itau extends Boleto
{
    protected $required    = [
        'data_vencimento',
        'valor_boleto',
        'carteira',
        'identificacao',
        'especie',
        'numero_documento',
        'demonstrativo1',
        'especie_doc',
        'aceite',
        'data_processamento',
        'instrucoes1'
    ];
    public $params         = [
        'data_vencimento',
        'valor_boleto',
        'carteira',
        'conta_cedente_dv',
        'identificacao',
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
        'instrucoes4'
    ];
    protected $codigobanco = 341;
    private $nummoeda      = 9;
    private $campo_livre;
    private $dv_campo_livre;
    private $campo_livre_com_dv;

    public function __construct($params, Pagador $pagador = null,
                                Beneficiario $beneficiario = null)
    {
        parent::__construct($params, $pagador, $beneficiario);
        $this->geraNossoNumero();
        $this->geraCampoLivre();
        $this->geraDvCampoLivre();
        $this->geraCampoLivreComDv();
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
        $this->conta_cedente_dv = $this->digitoVerificadorCedente($this->beneficiario->getContaCedenteDv(),
            1, 0);
    }

    protected function geraNNum()
    {
        $this->nnum = $this->formataNumero($this->beneficiario->getNumeroConst1(),
                1, 0).
            $this->formataNumero($this->beneficiario->getNumeroConst2(), 1, 0).
            $this->formataNumero($this->beneficiario->getNossoNumero1(), 3, 0).
            $this->formataNumero($this->beneficiario->getNossoNumero2(), 3, 0).
            $this->formataNumero($this->beneficiario->getNossoNumero3(), 9, 0);
    }

    protected function geraNossoNumero()
    {
        $this->nossonumero = $this->nnum.$this->digitoVerificadorNossonumero($this->nnum);
    }

    protected function geraDv()
    {
        $this->dv = $this->digitoVerificadorBarra("{$this->codigobanco}{$this->nummoeda}{$this->fator_vencimento}{$this->valor}{$this->campo_livre_com_dv}",
            9, 0);
    }

    protected function geraLinha()
    {
        $this->linha = "{$this->codigobanco}{$this->nummoeda}{$this->dv}{$this->fator_vencimento}{$this->valor}{$this->campo_livre_com_dv}";
    }

    private function geraCampoLivre()
    {
        $this->campo_livre = $this->conta_cedente.$this->conta_cedente_dv.
            $this->formataNumero($this->beneficiario->getNossoNumero1(), 3, 0).
            $this->formataNumero($this->beneficiario->getNumeroConst1(), 1, 0).
            $this->formataNumero($this->beneficiario->getNossoNumero2(), 3, 0).
            $this->formataNumero($this->beneficiario->getNumeroConst2(), 1, 0).
            $this->formataNumero($this->beneficiario->getNossoNumero3(), 9, 0);
    }

    private function geraDvCampoLivre()
    {
        $this->dv_campo_livre = $this->digitoVerificadorNossonumero($this->campo_livre);
    }

    private function geraCampoLivreComDv()
    {
        $this->campo_livre_com_dv = "{$this->campo_livre}{$this->dv_campo_livre}";
    }

    private function digitoVerificadorCedente($numero)
    {
        $resto2 = $this->moduloOnze($numero, 9, 1);
        $digito = 11 - $resto2;
        if ($digito == 10 || $digito == 11) $digito = 0;
        $dv     = $digito;

        return $dv;
    }
}