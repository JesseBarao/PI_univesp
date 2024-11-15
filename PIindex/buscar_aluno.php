<?php
include_once('Config.php');

$nome = isset($_GET['nome']) ? $_GET['nome'] : '';
$matricula = isset($_GET['matricula']) ? $_GET['matricula'] : '';


$nome = $conexao->real_escape_string($nome);
$matricula = $conexao->real_escape_string($matricula);


$query = "SELECT * FROM alunos WHERE nome LIKE '%$nome%' OR matricula='$matricula'";


$result = $conexao->query($query);


$saida = "";


if ($result && $result->num_rows > 0) {
    while ($linha = $result->fetch_assoc()) {
      
        $saida .= "Nome: " . htmlspecialchars($linha['Nome']) . "\n";
        $saida .= "Nome: " . htmlspecialchars($linha['Nome']) . "\n";
        $saida .= "Matrícula: " . htmlspecialchars($linha['Matricula']) . "\n";
      
        $saida .= "\n";
    }
} else {
    $saida = "Nenhum aluno encontrado com os critérios fornecidos.";
}


echo $saida;
?>
