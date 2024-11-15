<?php
include_once('config.php'); // Inclua seu arquivo de configuração de banco de dados

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['Titulo'] ?? '';
    $autores = $_POST['Autores'] ?? '';
    $cutter = $_POST['Cutter'] ?? '';
    $nivel = $_POST['Nivel'] ?? '';
    $editora = $_POST['Editora'] ?? '';
    $palavrasChave = $_POST['PalavrasChave'] ?? '';

    // Estabelecer conexão com o banco de dados
    $conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName,$dbPort);

    if ($conexao->connect_error) {
        die('Erro de conexão: ' . $conexao->connect_error);
    }

    // Monta a query de busca
    $query = "SELECT Titulo, Autores, Cutter, Editora, Nivel, Estado FROM livros WHERE 1=1";

    if (!empty($titulo)) $query .= " AND Titulo LIKE '%$titulo%'";
    if (!empty($autores)) $query .= " AND Autores LIKE '%$autores%'";
    if (!empty($cutter)) $query .= " AND Cutter LIKE '%$cutter%'";
    if (!empty($nivel)) $query .= " AND Nivel LIKE '%$nivel%'";
    if (!empty($editora)) $query .= " AND Editora LIKE '%$editora%'";
    if (!empty($palavrasChave)) $query .= " AND PalavrasChave LIKE '%$palavrasChave%'";

    $resultado = $conexao->query($query);

    $livros = [];
    if ($resultado->num_rows > 0) {
        while ($row = $resultado->fetch_assoc()) {
            $livros[] = $row;
        }
    }

    header('Content-Type: application/json');
    echo json_encode($livros);
    
    $conexao->close();
}
?>
