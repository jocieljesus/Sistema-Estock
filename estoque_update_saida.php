<?php
	session_start();
    include_once("conexao.php");
	$id = mysqli_real_escape_string($conn, $_POST['id']);
    $quantidade_entrada = mysqli_real_escape_string($conn, $_POST['quantidade']);
	$quantidade_antiga = mysqli_real_escape_string($conn, $_POST['qtd']);
	
	if ($quantidade_antiga >= $quantidade_entrada){
		$quantidade = $quantidade_antiga - $quantidade_entrada;
		
    	$result_produtos = "UPDATE produto SET quantidade = '$quantidade' WHERE id = '$id'";
    	$resultado_produtos = mysqli_query($conn, $result_produtos);	
	}
	
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> <?php
		if(mysqli_affected_rows($conn) != 0){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/estock-master/estoque.php'>
				<script type=\"text/javascript\">
					alert(\"Quantidade alterada com sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/estock-master/estoque.php'>
				<script type=\"text/javascript\">
					alert(\"Quantidade não alterada!\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>