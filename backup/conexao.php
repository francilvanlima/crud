<?php
// CONEXÃO COM O BANCO DE DADOS

header('Access-Control-Allow-Origin: *');

$serverName = "192.168.10.60"; // Endereço do servidor SQL Server
$connectionOptions = array(
    "Database" => "youtube", // Nome do banco de dados
    "Uid" => "a7", // Nome de usuário
    "PWD" => "sql#Hais23" // Senha do usuário
);

$connection = sqlsrv_connect($serverName, $connectionOptions); // Conexão com o SQL Server

if ($connection === false) {
    // Se ocorrer um erro na conexão, exiba uma mensagem de erro
    die(print_r(sqlsrv_errors(), true));
} else {
    echo ("Connect success!");
}

// A partir desse ponto, a conexão está estabelecida e você pode executar consultas no SQL Server

// Exemplo de consulta:
// $sql = "SELECT * FROM tabela"; // Substitua "tabela" pelo nome da tabela que você deseja consultar

// $stmt = sqlsrv_query($connection, $sql);

// if ($stmt === false) {
//     // Se ocorrer um erro na consulta, exiba uma mensagem de erro
//     die(print_r(sqlsrv_errors(), true));
// }

// // Processar os resultados da consulta
// while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
//     echo $row['coluna1'] . ", " . $row['coluna2'] . "<br>"; // Substitua "coluna1" e "coluna2" pelos nomes das colunas que deseja exibir
// }

// // Fechar a conexão
// sqlsrv_free_stmt($stmt);
// sqlsrv_close($connection);
?>
