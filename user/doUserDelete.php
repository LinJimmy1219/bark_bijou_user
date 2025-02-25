<?php
require_once("../db_connect_bark_bijou.php");
$id = $_GET["id"];
$sql = "UPDATE users SET valid=0 WHERE id= $id";
$result = $conn->query($sql);

$conn->close();
header("location: users.php?p=1&order=1");
