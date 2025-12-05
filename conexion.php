<?php
$host = "localhost";
$user = "root";     // CAMBIAR si tu usuario es otro
$pass = "";         // tu contraseña
$db   = "firmas_db";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>

