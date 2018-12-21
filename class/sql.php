<?php

// Tudo que o PDO faz a minha classe Faz também pela extensão
class Sql extends PDO {

	private $conn;

	//Conexão automática com o banco de dados
	public function __construct() {
		$this->conn = new PDO("mysql:dbname=dbphp7;host=127.0.0.1", "root", "");
	}

	//Declarar parâmetros únicos
	private function setParam($statment, $key, $value) {
		$statment->bindParam($key, $value);
	}

	// Declarar paramêtros compostos utilizando a função já criada
	private function setParams($statment, $parameters = array()) {

		foreach ($parameters as $key => $value) {
			$this->setParam($key, $value);
		}

	}

	public function query($rawQuery, $params = array()) {

		$statment = $this->conn->prepare($rawQuery);

		$this->setParams($statment, $params);

		$statment->execute();

		return $statment;

	}

	public function select($rawQuery, $params = array()):array
	{
		$statment = $this->query($rawQuery, $params);

		return $statment->fetchAll(PDO::FETCH_ASSOC);

	}

}


?>