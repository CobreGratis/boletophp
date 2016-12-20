<?php

namespace BoletoPHP\Boletos;

use BoletoPHP;
use BoletoPHP\Exceptions\InvalidParamException;
use Respect\Validation\Validator as v;
use BoletoPHP\Types\Pagador;
use BoletoPHP\Types\Beneficiario;

abstract class Boleto
{
    const FORMATO_GERAL    = "geral";
    const FORMATO_CONVENIO = "convenio";
    const FORMATO_VALOR    = "valor";

    protected $required = [
        'carteira'
    ];
    protected $codigobanco;
    protected $codigo_banco_com_dv;
    protected $fator_vencimento;
    protected $valor;
    protected $agencia;
    protected $conta;
    protected $conta_dv;
    protected $carteira;
    protected $conta_cedente;
    protected $conta_cedente_dv;
    protected $nnum;
    protected $nossonumero;
    protected $dv;
    protected $linha;
    protected $agencia_codigo;
    protected $linha_digitavel;
    protected $codigo_barras;
    private $nome_da_classe;
    private $diretorio_de_views;
    protected $baseDir;

    /**
     * @var BoletoPHP\Types\Beneficiario
     */
    protected $beneficiario;

    /**
     * @var BoletoPHP\Types\Pagador
     */
    protected $pagador;

    public function __construct($params, Pagador $pagador = null,
                                Beneficiario $beneficiario = null)
    {
        if (PASTA_LOGOS == null) define(PASTA_LOGOS, '/imagens/');

        $this->baseDir = PASTA_LOGOS;

        if (!$pagador) {
            $pagador = new Pagador();
            $pagador->hydrate($params);
        }

        if (!$beneficiario) {
            $beneficiario = new Beneficiario();
            $beneficiario->hydrate($params);
        }

        $this->pagador      = $pagador;
        $this->beneficiario = $beneficiario;
        $this->params       = array_merge($this->params, $params);
        $this->validateParams();
        $this->geraNomeDaClasse();
        $this->geraDiretorioDeViews();
        $this->geraCodigoBancoComDv();
        $this->geraFatorVencimento();
        $this->geraValor();
        $this->geraAgencia();
        $this->geraConta();
        $this->geraContaDv();
        $this->geraCarteira();
        $this->geraContaCedente();
        $this->geraContaCedenteDv();
        $this->geraNNum();
    }

    protected function validateParams()
    {
        foreach ($this->required as $name) {
            if (!array_key_exists($name, $this->params) || !v::notOptional()->validate($this->params[$name]))
                    throw new InvalidParamException(sprintf("Param '%s' is required",
                    $name));
        }
    }

    public function gerarBoleto()
    {
        extract($this->getViewVars());
        include "{$this->diretorio_de_views}{$this->nome_da_classe}.php";
    }

    public function getViewVars()
    {
        return array(
            'identificacao' => $this->params['identificacao'],
            'linha_digitavel' => $this->linha_digitavel,
            'valor_boleto' => $this->params['valor_boleto'],
            'cpf_cnpj' => $this->beneficiario->getCpfCpnj(),
            'endereco' => $this->beneficiario->getEndereco(),
            'cidade_uf' => $this->beneficiario->getCidadeEstado(),
            'codigo_banco_com_dv' => $this->codigo_banco_com_dv,
            'linha_digitavel' => $this->linha_digitavel,
            'carteira' => $this->params['carteira'],
            'cedente' => $this->beneficiario->getRazaoSocial(),
            'agencia_codigo' => $this->agencia_codigo,
            'especie' => $this->params['especie'],
            'quantidade' => $this->params['quantidade'],
            'nosso_numero' => $this->nossonumero,
            'numero_documento' => $this->params['numero_documento'],
            'data_vencimento' => $this->params['data_vencimento'],
            'sacado' => $this->pagador->getNome(),
            'demonstrativo1' => $this->params['demonstrativo1'],
            'demonstrativo2' => $this->params['demonstrativo2'],
            'demonstrativo3' => $this->params['demonstrativo3'],
            'data_documento' => $this->params['data_documento'],
            'especie_doc' => $this->params['especie_doc'],
            'aceite' => $this->params['aceite'],
            'data_processamento' => $this->params['data_processamento'],
            'carteira_descricao' => array_key_exists('carteira_descricao',
                $this->params) ? $this->params['carteira_descricao'] : '',
            'valor_unitario' => $this->params['valor_unitario'],
            'instrucoes1' => $this->params['instrucoes1'],
            'instrucoes2' => $this->params['instrucoes2'],
            'instrucoes3' => $this->params['instrucoes3'],
            'instrucoes4' => $this->params['instrucoes4'],
            'endereco1' => $this->pagador->getEndereco(),
            'endereco2' => $this->pagador->getEnderecoSegundaLinha(),
            'pagador_nome' => $this->pagador->getNome(),
            'pagador_cpf' => $this->pagador->getCpfCnpj(),
            'pagador_endereco' => $this->pagador->getEndereco(),
            'codigo_barras' => $this->codigo_barras,
        );
    }

    protected function geraCodigoBancoComDv()
    {
        $this->codigo_banco_com_dv = $this->geraCodigoBanco();
    }

    protected function geraFatorVencimento()
    {
        $this->fator_vencimento = $this->fatorVencimento($this->params['data_vencimento']);
    }

    protected function geraValor()
    {
        $this->valor = $this->formataNumero($this->params['valor_boleto'], 10,
            0, self::FORMATO_VALOR);
    }

    protected function geraAgencia()
    {
        $this->agencia = $this->formataNumero($this->beneficiario->getAgencia(),
            4, 0);
    }

    protected function geraConta()
    {
        $this->conta = $this->formataNumero($this->beneficiario->getConta(), 5,
            0);
    }

    protected function geraContaDv()
    {
        $this->conta_dv = $this->formataNumero($this->beneficiario->getContaDv(),
            1, 0);
    }

    protected function geraCarteira()
    {
        $this->carteira = $this->params['carteira'];
    }

    protected function geraAgenciaCodigo()
    {
        $this->agencia_codigo = sprintf("%d / %s-%d", $this->agencia,
            (string) $this->conta_cedente, $this->conta_cedente_dv);
    }

    protected function geraLinhaDigitavel()
    {
        $this->linha_digitavel = $this->montaLinhaDigitavel();
    }

    protected function geraCodigoDeBarras()
    {
        $this->codigo_barras = $this->fbarcode();
    }

    protected function geraCodigoBanco()
    {
        $numero = $this->codigobanco;
        $parte1 = substr($numero, 0, 3);
        $parte2 = $this->moduloOnze($parte1);

        return $parte1."-".$parte2;
    }

    protected function moduloOnze($num, $base = 9, $r = 0)
    {
        /**
         *   Autor:
         *           Pablo Costa <pablo@users.sourceforge.net>
         *
         *   Função:
         *    Calculo do Modulo 11 para geracao do digito verificador
         *    de boletos bancarios conforme documentos obtidos
         *    da Febraban - www.febraban.org.br
         *
         *   Entrada:
         *     $num: string numérica para a qual se deseja calcularo digito verificador;
         *     $base: valor maximo de multiplicacao [2-$base]
         *     $r: quando especificado um devolve somente o resto
         *
         *   Saída:
         *     Retorna o Digito verificador.
         *
         *   Observações:
         *     - Script desenvolvido sem nenhum reaproveitamento de código pré existente.
         *     - Assume-se que a verificação do formato das variáveis de entrada é feita antes da execução deste script.
         */
        $fator        = 2;
        /** Transforma string de numeros em array * */
        $numerosArray = str_split((string) $num);
        /** Reverte o array, pois, as o calculo é feito de trás pra frente * */
        $arrayReverso = array_reverse($numerosArray);

        /** Varre todo array remapeando para um array com a multiplicações dos fatores * */
        $resultadoMultiplicacao = array_map(function($item) use($base, &$fator) {
            if ($fator > $base) $fator = 2;
            return (int) $item * $fator++;
        }, $arrayReverso);

        /** Efetua a soma do array* */
        $soma = array_sum($resultadoMultiplicacao);

        if ($r == 1) return $soma % 11;

        /* Calculo do modulo 11 */
        $soma *= 10;
        $digito = $soma % 11;
        return $digito == 10 ? 0 : $digito;
    }

    /**
     * Calcula o fator de vencimento - diferença de dias com database de "07/10/1997"
     * $data
     */
    protected function fatorVencimento($data, $baseData = "07/10/1997")
    {
        if ($data != "") {
            $date     = \DateTime::createFromFormat("d/m/Y", $data);
            $dateBase = \DateTime::createFromFormat("d/m/Y", $baseData);
            $diff     = $dateBase->diff($date);
            return $diff->format("%a");
        } else {
            return "0000";
        }
    }

    protected function formataNumero($numero, $loop, $insert, $tipo = "geral")
    {
        if ($tipo == self::FORMATO_GERAL) {
            $numero = str_replace(",", "", $numero);
            while (strlen($numero) < $loop) {
                $numero = $insert.$numero;
            }
        }
        if ($tipo == self::FORMATO_VALOR) {
            /*
              retira as virgulas
              formata o numero
              preenche com zeros
             */
            $numero = str_replace(",", "", $numero);
            while (strlen($numero) < $loop) {
                $numero = $insert.$numero;
            }
        }
        if ($tipo == self::FORMATO_CONVENIO) {
            while (strlen($numero) < $loop) {
                $numero = $numero.$insert;
            }
        }

        return $numero;
    }

    protected function digitoVerificadorNossonumero($numero)
    {
        $resto2 = $this->moduloOnze($numero, 9, 1);
        $digito = 11 - $resto2;
        if ($digito == 10 || $digito == 11) {
            $dv = 0;
        } else {
            $dv = $digito;
        }

        return $dv;
    }

    protected function digitoVerificadorBarra($numero)
    {
        $resto = $this->moduloOnze($numero, 9, 1);
        if ($resto == 0 || $resto == 1 || $resto == 10) {
            $dv = 1;
        } else {
            $dv = 11 - $resto;
        }

        return $dv;
    }

    protected function montaLinhaDigitavel()
    {
        $codigo = $this->linha;

        // Posição 	Conteúdo
        // 1 a 3    Número do banco
        // 4        Código da Moeda - 9 para Real
        // 5        Digito verificador do Código de Barras
        // 6 a 9   Fator de Vencimento
        // 10 a 19 Valor (8 inteiros e 2 decimais)
        // 20 a 44 Campo Livre definido por cada banco (25 caracteres)
        // 1. Campo - composto pelo código do banco, código da moeda, as cinco primeiras posições
        // do campo livre e DV (modulo10) deste campo
        $p1     = substr($codigo, 0, 4);
        $p2     = substr($codigo, 19, 5);
        $p3     = $this->moduloDez("$p1$p2");
        $p4     = "$p1$p2$p3";
        $p5     = substr($p4, 0, 5);
        $p6     = substr($p4, 5);
        $campo1 = "$p5.$p6";

        // 2. Campo - composto pelas posições 6 a 15 do campo livre
        // e livre e DV (modulo10) deste campo
        $p1     = substr($codigo, 24, 10);
        $p2     = $this->moduloDez($p1);
        $p3     = "$p1$p2";
        $p4     = substr($p3, 0, 5);
        $p5     = substr($p3, 5);
        $campo2 = "$p4.$p5";

        // 3. Campo - composto pelas posições 16 a 25 do campo livre
        // e livre e DV (modulo10) deste campo
        $p1     = substr($codigo, 34, 10);
        $p2     = $this->moduloDez($p1);
        $p3     = "$p1$p2";
        $p4     = substr($p3, 0, 5);
        $p5     = substr($p3, 5);
        $campo3 = "$p4.$p5";

        // 4. Campo - dígito verificador do código de barras
        $campo4 = substr($codigo, 4, 1);

        // 5. Campo composto pelo fator vencimento e valor nominal do documento, sem
        // indicação de zeros à esquerda e sem edição (sem ponto e vírgula). Quando se
        // tratar de valor zerado, a representação deve ser 000 (três zeros).
        $p1     = substr($codigo, 5, 4);
        $p2     = substr($codigo, 9, 10);
        $campo5 = "$p1$p2";

        return "$campo1 $campo2 $campo3 $campo4 $campo5";
    }

    protected function moduloDez($num)
    {
        $numtotal10 = 0;
        $fator      = 2;

        // Separação dos números
        for ($i = strlen($num); $i > 0; $i--) {
            // pega cada números isoladamente
            $numeros[$i] = substr($num, $i - 1, 1);
            // Efetua multiplicação do números pelo (falor 10)
            $temp        = $numeros[$i] * $fator;
            $temp0       = 0;
            foreach (preg_split('//', $temp, -1, PREG_SPLIT_NO_EMPTY) as $k => $v) {
                $temp0+=$v;
            }
            $parcial10[$i] = $temp0; //$numeros[$i] * $fator;
            // monta sequência para soma dos dígitos no (modulo 10)
            $numtotal10 += $parcial10[$i];
            if ($fator == 2) {
                $fator = 1;
            } else {
                $fator = 2; // intercala fator de multiplicação (modulo 10)
            }
        }

        // várias linhas removidas, vide função original
        // Cálculo do modulo 10
        $resto  = $numtotal10 % 10;
        $digito = 10 - $resto;
        if ($resto == 0) {
            $digito = 0;
        }

        return $digito;
    }

    protected function fbarcode()
    {
        $fino    = 1;
        $largo   = 3;
        $altura  = 50;
        $retorno = '';

        $barcodes[0] = "00110";
        $barcodes[1] = "10001";
        $barcodes[2] = "01001";
        $barcodes[3] = "11000";
        $barcodes[4] = "00101";
        $barcodes[5] = "10100";
        $barcodes[6] = "01100";
        $barcodes[7] = "00011";
        $barcodes[8] = "10010";
        $barcodes[9] = "01010";
        for ($f1 = 9; $f1 >= 0; $f1--) {
            for ($f2 = 9; $f2 >= 0; $f2--) {
                $f     = ($f1 * 10) + $f2;
                $texto = "";
                for ($i = 1; $i < 6; $i++) {
                    $texto .= substr($barcodes[$f1], ($i - 1), 1).substr($barcodes[$f2],
                            ($i - 1), 1);
                }
                $barcodes[$f] = $texto;
            }
        }

        //Desenho da barra
        //Guarda inicial
        $retorno = "<img src=\"../imagens/p.png\" width={$fino} height={$altura} border=0 alt=\"\"><img
                    src=\"../imagens/b.png\" width={$fino} height={$altura} border=0 alt=\"\"><img
                    src=\"../imagens/p.png\" width={$fino} height={$altura} border=0 alt=\"\"><img
                    src=\"../imagens/b.png\" width={$fino} height={$altura} border=0 alt=\"\"><img".PHP_EOL;

        $texto = $this->linha;
        if ((strlen($texto) % 2) <> 0) {
            $texto = "0".$texto;
        }

        // Draw dos dados
        while (strlen($texto) > 0) {
            $i     = round($this->esquerda($texto, 2));
            $texto = $this->direita($texto, strlen($texto) - 2);
            $f     = $barcodes[$i];
            for ($i = 1; $i < 11; $i+=2) {
                if (substr($f, ($i - 1), 1) == "0") {
                    $f1 = $fino;
                } else {
                    $f1 = $largo;
                }
                $retorno .= " src=\"../imagens/p.png\" width={$f1} height={$altura} border=0 alt=\"\"><img".PHP_EOL;

                if (substr($f, $i, 1) == "0") {
                    $f2 = $fino;
                } else {
                    $f2 = $largo;
                }
                $retorno .= " src=\"../imagens/b.png\" width={$f2} height={$altura} border=0 alt=\"\"><img".PHP_EOL;
            }
        }

        // Draw guarda final
        $retorno .= " src=\"../imagens/p.png\" width={$largo} height={$altura} border=0 alt=\"\"><img
                    src=\"../imagens/b.png\" width={$fino} height={$altura} border=0 alt=\"\"><img
                    src=\"../imagens/p.png\" width=1 height={$altura} border=0 alt=\"\">";

        return $retorno;
    }

    protected function esquerda($entra, $comp)
    {
        return substr($entra, 0, $comp);
    }

    protected function direita($entra, $comp)
    {
        return substr($entra, strlen($entra) - $comp, $comp);
    }

    private function geraNomeDaClasse()
    {
        $classe_com_caminho   = explode('\\', get_class($this));
        $this->nome_da_classe = end($classe_com_caminho);
    }

    private function geraDiretorioDeViews()
    {
        $this->diretorio_de_views = dirname(dirname(__FILE__)).'/views/';
    }

    /**
     * @return BoletoPHP\Types\Pagador
     */
    public function getPagador()
    {
        return $this->pagador;
    }

    /**
     * @param BoletoPHP\Types\Pagador $pagador
     *
     * @return static
     */
    public function setPagador(Pagador $pagador)
    {
        $this->pagador = $pagador;
        return $this;
    }

    /**
     * @return BoletoPHP\Types\Beneficiario
     */
    public function getBeneficiario()
    {
        return $this->beneficiario;
    }

    /**
     * @param BoletoPHP\Types\Beneficiario $beneficiario
     *
     * @return static
     */
    public function setBeneficiario(Beneficiario $beneficiario)
    {
        $this->beneficiario = $beneficiario;
        return $this;
    }
}