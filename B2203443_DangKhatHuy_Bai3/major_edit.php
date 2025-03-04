<!DOCTYPE HTML>
<html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qlsv";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "SELECT id, name_major FROM major WHERE id='". $id. "'"; // Select only id and name
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
        <body>
            <form action="major_edit_save.php" method="post">
                ID: <input type="text" name="id" value="<?php echo $row['id'];?>" readonly><br>
                Tên chuyên ngành: <input type="text" name="name_major" value="<?php echo $row['name_major'];?>"><br>
                <input type="submit" value="Cập nhật">
            </form>
        </body>
        <?php
    } else {
        echo "No major found with that ID.";
        exit;
    }
} else {
    echo "No ID provided.";
    exit;
}

$conn->close();?>
</html>