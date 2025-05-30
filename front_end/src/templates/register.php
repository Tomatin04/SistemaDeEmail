<?php $this->layout( 'layout'); ?>

<main>
        <div class="login-container">
            <h2>Cadastrar</h2>
            <?php if (isset($_SESSION['error_msg'])): ?>
                <div class="error-message">
                    <p><?= $_SESSION['error_msg'] ?></p>
                    <?php unset($_SESSION['error_msg']); ?>
                </div>
            <?php endif; ?>
            <form action="#" method="POST">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
                
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" required>

                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>

                <label for="confirmar-senha">Confirmar Senha:</label>
                <input type="password" id="confirmar_senha" name="confirmar_senha" required>

                <button type="submit">Cadastrar</button>
            </form>
            <p>Já tem uma conta? <a href="/login">Faça login aqui</a></p>
        </div>
    </main>

