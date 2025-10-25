<?php
$servername = "localhost";
$dbname = "student_excuse_platform";
$username = "root"; // غالبًا في XAMPP يكون root
$password = "";     // غالبًا يكون فارغ

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("❌ فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}
?>