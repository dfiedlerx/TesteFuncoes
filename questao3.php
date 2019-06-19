<?php
	
function retornaMenorPreco ($frase1, $frase2) {
	
	//Remover conteudo dentro de parenteses
	$regra = "/\([^()]*\)/";
	//Remover conteudo nao numerico
	$regra2 = "/[^0-9.,+]/";
	
	//Aplica expressões e obtem o numero real
	$valor1 = 
		floatval (str_replace('.', '', preg_replace([$regra, $regra2], '', $frase1)));
	
	$valor2 = floatval (str_replace('.', '', preg_replace([$regra, $regra2], '', $frase2)));

	if ($valor1 < $valor2) {
		
		echo 'A frase 1 contém o menor preço. R$ ' , number_format('2', $valor1);
		
	} else if ($valor1 > $valor2) {
	
		echo 'A frase 2 contém o menor preço. R$ ' ,  number_format($valor2, 2, '.', '');
		
	} else {
		
		echo 'Ambas contém o mesmo preço. R$ ' , number_format($valor1, 2, '.', '');
	}
		
}

$dadoObtido1 = 'Melhor preço sem escalas R$ 1.367(1)';
$dadoObtido2 = 'Melhor preço com escalas R$ 994 (1)';

retornaMenorPreco($dadoObtido1, $dadoObtido2);
