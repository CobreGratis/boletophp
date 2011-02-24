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
// | PHPBoleto de João Prado Maia e Pablo Martins F. Costa                |
// | 																	                                    |
// | Se vc quer colaborar, nos ajude a desenvolver p/ os demais bancos :-)|
// | Acesse o site do Projeto BoletoPhp: www.boletophp.com.br             |
// +----------------------------------------------------------------------+

// +----------------------------------------------------------------------+
// | Equipe Coordenação Projeto BoletoPhp: <boletophp@boletophp.com.br>   |
// | Desenvolvimento Boleto Banespa : Fabio Gabbay                  		  |
// +----------------------------------------------------------------------+


$codigobanco = "033";
$codigo_banco_com_dv = geraCodigoBanco($codigobanco);
$nummoeda = "9";
$fator_vencimento = fator_vencimento($dadosboleto["data_vencimento"]);

//valor tem 10 digitos, sem virgula
$valor = formata_numero($dadosboleto["valor_boleto"],10,0,"valor");
//Modalidade Carteira
$carteira = $dadosboleto["carteira"];
//codigocedente deve possuir 11 caracteres
$codigocliente = formata_numero($dadosboleto["codigo_cedente"],11,0,"valor");

// Formata no pedido para colocar zero à esquerda
$nossonumero   = substr("0000000", strlen($dadosboleto['nosso_numero'])).$dadosboleto['nosso_numero'];

// Calcula vencimento juliano
$vencjuliano = dataJuliano($vencimento);

// Calcula Campo Livre
$campoLivre = calculaCampoLivre($codigocliente.$nossonumero."00".$codigobanco);

// 43 números para o cálculo do dígito verificador do código de barras
// retorna 44 números que são 43 + 1 dígito verificador formando 44 posições
$linha = monta_codigo_de_barras($codigobanco.$nummoeda.$fator_vencimento.$valor.$codigocliente.$nossonumero."00".$codigobanco.substr($campoLivre, strlen($campoLivre)-2));

$dadosboleto["codigo_barras"] = $linha;
$dadosboleto["linha_digitavel"] = monta_linha_digitavel($linha);
$dadosboleto["nosso_numero"] = calcula_verificador_nosso_numero($dadosboleto["ponto_venda"], $nossonumero);
$dadosboleto["agencia_conta"] = substr($dadosboleto["codigo_cedente"],0,3)." ".substr($dadosboleto["codigo_cedente"],3,2)." ".substr($dadosboleto["codigo_cedente"],5,5)." ".substr($dadosboleto["codigo_cedente"],10);
$dadosboleto["codigo_banco_com_dv"] = $codigo_banco_com_dv;




function geraNossoNumero($no_pedido,$dig_inicial) 
{
	$ndoc = $dig_inicial.$no_pedido;
	return $ndoc . modulo_11($ndoc,9,0);
}

function dataJuliano($data) 
{
	$dia = (int)substr($data,1,2);
	$mes = (int)substr($data,3,2);
	$ano = (int)substr($data,6,4);
	$dataf = strtotime("$ano/$mes/$dia");
	$datai = strtotime(($ano-1).'/12/31');
	$dias  = (int)(($dataf - $datai)/(60*60*24));
  return str_pad($dias,3,'0',STR_PAD_LEFT).substr($data,9,4);
}

function digitoVerificador_nossonumero($numero) {
	$resto2 = modulo_11($numero, 9, 1);
     $digito = 11 - $resto2;
     if ($digito == 10 || $digito == 11) {
        $dv = 0;
     } else {
        $dv = $digito;
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

function calculaCampoLivre ($num) {
	global $digitoUm;	// Torna global D1
	global $digitoDois; // Torna global D2
	global $recalcular; // Caso resto de D2 seja 10 e retorne 1 será registrado como "N" para sair do loop de calculo 
	$digitoUm   = modulo_10($num);
	$digitoDois = 1;

	$loop=0;
	while ($digitoDois == 1) {
		$digitoDois = modulo_11($num.$digitoUm);
		if ($recalcular=="N"){
			break;
		}
	}

	return $num.$digitoUm.$digitoDois;
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

function modulo_11($num)  {
    /**
     *   Autor:
     *           Fabio Gabbay <gabbay@gabbay.com.br>
     *
     *   Função:
     *    Calculo do Modulo 11 para geracao do digito verificador 
     *    de boletos bancarios conforme documentos obtidos 
     *    da Febraban - www.febraban.org.br 
     *
     *   Entrada:
     *     $num: string numérica para a qual se deseja calcularo digito verificador;
     *     $base: valor maximo de multiplicacao [2-8]
     *     $r: quando especificado um devolve somente o resto
     *
     *   Saída:
     *     Retorna o Digito verificador.
     *
     *   Observações:
     *     - Script desenvolvido sem nenhum reaproveitamento de código pré existente.
     *     - Assume-se que a verificação do formato das variáveis de entrada é feita antes da execução deste script.
     */                                        

	$soma=0;
	$fator=2;
	
	for ($i = strlen($num); $i > 0; $i--){
		$soma += substr($num,$i-1,1) * $fator;
		$tmp = substr($num,$i-1,1) * $fator;;
		$fator++;
		if($fator==8){
			$fator=2;
		}
	}
	
	// Calcula resto
	$resto = $soma%11;

	// Torna variavel $recalcular global. Utilizado para saber se deve ou nao continuar no loop de D2
	global $recalcular;
	
	if ($resto==0){
		$digito = 0;
	} elseif ($resto==1){
		// Torna variavel global para alteração de valor conforme manual Banespa
		global $digitoUm;
		
		// Caso D1 igual a 9, passa a valer 0 (zero)
		if ($digitoUm==9){
			$digitoUm=0;
		// Caso contrario adiciona mais 1 para, pois D2 não pode ser igual a 1
		} else {
			$digitoUm++;		
		}
		$recalcular = "S";
	
		// Digito igual a um para continuar no loop após retornar
		$digito=1;
	} else {
		$digito = 11-$resto;
		$recalcular = "N";
	}

	return $digito;
}

function modulo_11_autoconferencia($num)  // Calculo de Modulo 11 (dígito de autoconferencia)
{ 
    $fator = 2;
    $soma = 0;
	
    for ($i = strlen($num); $i > 0; $i--) 
    {
      $soma += substr($num,$i-1,1) * $fator;
	  if($fator >= 9){
	     $fator = 2;
	  } else {
	  	 $fator++;
	  }
    }
	$resto = $soma % 11;
	
	if (($resto==0) || ($resto==1) || ($resto==10)){
		$digito = 1;
	} else {
		$digito = 11 - $resto;
	}
	
	return $digito;
}

function monta_codigo_de_barras($codigo) 
{ 
	// Posição 	Conteúdo
	// 1 a 3    Número do banco
	// 4        Código da Moeda - 9 para Real ou 8 - outras moedas
	// 5 		Dígito de auto-conferência
	// 6 a 9    Fator vencimento
	// 10 a 19  Valor do título (10 posições)
	// 20 a 30  Código do cedente
	// 31 a 37  Nosso numero (7 digitos)
	// 38 a 39  Zeros
	// 40 a 42  033 (Código do banco)
	// 43		1º Dígito verificador
	// 44		2º Dígito verificador
	

	// 1. Primeiro Grupo - composto pela identificação do banco
	$campo1  = substr($codigo,0,3);
	// 2. Segundo Grupo - composto pelo código da moeda
	$campo2  = substr($codigo,3,1);
	// 4. Quarto Grupo - composto pelo fator de vencimento (4 dígitos) e valor do título (10 dígitos)
	$campo4  = substr($codigo,4,14);
	// 5. Quinto Grupo - composto pelo código do cedente
	$campo5  = substr($codigo,18,11);
	// 6. Sexto Grupo - composto pelo nosso número
	$campo6  = substr($codigo,29,7);
	// 7. Sétimo Grupo - composto por 2 zeros
	$campo7  = substr($codigo,36,2);
	// 8. Oitavo Grupo - composto pelo código do banco
	$campo8  = substr($codigo,38,3);
	// 9. Nono Grupo - composto pelo 1º Dígito verificador
	$campo9  = substr($codigo,41,1);
	// 10. Décimo Grupo - composto pelo 2º Dígito verificador
	$campo10 = substr($codigo,42,1);


	$fator = 2;
	$soma = 0;
	
    for ($i = strlen($codigo); $i > 0; $i--) 
    {
      $soma += substr($codigo,$i-1,1) * $fator;
	  if($fator >= 9){
	     $fator = 2;
	  } else {
	  	 $fator++;
	  }
    }
	$resto = $soma % 11;

	if (($resto==0) || ($resto==1) || ($resto==10)){
		$campo3 = 1;
	} else {
		$campo3 = 11 - $resto;
	}
	
	return $campo1.$campo2.$campo3.$campo4.$campo5.$campo6.$campo7.$campo8.$campo9.$campo10; 
}

function monta_linha_digitavel($linha){
	// 1º. Campo: composto pelo código de Banco, código da moeda, as cinco primeiras posições  do campo livre e  dígito verificador (módulo 10) deste campo;
    // 2º. Campo: composto pelas  posições 6ª. à 15ª. do  campo livre e dígito verificador (módulo 10) deste campo;
    // 3º. Campo: composto pelas posições 16ª. à 25ª. do campo livre e dígito  verificador (módulo 10) deste campo;
    // 4º. Campo: Dígito verificador do código de barras (dígito de autoconferência);
    // 5º. Campo: Composto pelo Fator de  Vencimento (anexo 7) e o Valor Nominal do documento, com a inclusão  de  zeros entre eles até compor as 14 posições do campo,  e sem edição de ponto e vírgula. 
    //            Quando se tratar de bloqueto sem discriminação de valor no código de barras a representação deverá ser com zeros. 
	
	$campo1 = substr($linha,0,3).substr($linha,3,1).substr($linha,19,5);
	$campo1Digito = modulo_10($campo1);
	
	$campo2 = substr($linha,24,10);
	$campo2Digito = modulo_10($campo2);
	
	$campo3 = substr($linha,34,10);
	$campo3Digito = modulo_10($campo3);
	
	$campo4 = substr($linha,4,1);
	
	$campo5 = substr($linha,5,4).substr($linha,9,10);
	
	// Monta linha digitável como deve imprimir
	$linha = substr($campo1,0,5).".".substr($campo1,5).$campo1Digito." ".substr($campo2,0,5).".".substr($campo2,5).$campo2Digito." ".substr($campo3,0,5).".".substr($campo3,5).$campo3Digito." ".$campo4." ".$campo5;
	return $linha;
}



function calcula_verificador_nosso_numero($agencia, $nossonumero){
	// Junta as duas variáveis para cálculo
	$num = $agencia.$nossonumero;
	// Cria array com os fatores
	$fatores = array (0=>7, 1=>3, 2=>1, 3=>9, 4=>7, 5=>3, 6=>1, 7=>9, 8=>7, 9=>3);
	
	$soma=0;
	
	// Calcula dígito verificador
	for($a=0; $a<10; $a++){
		$numero = substr($num, $a, 1)*$fatores[$a];
		if($numero>=10){
			$soma += substr($numero, 1);
		} else {
			$soma += $numero;
		}
	}
	
	// Monta dígito
	if($soma>10){
		$digito = 10-(substr($soma, strlen($soma)-1,1));
	} else {
		$digito = 10-$soma;
	}
	
	if($digito == 10){
		$digito = 0;
	} 
	
	
	// Retorna valor formatado com o nosso número como deve ser impresso
	return $agencia." ".$nossonumero." ".$digito;
}


function geraCodigoBanco($numero) {
    $parte1 = substr($numero, 0, 3);
    $parte2 = modulo_11($parte1);
    return $parte1 . "-" . $parte2;
}
?>
