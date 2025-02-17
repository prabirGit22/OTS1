<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $order_id = $_GET['order_id'];

    $sql = "SELECT latitude, longitude, timestamp FROM tracking WHERE order_id = :order_id ORDER BY timestamp DESC LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':order_id', $order_id);
    $stmt->execute();
    $location = $stmt->fetch(PDO::FETCH_ASSOC);

    echo json_encode($location);
}
?>
