<?php
// Inclui a configuração do banco de dados
include_once('Config.php');

// Obtém os dados da requisição
$tombo = (int)$_POST['tombo'];
$observacoes = $_POST['observacoes'];

// Verifica os valores recebidos
error_log('Tombo recebido: ' . $tombo);
error_log('Observações recebidas: ' . $observacoes);

// Estabelece a conexão com o banco de dados
$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Verifica se houve algum erro na conexão
if ($conexao->connect_error) {
    error_log('Erro de conexão: ' . $conexao->connect_error);
    die('Erro de conexão: ' . $conexao->connect_error);
}

// Atualiza o livro com base nas informações recebidas
$query = "UPDATE livros SET Estado = 'disponível', Posse = NULL, Obs = ? WHERE Tombo = ?";
$stmt = $conexao->prepare($query);

// Verifica se a preparação da consulta foi bem-sucedida
if (!$stmt) {
    error_log('Erro ao preparar a consulta: ' . $conexao->error);
    die('Erro ao preparar a consulta: ' . $conexao->error);
}

// Vincula os parâmetros à consulta preparada
$stmt->bind_param('si', $observacoes, $tombo);

// Executa a consulta preparada
$stmt->execute();

// Verifica o resultado da consulta
if ($stmt->affected_rows > 0) {
    error_log('Devolução confirmada com sucesso para tombo: ' . $tombo);
    echo 'Devolução confirmada com sucesso!';
} else {
    error_log('Erro ao confirmar devolução ou nenhum livro com o tombo fornecido.');
    echo 'Erro ao confirmar devolução ou nenhum livro com o tombo fornecido.';
}

// Fecha a consulta preparada e a conexão com o banco de dados
$stmt->close();
$conexao->close();
?>
