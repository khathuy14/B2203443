<!DOCTYPE HTML>
<html>
<body>
<form action="luu.php" method="post">
    Name: <input type="text" name="name"><br>
    E-mail: <input type="text" name="email"><br>
    Birthday: <input type="date" name="birth"><br>

    Chuyên ngành:
    <select name="major_id"> 
        <?php
        $servername = "localhost";
        $username = "root"; 
        $password = "";    
        $dbname = "qlsv";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Lấy danh sách chuyên ngành từ bảng major
            $stmt = $conn->query("SELECT id, name_major FROM major");
            $majors = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Tạo các option cho combobox
            foreach ($majors as $major) {
                echo "<option value=\"" . $major['id'] . "\">" . $major['name_major'] . "</option>";
            }
        } catch(PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }

        $conn = null; // Đóng kết nối
        ?>
    </select><br>

    <input type="submit">
</form>
</body>
</html>