<?php
//Esta página faz o processamento do cadastro de produto, adicionando as informações no Banco de Dados.
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Processamento de Cadastro</title>
    <link rel="stylesheet" href="css/processar_cadastro_styles.css">
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
        <?php
        // Verifica se os dados do formulário foram enviados via método POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Recupera os dados do formulário
            $produto = $_POST["produto"];
            $cor = $_POST["cor"];
            $tamanho = $_POST["tamanho"];
            $deposito = $_POST["deposito"];
            $data_disponibilidade = $_POST["data_disponibilidade"];
            $quantidade = $_POST["quantidade"];

            // Configurações de conexão com o banco de dados
            $host = 'localhost';
            $dbname = 'meu_estoque';
            $usuario = 'root';
            $senha = '';

            try {
                // Conecta ao banco de dados usando PDO
                $conexao = new PDO("mysql:host=$host;dbname=$dbname", $usuario, $senha);
                $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Prepara a consulta SQL para inserir os dados na tabela estoque
                $sql = "INSERT INTO estoque (produto, cor, tamanho, deposito, data_disponibilidade, quantidade) 
                        VALUES (:produto, :cor, :tamanho, :deposito, :data_disponibilidade, :quantidade)";

                // Prepara e executa a consulta
                $stmt = $conexao->prepare($sql);
                $stmt->bindParam(':produto', $produto);
                $stmt->bindParam(':cor', $cor);
                $stmt->bindParam(':tamanho', $tamanho);
                $stmt->bindParam(':deposito', $deposito);
                $stmt->bindParam(':data_disponibilidade', $data_disponibilidade);
                $stmt->bindParam(':quantidade', $quantidade);
                $stmt->execute();

                // Exibe uma mensagem de sucesso
                echo "<h1 class='success'>Produto cadastrado com sucesso!</h1>";

                // Exibe o produto recém-cadastrado
                echo "<table>";
                echo "<tr><th>Produto</th><th>Cor</th><th>Tamanho</th><th>Depósito</th><th>Data de Disponibilidade</th><th>Quantidade</th></tr>";
                echo "<tr><td>$produto</td><td>$cor</td><td>$tamanho</td><td>$deposito</td><td>$data_disponibilidade</td><td>$quantidade</td></tr>";
                echo "</table>";
            } catch (PDOException $e) {
                // Em caso de erro, exibe a mensagem de erro
                echo "<h1 class='error'>Erro ao cadastrar o produto: " . $e->getMessage() . "</h1>";
            }
        } else {
            // Se os dados não foram enviados via POST, redirecione o usuário de volta para a página de cadastro
            header("Location: cadastrar.php");
            exit;
        }
        ?>
    </div>
</body>
</html>
