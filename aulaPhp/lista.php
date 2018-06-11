<?php
include("./db.class.php");
$sql = "SELECT * FROM clientes";
$res = $conn->query($sql);
include('head.html');
?>
<a href="index.html">Voltar</a>
<br>

<h1>Lista de Clientes</h1>
<p>Nº de Registros encontrados:<?php echo $res -> num_rows; ?></p>
<table border="1">
	<thead>
		<tr>
			<th>Codigo</th>
			<th>Nome</th>
			<th>Idade</th>
			<th>Endereço</th>
		</tr>
	</thead>
	<tbody>
		<?php
			for ($i = 0; $i < $res -> num_rows; $i++) {
				$res -> data_seek($i);
				$row = $res -> fetch_assoc();
		?>
		<tr>
			<td><?php echo $row['codigo']; ?></td>
			<td><?php echo $row['endereco']; ?></td>
			<td><?php echo $row['idade']; ?></td>
			<td><?php echo $row['nome']; ?></td>
		</tr>

		<?php			
			}

		?>
			</tbody>
	</table>
</body>
</html>

