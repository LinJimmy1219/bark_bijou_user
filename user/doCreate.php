<?php
require_once("../db_connect.php");

if (!isset($_POST["name"])) {
    die("請循正常管道進入此頁");
}

$name = $_POST["name"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$now = date("Y-m-d H:i:s");

$sql = "INSERT INTO users (name, phone, email, created_at)
	VALUES ('$name', '$phone', '$email', '$now')";


// echo $sql;
if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    echo "新資料輸入成功, id 為 $last_id";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header("location: create-user.php"); // 導回輸入介面

