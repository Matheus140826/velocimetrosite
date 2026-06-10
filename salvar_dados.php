<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "trabalho";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

    $velocidade = $_POST["velocidade"];
    $rpm = $_POST["rpm"];
    
    $sql = "INSERT INTO telemetria (velocidade, rpm) VALUES ('$velocidade', '$rpm')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Dados salvos com sucesso!";
    } else {
        echo "Erro ao salvar no banco: " . mysqli_error($conn);
    }

mysqli_close($conn);
?>
