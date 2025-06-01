<div class="form-container2">
    <div class="form-title2"><?= $item['assunto']?></div>

    <div class="form-group2">
        <div class="form-static2">
            <?php if($item['emailRemetente'] != null){echo $item['emailRemetente']; } else{echo $item['emailDestinatario'];}?>
        </div>
    </div>

    <div class="form-group2">
        <label class="form-label2">Corpo da Mensagem:</label>
        <div class="form-static2 form-textarea-static2">
            <?= $item['corpo']?>
        </div>
    </div>
</div>