<?php
 session_start();
include_once("conexao.php");
 ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<link href="css/css.css" rel="stylesheet">
	<title>Votação</title>
</head>
<body>
	<header id="menu">
		<nav id="nav-menu">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="#">P1</a></li>
				<li><a href="#">P2</a></li>
			</ul>
		</nav>
	</header>

	<div id="interface">


	<h1>Votação para a capa do evento:<span id="titulo_deboismo"> Deboísmo gera Deboísmo</span></h1>

	<?php 

	

	$result_produtos = "SELECT * FROM produtos";
	$resultado_produtos = mysqli_query($conn, $result_produtos);

	while ($row_produto = mysqli_fetch_assoc($resultado_produtos)) {
		?>
		<ul id="select">
			<li>
		<img src="img/<?php echo $row_produto['img'];?> ">
		<?php
		//echo "Número do produto: " . $row_produto['id'] . "<br>";
		//echo "Nome do produto: " . $row_produto['produto'] . "<br>";
		echo "<span id='qnt_voto'> Quantidade de voto: " . $row_produto['qnt_voto'] . "</span><br><br>"; 
		echo "<a href='votar.php?id=" . $row_produto['id'] . "'>Votar</a>";

		?>
		</li>
	</ul>
	<?php
	}
	 ?>

	 <div id="mensagem">
	 	<?php if (isset($_SESSION['mensagem'])){
		echo $_SESSION['mensagem'] . "<br><br>";
		unset($_SESSION['mensagem']);
	}?>
		
	</div>

	

</div>

<footer id="rodape">
		<p>&copy; Lília Paula Neiva</p>
	</footer>

</body>
</html>