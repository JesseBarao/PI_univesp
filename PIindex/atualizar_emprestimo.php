<?php
// Inclui a configuração do banco de dados
include_once('Config.php');

// Obtém os dados do formulário e converte para int
$tombo = (int)$_POST['tombo'];
$matricula = (int)$_POST['matricula'];

// Estabelece a conexão com o banco de dados
$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Verifica se houve algum erro na conexão
if ($conexao->connect_error) {
    die('Erro de conexão: ' . $conexao->connect_error);
}

// Atualiza o estado e a posse do livro no banco de dados usando prepared statements
$query = "UPDATE livros SET Estado = 'indisponível', Posse = ? WHERE Tombo = ?";

// Corrige o erro na string de consulta, passando-a como argumento para o método prepare()
$stmt = $conexao->prepare($query);

// Verifica se a preparação da consulta foi bem-sucedida
if (!$stmt) {
    die('Erro ao preparar a consulta: ' . $conexao->error);
}

// Binda os parâmetros como inteiros
$stmt->bind_param('ii', $matricula, $tombo);

// Executa a consulta
if ($stmt->execute()) {
    echo 'Empréstimo confirmado com sucesso!';
} else {
    echo 'Erro ao atualizar empréstimo: ' . $stmt->error;
}

// Fecha a consulta e a conexão com o banco de dados
$stmt->close();
$conexao->close();
?>
