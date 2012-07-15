<?php

namespace BoletoPHP\Boletos;

abstract class Boleto {

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

    public function  __construct($params) {
        $this->params = array_merge($this->params, $params);
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
        $this->geraNossoNumero();
    }

    public function getViewVars(){
        return array(
            'identificacao' => $this->params['identificacao'],
            'linha_digitavel' => $this->linha_digitavel,
            'valor_boleto' => $this->params['valor_boleto'],
            'cpf_cnpj' => $this->params['cpf_cnpj'],
            'endereco' => $this->params['endereco'],
            'cidade_uf' => $this->params['cidade_uf'],
            'codigo_banco_com_dv' => $this->codigo_banco_com_dv,
            'linha_digitavel' => $this->linha_digitavel,
            'cedente' => $this->params['cedente'],
            'agencia_codigo' => $this->agencia_codigo,
            'especie' => $this->params['especie'],
            'quantidade' => $this->params['quantidade'],
            'nosso_numero' => $this->nossonumero,
            'numero_documento' => $this->params['numero_documento'],
            'data_vencimento' => $this->params['data_vencimento'],
            'sacado' => $this->params['sacado'],
            'demonstrativo1' => $this->params['demonstrativo1'],
            'demonstrativo2' => $this->params['demonstrativo2'],
            'demonstrativo3' => $this->params['demonstrativo3'],
            'data_documento' => $this->params['data_documento'],
            'especie_doc' => $this->params['especie_doc'],
            'aceite' => $this->params['aceite'],
            'data_processamento' => $this->params['data_processamento'],
            'carteira' => $this->params['carteira'],
            'valor_unitario' => $this->params['valor_unitario'],
            'instrucoes1' => $this->params['instrucoes1'],
            'instrucoes2' => $this->params['instrucoes2'],
            'instrucoes3' => $this->params['instrucoes3'],
            'instrucoes4' => $this->params['instrucoes4'],
            'endereco1' => $this->params['endereco1'],
            'endereco2' => $this->params['endereco2'],
            'codigo_barras' => $this->codigo_barras
        );
    }

    protected function geraCodigoBancoComDv(){
        $this->codigo_banco_com_dv = $this->geraCodigoBanco();
    }

    protected function geraFatorVencimento(){
        $this->fator_vencimento = $this->fator_vencimento($this->params['data_vencimento']);
    }

    protected function geraValor(){
        $this->valor = $this->formata_numero($this->params['valor_boleto'], 10, 0, 'valor');
    }

    protected function geraAgencia(){
        $this->agencia = $this->formata_numero($this->params['agencia'], 4, 0);
    }

    protected function geraConta(){
        $this->conta = $this->formata_numero($this->params['conta'], 5, 0);
    }

    protected function geraContaDv(){
        $this->conta_dv = $this->formata_numero($this->params['conta_dv'], 1, 0);
    }

    protected function geraCarteira(){
        $this->carteira = $this->params['carteira'];
    }

    protected function geraAgenciaCodigo(){
        $this->agencia_codigo = $this->agencia . " / " . $this->conta_cedente . "-" . $this->conta_cedente_dv;
    }

    protected function geraLinhaDigitavel(){
        $this->linha_digitavel = $this->monta_linha_digitavel();
    }

    protected function geraCodigoDeBarras(){
        $this->codigo_barras = $this->fbarcode();
    }

    protected function geraCodigoBanco() {
        $numero = $this->codigobanco;
        $parte1 = substr($numero, 0, 3);
        $parte2 = $this->modulo_11($parte1);
        return $parte1 . "-" . $parte2;
    }

    protected function modulo_11($num, $base=9, $r=0)  {
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

        $soma = 0;
        $fator = 2;

        /* Separacao dos numeros */
        for ($i = strlen($num); $i > 0; $i--) {
            // pega cada numero isoladamente
            $numeros[$i] = substr($num,$i-1,1);
            // Efetua multiplicacao do numero pelo falor
            $parcial[$i] = $numeros[$i] * $fator;
            // Soma dos digitos
            $soma += $parcial[$i];
            if ($fator == $base) {
                // restaura fator de multiplicacao para 2
                $fator = 1;
            }
            $fator++;
        }

        /* Calculo do modulo 11 */
        if ($r == 0) {
            $soma *= 10;
            $digito = $soma % 11;
            if ($digito == 10) {
                $digito = 0;
            }
            return $digito;
        } elseif ($r == 1){
            $resto = $soma % 11;
            return $resto;
        }
    }

    protected function fator_vencimento($data) {
      if ($data != "") {
        $data = explode("/",$data);
        $ano = $data[2];
        $mes = $data[1];
        $dia = $data[0];
        return(abs(($this->_dateToDays("1997","10","07")) - ($this->_dateToDays($ano, $mes, $dia))));
      } else {
        return "0000";
      }
    }

    protected function _dateToDays($year,$month,$day) {
        $century = substr($year, 0, 2);
        $year = substr($year, 2, 2);
        if ($month > 2) {
            $month -= 3;
        } else {
            $month += 9;
            if ($year) {
                $year--;
            } else {
                $year = 99;
                $century --;
            }
        }
        return ( floor((  146097 * $century)    /  4 ) +
                floor(( 1461 * $year)        /  4 ) +
                floor(( 153 * $month +  2) /  5 ) +
                    $day +  1721119);
    }

    protected function formata_numero($numero,$loop,$insert,$tipo = "geral") {
        if ($tipo == "geral") {
            $numero = str_replace(",","",$numero);
            while(strlen($numero)<$loop){
                $numero = $insert . $numero;
            }
        }
        if ($tipo == "valor") {
            /*
            retira as virgulas
            formata o numero
            preenche com zeros
            */
            $numero = str_replace(",","",$numero);
            while(strlen($numero)<$loop){
                $numero = $insert . $numero;
            }
        }
        if ($tipo == "convenio") {
            while(strlen($numero)<$loop){
                $numero = $numero . $insert;
            }
        }
        return $numero;
    }

    protected function digitoVerificador_nossonumero($numero) {
        $resto2 = $this->modulo_11($numero, 9, 1);
         $digito = 11 - $resto2;
         if ($digito == 10 || $digito == 11) {
            $dv = 0;
         } else {
            $dv = $digito;
         }
         return $dv;
    }

    protected function digitoVerificador_barra($numero) {
        $resto2 = $this->modulo_11($numero, 9, 1);
         if ($resto2 == 0 || $resto2 == 1 || $resto2 == 10) {
            $dv = 1;
         } else {
            $dv = 11 - $resto2;
         }
         return $dv;
    }

    protected function monta_linha_digitavel() {
            $codigo = $this->linha;

            // Posição 	Conteúdo
            // 1 a 3    Número do banco
            // 4        Código da Moeda - 9 para Real
            // 5        Digito verificador do Código de Barras
            // 6 a 9   Fator de Vencimento
            // 10 a 19 Valor (8 inteiros e 2 decimais)
            // 20 a 44 Campo Livre definido por cada banco (25 caracteres)

            // 1. Campo - composto pelo código do banco, código da moéda, as cinco primeiras posições
            // do campo livre e DV (modulo10) deste campo
            $p1 = substr($codigo, 0, 4);
            $p2 = substr($codigo, 19, 5);
            $p3 = $this->modulo_10("$p1$p2");
            $p4 = "$p1$p2$p3";
            $p5 = substr($p4, 0, 5);
            $p6 = substr($p4, 5);
            $campo1 = "$p5.$p6";

            // 2. Campo - composto pelas posiçoes 6 a 15 do campo livre
            // e livre e DV (modulo10) deste campo
            $p1 = substr($codigo, 24, 10);
            $p2 = $this->modulo_10($p1);
            $p3 = "$p1$p2";
            $p4 = substr($p3, 0, 5);
            $p5 = substr($p3, 5);
            $campo2 = "$p4.$p5";

            // 3. Campo composto pelas posicoes 16 a 25 do campo livre
            // e livre e DV (modulo10) deste campo
            $p1 = substr($codigo, 34, 10);
            $p2 = $this->modulo_10($p1);
            $p3 = "$p1$p2";
            $p4 = substr($p3, 0, 5);
            $p5 = substr($p3, 5);
            $campo3 = "$p4.$p5";

            // 4. Campo - digito verificador do codigo de barras
            $campo4 = substr($codigo, 4, 1);

            // 5. Campo composto pelo fator vencimento e valor nominal do documento, sem
            // indicacao de zeros a esquerda e sem edicao (sem ponto e virgula). Quando se
            // tratar de valor zerado, a representacao deve ser 000 (tres zeros).
            $p1 = substr($codigo, 5, 4);
            $p2 = substr($codigo, 9, 10);
            $campo5 = "$p1$p2";

            return "$campo1 $campo2 $campo3 $campo4 $campo5";
    }

    protected function modulo_10($num) {
            $numtotal10 = 0;
            $fator = 2;

            // Separacao dos numeros
            for ($i = strlen($num); $i > 0; $i--) {
                // pega cada numero isoladamente
                $numeros[$i] = substr($num,$i-1,1);
                // Efetua multiplicacao do numero pelo (falor 10)
                $temp = $numeros[$i] * $fator;
                $temp0=0;
                foreach (preg_split('//',$temp,-1,PREG_SPLIT_NO_EMPTY) as $k=>$v){ $temp0+=$v; }
                $parcial10[$i] = $temp0; //$numeros[$i] * $fator;
                // monta sequencia para soma dos digitos no (modulo 10)
                $numtotal10 += $parcial10[$i];
                if ($fator == 2) {
                    $fator = 1;
                } else {
                    $fator = 2; // intercala fator de multiplicacao (modulo 10)
                }
            }

            // várias linhas removidas, vide função original
            // Calculo do modulo 10
            $resto = $numtotal10 % 10;
            $digito = 10 - $resto;
            if ($resto == 0) {
                $digito = 0;
            }

            return $digito;
    }

    protected function fbarcode(){

    $fino = 1 ;
    $largo = 3 ;
    $altura = 50 ;
    $retorno = '';

      $barcodes[0] = "00110" ;
      $barcodes[1] = "10001" ;
      $barcodes[2] = "01001" ;
      $barcodes[3] = "11000" ;
      $barcodes[4] = "00101" ;
      $barcodes[5] = "10100" ;
      $barcodes[6] = "01100" ;
      $barcodes[7] = "00011" ;
      $barcodes[8] = "10010" ;
      $barcodes[9] = "01010" ;
      for($f1=9;$f1>=0;$f1--){
        for($f2=9;$f2>=0;$f2--){
          $f = ($f1 * 10) + $f2 ;
          $texto = "" ;
          for($i=1;$i<6;$i++){
            $texto .=  substr($barcodes[$f1],($i-1),1) . substr($barcodes[$f2],($i-1),1);
          }
          $barcodes[$f] = $texto;
        }
      }


    //Desenho da barra


    //Guarda inicial
    $retorno = "<img src=../imagens/p.png width={$fino} height={$altura} border=0><img
src=../imagens/b.png width={$fino} height={$altura} border=0><img
src=../imagens/p.png width={$fino} height={$altura} border=0><img
src=../imagens/b.png width={$fino} height={$altura} border=0><img" . PHP_EOL;

    $texto = $this->linha;
    if((strlen($texto) % 2) <> 0){
        $texto = "0" . $texto;
    }

    // Draw dos dados
    while (strlen($texto) > 0) {
      $i = round($this->esquerda($texto,2));
      $texto = $this->direita($texto,strlen($texto)-2);
      $f = $barcodes[$i];
      for($i=1;$i<11;$i+=2){
        if (substr($f,($i-1),1) == "0") {
          $f1 = $fino ;
        }else{
          $f1 = $largo ;
        }
        $retorno .= "    src=../imagens/p.png width={$f1} height={$altura} border=0><img" . PHP_EOL;

        if (substr($f,$i,1) == "0") {
          $f2 = $fino ;
        }else{
          $f2 = $largo ;
        }
        $retorno .= "    src=../imagens/b.png width={$f2} height={$altura} border=0><img" . PHP_EOL;
      }
    }

    // Draw guarda final
    $retorno .= "src=../imagens/p.png width={$largo} height={$altura} border=0><img
src=../imagens/b.png width={$fino} height={$altura} border=0><img
src=../imagens/p.png width=1 height={$altura} border=0>";
    return $retorno;
    }

    protected function esquerda($entra,$comp){
        return substr($entra,0,$comp);
    }

    protected function direita($entra,$comp){
        return substr($entra,strlen($entra)-$comp,$comp);
    }
}