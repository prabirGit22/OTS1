<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $customer_name = $_POST['customer_name'];
    $total_price = $_POST['total_price'];

    $sql = "INSERT INTO orders (customer_name, total_price) VALUES (:customer_name, :total_price)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':customer_name', $customer_name);
    $stmt->bindParam(':total_price', $total_price);
    $stmt->execute();

    $order_id = $pdo->lastInsertId();
    echo $order_id;
}
?>
