<?php
    session_start();
	include_once("conexao.php");
	include("modal.php");
	$result_cursos = "SELECT * FROM produto";
	$resultado_cursos = mysqli_query($conn, $result_cursos);
	$nome = mysqli_real_escape_string($conn, $_POST['nomeproduto']);
    $result_search = "SELECT * FROM produto WHERE nome LIKE '%$nome%'";
    $resultado_search = mysqli_query($conn, $result_search);
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
				
				<h1><img src="images/etiqueta.png" style="margin-right: 5px">Exibindo resultados de "<?php echo "$nome";?>" </h1>
			</div>
			
			
			<div class="container theme-showcase">
				<!-- <div class="page-header"> -->
				<!-- </div> -->
				<!-- <div class="row"> -->
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
								<?php while($rows_produto = mysqli_fetch_assoc($resultado_search)){ ?>
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
									<!-- Inicio Modal EXIBIR -->
									<div class="modal fade" id="myModal<?php echo $rows_produto['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h4 class="modal-title text-center" id="myModalLabel"><?php echo $rows_produto['nome']; ?></h4>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													
												</div>
												<div class="modal-body">
													<p><?php echo "Código: ".$rows_produto['id']; ?></p><hr>
													<p><?php echo "Nome: ".$rows_produto['nome']; ?></p><hr>
													<p><?php echo "Descrição: ".$rows_produto['detalhe']; ?></p><hr>
													<p><?php echo "Código de Barras: ".$rows_produto['codigo_barras']; ?></p><hr>
													<p><?php echo "Preço: ".$rows_produto['valor'	]; ?></p><hr>
													<p><?php $teste = $rows_produto['fk_categoria']; 
														$teste1 = "SELECT nome FROM categoria WHERE id='$teste'";
														$result = mysqli_query($conn, $teste1);
														$row_categoria1 = mysqli_fetch_assoc($result);
														echo "Categoria: ".$row_categoria1['nome'];
													?></p><hr>
													

													<p><?php //echo "Categoria : ".$rows_produto['fk_categoria']; ?></p>
													<img src="<?php echo "upload/".$rows_produto['Foto'] ?>" style="width: 150px; height: 150px;"><br><br>
												</div>
											</div>
										</div>
									</div>
									<!-- FIM MODAL EXIBIR -->
									<!-- INICIO MODAL ALTERAR PRODUTO -->
									<div class="modal fade" id="exampleModal<?php echo $rows_produto['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h4 class="modal-title" id="exampleModalLabel">Produto</h4>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													
												</div>
												<div class="modal-body">
														<form method="POST" action="http://localhost/Estock-master/produto_update.php" enctype="multipart/form-data">
															<div class="form-group">
																<label for="recipient-name" class="control-label">Nome:</label>
																<input value="<?php echo $rows_produto['nome']; ?>" name="nome" type="text" class="form-control" id="recipient-name">
															</div>

															<div class="form-group">
																<label for="detalhes" class="control-label">Detalhes:</label>
																<textarea v name="detalhes" class="form-control" id="detalhes"><?php echo $rows_produto['detalhe']; ?></textarea>
															</div>

															<div class="form-group">
																<label for="codigo_barras" class="control-label">Código de Barras :</label>
																<input value="<?php echo $rows_produto['codigo_barras']; ?>" name="codigo_barras" type="text" class="form-control" id="codigo_barras">
															</div>

															<div class="form-group">
																<label for="valor" class="control-label">Valor :</label>   			<!-- VALOR -->
																<input value="<?php echo $rows_produto['valor']; ?>" name="valor" type="text" class="form-control" id="valor">
															</div>
															<input type="file" name="imagem" id="imagem" onchange="previewImagem()"><br><br>
															<img src="<?php echo "upload/".$rows_produto['Foto'] ?>" style="width: 150px; height: 150px;"><br><br>							<!-- FOTO -->
															<input name="id" type="hidden" class="form-control" id="id-curso" value="<?php echo $rows_produto['id']; ?>">
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
																<button type="submit" class="btn btn-danger">Alterar</button>
															</div>
														</form>
												</div>
											</div>
										</div>
									</div>
									<!-- FIM MODAL ALTERAR PRODUTO  -->

									<!-- MODAL APAGAR PRODUTO -->
									<div class="modal fade" id="myModalDel<?php echo $rows_produto['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h4 class="modal-title text-center" id="myModalLabel"><?php echo $rows_produto['nome']; ?></h4>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													
												</div>
												<div class="modal-body">
													<p>Tem certeza que deseja apagar o <?php echo "  ".$rows_produto['nome']; ?> ?</p>
													<form method="POST" action="http://localhost/estock1/produto_delete.php" enctype="multipart/form-data">
															<input name="id" type="hidden" class="form-control" id="id-curso" value="">
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
																<a href="<?php echo "produto_delete.php?id=".$rows_produto['id'] ."";?>"><button type="button" class="btn btn-danger" >Apagar</button></a>
															</div>
													</form>
												</div>
											</div>
										</div>
									</div>
									<!-- FIM MODAL APAGAR PRODUTO-->
								<?php } ?>
							</tbody>
						</table>
					</div>
				<!-- </div>		 -->
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