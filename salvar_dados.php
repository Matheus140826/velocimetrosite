<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "trabalho";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
$conn = new mysqli("localhost", "root", "", "trabalho");

include('buscar_ultimo.php');
$id = $_POST["id"];
$nome = $_POST["nome"];
$sql = "insert into user_teste (id, nome) values ('$id', '$nome')"; 
mysqli_query($conn, $sql);
mysqli_close($conn);

{
   
    echo "Erro: Dados de 'velocidade' ou 'rpm' não foram enviados.";
}

$conn->close();
?>
