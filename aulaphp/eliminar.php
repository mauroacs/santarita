<?php
	require_once('./db.class.php');
	$db = new db();
	$conn = $db->conecta_mysql();

	if(!empty($_POST['Cod_cli'])){
	$r = $conn->query("delete from clientes where Cod_cli = "
                        . "'{$_POST['Cod_cli']}';");
	  if($r){
		echo "Removido cliente '{$_POST['Cod_cli']}'";
		}
		else{
		echo "tente de novo";
		}
	}
?>	
<!DOCTYPE html>
<html>
<head>
	
	<title>Eliminar</title>
</head>
<body>
	<br>
        <meta charset="utf-8">
	<a href="index.php">Voltar</a>
	<br>
	<h1>Eliminar um Cliente</h1>
	<p>Introduza o código do cliente a eliminar:</p>
	<form action="#" method="post">	
		<div>
		<label for="Cod_cli">Código de cliente:</label> 
		<input type="number" name="Cod_cli" required>
		</div>
		<div>
		<input type="submit" value="Eliminar" name="">
		</div>
	</form>
</body>
</html>