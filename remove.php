<?php
header('Access-Control-Allow-Origin: *');
require_once('conexao.php');

$id=$_POST['id'];

if(empty($id)) {
    echo json_encode(["message"=>"Não foi passado nenhum id"]);
}else{
    $sql ="DELETE FROM clientes WHERE id='$id'";
    $response = $connection->sqlsrv_query($sql);

    if($response === TRUE) {
        echo json_encode(["message"=>"Usuário deletado com sucesso."]);
    } else {
        echo json_encode(["message"=>"Erro ao excluir usuário."]);
    }
}
?>