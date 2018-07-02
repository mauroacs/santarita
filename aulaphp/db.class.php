<?php
class db {
	private $host = 'localhost';
	private $usuario = 'root';
	private $senha = '123';
	private $database = 'aula_php';
	public function conecta_mysql(){
	//criar a conexao
	$con = mysqli_connect($this->host, $this->usuario,
                $this->senha, 
                $this->database);
	//ajustar o charset de comunicação entre a aplicação e o banco de dados
	mysqli_set_charset($con, 'utf8');
	//verficar se houve erro de conexão
	if(mysqli_connect_errno()){
        echo 'VOCÊ ERROU ALGO NESTA CONEXÃO:'
            .mysqli_connect_error();	
	}
	 return $con;
	}
}
?>
