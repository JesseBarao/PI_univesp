<?php
session_start();
include 'config.php'; // Conexão com o banco de dados

// Verifica se os campos foram enviados
if (!isset($_POST['Matricula']) || !isset($_POST['Senha'])) {
    echo "<script>alert('Preencha todos os campos!'); window.location='Inicial.html';</script>";
    exit();
}

$Matricula = $_POST['Matricula'];
$Senha = $_POST['Senha'];

// Prepara a consulta ao banco de dados
$query = "SELECT * FROM alunos WHERE matricula = ? AND senha = ?";
$stmt = $conexao->prepare($query);
$stmt->bind_param("ss", $Matricula, $Senha);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $_SESSION['Matricula'] = $Matricula; // Armazena a matrícula na sessão
    header("location:pagina_alunos.php"); // Redireciona para a página protegida
    exit();
} else {
    echo "<script>alert('Matrícula ou senha incorretos!'); window.location='Inicial.html';</script>";
}
?>
