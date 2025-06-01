<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Cadastro</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/perfil.css">
    <link rel="stylesheet" href="css/list.css">
    <link rel="stylesheet" href="css/conteudo.css">
    <link rel="stylesheet" href="css/creditos.css">
</head>
<body>

    <!-- Cabeçalho -->
    <header>
        <!-- Botão do Menu -->
        <input type="checkbox" id="menu-toggle" class="menu-toggle">
        <label for="menu-toggle" class="menu-btn">☰ Menu</label>

        <!-- Menu -->
        <?php if(isset($_SESSION['token'])): ?>
            <nav id="menu" class="hidden">
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="/mail">Novo email</a></li>
                    <li><a href="/perfil">Perfil</a></li>
                    <li><a href="/creditos">Créditos</a></li>
                </ul>
            </nav>
        <?php endif; ?>

        <?php if(isset($_SESSION['token'])): ?>
            <form action="/logout" method="POST">
                <a  class="remover-sub-a" me ><button class="login-btn">Logout</button></a>
            </form>
        <?php endif;?>
    </header>

    <?= $this->section('content');  ?>

    <footer>
        <p>Contato: <a href="mailto:contato@exemplo.com">contato@exemplo.com</a> | Telefone: (11) 1234-5678</p>
    </footer>

</body>
</html>
