<?php

namespace BoletoPHP\Boletos;

class Itau extends Boleto
{
	public $params = array(
		'data_vencimento',
		'valor_boleto',
		'agencia',
		'conta',
		'conta_dv',
		'carteira',
		'carteira_descricao',
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
		'valor_unitario',
		'instrucoes1',
		'instrucoes2',
		'instrucoes3',
		'instrucoes4',
		'endereco1',
		'endereco2',
	);

	protected $codigobanco = '341';
	private $codigomoeda = 9;

	public function  __construct($params)
	{
		parent::__construct($params);
		$this->geraNossoNumero();
		$this->geraDv1();
		$this->geraDv2();
		$this->geraDvBarra();
		$this->geraLinha();
		$this->geraAgenciaCodigo();
		$this->geraLinhaDigitavel();
		$this->geraCodigoDeBarras();
	}

	protected function geraContaCedente()
	{
		$this->conta_cedente = $this->formata_numero($this->params['conta_cedente'], 5, 0);
	}

	protected function geraContaCedenteDv()
	{
		$this->conta_cedente_dv = $this->formata_numero($this->params['conta_cedente_dv'], 1, 0);
	}

	protected function geraAg()
	{
		$this->agencia = $this->formata_numero($this->params['agencia'], 4, 0);
	}

	protected function geraNossoNumero()
	{
		$monta_nosso_numero = $this->formata_numero($this->params['inicio_nosso_numero'] . $this->params['nosso_numero'], 8, 0);
		$this->nossonumero = $this->carteira ."/". $monta_nosso_numero ."-". $this->modulo_10($this->agencia.$this->conta.$this->carteira.$monta_nosso_numero);
		$this->nossonumero_sem_formatacao = $monta_nosso_numero;
	}

	protected function geraDvBarra()
	{
		$this->dvBarra = $this->digitoVerificador_barra("{$this->codigobanco}{$this->codigomoeda}{$this->fator_vencimento}{$this->valor}{$this->carteira}{$this->nossonumero_sem_formatacao}{$this->dv1}{$this->agencia}{$this->conta_cedente}{$this->dv2}000");
	}

	protected function geraDv1()
	{
		$this->dv1 = $this->modulo_10("{$this->agencia}{$this->conta_cedente}{$this->carteira}{$this->nossonumero_sem_formatacao}");
	}

	protected function geraDv2()
	{
		$this->dv2 = $this->modulo_10("{$this->agencia}{$this->conta_cedente}");
	}

	protected function geraLinha()
	{
		$this->linha = "{$this->codigobanco}{$this->codigomoeda}{$this->dvBarra}{$this->fator_vencimento}{$this->valor}{$this->carteira}{$this->nossonumero_sem_formatacao}{$this->dv1}{$this->agencia}{$this->conta_cedente}{$this->dv2}000";
		//echo "{$this->codigobanco}-{$this->codigomoeda}-{$this->dvBarra}-{$this->fator_vencimento}-{$this->valor}-{$this->carteira}-{$this->nossonumero_sem_formatacao}-{$this->dv1}-{$this->agencia}-{$this->conta_cedente}-{$this->dv2}-000";

	}

	protected function monta_linha_digitavel()
	{
		$codigo = $this->linha;
		
		// Posição 	Conteúdo
		// 1. Grupo
		// 1 a 3	Código do Banco na Câmara de Compensação ( Itaú=341)
		// 4		Código da moeda = "9"
		// 5 a 7	Código da carteira de cobrança
		// 8 a 9	Dois primeiros dígitos do Nosso Número
		// 10	   DAC que amarra o campo 1
		
		// 2. Grupo
		// 11 a 16  Restante do Nosso Número
		// 17  		DAC do campo [ Agência/Conta/Carteira/ Nosso Número ]
		// 18 a 20	Três primeiros números que identificam a Agência
		// 21	   DAC que amarra o campo 2
		
		// 3. Grupo
		// 22 		Restante do número que identifica a agência
		// 23 a 28	Número da conta corrente + DAC
		// 29 a 31  Zeros ( Não utilizado )
		// 32	   DAC que amarra o campo 3
		
		// 4. Grupo
		// 33	   DAC do Código de Barras
		
		// 5. Grupo
		// 34 a 37  Fator de vencimento (Qtd de dias desde 07/10/1997 até a data de vencimento)
		// 38 a 47  Valor do Título
		
		// 1. Primeiro Grupo
		$campo1 = substr($codigo,0,3) . substr($codigo,3,1) . substr($codigo,19,3) . substr($codigo,22,2);
		$campo1 = $campo1 . $this->modulo_10($campo1);
		$campo1 = substr($campo1, 0, 5).'.'.substr($campo1, 5);
		
		// 2. Segundo Grupo
		$campo2 = substr($codigo,24,6) . substr($codigo,30,1) . substr($codigo,31,3);
		$campo2 = $campo2 . $this->modulo_10($campo2);
		$campo2 = substr($campo2, 0, 5).'.'.substr($campo2, 5);
		
		// 3. Terceiro Grupo
		$campo3 = substr($codigo,34,1) . substr($codigo,35,6) . substr($codigo,41,3);
		$campo3 = $campo3 . $this->modulo_10($campo3);
		$campo3 = substr($campo3, 0, 5).'.'.substr($campo3, 5);
		
		// 4. Quarto Grupo
		$campo4 = substr($codigo, 4, 1);
		
		// 5. Quinto Grupo
		$campo5 = substr($codigo, 5, 4) . substr($codigo, 9, 10);
		
		return "$campo1 $campo2 $campo3 $campo4 $campo5"; 

	}

}
