<?php
// CONEXÃO COM O BANCO DE DADOS

    header('Access-Control-Allow-Origin: *');

    $host="192.168.10.60"; //onde nosso banco está localizado
    $user="a7";
    $password="sql#Hais23";
    $dbName="a7_GMX";

    $connection = new mysqli($host, $user, $password, $dbName); //variável que fará conexão com o banco de dados. variáveis na ordem.

    if($connection->connect_error) { //Retorna msg de erro caso der erro.
        die("Connection Failed".$connection->connect_error); // mata o processo caso dê erro.
    }else{
        echo ("Connect success!");
    }
?>