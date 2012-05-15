<?php

function digitoVerificador_barra($numero) {
	$resto2 = modulo_11($numero, 9, 1);
	if ($resto2 == 0 || $resto2 == 1 || $resto2 == 10) {
		$dv = 1;
	} else {
		$dv = 11 - $resto2;
	}
	return $dv;
}
