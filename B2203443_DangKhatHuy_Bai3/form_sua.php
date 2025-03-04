<!DOCTYPE HTML>
<html>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qlsv";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

$id = $_POST['id'];
$sql = "SELECT * FROM student WHERE id = '".$id."'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();?>

<form action="sua.php" method="post">
    ID: <input type="text" name="id" value="<?php echo $row['id'];?>" readonly><br>
    Name: <input type="text" name="fullname" value="<?php echo $row['fullname'];?>"><br>
    E-mail: <input type="text" name="email" value="<?php echo $row['email'];?>"><br>
    Birthday: <input type="date" name="birth" value="<?php echo $row['Birthday'];?>"><br>

    Chuyên ngành:
    <select name="major_id">
        <?php
        // Lấy danh sách chuyên ngành từ bảng major
        $sql_major = "SELECT id, name_major FROM major";
        $result_major = $conn->query($sql_major);

        if ($result_major->num_rows > 0) {
            while($major = $result_major->fetch_assoc()) {
                $selected = ($major['id'] == $row['major_id'])? 'selected': ''; // Kiểm tra major hiện tại
                echo "<option value=\"". $major['id']. "\" $selected>". $major['name_major']. "</option>";
            }
        } else {
            echo "<option value=\"\">Không có chuyên ngành</option>";
        }
      ?>
    </select><br>

    <input type="submit">
</form>

</body>
</html>