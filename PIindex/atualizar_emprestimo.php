<?php
// Inclui a configuração do banco de dados
include_once('Config.php');

// Verifica se os dados foram enviados
if (!isset($_POST['tombo']) || !isset($_POST['matricula'])) {
    http_response_code(400);
    echo json_encode(['message' => 'Dados inválidos.']);
    exit;
}

// Obtém os dados do formulário e converte para int
$tombo = (int)$_POST['tombo'];
$matricula = (int)$_POST['matricula'];

// Estabelece a conexão com o banco de dados
$conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName,$dbPort);

// Verifica se houve algum erro na conexão
if ($conexao->connect_error) {
    http_response_code(500);
    echo json_encode(['message' => 'Erro de conexão: ' . $conexao->connect_error]);
    exit;
}

// Atualiza o estado e a posse do livro no banco de dados usando prepared statements
$query = "UPDATE livros SET Estado = 'indisponivel', Posse = ? WHERE Tombo = ?";

// Prepara a consulta
$stmt = $conexao->prepare($query);

// Verifica se a preparação da consulta foi bem-sucedida
if (!$stmt) {
    http_response_code(500);
    echo json_encode(['message' => 'Erro ao preparar a consulta: ' . $conexao->error]);
    exit;
}

// Binda os parâmetros como inteiros
$stmt->bind_param('ii', $matricula, $tombo);

// Executa a consulta
if ($stmt->execute()) {
    echo json_encode(['message' => 'Empréstimo confirmado com sucesso!']);
} else {
    http_response_code(500);
    echo json_encode(['message' => 'Erro ao atualizar empréstimo: ' . $stmt->error]);
}

// Fecha a consulta e a conexão com o banco de dados
$stmt->close();
$conexao->close();
?>