<?php


function formata_numero($numero, $loop) {
	$numero = str_replace(",","",$numero);
	return str_pad($numero, $loop, "0", STR_PAD_LEFT);
}

function monta_linha_digitavel($codigo) {

		// Posi��o 	Conte�do
        // 1 a 3    N�mero do banco
        // 4        C�digo da Moeda - 9 para Real
        // 5        Digito verificador do C�digo de Barras
        // 6 a 9   Fator de Vencimento
		// 10 a 19 Valor (8 inteiros e 2 decimais)
        // 20 a 44 Campo Livre definido por cada banco (25 caracteres)

        // 1. Campo - composto pelo c�digo do banco, c�digo da mo�da, as cinco primeiras posi��es
        // do campo livre e DV (modulo10) deste campo
        $p1 = substr($codigo, 0, 4);
        $p2 = substr($codigo, 19, 5);
        $p3 = modulo_10("$p1$p2");
        $p4 = "$p1$p2$p3";
        $p5 = substr($p4, 0, 5);
        $p6 = substr($p4, 5);
        $campo1 = "$p5.$p6";

        // 2. Campo - composto pelas posi�oes 6 a 15 do campo livre
        // e livre e DV (modulo10) deste campo
        $p1 = substr($codigo, 24, 10);
        $p2 = modulo_10($p1);
        $p3 = "$p1$p2";
        $p4 = substr($p3, 0, 5);
        $p5 = substr($p3, 5);
        $campo2 = "$p4.$p5";

        // 3. Campo composto pelas posicoes 16 a 25 do campo livre
        // e livre e DV (modulo10) deste campo
        $p1 = substr($codigo, 34, 10);
        $p2 = modulo_10($p1);
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
function fator_vencimento($data) {
  if ($data != "") {
    $data = explode("/",$data);
    $ano = $data[2];
    $mes = $data[1];
    $dia = $data[0];

    $data_inicial = new DateTime("1997-10-07");
    $data_vencimento = new DateTime("$ano-$mes-$dia");
    
    $intervalo = $data_inicial->diff($data_vencimento);
    $fator_vencimento = $intervalo->format('%r%a');
    
    if($fator_vencimento < 0){
      throw new InvalidArgumentException('Data inv�lida.');
    }else{
      return $fator_vencimento;
    }
  } else{
    return "0000";
  }
}

function digitoVerificador_barra($numero) {
	$resto2 = modulo_11($numero, 9, 1);
	if ($resto2 == 0 || $resto2 == 1 || $resto2 == 10) {
		$dv = 1;
	} else {
		$dv = 11 - $resto2;
	}
	return $dv;
}

function modulo_10($num) { 
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

	// v�rias linhas removidas, vide fun��o original
	// Calculo do modulo 10
	$resto = $numtotal10 % 10;
	$digito = 10 - $resto;
	if ($resto == 0) {
		$digito = 0;
	}

	return $digito;

}


function modulo_11($num, $base=9, $r=0)  {
    /**
     *   Autor:
     *           Pablo Costa <pablo@users.sourceforge.net>
     *
     *   Fun��o:
     *    Calculo do Modulo 11 para geracao do digito verificador
     *    de boletos bancarios conforme documentos obtidos
     *    da Febraban - www.febraban.org.br
     *
     *   Entrada:
     *     $num: string num�rica para a qual se deseja calcularo digito verificador;
     *     $base: valor maximo de multiplicacao [2-$base]
     *     $r: quando especificado um devolve somente o resto
     *
     *   Sa�da:
     *     Retorna o Digito verificador.
     *
     *   Observa��es:
     *     - Script desenvolvido sem nenhum reaproveitamento de c�digo pr� existente.
     *     - Assume-se que a verifica��o do formato das vari�veis de entrada � feita antes da execu��o deste script.
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

