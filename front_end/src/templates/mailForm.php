<?php $this->layout('layout'); ?>

<form class="form-container"  method="POST" action="/sand">
    <h2>Envio de E-mail</h3>
    <div class="form-group">
        <label class="form-label" for="assunto">Assunto:</label>
        <input type="text" id="assunto" name="assunto" class="form-input" placeholder="Digite o assunto" value="<?= $rascunho['assunto'] ?>">
    </div>

    <div class="form-group">
        <label class="form-label" for="destinatario">Destinatario:</label>
        <input type="text" id="destinatario" name="destinatario" class="form-input" placeholder="Digite o destinatario" value="<?= $rascunho['emailDestinatario'] ?>">
    </div>

    <div class="form-group">
        <label class="form-label" for="mensagem">Corpo da Mensagem:</label>
        <textarea id="mensagem" name="corpo" class="form-textarea" placeholder="Digite sua mensagem..."><?= $rascunho['corpo'] ?></textarea>
    </div>

    <div class="form-buttons">
        <?php if(isset($rascunho['id'])): ?>
            <input type="hidden" name="deleteValue" value="<?= $rascunho['id'] ?>">
            <button type="submit" class="btn btn-excluir " name="option" value="excluir">EXCLUIR</button>
        <?php else: ?>
            <a href="/" ><button type="button" class="btn btn-cancelar">CANCELAR</button></a>
        <?php endif; ?>
        <div>
            <button type="submit" class="btn btn-salvar" name='option' value="<?= $rascunho['id'] ?? 0?>">SALVAR</button>
            <button type="submit" class="btn btn-enviar" name='option' value="enviar">ENVIAR</button>
        </div>
    </div>
</form>