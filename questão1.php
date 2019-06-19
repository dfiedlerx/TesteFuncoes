<?php

function segundoGrau ($a, $b, $c) {
	
	//Trativa para casos em que for passado algum valor incorreto
	if (!is_numeric ($a) || !is_numeric ($b) || !is_numeric ($c)) {
		
		return 'Um dos elementos passados não é um número.';
		
	}
	
	//Obtendo delta b2 | -4 * a * c
	$delta = ($b * $b) - (4 * $a * $c);
	
	if ($delta < 0) {
		
		return 'Delta Negativo. Valor (' . $delta . ')';
		
	}
	
	//Calculando valor x1 e x2 | (-b +- raiz quadrada de delta)/2a
	$x1 = ($b * -1) + sqrt($delta) / (2 * $a);
	$x2 = ($b * -1) - sqrt($delta) / (2 * $a);
	
	//Condicionais proprias de uma 
	
	return 'X1 = ' . $x1 . ' | X2 = ' . $x2;
	
}
