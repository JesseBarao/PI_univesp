<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['Matricula'])) {
    // Se não estiver logado, redireciona para a página de login
    header("Location: inicial.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca - Cadastro e Consulta</title>
    <!-- Link para o Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="aluno.css" rel="stylesheet" >
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Biblioteca</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Cadastro_aluno.html">Cadastro Aluno</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ConsultaLivro_aluno.html">Consulta Livros</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Seção principal -->
    <div class="container my-5">
        <div class="row">
            <div class="col-lg-6 col-md-12 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Consulta de Livros</h5>
                        <p class="card-text">Consulte o acervo de livros disponíveis na biblioteca para empréstimo.</p>
                        <a href="ConsultaLivro_aluno.html" class="btn btn-secondary">Consultar Livros</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Rodapé -->
    <footer class="bg-light text-center py-3">
        <p class="mb-0">Biblioteca &copy; 2024. Todos os direitos reservados.</p>
    </footer>

    <!-- Scripts do Bootstrap 5 -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
