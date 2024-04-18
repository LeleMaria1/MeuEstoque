
<?php
//Esta página estabelece a conexão com o Banco de Dados


// Configurações de conexão com o banco de dados
$host = 'localhost';
$dbname = 'meu_estoque'; // Nome do banco de dados
$usuario = 'root'; // Nome de usuário do banco de dados
$senha = ''; // Senha do banco de dados

try {
    // Cria uma instância do PDO
    $conexao = new PDO("mysql:host=$host;dbname=$dbname", $usuario, $senha);
    // Configura o PDO para lançar exceções em caso de erro
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Em caso de erro, exibe a mensagem de erro
    echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
}
?>