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
// | Desenvolvimento Boleto Banestes: Fernando José de Oliveira Chagas    |
// +----------------------------------------------------------------------+


$codigobanco = "021";
$codigo_banco_com_dv = geraCodigoBanco($codigobanco);
$nummoeda = "9";
$fator_vencimento = fator_vencimento($dadosboleto["data_vencimento"]);
$cvt = "5";
$zero = "00";

//valor tem 10 digitos, sem virgula
$valor = formata_numero($dadosboleto["valor_boleto"],10,0,"valor");

$carteira = $dadosboleto["carteira"];

//nosso número (sem dv) são 8 digitos
$nossonumero_sem_dv = substr($dadosboleto["nosso_numero"],0,8);

//dvs do nosso número
$nossonumero_dv1 = modulo_11($nossonumero_sem_dv);
$nossonumero_dv2 = modulo_11($nossonumero_sem_dv.$nossonumero_dv1,10);
$nossonumero_com_dv=$nossonumero_sem_dv.".".$nossonumero_dv1.$nossonumero_dv2;
unset($nossonumero_dv1,$nossonumero_dv2);

//conta corrente (sem dv) são 11 digitos
$conta = formata_numero($dadosboleto["conta"],11,0);

// Chave ASBACE 25 dígitos
$Wtemp=formata_numero($nossonumero_sem_dv,8,0).$conta.$dadosboleto["tipo_cobranca"].$codigobanco;
$chaveasbace_dv1=modulo_10($Wtemp);
$chaveasbace_dv2=modulo_11($Wtemp.$chaveasbace_dv1,7);
$dadosboleto["chave_asbace"]=$Wtemp.$chaveasbace_dv1.$chaveasbace_dv2;
unset($chaveasbace_dv1,$chaveasbace_dv2);

// 43 numeros para o calculo do digito verificador
$dv = digitoVerificador("$codigobanco$nummoeda$fator_vencimento$valor".$dadosboleto['chave_asbace']);
$linha = "$codigobanco$nummoeda$dv$fator_vencimento$valor".$dadosboleto['chave_asbace']; 


$dadosboleto["codigo_barras"] = $linha;
$dadosboleto["linha_digitavel"] = monta_linha_digitavel($linha);
$dadosboleto["agencia_codigo"] = $conta;
$dadosboleto["codigo_banco_com_dv"] = $codigo_banco_com_dv;
$dadosboleto["nosso_numero"] = $nossonumero_com_dv;

// FUNÇÕES
// Algumas foram retiradas do Projeto PhpBoleto e modificadas para atender as particularidades de cada banco

function digitoVerificador($numero) {
    $digito = modulo_11($numero);
    if (in_array((int)$digito,array(0,1,10,11))) {
        $digito = 1;
	}
    return $digito;
}

function formata_numero($numero,$loop,$insert,$tipo = "geral") {
	if ($tipo == "geral") {
		$numero = str_replace(",","",$numero);
		$numero = str_replace(".","",$numero);
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
	$data = split("/",$data);
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
		
        $banco    = substr($codigo,0,3);
        $moeda    = substr($codigo,3,1);
        $k        = substr($codigo,4,1);
        $fator    = substr($codigo,5,4);
        $valor    = substr($codigo,9,10);
        $ch       = substr($codigo,-25);
		
        $p1 = $banco.$moeda.substr($ch,0,5);
        $dv_1 = modulo_10($p1);
        $campo1 = substr($p1,0,5).'.'.substr($p1,-4).$dv_1;
		
        $p12 = substr($ch,5,10);
        $dv_2 = modulo_10($p12);
        $campo2 = substr($p12,0,5).'.'.substr($p12,-5).$dv_2;
		
        $p13 = substr($ch,15,10);
        $dv_3 = modulo_10($p13);
        $campo3 = substr($p13,0,5).'.'.substr($p13,-5).$dv_3;
		
        $campo4 = $k;
		
        // 5. Campo composto pelo valor nominal pelo valor nominal do documento, sem
        // indicacao de zeros a esquerda e sem edicao (sem ponto e virgula). Quando se
        // tratar de valor zerado, a representacao deve ser 000 (tres zeros).
        $campo5 = $fator.$valor;
		
        return "$campo1 $campo2 $campo3 $campo4 $campo5"; 
/*
// Composição da Linha Digitável
// Primeiro Campo
$Wtemp=$codigobanco.$nummoeda.substr($chaveasbace,0,5);
$campo1=$Wtemp.modulo_10($Wtemp);
$campo1=substr($campo1,0,5).".".substr($campo1,5,5);
// Segundo Campo
$Wtemp=substr($chaveasbace,5,10);
$campo2=$Wtemp.modulo_10($Wtemp);
$campo2=substr($campo2,0,5).".".substr($campo2,5,6);
// Terceiro Campo
$Wtemp=substr($chaveasbace,15,10);
$campo3=$Wtemp.modulo_10($Wtemp);
$campo3=substr($campo3,0,5).".".substr($campo3,5,6);
// Quarto Campo
//$Wtemp=substr($chaveasbace,15,10);
//$campo4=$Wtemp.modulo_10($Wtemp);
//$campo4=substr($campo4,0,5).".".substr($campo4,5,6);
// Quinto Campo
$campo5=$fator_vencimento.$valor;
echo "$campo1 $campo2 $campo3 $dv $campo5"; 

//$nossonumero = substr($nossonumero_dv,0,14).'-'.substr($nossonumero_dv,14,1);
//$agencia_codigo = $agencia." / ". $conta ."-". $conta_dv;
*/
}

function geraCodigoBanco($numero) {
    $parte1 = substr($numero, 0, 3);
    $parte2 = modulo_11($parte1);
    return $parte1 . "-" . $parte2;
}

?>