<?php
$conn=mysqli_connect("localhost", "root", "","helloboard_db");
$conn->query("SET NAMES UTF8");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} else {
// sql to delete a record
$sql = "DELETE FROM user WHERE username ='".$_GET['username']."'";

if ($conn->query($sql) === TRUE) {
  echo "<script 'text/JavaScript'>";
  echo "alert('username: '".$_GET['username']."' has been deleted!!');";
  echo "</script>";
  echo "<meta http-equiv='refresh' content='0; URL=list_user.php'>";
} else {
    echo "<script 'text/JavaScript'>";
    echo "alert('user ID: Error deleting record: " . $conn->error;
    echo "</script>";
    echo "<meta http-equiv='refresh' content='0; URL=list_user.php'>";
}

$conn->close();
}
?>