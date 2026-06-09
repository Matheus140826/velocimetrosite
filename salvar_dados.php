<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "trabalho";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
if (isset($_POST['velocidade']) && isset($_POST['rpm'])) {
    $velocidade = htmlspecialchars($_POST['velocidade'], ENT_QUOTES, 'UTF-8');
    $rpm = htmlspecialchars($_POST['rpm'], ENT_QUOTES, 'UTF-8');
   
    echo "Dados recebidos com sucesso! Velocidade: " . $velocidade . " km/h | RPM: " . $rpm;
   
    $stmt = $conn->prepare("INSERT INTO suas_leituras (velocidade, rpm) VALUES (?, ?)");
    $stmt->bind_param("dd", $velocidade, $rpm);
    $stmt->execute();
    $stmt->close();

} else {
   
    echo "Erro: Dados de 'velocidade' ou 'rpm' não foram enviados.";
}

$conn->close();
?>
