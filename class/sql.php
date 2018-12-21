<?php

// Tudo que o PDO faz a minha classe Faz também pela extensão
class Sql extends PDO {

	private $conn;

	//Conexão automática com o banco de dados
	public function __construct() {
		$this->conn = new PDO("mysql:dbname=dbphp7;host=127.0.0.1", "root", "");
	}

	//Declarar parâmetros únicos
	private function setParam($statement, $key, $value) {
		$statement->bindParam($key, $value);
	}

	// Declarar paramêtros compostos utilizando a função já criada
	private function setParams($statement, $parameters = array()) {

		foreach ($parameters as $key => $value) {
			$this->setParam($statement, $key, $value);
		}

	}

	public function query($rawQuery, $params = array()) {

		$statement = $this->conn->prepare($rawQuery);

		$this->setParams($statement, $params);

		$statement->execute();

		return $statement;

	}

	public function select($rawQuery, $params = array()):array
	{
		$statment = $this->query($rawQuery, $params);

		return $statment->fetchAll(PDO::FETCH_ASSOC);

	}

}


?>