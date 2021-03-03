<?php
$conn=mysqli_connect("localhost", "root", "","helloboard_db");
$conn->query("SET NAMES UTF8");
// Check connection
$sql="SELECT * FROM user WHERE user_id = '".$_GET["user_id"]."' ";
if ($conn->connect_error) {// Check connection
die("Connection failed: " . $conn->connect_error);
}
$result = $conn -> query($sql);
$row = $result -> fetch_assoc();

    if($row['role']==1){
    $sql1 = "UPDATE user SET role = 0 WHERE user_id = '".$_GET["user_id"]."'";
    }
    else if($row['role']==0){
    $sql1 = "UPDATE user SET role = 1 WHERE user_id = '".$_GET["user_id"]."'";
    }

if ($conn->query($sql1) === TRUE) {
    echo "<meta http-equiv='refresh' content='0; URL=list_user.php'>";
} else {
    echo "<script 'text/JavaScript'>";
    echo "alert('user ID: '".$_GET['user_id']."' Error Change Role record: " . $conn->error;
    echo "</script>";
    echo "<meta http-equiv='refresh' content='0; URL=list_user.php'>";
}

$conn->close();
?>