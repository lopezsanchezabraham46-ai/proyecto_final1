<?php
require 'conexion.php';

$sql = "SELECT * FROM firmas ORDER BY fecha DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de firmas</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background: #f5f5f5; padding: 20px; }
        .entry { background: #fff; padding: 15px; margin-bottom: 12px; border-radius: 10px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .entry-header { display: flex; justify-content: space-between; font-weight: bold; }
        .entry-country { margin-top: 5px; font-size: 14px; color: #444; }
        .entry-message { margin-top: 10px; }
        .entry-places span { background: #e8e8e8; padding: 4px 8px; border-radius: 6px; margin-right: 4px; }
        a { font-size: 18px; display: inline-block; margin-bottom: 15px; }
    </style>
</head>
<body>

<a href="interactivo.html">⬅ Volver</a>
<h1>📜 Listado de Firmas</h1>

<?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $lugares = explode(",", $row["lugares"]);
        echo "
        <div class='entry'>
            <div class='entry-header'>
                <span>{$row['nombre']}</span>
                <span>{$row['fecha']}</span>
            </div>
            <div class='entry-country'>📍 {$row['pais']}</div>
            <div class='entry-message'>{$row['mensaje']}</div>
            <div class='entry-places'>".
                implode("", array_map(fn($l) => "<span>$l</span>", $lugares))
            ."</div>
        </div>";
    }
} else {
    echo "<p>No hay firmas registradas aún.</p>";
}

$conn->close();
?>

</body>
</html>

