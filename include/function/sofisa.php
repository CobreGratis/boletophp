<?php

    $codigobanco = "637";
    $codigo_banco_com_dv = geraCodigoBanco($codigobanco);
    $nummoeda = "9";
    $fator_vencimento = fator_vencimento($dadosboleto["data_vencimento"]);

    //valor tem 10 digitos, sem virgula
    $valor = formata_numero($dadosboleto["valor_boleto"],10,0,"valor");
    //agencia � 4 digitos
    $agencia = formata_numero($dadosboleto["agencia"],4,0);
    //conta � 6 digitos
    $conta = formata_numero($dadosboleto["conta"],6,0);
    //dv da conta
    $conta_dv = formata_numero($dadosboleto["conta_dv"],1,0);
    //carteira � 3 caracteres
    $carteira = formata_numero($dadosboleto["carteira"],3,0);
    //nosso numero � 10 caracteres
    $nosso_numero = formata_numero($dadosboleto["nosso_numero"],10,0);

    //nosso n�mero (sem dv) � 10 digitos
    $nnum = $agencia.$agencia_dv.$carteira.$nosso_numero;

    //dv do nosso n�mero
    $dv_nosso_numero = digitoVerificador_nossonumero($nnum);

    //conta cedente (sem dv) � 6 digitos
    $conta_cedente = formata_numero($dadosboleto["conta_cedente"],6,0);
    //dv da conta cedente
    $conta_cedente_dv = formata_numero($dadosboleto["conta_cedente_dv"],1,0);

    // Numero para o codigo de barras com 44 digitos
    $linha    = "$codigobanco$nummoeda"."0"."$fator_vencimento$valor$agencia$carteira$conta_cedente$conta_cedente_dv$nosso_numero$dv_nosso_numero";
    $dv       = digitoVerificador_barra($linha);

    // Alterando a posi��o 4(digito '0') para o $dv
    $linha[4] = $dv;

    $nossonumero    = $carteira."/".$nosso_numero;
    $agencia_codigo = $agencia."-".$dadosboleto["agencia_dv"]." / ". $conta_cedente ."-". $conta_cedente_dv;

    $dadosboleto["codigo_barras"]       = $linha;
    $dadosboleto["linha_digitavel"]     = monta_linha_digitavel($linha);
    #$dadosboleto["linha_digitavel"]    = monta_linha_digitavel($codigobanco ,$nummoeda ,$dv ,$fator_vencimento ,$valor ,$agencia ,$carteira ,$conta_cedente, $conta_cedente_dv ,$nosso_numero ,$dv_nosso_numero);
    $dadosboleto["agencia_codigo"]      = $agencia_codigo;
    $dadosboleto["nosso_numero"]        = $nossonumero;
    $dadosboleto["codigo_banco_com_dv"] = $codigo_banco_com_dv;

    function digitoVerificador_nossonumero($numero) {
        $fator = 2;
        $soma  = 0;
        
        for($i = 0; $i < strlen($numero); $i++) {
            if($fator == 2) {
                $aux = $numero[$i] * $fator;
                #echo $aux;
                if($aux > 9) {
                    $aux .= "";
                    $soma += $aux[0] + $aux[1];
                } else {
                    $soma += $aux;
                }
                
                $fator = 1;
            } else {
                $aux = $numero[$i] * $fator;
                #echo $aux;
                if($aux > 9) {
                    $aux .= "";
                    $soma += $aux[0] + $aux[1];
                } else {
                    $soma += $aux;
                }
                
                $fator = 2;
            }
        }
        
        $var = $soma % 10;
        $dv  = 10 - $var;
        
        return $dv;
    }


    function digitoVerificador_barra($numero) {
        $pesos = "43290876543298765432987654329876543298765432";
        
        if (strlen($numero) == 44) {
            $soma = 0;
            for ($i = 0; $i < strlen($numero); $i++) {
                $soma += $numero[$i] * $pesos[$i];
            }
            $num_temp = 11 - ($soma % 11);
            if ($num_temp >= 10) {
                $num_temp = 1;
            }
            return $num_temp;
        }
    }


    // FUN��ES
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
        for($f1=9;$f1>=0;$f1--) {
            for($f2=9;$f2>=0;$f2--) {
            $f = ($f1 * 10) + $f2 ;
            $texto = "" ;
            for($i=1;$i<6;$i++) {
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
    } //Fim da fun��o

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
            // 2002-07-07 01:33:34 Macete para adequar ao Mod10 do Ita�
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
        #echo "<br>$num - ". $soma;
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

    /**
     * --Diego
     */
    /*
    function monta_linha_digitavel($codigobanco ,$nummoeda ,$dv ,$fator_vencimento ,$valor ,$agencia ,$carteira ,$conta_cedente, $conta_cedente_dv ,$nosso_numero ,$dv_nosso_numero) {
        $mod10  =  modulo_10($codigobanco.$nummoeda.$agencia.$carteira[0]);
        $campo1 = $codigobanco.$nummoeda.$agencia.$carteira[0].$mod10;
        $campo1 = substr($campo1, 0, 5) .".".substr($campo1, 5, 5);
        
        $mod10  = modulo_10(substr($carteira, 1, 2).$conta_cedente.$conta_cedente_dv.$nosso_numero[0]);
        $campo2 = substr($carteira, 1, 2).$conta_cedente.$conta_cedente_dv.$nosso_numero[0].$mod10;
        $campo2 = substr($campo2, 0, 5) .".". substr($campo2, 5, 6);
        
        $mod10  = modulo_10(substr($nosso_numero, 1, 9).$dv_nosso_numero);
        $campo3 = substr($nosso_numero, 1, 9).$dv_nosso_numero.$mod10;
        $campo3 = substr($campo3, 0, 5) .".". substr($campo3, 5, 6);
        
        $campo4 = $dv;
        
        $campo5 = $fator_vencimento.$valor;
        
        return "$campo1 $campo2 $campo3 $campo4 $campo5"; 
    }
    */


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
        $p1     = substr($codigo, 0, 4);
        $p2     = substr($codigo, 19, 5);
        $p3     = modulo_10("$p1$p2");
        $p4     = "$p1$p2$p3";
        $p5     = substr($p4, 0, 5);
        $p6     = substr($p4, 5);
        $campo1 = "$p5.$p6";
        
        // 2. Campo - composto pelas posi�oes 6 a 15 do campo livre
        // e livre e DV (modulo10) deste campo
        $p1     = substr($codigo, 24, 10);
        $p2     = modulo_10($p1);
        $p3     = "$p1$p2";
        $p4     = substr($p3, 0, 5);
        $p5     = substr($p3, 5);
        $campo2 = "$p4.$p5";
        
        // 3. Campo composto pelas posicoes 16 a 25 do campo livre
        // e livre e DV (modulo10) deste campo
        $p1     = substr($codigo, 34, 10);
        $p2     = modulo_10($p1);
        $p3     = "$p1$p2";
        $p4     = substr($p3, 0, 5);
        $p5     = substr($p3, 5);
        $campo3 = "$p4.$p5";
        
        // 4. Campo - digito verificador do codigo de barras
        $campo4 = substr($codigo, 4, 1);
        
        // 5. Campo composto pelo fator vencimento e valor nominal do documento, sem
        // indicacao de zeros a esquerda e sem edicao (sem ponto e virgula). Quando se
        // tratar de valor zerado, a representacao deve ser 000 (tres zeros).
        $p1     = substr($codigo, 5, 4);
        $p2     = substr($codigo, 9, 10);
        $campo5 = "$p1$p2";
        
        return "$campo1 $campo2 $campo3 $campo4 $campo5"; 
    }

    function geraCodigoBanco($numero) {
        $parte1 = substr($numero, 0, 3);
        $parte2 = modulo_11($parte1);
        return $parte1 . "-" . $parte2;
    }

?>
