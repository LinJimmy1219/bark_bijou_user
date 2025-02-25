<?php
if (!isset($_POST["name"])) {
    die("請循正常管道進入此頁");
}

require_once("../db_connect_bark_bijou.php");

$id = $_POST["id"];
$name = $_POST["name"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$gender_id = $_POST["gender_id"];

$sql = "UPDATE users SET name='$name', phone='$phone', email='$email', gender_id='$gender_id'
WHERE id='$id'";
echo $sql;

if ($conn->query($sql) === TRUE) {
    // echo "資料更新成功";
    header("location: user.php?id=$id");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
