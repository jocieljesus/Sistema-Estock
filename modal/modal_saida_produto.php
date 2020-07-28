<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="modalMenos">Saída de produto</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            
        </div>
        <div class="modal-body">
                <form method="POST" action="http://localhost/Estock-master/estoque_update_saida.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="recipient-name" class="control-label"><b>Produto:</b></label>
                        <input value="<?php echo $rows_produto['nome']; ?>" name="nome" type="text" min="0" class="form-control" id="recipient-name" disabled>
                    </div>

                    <div class="form-group">
                        <input type="hidden" id="id11123" name="id" value="<?php echo $rows_produto['id']; ?>">
                        <input type="hidden" id="id111233" name="qtd" value="<?php echo $rows_produto['quantidade']; ?>">
                        <label for="quantidade" class="control-label"><b>Quantidade:</b></label>
                        <input type="number" id="quantidade" class="form-control" min="0" name="quantidade">   
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><b>Cancelar</b></button>
                        <button type="submit" class="btn btn-info">Concluir</button>
                    </div>
                </form>
        </div>
    </div>
</div>