<?php 

session_start();
include_once("conexao.php");

if(isset($_GET['id']))
{
	if(isset($_COOKIE['voto_cont']))
	{
		$_SESSION['mensagem'] = "Você já votou, tente novamente mais tarde!    Thanks";
			header("Location: index.php");
			exit;

	}else{

		setcookie('voto_cont', $_SERVER['REMOTE_ADDR'], time() + 5);

		$result_produto = "UPDATE produtos SET qnt_voto=qnt_voto + 1 WHERE id= ' ".$_GET['id']." ' ";

	$resultado_produto = mysqli_query($conn, $result_produto);
//função para veriricar se $conn foi "afetada"
	if (mysqli_affected_rows($conn)){ 
		$_SESSION['mensagem'] = "Voto recebido com sucesso!";
		header("Location: index.php");
			exit;			
			
		}
}

}


 ?>