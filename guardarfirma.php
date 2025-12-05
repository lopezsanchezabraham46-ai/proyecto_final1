<?php
require 'conexion.php';

header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);

$nombre  = $data["nombre"];
$pais    = $data["pais"];
$lugares = implode(",", $data["lugares"]);
$mensaje = $data["mensaje"];

$sql = "INSERT INTO firmas (nombre, pais, lugares, mensaje) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $nombre, $pais, $lugares, $mensaje);

if ($stmt->execute()) {
    echo json_encode(["status" => "ok"]);
} else {
    echo json_encode(["status" => "error", "msg" => $conn->error]);
}

$stmt->close();
$conn->close();
?>

