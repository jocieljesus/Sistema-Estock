<?php
	include_once("conexao.php");
	include('index.php');
	
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    
	$result_categorias = "INSERT INTO categoria (Nome) VALUES ('$nome')";	
	$resultado_categorias = mysqli_query($conn, $result_categorias);	
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> <?php
		if(mysqli_affected_rows($conn) != 0){
			$processo = $_SESSION['usuarioNome']." adcionou ".$nome." no banco de categorias";
			$result_processo = "INSERT INTO log (processo) VALUES ('$processo')";	
			$resultado_processos = mysqli_query($conn, $result_processo);
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Estock-master/produto.php'>
				<script type=\"text/javascript\">
					alert(\"Categoria Cadastrada com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Estock-master/produto.php'>
				<script type=\"text/javascript\">
					alert(\"Categoria não foi cadastrada com Sucesso.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>