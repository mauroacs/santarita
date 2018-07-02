<?php
	require_once('./db.class.php');
	$db = new db();
	$conn = $db->conecta_mysql();

     if(!empty($_POST['Nome'])){
     $res = $conn->query("select * from clientes where Nome like '"
             . "%{$_POST['Nome']}%';");
	}
?>	
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Pesquisar</title>
</head>
<body>
	<br>
	<a href="index.php">Voltar</a>
	<br>
	<h1>Escreva o nome a procurar</h1>
	<form action="#" method="post">	
		<div>
		<label for="Nome">Nome a procurar:</label> 
		<input type="text" name="Nome" required>
		</div>
		<div>
		<input type="submit" value="Pesquisar" name="">
		</div>
	</form>
	<br>
	<?php
		if(!empty($_POST['Nome'])){
	?>
		<div>
			<table border="7">
				<thead>
					<tr>
					<th> Código </th>
					<th> Nome </th>
					<th> Endereco </th>
					</tr>
				</thead>
				<tbody>
			<?php 
			for ($i = 0; $i < $res->num_rows; $i++) {
                                   $res->data_seek($i);
                                   $row = $res->fetch_assoc();
			?>
                        <tr>
		        <td><?php echo $row['Cod_cli']; ?></td>
		        <td><?php echo $row['Nome']; ?></td>
	                <td><?php echo $row['Endereco']; ?></td>
                         </tr> 
			<?php } ?>
		        </tbody>
			</table>
		</div>
	<?php } ?>
</body>
</html>