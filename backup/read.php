
<?php
// -------------- READ do Crud --------------

header('Access-Control-Allow-Origin: *');

require_once('conexao.php');

$sql = "SELECT * FROM clientes ORDER BY id ASC";

$resultado = $connection->query($sql);

if($resultado->num_rows > 0) {
    foreach($resultado as $row) {
        echo"<tr>";
            echo"<td>".$row["name"]."</td>";
            echo"<td>".$row["cpf"]."</td>";
            echo"<td>".$row["endereco"]."</td>";
            echo"<td>".$row["telefone"]."</td>";
            echo"<td>".$row["email"]."</td>";
            echo"<td>
                <button type='button' class='btn btn-success' onclick='getId(".$row['id'].")'>Editar</button>
                <button type='button' class='btn btn-danger' onclick='remove(".$row['id'].")'>Excluir</button>
            </td>";
        echo"</tr>";
    }
}else{
    echo("");
}

?>
