<?php
header('Access-Control-Allow-Origin: *');
require_once('conexao.php');

$id=$_POST['id'];

if(empty($id)) {
    echo json_encode(["message"=>"Não foi passado nehum id"]);
}
?>