<?php
include 'db.php';

$action = $_GET['action'];

if ($action == 'create') {

    $menu_id = $_POST['id'];

    if ($menu_id > 0) {
        $sql = "INSERT INTO favorites (menu_id) VALUES ('$menu_id')";
        if ($conn->query($sql) === TRUE) {
            echo json_encode(["status" => "success", "message" => "Recipe added to favorites"]);
        } else {
            echo json_encode(["status" => "fail", "message" => "Error: " . $conn->error]);
        }
    } else {
        echo json_encode(["status" => "fail", "message" => "Invalid recipe ID"]);
    }
}

if ($action == 'read') {
    $sql = "SELECT menus.*, categories.category_name FROM menus LEFT JOIN categories ON menus.category_id = categories.id JOIN favorites ON menus.id = favorites.menu_id";
    $result = $conn->query($sql);
    $favorites = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $favorites[] = $row;
        }
        echo json_encode($favorites);
    } else {
        echo json_encode([]);
    }
}


if ($action == 'delete') {
    $menu_id = $_POST['id'];

    if ($menu_id > 0) {
        $sql = "DELETE FROM favorites WHERE menu_id = '$menu_id'";
        if ($conn->query($sql) === TRUE) {
            echo json_encode(["status" => "success", "message" => "Recipe removed from favorites"]);
        } else {
            echo json_encode(["status" => "fail", "message" => "Error: " . $conn->error]);
        }
    } else {
        echo json_encode(["status" => "fail", "message" => "Invalid recipe ID"]);
    }
}

$conn->close();
?>
