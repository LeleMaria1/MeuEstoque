<?php
//Esta é a página inicial do site Meu Estoque, que possibilita adicionar e atualizar produtos de um estoque.
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Estoque</title>
    <link rel="stylesheet" href="css/index_styles.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li>|</li>
            <li><a href="cadastrar.php">Cadastrar</a></li>
            <li>|</li>
            <li><a href="lista_produtos.php">Estoque</a></li>
        </ul>
    </nav>

    <header>
        <h1>Bem-vindo ao Meu Estoque!</h1>
        <p>Aqui você pode cadastrar e editar produtos em seu estoque.</p>
    </header>

    <main>
        <section>
            <h2>Para cadastrar um produto clique em <a href="cadastrar.php">Cadastrar</a></h2>
        </section>
        <section>
            <h2>Para ter acesso ao seu Estoque e editar as informações dos produtos, clique em <a href="lista_produtos.php">Acessar estoque</a></h2>
        </section>
    </main>
</body>
</html>
