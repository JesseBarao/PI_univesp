<?php
include_once('Config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Tipo = isset($_POST['Tipo']) ? $_POST['Tipo'] : '';
    $Nivel = isset($_POST['Nivel']) ? $_POST['Nivel'] : '';
    $Classificacao = isset($_POST['Classificacao']) ? $_POST['Classificacao'] : '';
    $Cutter = isset($_POST['Cutter']) ? $_POST['Cutter'] : '';
    $IndiceAutores = isset($_POST['IndiceAutores']) ? $_POST['IndiceAutores'] : '';
    $Autores = isset($_POST['Autores']) ? $_POST['Autores'] : '';
    $Titulo = isset($_POST['Titulo']) ? $_POST['Titulo'] : '';
    $Subtitulo = isset($_POST['Subtitulo']) ? $_POST['Subtitulo'] : '';
    $Edicao = isset($_POST['Edicao']) ? $_POST['Edicao'] : '';
    $NotaSerie = isset($_POST['NotaSerie']) ? $_POST['NotaSerie'] : '';
    $Editora = isset($_POST['Editora']) ? $_POST['Editora'] : '';
    $DataPublicacao = isset($_POST['DataPublicacao']) ? $_POST['DataPublicacao'] : '';
    $IndiceAssunto = isset($_POST['IndiceAssunto']) ? $_POST['IndiceAssunto'] : '';
    $PalavrasChave = isset($_POST['PalavrasChave']) ? $_POST['PalavrasChave'] : '';
    $Idioma = isset($_POST['Idioma']) ? $_POST['Idioma'] : '';

    // Verifique a conexão com o banco de dados
    if ($conexao) {
        $query = "INSERT INTO livros (Tipo, Nivel, Classificacao, Cutter, IndiceAutores, Autores, Titulo, Subtitulo, Edicao, NotaSerie, Editora, DataPublicacao, IndiceAssunto, PalavrasChave, Idioma)
                  VALUES ('$Tipo', '$Nivel', '$Classificacao', '$Cutter', '$IndiceAutores', '$Autores', '$Titulo', '$Subtitulo', '$Edicao', '$NotaSerie', '$Editora', '$DataPublicacao', '$IndiceAssunto', '$PalavrasChave', '$Idioma')";

        if (mysqli_query($conexao, $query)) {
            echo 'Livro cadastrado com sucesso!';
        } else {
            echo 'Erro ao cadastrar livro: ' . mysqli_error($conexao);
        }
    } else {
        echo 'Erro de conexão com o banco de dados.';
    }
}
?>
