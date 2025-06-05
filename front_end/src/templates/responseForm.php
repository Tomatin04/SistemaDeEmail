<?php $this->layout('layout'); ?>

<form class="form-container"  method="POST" action="/sand">
    <h2>Resposta de E-mail</h3>
    <div class="form-group">
        <label class="form-label" for="assunto">Assunto:</label>
        <input type="text" class="form-input" value="<?= $email['assunto'] ?>" disabled>
        <input type="hidden" name="assunto" value="<?= $email['assunto'] ?>">
    </div>

    <div class="form-group">
        <label class="form-label" for="destinatario">Destinatario:</label>
        <input type="hidden" name="destinatario" value="<?= $email['emailDestinatario'] ?>">
        <input type="email" type="text"  class="form-input"  value="<?= $email['emailDestinatario'] ?>" disabled>
    </div>

    <div class="form-group">
        <label class="form-label" for="mensagem">Corpo da Mensagem:</label>
        <textarea id="mensagem" name="corpo" class="form-textarea" placeholder="Digite sua mensagem...">


-------------- 
Resposta do ultimo e-mail 
DE: <?= $email['emailRemetente'] ?> 
PARA: <?= $email['emailDestinatario'] ?> 
DATA: <?= $email['dataEnvio'] ?> 
ASSUNTO: <?= $email['assunto'] ?> 
CORPO:  
<?= $email['corpo'] ?>           
        </textarea>
    </div>

    <div class="form-buttons">
            <a href="/" ><button type="button" class="btn btn-cancelar">CANCELAR</button></a>       
        <div>
            <button type="submit" class="btn btn-salvar" name='option' value="0">SALVAR</button>
            <button type="submit" class="btn btn-enviar" name='option' value="enviar">ENVIAR</button>
        </div>
    </div>
</form>