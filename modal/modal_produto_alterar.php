<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">Produto</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            
        </div>
        <div class="modal-body">
                <form method="POST" action="http://localhost/Estock-master/produto_update.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="recipient-name" class="control-label"><b>Nome:</b></label>
                        <input value="<?php echo $rows_produto['nome']; ?>" name="nome" type="text" class="form-control" id="recipient-name">
                    </div>

                    <div class="form-group">
                        <label for="detalhes" class="control-label"><b>Detalhes:</b></label>
                        <textarea v name="detalhes" class="form-control" id="detalhes"><?php echo $rows_produto['detalhe']; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="codigo_barras" class="control-label"><b>Código de Barras:</b></label>
                        <input value="<?php echo $rows_produto['codigo_barras']; ?>" name="codigo_barras" type="text" class="form-control" id="codigo_barras">
                    </div>

                    <div class="form-group">
                        <label for="valor" class="control-label"><b>Valor:</b></label>   			<!-- VALOR -->
                        <input value="<?php echo $rows_produto['valor']; ?>" name="valor" type="text" class="form-control" id="valor">
                    </div>
                    <input type="file" name="imagem" id="imagem" onchange="previewImagem()"><br><br>
                    <img src="<?php echo "upload/".$rows_produto['Foto'] ?>" style="width: 150px; height: 150px;"><br><br>							<!-- FOTO -->
                    <input name="id" type="hidden" class="form-control" id="id-curso" value="<?php echo $rows_produto['id']; ?>">
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><b>Cancelar</b></button>
                        <button type="submit" class="btn btn-info">Alterar</button>
                    </div>
                </form>
        </div>
    </div>
</div>