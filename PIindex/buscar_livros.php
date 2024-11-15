<?php
// Inclui a configuração do banco de dados
include_once('Config.php');

// Obtém os dados de consulta da requisição
$tombo = $_GET['tombo'] ?? '';
$titulo = $_GET['titulo'] ?? '';
$autor = $_GET['autor'] ?? '';
$palavrasChave = $_GET['palavrasChave'] ?? '';

// Estabelece a conexão com o banco de dados
$conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName,$dbPort);

// Verifica se houve algum erro na conexão
if ($conexao->connect_error) {
    die('Erro de conexão: ' . $conexao->connect_error);
}

// Inicializa a consulta SQL
$query = "SELECT Tombo, Titulo, Estado FROM livros WHERE 1";

// Adiciona condições à consulta com base nos critérios de busca
if ($tombo !== '') {
    $query .= " AND Tombo = $tombo";
}
if ($titulo !== '') {
    $query .= " AND Titulo LIKE '%$titulo%'";
}
if ($autor !== '') {
    $query .= " AND Autores LIKE '%$autor%'";
}
if ($palavrasChave !== '') {
    $query .= " AND PalavrasChave LIKE '%$palavrasChave%'";
}

// Executa a consulta SQL
$resultado = $conexao->query($query);

// Verifica se a consulta foi bem-sucedida
if (!$resultado) {
    die('Erro ao executar a consulta: ' . $conexao->error);
}

// Cria uma lista de livros com base nos resultados
$livros = [];
while ($row = $resultado->fetch_assoc()) {
    $livros[] = $row;
}

// Retorna a lista de livros como JSON
header('Content-Type: application/json');
echo json_encode($livros);

// Fecha a conexão com o banco de dados
$conexao->close();
?>
