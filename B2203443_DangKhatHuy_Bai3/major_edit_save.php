<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qlsv";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_POST['id'];
$name_major = $_POST['name_major'];

// Câu lệnh SQL để cập nhật tên chuyên ngành
$sql = "UPDATE major SET name_major = '".$name_major."' WHERE id='".$id."'";

// Thực thi truy vấn
if ($conn->query($sql) === TRUE) {
    // Chuyển hướng về trang danh sách sau khi cập nhật thành công
    header('Location: major_index.php');
} else {
    // In ra lỗi nếu có vấn đề xảy ra
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Đóng kết nối
$conn->close();
?>
