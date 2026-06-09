<?php
header("Content-Type: application/json");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "trabalho";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode(["erro" => "Conexão falhou: " . $conn->connect_error]);
    exit();
}

$sql = "SELECT velocidade, rpm FROM telemetria ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
   
    echo json_encode([
        "velocidade" => floatval($row["velocidade"]),
        "rpm" => intval($row["rpm"])
    ]);
} else {
   
    echo json_encode([
        "velocidade" => 0,
        "rpm" => 0
    ]);
}
$conn->close();
?>
