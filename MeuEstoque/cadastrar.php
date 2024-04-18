<?php
//Esta página é responsável pelo cadastro de novos produtos no estoque.
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>
    <link rel="stylesheet" href="css/cadastro_styles.css">
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

    <div class="container">
        <h1>Cadastro de um novo produto</h1>

        <form action="processar_cadastro.php" method="POST">
            <label for="produto">Produto:</label>
            <input type="text" id="produto" name="produto" maxlength="100" required><br>

            <label for="cor">Cor:</label>
            <input type="text" id="cor" name="cor" maxlength="100" required><br>

            <label for="tamanho">Tamanho:</label>
            <input type="text" id="tamanho" name="tamanho" maxlength="100" required><br>

            <label for="deposito">Depósito:</label>
            <input type="text" id="deposito" name="deposito" maxlength="100" required><br>

            <label for="data_disponibilidade">Data Disponibilidade:</label>
            <input type="date" id="data_disponibilidade" name="data_disponibilidade" required><br>

            <label for="quantidade">Quantidade:</label>
            <input type="number" id="quantidade" name="quantidade" min="0" required><br>

            <div class="button-group">
                <button class="cancelar" onclick="window.location.href='index.php'">Cancelar</button>
                <input type="submit" value="Atualizar">
            </div>
        </form>
    </div>
</body>
</html>
