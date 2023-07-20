<?php
// <!-- -------------- CREATE do Crud -------------- -->

    /*define o cabeçalho HTTP "Access-Control-Allow-Origin" em uma resposta do servidor.
    é parte do mecanismo de controle de acesso do navegador conhecido como Política de Mesma Origem (Same-Origin Policy).*/
    header('Access-Control-Allow-Origin: *');

    require_once('conexao.php'); //usado para incluir um arquivo PHP no script. Nesse caso o arquivo de chama a conexão com o BD.

    // <!-- Variáveis do cadastro que irão para o banco. -->
    // $session_start();
    $name = $_POST['name'];
    $cpf = $_POST['cpf'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];

    // ====================== START: Verificação de Campos vazios ======================
    if (empty($name) || empty($cpf) || empty($endereco) || empty($telefone) || empty($email)) {
        $message = ["message" => "Todos os campos precisam ser preenchidos!"];
        header('Content-Type: application/json');
        echo json_encode($message);
        // ====================== END: Verificação de Campos vazios ======================
    } else {
        // ====================== START: Verificação de Usuário - Se já está cadastrado ======================
        $str = "SELECT * FROM clientes WHERE cpf='$cpf'";

        $response = $connection->query($str);

        if ($response->num_rows > 0) {
            echo json_encode(["message" => "CPF já cadastrado!"]);
        } else {
            //variável que recebe um string responsável por transformar os dados em mysql pra INSERIR no bando de dados na tabela clientes.
            $sql = "INSERT INTO clientes(name, cpf, endereco, telefone, email) VALUES('" . $name . "', '" . $cpf . "', '" . $endereco . "', '" . $telefone . "', '" . $email . "')";

            $result = $connection->query($sql); //Variável connection vem do arquivo config.php

            if (!$result) { //se for diferente de result
                http_response_code(500);
                echo json_encode(["error" => "Erro ao inserir no banco de dados"]);
            } else {
                http_response_code(200);
                echo json_encode(["success" => "Salvo no banco de dados"]);
            }
        }
        // ====================== END: Verificação de Usuário - Se já está cadastrado ======================

    }
?>