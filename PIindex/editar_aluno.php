<?php
include_once('Config.php');

$matricula = isset($_GET['matricula']) ? $_GET['matricula'] : '';

if ($matricula) {
    $matricula = $conexao->real_escape_string($matricula);

    
    $query = "SELECT * FROM alunos WHERE matricula = '$matricula'";
    $result = $conexao->query($query);

    if ($result && $result->num_rows > 0) {
        $aluno = $result->fetch_assoc();
        // Exibe o formulário com os dados do aluno
        echo '<h3>Editar Aluno</h3>';
        echo '<form action="salvarEdicaoAluno.php" method="POST">';
        echo '<input type="hidden" name="matricula" value="' . htmlspecialchars($aluno['matricula']) . '">';
        echo 'Nome:<br>';
        echo '<input type="text" name="nome" value="' . htmlspecialchars($aluno['nome']) . '"><br>';
        echo 'Idade:<br>';
        echo '<input type="number" name="idade" value="' . htmlspecialchars($aluno['idade']) . '"><br>';
        echo '<input type="submit" value="Salvar Alterações">';
        echo '</form>';
        
        $result->free();
    } else {
        echo 'Aluno não encontrado.';
    }
} else {
    echo 'Matrícula não fornecida.';
}
?>
