<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title text-center" id="myModalLabel"><?php echo $rows_produto['nome']; ?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            
        </div>
        <div class="modal-body">
            <p>Tem certeza que deseja apagar o produto <?php echo "  ".$rows_produto['nome']; ?>?</p>
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