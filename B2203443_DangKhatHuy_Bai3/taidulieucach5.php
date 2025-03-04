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

//tao chuoi luu cau lenh sql
$sql = "SELECT * FROM student";

//thuc thi cau lenh sql va dua doi tuong vao $result
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border=1><tr><th>ID</th><th>Hoten</th><th>email</th><th>ngaysinh</th></tr>";
    while ($row = $result->fetch_object()) {
        $date = date_create($row->Birthday);
        echo "<tr><td>" . $row->id . "</td><td>" . $row->fullname . "</td><td>" . $row->email . "</td><td>" . $date->format('d-m-Y') . "</td></tr>";
    }
    echo "</table>";
    $result->free_result(); // Giải phóng bộ nhớ
} else {
    echo "0 ket qua tra ve";
}

$conn->close();
?>