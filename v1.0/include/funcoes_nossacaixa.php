<?php
// +----------------------------------------------------------------------+
// | BoletoPhp - Versão Beta                                              |
// +----------------------------------------------------------------------+
// | Este arquivo está disponível sob a Licença GPL disponível pela Web   |
// | em http://pt.wikipedia.org/wiki/GNU_General_Public_License           |
// | Você deve ter recebido uma cópia da GNU Public License junto com     |
// | esse pacote; se não, escreva para:                                   |
// |                                                                      |
// | Free Software Foundation, Inc.                                       |
// | 59 Temple Place - Suite 330                                          |
// | Boston, MA 02111-1307, USA.                                          |
// +----------------------------------------------------------------------+

// +----------------------------------------------------------------------+
// | Originado do Projeto BBBoletoFree que tiveram colaborações de Daniel |
// | William Schultz e Leandro Maniezo que por sua vez foi derivado do	  |
// | PHPBoleto de João Prado Maia e Pablo Martins F. Costa				  |
// | 																	  |
// | Se vc quer colaborar, nos ajude a desenvolver p/ os demais bancos :-)|
// | Acesse o site do Projeto BoletoPhp: www.boletophp.com.br             |
// +----------------------------------------------------------------------+

// +----------------------------------------------------------------------+
// | Equipe Coordenação Projeto BoletoPhp: <boletophp@boletophp.com.br>   |
// | Desenvolvimento Boleto NossaCaixa: Keitty Suélen                  	  |
// +----------------------------------------------------------------------+

$codigobanco = "151"; //Código do banco de acordo com o banco central
$codigo_banco_com_dv = geraCodigoBanco($codigobanco);
$nummoeda = "9";
$fator_vencimento = fator_vencimento($dadosboleto["data_vencimento"]);

//valor tem 10 digitos, sem virgula
$valor = formata_numero($dadosboleto["valor_boleto"],10,0,"valor");
//agencia é 4 digitos
$agencia = formata_numero($dadosboleto["agencia"],4,0);
//conta cedente (sem dv) é 6 digitos
$conta_cedente = formata_numero($dadosboleto["conta_cedente"],6,0);
//dv da conta cedente
$conta_cedente_dv = formata_numero($dadosboleto["conta_cedente_dv"],1,0);
//carteira 
$carteira = $dadosboleto["carteira"];
//modalidade da conta
$modalidade = formata_numero($dadosboleto["modalidade_conta"],2,0);

// DONE: Bugfix 2007-03-25 Francisco Ernesto Teixeira <fco_ernesto@yahoo.com.br>
// Notice: Undefined variable: modalidade_c1 in funcoes_nossacaixa.php on line 48

$modalidade_c1 = isset($modalidade_c1) ? $modalidade_c1 : 0;

//Converte a modalidade de acordo com a tabela do banco
$modalidade == "01" ? $modalidade_c1 = 1 : $modalidade_c1;
$modalidade == "04" ? $modalidade_c1 = 4 : $modalidade_c1;
$modalidade == "09" ? $modalidade_c1 = 9 : $modalidade_c1;
$modalidade == "13" ? $modalidade_c1 = 3 : $modalidade_c1;
$modalidade == "16" ? $modalidade_c1 = 6 : $modalidade_c1;
$modalidade == "17" ? $modalidade_c1 = 7 : $modalidade_c1;
$modalidade == "18" ? $modalidade_c1 = 8 : $modalidade_c1;


//nosso número (sem dv) é 9 digitos
$nnum = $dadosboleto["inicio_nosso_numero"] . formata_numero($dadosboleto["nosso_numero"],7,0);

//Agencia sem o digito + modalidade convertida e conta sem o dígito
$ag_contacedente = $agencia .$modalidade_c1. $conta_cedente;

//
$carteira == 5 ? $prefixo = "9" : $prefixo;
$carteira == 1 ? $prefixo = "0" : $prefixo;

//Calcula o digito verificador do nosso número
$dv_nosso_numero = digitoVerificador_nossonumero($nnum,$conta_cedente,$conta_cedente_dv,$agencia,$modalidade);
$nossonumero_dv  = "$nnum$dv_nosso_numero";

//pega o nosso numero a partir da 2º posição
$nnum = substr($nnum,1);

//numero para o calculo dos dígitos verificadores da posição 43 e 44
$calcdv1 = $prefixo.$nnum.$ag_contacedente.$codigobanco;

//Gera os dígitos verificadores da posição 43 e 44
$dv1 = geraDv43($calcdv1);
$dv2 = geraDv44("$calcdv1$dv1");

//Se vier 2 caracteres significa que o dv2 deu 1 então o dv1 e o dv2 foi recalculado e retornado nesta string(Coisa do manual do banco =D !)
if (strlen($dv2) == 2){
	$dv1= substr($dv2,0,1);
	$dv2= substr($dv2,1,1);
}

// DONE: Bugfix 2007-03-25 Francisco Ernesto Teixeira <fco_ernesto@yahoo.com.br>
// Notice: Undefined variable: dv in funcoes_nossacaixa.php on line 93
$dv = isset($dv) ? $dv : 0;

// 43 numeros para o calculo do digito verificador do codigo de barras
$dv = digitoVerificador_barra("$codigobanco$nummoeda$fator_vencimento$valor$prefixo$nnum$ag_contacedente$codigobanco$dv1$dv2");

// Numero para o codigo de barras com 44 digitos
$linha = "$codigobanco$nummoeda$dv$fator_vencimento$valor$prefixo$nnum$ag_contacedente$codigobanco$dv1$dv2";

$nossonumero = substr($nossonumero_dv,0,9).'-'.substr($nossonumero_dv,9,1);
$agencia_codigo = $agencia." / ".$modalidade." ".$conta_cedente ." ". $conta_cedente_dv;

$dadosboleto["codigo_barras"]       = $linha;
$dadosboleto["linha_digitavel"]     = monta_linha_digitavel($linha);
$dadosboleto["agencia_codigo"]      = $agencia_codigo;
$dadosboleto["nosso_numero"]        = $nossonumero;
$dadosboleto["codigo_banco_com_dv"] = $codigo_banco_com_dv;

function digitoVerificador_nossonumero($numero, $conta, $dv, $agencia, $modalidade) {
	$numext = $agencia.$modalidade."0".$conta.$dv.$numero;
	
  // DONE: Bugfix 2007-03-25 Francisco Ernesto Teixeira <fco_ernesto@yahoo.com.br>
  // Notice: Undefined variable: resul in funcoes_nossacaixa.php on line 127
  $resul = 0;
	
	for ($i = strlen($numext); $i > 0; $i--) {
		$numeros[$i] = substr($numext,$i-1,1);
		if ($i == 14){
			$n = 1;
		}
		else if($i == 1 || $i == 5 || $i == 9 || $i == 13 || $i == 15 || $i == 19 || $i == 23){
			$n = 3;
		}
		else if($i == 2 || $i == 6 || $i == 10 || $i == 16 || $i == 20 ){
			$n = 1;
		}
		else if($i == 4 || $i == 8 || $i == 12 || $i == 18 || $i == 22 ){
			$n = 7;
		}
		else if($i == 3 || $i == 7 || $i == 11 || $i == 17 || $i == 21 ){
			$n = 9;
		}
		$resul += $numeros[$i]*$n;
	}
		
	$resto = $resul % 10;
	$dv = 10 - $resto;
  if ($resto == 0) $dv=0;   
	 return $dv;
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


// FUNÇÕES
// Algumas foram retiradas do Projeto PhpBoleto e modificadas para atender as particularidades de cada banco

function formata_numero($numero,$loop,$insert,$tipo = "geral") {
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


function fbarcode($valor){

$fino = 1 ;
$largo = 3 ;
$altura = 50 ;

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
?><img src=imagens/p.png width=<?php echo $fino?> height=<?php echo $altura?> border=0><img 
src=imagens/b.png width=<?php echo $fino?> height=<?php echo $altura?> border=0><img 
src=imagens/p.png width=<?php echo $fino?> height=<?php echo $altura?> border=0><img 
src=imagens/b.png width=<?php echo $fino?> height=<?php echo $altura?> border=0><img 
<?php
$texto = $valor ;
if((strlen($texto) % 2) <> 0){
	$texto = "0" . $texto;
}

// Draw dos dados
while (strlen($texto) > 0) {
  $i = round(esquerda($texto,2));
  $texto = direita($texto,strlen($texto)-2);
  $f = $barcodes[$i];
  for($i=1;$i<11;$i+=2){
    if (substr($f,($i-1),1) == "0") {
      $f1 = $fino ;
    }else{
      $f1 = $largo ;
    }
?>
    src=imagens/p.png width=<?php echo $f1?> height=<?php echo $altura?> border=0><img 
<?php
    if (substr($f,$i,1) == "0") {
      $f2 = $fino ;
    }else{
      $f2 = $largo ;
    }
?>
    src=imagens/b.png width=<?php echo $f2?> height=<?php echo $altura?> border=0><img 
<?php
  }
}

// Draw guarda final
?>
src=imagens/p.png width=<?php echo $largo?> height=<?php echo $altura?> border=0><img 
src=imagens/b.png width=<?php echo $fino?> height=<?php echo $altura?> border=0><img 
src=imagens/p.png width=<?php echo 1?> height=<?php echo $altura?> border=0> 
  <?php
} //Fim da função

function esquerda($entra,$comp){
	return substr($entra,0,$comp);
}

function direita($entra,$comp){
	return substr($entra,strlen($entra)-$comp,$comp);
}

function fator_vencimento($data) {
	$data = explode("/",$data);
	$ano = $data[2];
	$mes = $data[1];
	$dia = $data[0];
    return(abs((_dateToDays("1997","10","07")) - (_dateToDays($ano, $mes, $dia))));
}

function _dateToDays($year,$month,$day) {
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

function modulo_10($num) { 
		$numtotal10 = 0;
        $fator = 2;

        // Separacao dos numeros
        for ($i = strlen($num); $i > 0; $i--) {
            // pega cada numero isoladamente
            $numeros[$i] = substr($num,$i-1,1);
            // Efetua multiplicacao do numero pelo (falor 10)
            // 2002-07-07 01:33:34 Macete para adequar ao Mod10 do Itaú
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

function modulo_11($num, $base=9, $r=0)  {
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

function monta_linha_digitavel($codigo) {
		
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
        $p3 = modulo_10("$p1$p2");
        $p4 = "$p1$p2$p3";
        $p5 = substr($p4, 0, 5);
        $p6 = substr($p4, 5);
        $campo1 = "$p5.$p6";

        // 2. Campo - composto pelas posiçoes 6 a 15 do campo livre
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

function geraCodigoBanco($numero) {
    $parte1 = substr($numero, 0, 3);
    $parte2 = modulo_11($parte1);
    return $parte1 . "-" . $parte2;
}

function geraDv43($num) { 
		$numtotal10 = 0;
        $fator = 2;

        // Separacao dos numeros
        for ($i = strlen($num); $i > 0; $i--) {
            // pega cada numero isoladamente
            $numeros[$i] = substr($num,$i-1,1);
            // Efetua multiplicacao do numero pelo (falor 10)
            // 2002-07-07 01:33:34 Macete para adequar ao Mod10 do Itaú
            $temp = $numeros[$i] * $fator; 
            if ($temp > 9) $temp=$temp-9; // Regra do banco NossaCaixa
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
        
        if ($resto == 0) {
            $dv = 0;
        } else {
            $dv = 10 - $resto;
        }

        return $dv;
		
}

function geraDv44($numero) {
    $resto = modulo_11($numero,7,1);
    if ($resto == 0){
    	$dv = 0;
    }
    elseif ($resto > 1){
    	$dv = 11-$resto;
    }
    elseif ($resto == 1){
    	$dv1 = substr($numero,23,1);
    	$dv1 = $dv1 + 1;
    	$dv1 == 10 ? $dv1=0: $dv1;
    	$numero = substr($numero,0,23).$dv1;
      $dv44 = geraDv44($numero);
    	$dv=$dv1.$dv44;
    }
        
    return $dv;
}


?>
