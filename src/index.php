<?php
//informações sobre o PHP
// phpinfo();

// Configuração da conexão com o banco de dados
$host = "mysql_container";
$dbname = "ifsp";
$username = "florisvaldo";
$password = "12345678";

try {
    // Cria a conexão com o banco de dados
$pdo = new PDO("mysql:host=$host;port=3306;dbname=$dbname", $username, $password);
    
    // Define o modo de erro para exceção
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta SQL para buscar todos os usuários
    $sql = "SELECT username, email FROM users";

    // Prepara a consulta
    $stmt = $pdo->prepare($sql);

    // Executa a consulta
    $stmt->execute();

    // Verifica se há resultados
    if ($stmt->rowCount() > 0) {
        // Inicia a tabela
        echo "<table border='1'>";
        echo "<tr><th>Username</th><th>Email</th></tr>";

        // Busca os resultados e os exibe em linhas da tabela
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr><td>" . htmlspecialchars($row['username']) . "</td><td>" . htmlspecialchars($row['email']) . "</td></tr>";
        }

        // Fecha a tabela
        echo "</table>";
    } else {
        echo "Nenhum usuário encontrado.";
    }
} catch (PDOException $e) {
    // Em caso de erro na conexão ou na consulta, exibe a mensagem de erro
    die("Erro na conexão: " . $e->getMessage());
}
?>