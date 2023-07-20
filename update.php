<?php
header('Access-Control-Allow-Origin: *');
require_once('conexao.php');

$id=$_POST['id'];
$name=$_POST['name'];
$cpf=$_POST['cpf'];
$endereco=$_POST['endereco'];
$telefone=$_POST['telefone'];
$email=$_POST['email'];

if(empty($name) || empty($cpf) || empty($endereco) || empty($telefone) || empty($email)) {
    echo json_encode(["message"=>"Todos os campos preenchidos."]);
}else{
    $sql = "UPDATE clientes SET name='$name', cpf='$cpf', endereco='$endereco', telefone='$telefone', email='$email' WHERE id='$id'";
    $response = $connection->sqlsrv_query($sql);

    if($response === TRUE){
        echo json_encode(["message"=>"Usuário atualizado com sucesso."]);
        // $message = ["message" => "Todos os campos precisam ser preenchidos!"];
        // header('Content-Type: application/json');
        // echo json_encode($message);
    } else {
        echo json_encode(["message"=>"Erro ao atualizar o usuário."]);
    }
}


?>