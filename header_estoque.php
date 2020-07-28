<div class="banner">
	<div class="login100-form-title" style="background-image: url(images/teste.png);">
		<span class="login100-form-title-1">Estock </span>
	</div>

	<nav class="navbar navbar-light bg-light" style="margin-bottom: 0px;">
		<form class="form-inline" method="POST" action="http://localhost/estock-master/estoque_search.php">
			<input class="form-control mr-sm-2" type="text" name="nomeproduto" placeholder="Pesquisar no estoque" aria-label="Pesquisar">
			<button type="submit" name="SendPesqUser" class="btn btn-outline-light"><i class="fa fa-search" style="color:#666666"></i></button>
		</form>

		<ul class="nav justify-content-end">
			<li class="nav-item">
				<a class="nav-link active" href="http://localhost/estock-master/produto.php"><b>Produto</b></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="http://localhost/estock-master/funcionario.php"><b>Funcionário</b></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="http://localhost/estock-master/sair.php"><b>Sair</b></a>
			</li>
		</ul>
	</nav>
	
</div>
