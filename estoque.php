<?php
 	session_start();
	include_once("conexao.php");
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
			<title>Estoque</title>
			
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
				include_once("header_estoque.php");
			?>	

			<div class="conteudo">
				<div class="container theme-showcase" role="main">
					<div class="page-header">	
						<a href="http://localhost/estock-master/arquivo.php"><button type="button" class="quadrinhoarredondadoexemplo pull-right" >Gerar relatório</button></a>
						<h1><img src="images/etiqueta.png" style="margin-right: 5px">Estoque</h1>
					</div>
			
					<div class="container theme-showcase">
						<div class="col-md-12">
							<table>
								<thead>
									<tr>
										<th width="10%">Código</th>
										<th width="30%">Nome do Produto</th>
										<th width="10%">Foto</th>
										<th width="20%">Código de Barras</th>
										<th width="10%">Quantidade</th>
										<th width="10%">Entrada</th>
										<th width="10%">Saída</th>
									</tr>
								</thead>
								<tbody>                         <!-- EXIBIR ESTOQUE-->
									<?php while($rows_produto = mysqli_fetch_assoc($resultado_cursos)){ ?>
										<?php $quantidade = $rows_produto['quantidade'] ?>
										<?php if($quantidade>0){ ?>
											<tr>
												<td width="10%"><?php echo $rows_produto['id']; ?></td>
												<td width="30%"><?php echo $rows_produto['nome']; ?></td>
												<td width="10%"><img src="<?php echo "upload/".$rows_produto['Foto'] ?>" style="width: 35px; height: 35px;"><br><br></td>
												<td width="20%"><?php echo $rows_produto['codigo_barras']; ?></td>
												<td width="10%"><?php echo $rows_produto['quantidade']; ?></td>
												<td width="10%">
													<button type="button" class="buttonacao-2" data-toggle="modal" data-target="#modalMais<?php echo $rows_produto['id']; ?>" ><img src="images/seta.png"></button>
												</td>
												<td width="10%">
													<button type="button" class="buttonacao-2" data-toggle="modal" data-target="#modalMenos<?php echo $rows_produto['id']; ?>" ><img src="images/menos.png"></button>
												</td>
												

											  
										<?php } ?>
										</tr>
										<div class="modal fade" id="modalMais<?php echo $rows_produto['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
											<?php include("modal/modal_adicionar_produto.php"); ?>
										</div>
										<div class="modal fade" id="modalMenos<?php echo $rows_produto['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
											<?php include("modal/modal_saida_produto.php"); ?>
										</div>

									<?php } ?>
								</tbody>
							</table>
						</div>		
					</div>
										
			<!-- ESGOTADOS  ESGOTADOS ESGOTADOS ESGOTADOS ESGOTADOS ESGOTADOS ESGOTADOS ESGOTADOS ESGOTADOS ESGOTADOS ESGOTADOS ESGOTADOS ESGOTADOS ESGOTADOS ESGOTADOS ESGOTADOS ESGOTADOS-->
			<?php	
				$result_cursos = "SELECT * FROM produto";
				$resultado_cursos = mysqli_query($conn, $result_cursos);
			?>
			<div class="container theme-showcase" >
				<div class="page-header"> 
					<h1><img src="images/etiqueta.png" style="margin-right: 5px">Esgotados</h1>
				</div>
				<div class="container theme-showcase">
					<div class="col-md-12">
						<table class="table">
							<thead>
								<tr>
									<th width="10%">Código</th>
									<th width="30%">Nome do Produto</th>
									<th width="10%">Foto</th>
									<th width="30%">Código de Barras</th>
									<th width="10%">Quantidade</th>
									<th width="10%">Entrada</th>
								</tr>
							</thead>
							<tbody>                         <!-- EXIBIR ESTOQUE-->
								<?php while($rows_produto = mysqli_fetch_assoc($resultado_cursos)){ ?>
									<?php $quantidade = $rows_produto['quantidade'] ?>
									<?php if($quantidade<=0){ ?>
										<tr>
											<td width="10%"><?php echo $rows_produto['id']; ?></td>
											<td width="30%"><?php echo $rows_produto['nome']; ?></td>
											<td width="10%"><img src="<?php echo "upload/".$rows_produto['Foto'] ?>" style="width: 35px; height: 35px;"><br><br></td>
											<td width="30%"><?php echo $rows_produto['codigo_barras']; ?></td>
											<td width="10%"><?php echo $rows_produto['quantidade']; ?></td>
											<td width="10%">
													<button type="button" class="buttonacao-2" data-toggle="modal" data-target="#modalMais<?php echo $rows_produto['id']; ?>" ><img src="images/seta.png"></button>
											</td> 
										
									<?php } ?>
									</tr> 
									<div class="modal fade" id="modalMais<?php echo $rows_produto['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
											<?php include("modal/modal_adicionar_produto.php"); ?>
									</div>
								<?php } ?>
							</tbody>
						</table>
					</div>		
				</div>
			</div>
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
		<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="crossorigin="anonymous"></script>			
		<script src="js/bootstrap.min.js"></script>	
		<script>
			$(() =>{
				$("input[name='quantidade_estoque']").on('change', e =>{
					const campo = e.target;
					const id_produto = campo.getAttribute("product-id");
					const qte_digitada = campo.value;

					var requisicao = $.ajax("/estock-master/estoque_altera.php", {type: "POST", data: {id: id_produto, quantidade: qte_digitada}});
					requisicao.done(function(mensagem){
						location.reload();
					});
					// alert("iD é " + id_produto + ", Qte é " + qte_digitada);	
				});
			});
		</script>
	</body>
	</html>
<?php }else{
	header("Location: index.php");
}?>