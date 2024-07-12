<?php
include 'db.php';

$action = $_GET['action'];

if ($action == 'read') {
    $sql = "SELECT orders.*, categories.category_name, menus.image, menus.name 
            FROM orders 
            LEFT JOIN menus ON orders.menu_id = menus.id 
            LEFT JOIN categories ON menus.category_id = categories.id";
    $result = $conn->query($sql);
    $orders = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $orders[] = $row;
        }
        echo json_encode($orders);
    } else {
        echo json_encode([]);
    }
}

$conn->close();
?>
