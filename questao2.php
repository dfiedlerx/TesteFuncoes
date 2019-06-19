<?php

class Estacionamento {

	private $quantidadeMaxima;
	private $contadorId = 0;
	
	/*
	 Vagas preenchidas seguira o modelo:
		0 =>
		[
		    'idCarro' => 0
			Modelo => 'Ford Ka',
			Placa => 'WXZ 5452'
			Data Entrada => '2019/05/02 05:05:05'
		]
	*/
	private $vagasPreenchidas;
	
	public function __construct ($quantidadeMaxima) {
		
		$this->$quantidadeMaxima = $quantidadeMaxima;
		
	}
	
	
	
}
