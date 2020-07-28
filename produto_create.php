<?php
	include_once("conexao.php");
	
	$nome = mysqli_real_escape_string($conn, $_POST['nome']);
	$detalhes = mysqli_real_escape_string($conn, $_POST['detalhes']);
	$codigo_barras = mysqli_real_escape_string($conn, $_POST['codigo_barras']);
	$valor = mysqli_real_escape_string($conn, $_POST['valor']);
	$nome_foto = $_FILES['imagem']['name'];
	$categoria = $_POST['categoria'];
    $quantidade = mysqli_real_escape_string($conn, $_POST['quantidade']);


	
	
        $formatosPermitidos = array("png","jpeg", "jpg");
        $extensao = pathinfo($_FILES['imagem']['name'],PATHINFO_EXTENSION );
    
        if(in_array($extensao,$formatosPermitidos)){
            $pasta = "upload/";
            $temporario = $_FILES['imagem']['tmp_name'];
			$novo_nome = uniqid().".$extensao";
			var_dump($novo_nome);
			
            if(move_uploaded_file($temporario, $pasta.$novo_nome)){
                echo "upload done para $pasta.$novo_nome";
            }else{
                echo "erro, não foi possível upar o arquivo $temporario";
            }		
        }else{
            echo"formato inválido";
        } 

	$result_produtos = "INSERT INTO produto (nome, detalhe, codigo_barras, valor, Foto, fk_categoria, quantidade) 
						            VALUES ('$nome', '$detalhes', '$codigo_barras', '$valor', '$novo_nome', '$categoria','$quantidade')";	
	$resultado_produtos = mysqli_query($conn, $result_produtos);	
?>

<!DOCTYPE html>
<html lang="pt-br"> 
	<head>
		<meta charset="utf-8">
	</head>

	<body> <?php
		if(mysqli_affected_rows($conn) != 0){
			$processo = $_SESSION['usuarioNome']." cadastrou um novo produto no estoque (".$nome.") com ".$quantidade." unidades";
			$result_processo = "INSERT INTO log (processo, horario) VALUES ('$processo', NOW())";	
			$resultado_processos = mysqli_query($conn, $result_processo);
			echo "
				<script type=\"text/javascript\">
					alert(\"Produto Cadastrado com Sucesso.\");
				</script>
			";	
			header("Location: produto.php");
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Estock-master/produto.php'>
				<script type=\"text/javascript\">
					alert(\"Produto não foi cadastrado com Sucesso.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>