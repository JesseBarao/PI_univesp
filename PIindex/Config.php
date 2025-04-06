<?php

$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'formulario-aluno';
$dbPort = 3306;



$conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName,$dbPort);



//if($conexao->connect_errno)
//{
//    echo "erro";
//}
//else{
 //   echo "conexão efetuada com sucesso";
//}

?>