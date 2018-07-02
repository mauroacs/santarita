<?php
	require_once('./db.class.php');
	$db = new db();
	$conn = $db->conecta_mysql();


	if(!empty($_POST['Cod_cli'])){
		$r = $conn->query("insert into clientes "
                        . "(Cod_cli,Nome,Endereco) "
                        . "values ('{$_POST['Cod_cli']}', "
                        . "'{$_POST['Nome']}', '{$_POST['Endereco']}');");
		if($r){
			echo "Adicionado '{$_POST['Nome']}'";
		}
		else{
			echo "Tente novamente";
		}
	}
?>	
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Adicionar</title>
</head>
<body>
	<br>
	<a href="index.php">Voltar</a>
	<br>
	<h1>Novo Cliente</h1>
	<form action="#" method="post">	
		<div>
			<label for="Cod_cli">Codigo de Cliente:</label>
			<br>
			<input type="number" name="Cod_cli" required>
		</div>
		<div>
			<label for="Nome">Nome:</label>
			<br>
			<input type="text" name="Nome" required>
		</div>
		<div>
			<label for="morada">Endereço:</label>
			<br>
			<input type="text" name="Endereco" required>
		</div>
		<br>
		<div>
			<input type="submit" value="Inserir" name="">
		</div>
	</form>
</body>
</html>
