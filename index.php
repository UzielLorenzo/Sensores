<?php
require 'db_config.php';

if ($_SERVER['REQUEST_URI'] === '/productos') {
    try {
        $query = $conn->query("SELECT * FROM tb_productos");
        $productos = $query->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($productos);
    } catch (PDOException $e) {
        echo json_encode(["error" => $e->getMessage()]);
    }
} else {
    echo json_encode(["message" => "API PHP funcionando correctamente."]);
}
?>