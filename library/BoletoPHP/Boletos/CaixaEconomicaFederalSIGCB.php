<?php
namespace BoletoPHP\Boletos;

use BoletoPHP\Model\Remessa;

class CaixaEconomicaFederalSIGCB extends Boleto
{   

    public $params = array(
        'data_vencimento',
        'valor_boleto',
        'agencia',
        'conta',
        'conta_dv',
        'carteira',
        'conta_cedente',
        'conta_cedente_dv',
        'nosso_numero1' => '000',
        'nosso_numero_const1',
        'nosso_numero2',
        'nosso_numero_const2',
        'nosso_numero3',
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
    private $nummoeda = 9;
    private $campo_livre;
    private $dv_campo_livre;
    private $campo_livre_com_dv;

    public function  __construct($params)
    {   
        parent::__construct($params);
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

    public function salvarRemessa()
    {
        $retorno = new Remessa();
    }

    protected function geraContaCedente()
    {
        $this->conta_cedente = $this->formataNumero($this->params['conta_cedente'], 6, 0);
    }

    protected function geraContaCedenteDv()
    {
        $this->conta_cedente_dv = $this->digitoVerificadorCedente($this->params['conta_cedente'], 1, 0);
    }

    protected function geraNNum()
    {
        $this->nnum = $this->formataNumero($this->params["nosso_numero_const1"], 1, 0) .
                      $this->formataNumero($this->params["nosso_numero_const2"], 1, 0) .
                      $this->formataNumero($this->params["nosso_numero1"], 3, 0) .
                      $this->formataNumero($this->params["nosso_numero2"], 3, 0) .
                      $this->formataNumero($this->params["nosso_numero3"], 9, 0);
    }

    protected function geraNossoNumero()
    {
        $this->nossonumero = $this->nnum . $this->digitoVerificadorNossonumero($this->nnum);
    }

    protected function geraDv()
    {
        $this->dv = $this->digitoVerificadorBarra("{$this->codigobanco}{$this->nummoeda}{$this->fator_vencimento}{$this->valor}{$this->campo_livre_com_dv}", 9, 0);
    }

    protected function geraLinha()
    {
        $this->linha = "{$this->codigobanco}{$this->nummoeda}{$this->dv}{$this->fator_vencimento}{$this->valor}{$this->campo_livre_com_dv}";
    }

    private function geraCampoLivre()
    {
        $this->campo_livre = $this->conta_cedente . $this->conta_cedente_dv .
                             $this->formataNumero($this->params["nosso_numero1"], 3, 0) .
                             $this->formataNumero($this->params["nosso_numero_const1"], 1, 0) .
                             $this->formataNumero($this->params["nosso_numero2"], 3, 0) .
                             $this->formataNumero($this->params["nosso_numero_const2"], 1, 0) .
                             $this->formataNumero($this->params["nosso_numero3"], 9, 0);
    }

    private function geraDvCampoLivre()
    {
        $this->dv_campo_livre = $this->digitoVerificadorNossonumero($this->campo_livre);
    }

    private function geraCampoLivreComDv()
    {
        $this->campo_livre_com_dv ="{$this->campo_livre}{$this->dv_campo_livre}";
    }

    private function digitoVerificadorCedente($numero)
    {
      $resto2 = $this->moduloOnze($numero, 9, 1);
      $digito = 11 - $resto2;
      if ($digito == 10 || $digito == 11) $digito = 0;
      $dv = $digito;

      return $dv;
    }
}
