<?php
//Esta página mostra todos os produtos que foram adicionados ao estoque e possibilita ao usuário, editar cada um dos produtos.
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos em Estoque</title>
    <link rel="stylesheet" href="css/lista_produtos_styles.css">
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
    

    <?php
    // Configurações de conexão com o banco de dados
    $host = 'localhost';
    $dbname = 'meu_estoque';
    $usuario = 'root';
    $senha = '';

    try {
        // Conecta ao banco de dados usando PDO
        $conexao = new PDO("mysql:host=$host;dbname=$dbname", $usuario, $senha);
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Consulta SQL para selecionar os produtos em ordem alfabética
        $sql = "SELECT * FROM estoque ORDER BY produto";

        // Prepara e executa a consulta
        $stmt = $conexao->query($sql);

        // Exibe os resultados da consulta em uma tabela HTML
        echo"<header><h1>Produtos em Estoque</h1></header>";
        echo "<table border='1'>";
        echo "<tr><th>Produto</th><th>Cor</th><th>Tamanho</th><th>Depósito</th><th>Data de Disponibilidade</th><th>Quantidade</th><th>Ações</th></tr>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>{$row['produto']}</td>";
            echo "<td>{$row['cor']}</td>";
            echo "<td>{$row['tamanho']}</td>";
            echo "<td>{$row['deposito']}</td>";
            echo "<td>{$row['data_disponibilidade']}</td>";
            echo "<td>{$row['quantidade']}</td>";
            echo "<td><a href='editar.php?id={$row['id']}'>Editar</a></td>"; // Link para editar o produto
            echo "</tr>";
        }
        echo "</table>";
    } catch (PDOException $e) {
        // Em caso de erro, exibe a mensagem de erro
        echo "Erro ao listar os produtos: " . $e->getMessage();
    }
    ?>

</body>
</html>
