<?php
// Inclui o arquivo de configuração
include_once('Config.php');

// Estabelece a conexão com o banco de dados
$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Verifica se houve algum erro na conexão
if ($conexao->connect_error) {
    die('Erro de conexão: ' . $conexao->connect_error);
}

// Consulta para buscar livros disponíveis, incluindo o campo PalavrasChave
$query = "SELECT Tombo, Titulo, Autores, Estado, PalavrasChave 
FROM livros 
WHERE Estado IS NULL OR Estado = 'disponível';";

// Executa a consulta
$result = $conexao->query($query);

// Verifica se há resultados
if ($result->num_rows > 0) {
    // Cria um array para armazenar os livros
    $livros = array();

    // Itera pelos resultados e os armazena no array
    while ($row = $result->fetch_assoc()) {
        $livros[] = $row;
    }

    // Retorna os livros em formato JSON
    echo json_encode($livros);
} else {
    // Retorna uma resposta JSON vazia se nenhum livro for encontrado
    echo json_encode([]);
}

// Fecha a conexão com o banco de dados
$conexao->close();
?>
