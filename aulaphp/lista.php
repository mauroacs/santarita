<?php
	require_once('./db.class.php');
	$db = new db();
	$conn = $db->conecta_mysql();
	$res = $conn->query('select * from clientes');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Clientes</title>
</head>
<body>
<br>
  <a href="index.php">Voltar</a>
	<br>
	<h1>Lista de Clientes</h1>
	<p>Nº de registros encontrados: 
            <?php echo $res->num_rows; ?></p>
	<table border="1">
		<thead>
			<tr>
			<th>codigo</th>
			<th>nome</th>
			<th>endereço</th>
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
</body>
</html>
