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

// Cập nhật câu lệnh SQL để lấy thêm tên chuyên ngành
$sql = "SELECT student.*, major.name_major 
        FROM student 
        INNER JOIN major ON student.major_id = major.id"; 

$result = $conn->query($sql); 

if ($result->num_rows > 0) { 
    $result = $conn->query($sql); 
    $result_all = $result -> fetch_all(MYSQLI_ASSOC); 
  ?> 

    <h1>Bang du lieu sinh vien</h1> 
    <table border=1>
        <tr>
            <th>ID</th>
            <th>Hoten</th>
            <th>email</th>
            <th>ngaysinh</th>
            <th>Chuyên ngành</th> <th colspan="2">Hanh dong</th>
        </tr> 
        <?php   
        foreach ($result_all as $row) { 
            $date = date_create($row['Birthday']); 
            echo "<tr>
                    <td>". $row["id"]. "</td>
                    <td>". $row["fullname"]. "</td>
                    <td>". $row["email"]. "</td>
                    <td>". $date->format('d-m-Y'). "</td>
                    <td>". $row["name_major"]. "</td>"; // Hiển thị tên chuyên ngành
          ?> 
            <td> 
                <form method="post" action="xoa.php">   
                    <input type="submit" name="action" value="xoa"/> 
                    <input type="hidden" name="id" value="<?php echo $row['id'];?>"/> 
                </form> 
            </td> 
            <td> 
                <form method="post" action="form_sua.php">   
                    <input type="submit" name="action" value="sua"/> 
                    <input type="hidden" name="id" value="<?php echo $row['id'];?>"/> 
                </form> 
            </td>
            </tr>
            <?php 
        } 
        echo "</table>"; 
} else { 
    echo "0 ket qua tra ve"; 
} 
$conn->close();?>