
<?php
// -------------- READ do Crud --------------

header('Access-Control-Allow-Origin: *');

require_once('conexao.php');

$sql = "SELECT * FROM clientes ORDER BY id ASC";

$resultado = $connection->query($sql);

if($resultado->num_rows > 0) {
    foreach($resultado as $rows) {
        echo"<tr>";
            echo"<td>".$rows["name"]."</td>";
            echo"<td>".$rows["cpf"]."</td>";
            echo"<td>".$rows["endereco"]."</td>";
            echo"<td>".$rows["telefone"]."</td>";
            echo"<td>".$rows["email"]."</td>";
            echo"<td>
                <button type='button' class='btn btn-success'>editar</button>
                <button type='button' class='btn btn-danger' onclick='remove('".$row['id']."')'>excluir</button>
            </td>";
        echo"</tr>";
    }
}else{
    echo("");
}

?>
