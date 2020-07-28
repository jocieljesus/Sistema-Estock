<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title text-center" id="myModalLabel"><?php echo $rows_produto['nome']; ?></h4>    
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                
        </div>
        <div class="modal-body">
            <p><?php echo "<b>Código do produto: </b>".$rows_produto['id']; ?></p><hr>
            <p><?php echo "<b>Nome: </b>".$rows_produto['nome']; ?></p><hr>
            <p><?php echo "<b>Descrição:</b> ".$rows_produto['detalhe']; ?></p><hr>
            <p><?php echo "<b>Código de Barras:</b> ".$rows_produto['codigo_barras']; ?></p><hr>
            <p><?php echo "<b>Preço: </b>R$ ".$rows_produto['valor'	]; ?></p><hr>
            <p><?php $teste = $rows_produto['fk_categoria']; 
                $teste1 = "SELECT nome FROM categoria WHERE id='$teste'";
                $result = mysqli_query($conn, $teste1);
                $row_categoria1 = mysqli_fetch_assoc($result);
                echo "<b>Categoria:</b> ".$row_categoria1['nome'];
            ?></p><hr>
            

            <p><?php //echo "Categoria : ".$rows_produto['fk_categoria']; ?></p>
            <img src="<?php echo "upload/".$rows_produto['Foto'] ?>" style="width: 150px; height: 150px;"><br><br>
        </div>
    </div>
</div>