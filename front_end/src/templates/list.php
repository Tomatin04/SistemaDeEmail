<div class="lista-container">
    <ul>
        <?php foreach ($itens as $item): ?>
            <li data-id="<?= $item['id'] ?>" data-option='<?= $option ?>' class="item-com-botao">
                <h4><?= $item['assunto'] ?></h4>
                <p><?= $item['emailRemetente'] ?></p>
                <?php if ($option == "rascunhos"): ?>
                    <form action="/mail" method="GET">
                        <p><?= $item['emailDestinatario'] ?></p>
                        <button class="botao-pequeno" name='id' value="<?= $item['id'] ?>">ALTERA RASCUNHO</button>
                    </form>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
</div>