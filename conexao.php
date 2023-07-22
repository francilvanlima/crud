
<?php
// CONEXÃO COM O BANCO DE DADOS

    header('Access-Control-Allow-Origin: *');

    $host="localhost"; //onde nosso banco está localizado
    $user="root";
    $password="";
    $dbName="youtube";

    $connection = new mysqli($host, $user, $password, $dbName); //variável que fará conexão com o banco de dados. variáveis na ordem.

    if($connection->connect_error) { //Retorna msg de erro caso der erro.
        die("Connection Failed".$connection->connect_error); // mata o processo caso dê erro.
    } //else {
    // echo (" connected success");
    // }
?>