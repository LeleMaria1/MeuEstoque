<?php
//Esta página é responsável pela atualização de informações dos produtos do Estoque, ou seja, a edição dos mesmos.
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
    <link rel="stylesheet" href="css/editar_styles.css">
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
    // Verifica se foi enviado um ID de produto para edição
    if (isset($_GET['id'])) {
        // Configurações de conexão com o banco de dados
        $host = 'localhost';
        $dbname = 'meu_estoque';
        $usuario = 'root';
        $senha = '';

        try {
            // Conecta ao banco de dados usando PDO
            $conexao = new PDO("mysql:host=$host;dbname=$dbname", $usuario, $senha);
            $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Recupera o ID do produto a ser editado
            $id_produto = $_GET['id'];

            // Verifica se o formulário foi submetido via método POST
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Recupera os dados do formulário usando prepared statements
                $produto = $_POST["produto"];
                $cor = $_POST["cor"];
                $tamanho = $_POST["tamanho"];
                $deposito = $_POST["deposito"];
                $data_disponibilidade = $_POST["data_disponibilidade"];
                $quantidade = $_POST["quantidade"];

                // Prepara a consulta SQL para atualizar os dados do produto
                $sql = "UPDATE estoque SET produto = :produto, cor = :cor, tamanho = :tamanho, deposito = :deposito, data_disponibilidade = :data_disponibilidade, quantidade = :quantidade WHERE id = :id";

                // Prepara e executa a consulta usando prepared statements
                $stmt = $conexao->prepare($sql);
                $stmt->bindParam(':produto', $produto);
                $stmt->bindParam(':cor', $cor);
                $stmt->bindParam(':tamanho', $tamanho);
                $stmt->bindParam(':deposito', $deposito);
                $stmt->bindParam(':data_disponibilidade', $data_disponibilidade);
                $stmt->bindParam(':quantidade', $quantidade);
                $stmt->bindParam(':id', $id_produto);
                $stmt->execute();

                // Exibe uma mensagem de sucesso
                echo "<div><form><h1>Produto atualizado com sucesso!</h1><br><a href='lista_produtos.php'>Voltar para a lista de produtos</a></form></div>";
            } else {
                // Consulta SQL para recuperar os dados do produto selecionado
                $sql = "SELECT * FROM estoque WHERE id = :id";

                // Prepara e executa a consulta usando prepared statements
                $stmt = $conexao->prepare($sql);
                $stmt->bindParam(':id', $id_produto);
                $stmt->execute();

                // Recupera os dados do produto
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                // Exibe o formulário com os dados do produto para edição
    ?>
                <div class="container">
                    <form method="POST">
                        <h1>Edição de produto</h1>
                        <label for="produto">Produto:</label>
                        <input type="text" name="produto" value="<?php echo htmlspecialchars($row['produto']); ?>"><br>

                        <label for="cor">Cor:</label>
                        <input type="text" name="cor" value="<?php echo htmlspecialchars($row['cor']); ?>"><br>

                        <label for="tamanho">Tamanho:</label>
                        <input type="text" name="tamanho" value="<?php echo htmlspecialchars($row['tamanho']); ?>"><br>

                        <label for="deposito">Depósito:</label>
                        <input type="text" name="deposito" value="<?php echo htmlspecialchars($row['deposito']); ?>"><br>

                        <label for="data_disponibilidade">Data de Disponibilidade:</label>
                        <input type="date" name="data_disponibilidade" value="<?php echo htmlspecialchars($row['data_disponibilidade']); ?>"><br>

                        <label for="quantidade">Quantidade:</label>
                        <input type="number" name="quantidade" value="<?php echo htmlspecialchars($row['quantidade']); ?>"><br>

                        <div class="button-group">
                            <button class="cancelar" onclick="window.location.href='index.php'">Cancelar</button>
                            <input type="submit" value="Atualizar">
                        </div>
                    </form>
                </div>
    <?php
            }
        } catch (PDOException $e) {
            // Em caso de erro, exibe a mensagem de erro
            echo "Erro ao editar o produto: " . $e->getMessage();
        }
    } else {
        // Se nenhum ID de produto foi fornecido, exibe uma mensagem de erro
        echo "ID de produto não fornecido!";
    }
    ?>
</body>

</html>