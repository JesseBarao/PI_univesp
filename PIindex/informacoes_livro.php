<?php
// Inclui a configuração do banco de dados
include_once('Config.php');

// Verifica se o parâmetro 'tombo' está definido na requisição
if (isset($_GET['tombo'])) {
    $tombo = intval($_GET['tombo']); // Converte o parâmetro para um inteiro

    // Estabelece a conexão com o banco de dados
    $conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    // Verifica se houve algum erro na conexão
    if ($conexao->connect_error) {
        die('Erro de conexão: ' . $conexao->connect_error);
    }

    // Consulta para buscar todas as informações do livro com base no tombo
    $query = "SELECT 
                Tipo, Nivel, Classificacao, Cutter, IndiceAutores, Autores, Titulo, Subtitulo, Edicao, NotaSerie,
                Editora, DataPublicacao, IndiceAssunto, PalavrasChave, Idioma, Estado, Posse, Obs
              FROM livros
              WHERE Tombo = ?";

    // Prepara a consulta
    $stmt = $conexao->prepare($query);
    
    // Verifica se a preparação da consulta foi bem-sucedida
    if ($stmt) {
        // Vincula o parâmetro 'tombo' à consulta
        $stmt->bind_param('i', $tombo);
        
        // Executa a consulta
        $stmt->execute();
        
        // Obtém os resultados da consulta
        $resultado = $stmt->get_result();
        
        // Verifica se há um livro com o tombo fornecido
        if ($resultado->num_rows > 0) {
            // Converte os dados do livro para um array associativo
            $informacoesLivro = $resultado->fetch_assoc();
            
            // Retorna os dados como JSON
            header('Content-Type: application/json');
            echo json_encode($informacoesLivro);
        } else {
            // Nenhum livro encontrado com o tombo fornecido
            http_response_code(404);
            echo json_encode(['error' => 'Nenhum livro encontrado com o tombo fornecido']);
        }
        
        // Fecha a consulta
        $stmt->close();
    } else {
        // Erro ao preparar a consulta
        http_response_code(500);
        echo json_encode(['error' => 'Erro ao preparar a consulta: ' . $conexao->error]);
    }

    // Fecha a conexão com o banco de dados
    $conexao->close();
} else {
    // Parâmetro 'tombo' não fornecido
    http_response_code(400);
    echo json_encode(['error' => 'Parâmetro tombo não fornecido']);
}
?>
