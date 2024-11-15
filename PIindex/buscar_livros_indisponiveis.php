<?php
// Inclui a configuração do banco de dados
include_once('Config.php');

// Estabelece a conexão com o banco de dados
$conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName,$dbPort);

// Verifica se houve algum erro na conexão
if ($conexao->connect_error) {
    die('Erro de conexão: ' . $conexao->connect_error);
}

// Inicializa a consulta SQL
$query = "SELECT Tombo, Titulo, Posse FROM livros WHERE Estado = 'indisponível'";

// Adiciona condições à consulta com base nos critérios de busca
$condicoes = [];

// Verifica se há parâmetros de busca
if (isset($_GET['tombo']) && $_GET['tombo'] !== '') {
    $tombo = (int)$_GET['tombo']; // Converte para int
    $condicoes[] = "Tombo = $tombo";
}

if (isset($_GET['titulo']) && $_GET['titulo'] !== '') {
    $titulo = $conexao->real_escape_string($_GET['titulo']);
    $condicoes[] = "Titulo LIKE '%$titulo%'";
}

if (isset($_GET['posse']) && $_GET['posse'] !== '') {
    $posse = (int)$_GET['posse']; // Converte para int
    $condicoes[] = "Posse = $posse";
}

// Adiciona as condições à consulta SQL
if (count($condicoes) > 0) {
    $query .= ' AND ' . implode(' AND ', $condicoes);
}

// Executa a consulta
$resultado = $conexao->query($query);

// Verifica se a consulta foi bem-sucedida
if ($resultado) {
    // Inicializa um array para armazenar os livros
    $livros = [];

    // Itera sobre os resultados e adiciona cada livro ao array
    while ($livro = $resultado->fetch_assoc()) {
        // Adiciona o livro ao array
        $livros[] = [
            'Tombo' => (int) $livro['Tombo'], // Converte o campo para int
            'Titulo' => $livro['Titulo'],
            'Posse' => (int) $livro['Posse'], // Converte o campo para int
        ];
    }

    // Define o tipo de conteúdo como JSON
    header('Content-Type: application/json');

    // Retorna os dados dos livros como JSON
    echo json_encode($livros);
} else {
    // Se a consulta não foi bem-sucedida, retorna um código de erro
    header('HTTP/1.1 500 Internal Server Error');
    echo 'Erro ao consultar livros indisponíveis: ' . $conexao->error;
}

// Fecha a conexão com o banco de dados
$conexao->close();
?>
