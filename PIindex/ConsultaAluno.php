<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta Aluno</title>
    <link rel="stylesheet" type="text/css" href="Estilo.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

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
            <h3>Consultar Aluno</h3>
            <form>
                Nome:<br>
                <input type="text" name="nomeAluno" id="nomeAluno"><br>
                Matrícula:<br>
                <input type="text" name="matriculaAluno" id="matriculaAluno"><br>
                <input type="button" name="BuscaAluno" value="Buscar Aluno" id="btnBuscarAluno" onclick="buscarAluno()"><br>
            </form>
        </div>

        <!-- Modal -->
        <div id="modal" style="display: none;">
            <div id="modal-content">
                <span class="close" onclick="fecharModal()">&times;</span>
                <div id="resultadoAluno"></div>
            </div>
        </div>

        <!-- Formulário de edição -->
        <div id="formularioEdicao" style="display: none;">
            <form id="formEdicao">
                Nome:<br>
                <input type="text" name="nomeEditAluno" id="nomeEditAluno"><br>
                Matrícula:<br>
                <input type="text" name="matriculaEditAluno" id="matriculaEditAluno"><br>
                <!-- Adicione outros campos que estejam sendo editados... -->
                <input type="button" value="Salvar" onclick="salvarEdicaoAluno()"><br>
            </form>
        </div>
    </div>

    <script>
       function buscarAluno() {
    // Obtenha os valores dos campos de consulta
    const nomeAluno = document.getElementById('nomeAluno').value;
    const matriculaAluno = document.getElementById('matriculaAluno').value;

    // Realize uma requisição AJAX para buscar aluno
    const xhr = new XMLHttpRequest();
    xhr.open('GET', `buscar_aluno.php?nome=${nomeAluno}&matricula=${matriculaAluno}`, true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            // Obtenha os resultados da resposta AJAX
            const resultados = xhr.responseText.split('\n').filter(linha => linha.trim() !== '');
            
            // Limpa o conteúdo anterior de resultadoAluno
            const resultadoAluno = document.getElementById('resultadoAluno');
            resultadoAluno.innerHTML = '';

            // Processa cada linha dos resultados
            let resultadosFiltrados = [];
            resultados.forEach(resultado => {
                if (resultado.trim() !== '' && !resultadosFiltrados.includes(resultado.trim())) {
                    resultadosFiltrados.push(resultado.trim());
                }
            });
            
            // Exibe os resultados filtrados com quebras de linha
            resultadoAluno.innerHTML = resultadosFiltrados.join('<br>');

            // Mostra o modal
            document.getElementById('modal').style.display = 'block';
        }
    };
    xhr.send();
}



        function fecharModal() {
            // Esconder o modal
            document.getElementById('modal').style.display = 'none';
        }

        // Fecha o modal se o usuário clicar fora do modal
        window.onclick = function(event) {
            const modal = document.getElementById('modal');
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        };
    </script>
</body>

</html>
