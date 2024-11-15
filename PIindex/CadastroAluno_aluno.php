<?php
// Inclui o arquivo de configuração para conectar ao banco de dados
include_once('Config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recebe os dados enviados pelo formulário
    $Matricula = $_POST['Matricula'];
    $Nome = $_POST['Nome'];
    $Tipo = $_POST['Tipo'];
    $Senha = $_POST['Senha'];
    $Validade = $_POST['Validade'];
    $Endereco = $_POST['Endereco'];
    $Cidade = $_POST['Cidade'];
    $Cep = $_POST['Cep'];
    $Uf = $_POST['Uf'];
    $Fone = $_POST['Fone'];
    $Email = $_POST['Email'];
    $Obs = $_POST['Obs'];

    // Verifica se a matrícula já está cadastrada
    $verificaMatricula = mysqli_prepare($conexao, "SELECT * FROM alunos WHERE Matricula = ?");
    mysqli_stmt_bind_param($verificaMatricula, 's', $Matricula);
    mysqli_stmt_execute($verificaMatricula);
    $resultado = mysqli_stmt_get_result($verificaMatricula);

    if (mysqli_num_rows($resultado) > 0) {
        // Caso a matrícula já esteja cadastrada, exibe mensagem de erro
        echo "<script>alert('Matrícula já cadastrada!'); window.location.href = 'CadastroAluno.html';</script>";
    } else {
        // Se a matrícula não estiver cadastrada, insere o novo aluno no banco de dados
        $inserirAluno = mysqli_prepare($conexao, "INSERT INTO alunos(Matricula, Nome, Tipo, Senha, Validade, Endereco, Cidade, Cep, Uf, Fone, Email, Obs)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        mysqli_stmt_bind_param($inserirAluno, 'ssssssssssss', $Matricula, $Nome, $Tipo, $Senha, $Validade, $Endereco, $Cidade, $Cep, $Uf, $Fone, $Email, $Obs);

        if (mysqli_stmt_execute($inserirAluno)) {
            // Caso o aluno seja inserido com sucesso
            echo "<script>alert('Aluno cadastrado com sucesso!'); window.location.href = 'pagina_alunos.html';</script>";
        } else {
            // Caso ocorra algum erro durante a inserção
            echo "<script>alert('Erro ao cadastrar aluno!'); window.location.href = 'Cadastro_aluno.html';</script>";
        }
    }

    // Fecha a conexão
    mysqli_stmt_close($verificaMatricula);
    mysqli_stmt_close($inserirAluno);
    mysqli_close($conexao);
}
?>
