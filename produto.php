<?php
 	session_start();
	include_once("conexao.php");
	include_once("modal.php");
	$result_cursos = "SELECT * FROM produto";
	$resultado_cursos = mysqli_query($conn, $result_cursos);

	

?>
<!DOCTYPE html>
<?php if($_SESSION['log'] == "logado"){?>
	<html lang="pt-br">
		<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<title>Produto</title>
			<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
			<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
			<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
			<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
			<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
			<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
			<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
			<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">	
			<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
			<link rel="stylesheet" type="text/css" href="css/util.css">
			<link rel="stylesheet" type="text/css" href="css/style_telas.css">

			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	
			
		</head>
		<body>
		<div class="limiter">
		<?php
			include_once("header_produto.php");
		?>
	<div class="conteudo">
		<div class="container theme-showcase" role="main">
			<div class="page-header">	
				<a href="http://localhost/estock-master/arquivo.php"><button type="button" class="quadrinhoarredondadoexemplo pull-right" >Gerar relatório</button></a>
				<button type="button" class="quadrinhoarredondadoexemplo pull-right" data-toggle="modal" data-target="#myModalcad">Cadastrar Produto</button>
				<button type="button" class="quadrinhoarredondadoexemplo pull-right" data-toggle="modal" data-target="#myModalcadCat">Cadastrar Categoria</button>
				<h1><img src="images/etiqueta.png" style="margin-right: 5px">Listar Produtos</h1>
			</div>
			
			<?php 	
			// if($_SESSION['permissao']=="1"){?>
				<!-- <div class="pull-right">
					<a href="http://localhost/estock-master/arquivo.php"><button type="button" class="quadrinhoarredondadoexemplo" >Gerar relatório</button></a>
				</div> -->
				<!-- <div class="pull-right">
					<button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#myModalcad">Cadastrar Produto</button>
				</div> -->
				<!-- <div class="pull-right">
					<button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#myModalcadCat">Cadastrar Categoria</button>
				</div> -->
			<?php //} ?>
			<div class="container theme-showcase">
				<div class="col-md-12">
					<table class="table"> 
						<thead>
							<tr>
								<th width="10%">Código</th>
                                <th width="60%">Nome do Produto</th>
                                
                                <?php if($_SESSION['permissao']=="1"){?>
                                <th class="cabecalho" width="10%">Detalhes</th>
                                <th class="cabecalho" width="10%">Editar</th>
                                <th class="cabecalho" width="10%">Excluir</th>
                                <?php } ?>

                                <?php if($_SESSION['permissao']!="1"){?>
                                <th class="cabecalho" width="30%">Detalhes</th>
                                <?php } ?>
							</tr>
						</thead>
						<tbody>
							<?php while($rows_produto = mysqli_fetch_assoc($resultado_cursos)){ ?>
								<tr>
									<td><?php echo $rows_produto['id']; ?></td>
									<td><?php echo $rows_produto['nome']; ?></td>
									<td>
                                        <button type="button" class="buttonacao-1" data-toggle="modal" data-target="#myModal<?php echo $rows_produto['id']; ?>" style="padding-top: 0px;"><img src="images/procurar.png"></button>
                                    </td>
									<?php if($_SESSION['permissao']=="1"){?>
									<td>
										<button type="button" class="buttonacao-2" data-toggle="modal" data-target="#exampleModal<?php echo $rows_produto['id']; ?>" ><img src="images/config.png"></button>
									</td>
									<td>
										<button type="button" class="buttonacao-3"  data-toggle="modal" data-target="#myModalDel<?php echo $rows_produto['id']; ?>" data-whatever="<?php echo $rows_produto['id']; ?>"><img src="images/del.png"></button>
									</td>
									<?php } ?>	
								<!-- INÍCIO MODAL EXIBIR -->
								<div class="modal fade" id="myModal<?php echo $rows_produto['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<?php include("modal/modal_produto_exibir.php"); ?>
								</div>
								<!-- FIM MODAL EXIBIR -->

								<!-- INICIO MODAL ALTERAR PRODUTO -->
								<div class="modal fade" id="exampleModal<?php echo $rows_produto['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
									<?php include("modal/modal_produto_alterar.php"); ?>
								</div>
								<!-- FIM MODAL ALTERAR PRODUTO  -->

								<!-- MODAL APAGAR PRODUTO -->
								<div class="modal fade" id="myModalDel<?php echo $rows_produto['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<?php include("modal/modal_produto_deletar.php"); ?>
								</div>
								<!-- FIM MODAL APAGAR PRODUTO-->
							<?php } ?>
								</tr>
								
								
				

						</tbody>
						
					</table>
				</div>
			</div>
</div>
	
		<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
		<script src="vendor/animsition/js/animsition.min.js"></script>
		<script src="vendor/bootstrap/js/popper.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/daterangepicker/moment.min.js"></script>
		<script src="vendor/daterangepicker/daterangepicker.js"></script>
		<script src="vendor/countdowntime/countdowntime.js"></script>					
	
		<!-- jQuery-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>  
		<!-- Include plugins -->
		<script src="js/bootstrap.min.js"></script>
		<script type="text/javascript">
			$('#exampleModal').on('show.bs.modal', function (event) {
			//mask
			$('#valor').mask('#.##0,00', {reverse: true});
			$('#valor1').mask('#.##0,00', {reverse: true});
			})
			function previewImagem(){
					var imagem = document.querySelector('input[name=imagem]').files[0];
					var preview = document.querySelector('img');
					
					var reader = new FileReader();
					
					reader.onloadend = function () {
						preview.src = reader.result;
					}
					
					if(imagem){
						reader.readAsDataURL(imagem);
					}else{
						preview.src = "";
					}
				}
		</script>
	</body>
	</html>
<?php }else{
	header("Location: index.php");
}?>