<?php
 	// session_start();
?>

<?php if($_SESSION['log'] == "logado"){?>
    <!-- MODAL'S PRODUTO -->

    <!-- Inicio Modal CADASTRO PRODUTO-->
    <div class="modal fade" id="myModalcad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center" id="myModalLabel">Cadastrar Produto</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    
                </div>
                <div class="modal-body">
                    <form method="POST" action="http://localhost/Estock-master/produto_create.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="recipient-name" class="control-label"><b>Nome do produto:</b></label>   	<!-- NOME DO PRODUTO -->
                            <input name="nome" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label"><b>Código de barras:</b></label>  	<!-- CÓDIGO DE BARRAS -->
                            <input name="codigo_barras" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="control-label"><b>Descrição:</b></label> 			<!-- DESCRIÇÃO -->
                            <textarea name="detalhes" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label"><b>Valor:</b></label>   			<!-- VALOR -->
                            <input name="valor" type="text" class="form-control" id = "valor1" >
                        </div>
                        <div class="form-group">
                            <label for="id11123" class="control-label"><b>Quantidade:</b></label>			<!-- DESCRIÇÃO -->
                            <input type="hidden" id="id11123" name="id" value="<?php echo $rows_produto['id']; ?>"> <!-- QUANTIDADE -->
                            <input type="number" id="quantity" class="form-control" min="0" value="<?php echo $rows_produto['quantidade']; ?>" name="quantidade">   
                        </div>
                        <div class="form-group">
                            Categoria do Produto:
                            <select name="categoria" class="form-control" id="exampleFormControlSelect1">
                            <option>Selecione</option>
                                <?php
                                    $result_categoria = "SELECT * FROM categoria";
                                    $resultado_categoria = mysqli_query($conn, $result_categoria);
                                    while($row_categoria = mysqli_fetch_assoc($resultado_categoria)){ ?>
                                        <option value="<?php echo $row_categoria['id']; ?>"><?php echo $row_categoria['nome']; ?></option> <?php
                                    }
                                ?>
                        </select><br>
                        </div>
                        
                        <input type="file" name="imagem" id="imagem" onchange="previewImagem()"><br><br>
                        <img style="width: 150px; height: 150px;"><br><br> 									<!-- FOTO -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- FIM MODAL CADASTRO PRODUTO -->

    <!-- MODAL CATEGORIA -->

    <!-- Inicio Modal CADASTRO  Categoria-->
    <div class="modal fade" id="myModalcadCat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center" id="myModalLabel">Cadastrar Categoria</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    
                </div>
                <div class="modal-body">
                    <form method="POST" action="http://localhost/Estock-master/categoria_create.php" enctype="multipart/form-data">
                    
                        <div class="form-group">
                            <label for="recipient-name" class="control-label"><b>Nome da categoria:</b></label>   	<!-- NOME DO CATEGORIA -->
                            <input name="nome" type="text" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info">Cadastrar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Fim Modal CADASTRO Categoria -->


    <!-- INICIO MODAL CADASTRO FUNCIONARIO-->
    <div class="modal fade" id="myModalCadFunc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center" id="myModalLabel">Cadastrar Funcionário</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    
                </div>
                <div class="modal-body">
                    <form method="POST" action="http://localhost/Estock-master/funcionario_create.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="recipient-name" class="control-label"><b>Nome:</b></label>   	<!-- NOME DO FUNCIONARIO -->
                            <input name="nome" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label"><b>CPF:</b></label>  	<!-- CPF -->
                            <input name="cpf" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label"><b>E-mail:</b></label>  	<!-- Email -->
                            <input name="email" type="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label"><b>Senha:</b></label>   			<!-- SENHA -->
                            <input name="senha" type="password" class="form-control" id = "valor1" >
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label"><b>Cargo:</b></label>
                            <select name="cargo" class="form-control" id="exampleFormControlSelect1">
                            <option>Selecione uma opção</option>
                                <?php
                                    $result_cargo = "SELECT * FROM cargo";                                //CARGO 
                                    $resultado_cargo = mysqli_query($conn, $result_cargo);
                                    while($row_cargo = mysqli_fetch_assoc($resultado_cargo)){ ?>
                                        <option value="<?php echo $row_cargo['id']; ?>"><?php echo $row_cargo['nome']; ?></option> <?php
                                    }
                                ?>
                        </select><br><br>
                        </div>
                        
                        <input type="file" name="imagem" id="imagem1" onchange="previewImagem()"><br><br>
                        <img style="width: 150px; height: 150px;"><br><br> 									<!-- FOTO -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- FIM MODAL CADASTRO FUNCIONARIO -->
    
        

<?php }else{
	header("Location: index.php");
}?>



