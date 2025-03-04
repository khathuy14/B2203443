<?php

$servername = "localhost";
$username = "root"; 
$password = "";   
$dbname = "qlsv";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Lấy dữ liệu từ form
    $id = $_POST["id"]; // Lấy giá trị id từ form
    $name_major = $_POST["name_major"];

    // Chuẩn bị câu lệnh SQL (bao gồm cả id)
    $stmt = $conn->prepare("INSERT INTO major (id, name_major) VALUES (:id,:name_major)");

    // Liên kết tham số
    $stmt->bindParam(':id', $id); // Liên kết tham số:id
    $stmt->bindParam(':name_major', $name_major);

    // Thực thi câu lệnh
    $stmt->execute();

    echo "Thêm chuyên ngành thành công!";
    header('Location: major_index.php');

} catch(PDOException $e) {
    echo "Lỗi: ". $e->getMessage();
}

$conn = null; // Đóng kết nối?>