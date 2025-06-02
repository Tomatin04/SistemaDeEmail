<div class="form-container2">
    <div class="form-title2"><?= $item['assunto']?></div>

    <?php if(isset($item['status'])):?>
    <div class="form-group2">
        <p><strong>STATUS:  </strong> <?= $item["status"]?></p>
        <p><strong>DATA DE ENVIO:  </strong> <?= $item["dataEnvio"]?></p>
    </div>
    <?php endif;?>
    <div class="form-group2">
        <?php if($item['emailRemetente'] != null):?>
            <p><strong>DE: </strong> </p>
            <div class="form-label2">
                <?= $item['emailRemetente'];?> 
            </div>
        <?php else:?>
            <p><strong>PARA: </strong> </p>
            <div class="form-static2">
                <strong><?= $item['emailDestinatario'];?> </strong>
            </div>
        <?php endif;?>
        
    </div>

    <div class="form-group2">
        <label class="form-label2">Corpo da Mensagem:</label>
        <div class="form-static2 form-textarea-static2">
            <?= $item['corpo']?>
        </div>
    </div>
</div>