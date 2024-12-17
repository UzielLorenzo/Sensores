<?php
// Configuración de la base de datos PostgreSQL en Azure
$host = 'practicainventario.postgres.database.azure.com';
$dbname = 'db_Inventario';
$username = 'Adminpractica';
$password = 'Alumnos1';

try {
    $conn = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false
    ]);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

// Obtener datos de la ESP8266
if (isset($_GET['distance'])) {
    $distance = floatval($_GET['distance']);
    $sql = "INSERT INTO distances (distance) VALUES (:distance)";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['distance' => $distance]);

    echo "Dato guardado correctamente: " . $distance . " cm";
} else {
    echo "No se recibieron datos válidos.";
}

$conn = null;
?>
