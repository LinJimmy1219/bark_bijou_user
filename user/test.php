<?php
// if (!isset($_GET["id"])) {
//     header("location: users.php");
// }

$id = 201;
require_once("../db_connect_bark_bijou.php");
$sql = "SELECT users.*, gender.name AS gender_name, gender.id AS gender_id
        FROM users
        JOIN gender ON users.gender_id = gender.id
        WHERE users.id = $id";  
// 之後要進入在網址後加 ?id=
$result = $conn->query($sql);
$rows=$result->fetch_all(MYSQLI_ASSOC);
var_dump($rows);
$row = $result->fetch_assoc();
$userCount = $result->num_rows;

// var_dump($row);
?>