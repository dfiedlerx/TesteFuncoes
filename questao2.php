<?php
/*
Irei simular uma tabela de banco de dados nesta classe com id, Modelo, Placa e Data de entrada
Será possivel inserir, consultar, deletar, editar, e gerar relatorio completo do estacionamento. 
Cada carro possui um id unico e sem repetição mesmo que seja apagado.
*/
class Estacionamento {

	private $quantidadeMaxima;
	private $contadorId = 0;
	
	/*
	 Vagas preenchidas seguira o modelo:
		0 =>
		[
		    	idCarro => 0
			modelo => 'Ford Ka',
			placa => 'WXZ 5452'
			data_entrada => '02/05/2019 05:05:05'
		]
	*/
	private $vagasPreenchidas;
	
	public function __construct ($quantidadeMaxima) {
		
		$this->quantidadeMaxima = $quantidadeMaxima;
		
	}
	
	public function novoCarro ($modelo, $placa) {
	
		if (count($vagasPreenchidas) > $quantidadeMaxima) {
			
			return 'Estacionamento Lotado.';
			
		}
		
		$this->vagasPreenchidas[$this->contadorId] = 
		[
			'idCarro' => $this->contadorId,
			'modelo' => $modelo,
			'placa' => $placa,
			'dataEntrada' => date ('d/m/Y H:i:s')
		];
		
		echo 'O Carro gerado pertence ao Id ' , $this->contadorId , '<br>';
		
		$this->contadorId += 1;
		
	}
	
	public function removeCarro ($idCarro) {
		
		unset ($this->vagasPreenchidas[$idCarro]);
		
	}
	
	public function selecionaCarro ($idCarro) {
		
		$this->relatorioCarroIndividual
		(
			$idCarro,
			$this->vagasPreenchidas[$idCarro]['modelo'],
			$this->vagasPreenchidas[$idCarro]['placa'],
			$this->vagasPreenchidas[$idCarro]['dataEntrada']
		);
		
	}
	
	//Se por acaso um dos termos for vazio, o metodo irá manter o valor antigo sem alterações
	public function editarCarro ($idCarro, $modelo = '', $placa = '') {
		
		$this->vagasPreenchidas[$idCarro]['modelo'] = 
			$modelo !== ''
				? $modelo
				: $this->vagasPreenchidas[$idCarro]['modelo'];
		
		$this->vagasPreenchidas[$idCarro]['placa'] = 
			$placa !== ''
				? $placa
				: $this->vagasPreenchidas[$idCarro]['placa'];
		
	}
	
	/*
	Retorna um compilado com todos os carros armazenados
	Eu poderia ter colocado varias coisas em um echo so mas prezei a boa identação do código
	*/
	public function relatorioDeCarros () {
		
		echo 'Capacidade Máxima: ' , $this->quantidadeMaxima , '<br>';
		echo 'Quantidade de Carros: ' , count($this->vagasPreenchidas) , '<br><br>';
	
		foreach ($this->vagasPreenchidas as $currentVaga) {
			
			$this->relatorioCarroIndividual
			(
				$currentVaga['idCarro'], 
				$currentVaga['modelo'], 
				$currentVaga['placa'], 
				$currentVaga['dataEntrada']
			);
			
		}
		
	}
	
	//Como esse trecho é usado em duas ações da classe, tranformei-o em um metodo
	private function relatorioCarroIndividual ($numeroCarro, $modelo, $placa, $dataEntrada) {
		
		echo 'Carro Numero ' , $numeroCarro , '<br>';
		echo ' - Modelo: ' , $modelo,  '<br>';
		echo ' - Placa: ' , $placa,  '<br>';
		echo ' - Data de Entrada: ' , $dataEntrada,  '<br>';
		
	}
	
}
