<?php
    if(isset($_POST['submit']))
    {
        //print_r($_POST['Matricula']);
        //print_r('<br>');
        //print_r($_POST['Nome']);
        //print_r('<br>');
        //print_r($_POST['Tipo']);
        //print_r('<br>');
        //print_r($_POST['Senha']);
        //print_r('<br>');
        //print_r($_POST['Validade']);
        //print_r('<br>');
        //print_r($_POST['Endereco']);
        //print_r('<br>');
        //print_r($_POST['Cidade']);
        //print_r('<br>');
        //print_r($_POST['Cep']);
        //print_r('<br>');
        //print_r($_POST['Uf']);
        //print_r('<br>');
        //print_r($_POST['Fone']);
        //print_r('<br>');
        //print_r($_POST['Email']);
        //print_r('<br>');
        //print_r($_POST['Obs']);

        include_once('Config.php');

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

        $result = mysqli_query($conexao, "INSERT INTO alunos(Matricula,Nome,Tipo,Senha,Validade,Endereco,Cidade,Cep,Uf,Fone,Email,Obs)
        VALUES('$Matricula','$Nome','$Tipo','$Senha','$Validade','$Endereco','$Cidade','$Cep','$Uf','$Fone','$Email','$Obs')");

    }

?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Aluno</title>
    <Link rel="stylesheet" type="text/css" href="Estilo.css"> 
</head>

<body>
    <div>


        <div id="lateral">
        <ul class="linklateral">
                <li><a href="CadastroLivro.html">Cadastro Livro</a></li>
                <li><a href="CadastroAluno.php">Cadastro Aluno</a></li>
                <li><a href="ConsultaLivro.html">Consulta Livro</a></li>
                <li><a href="ConsultaAluno.php">Consulta Aluno</a></li>
                <li><a href="Index.html">Home</a></li>
                <li><a href="Emprestimo.html">Emprestimo</a></li>
                <li><a href="Devolver.html">Devolução</a></li>
            </ul>

        </div>

        <div id="principal">
            <h3>Cadastrar Aluno</h3>

            <form action="CadastroAluno.php" method='POST'>
                Matricula: <br>
                <input type="text" name="Matricula" id="textoCad"> <br>
                Nome:  <br>
                <input type="text" name="Nome" id="textoCad"> <br>
                Tipo:<br>
                <input type="text" name="Tipo" id="textoCad"> <br>
                Senha:<br>
                <input type="text" name="Senha" id="textoCad"> <br>
                Validade:<br>
                <input type="text" name="Validade" id="textoCad"> <br>
                Endereço:<br>
                <input type="text" name="Endereco" id="textoCad"> <br>
                Cidade:<br>
                <input type="text" name="Cidade" id="textoCad"> <br>
                Cep:<br>
                <input type="text" name="Cep" id="textoCad"> <br>
                Uf:<br>
                <input type="text" name="Uf" id="textoCad"> <br>
                Fone:<br>
                <input type="text" name="Fone" id="textoCad"> <br>
                Email:<br>
                <input type="text" name="Email" id="textoCad"> <br>
                Obs:<br>
                <input type="text" name="Obs" id="textoCad"> <br>

                <input type="submit" name="submit" value="Cadastro" id="botaocadastro">

                




            </form>
        </div>

    </div>


    
</body>
</html>