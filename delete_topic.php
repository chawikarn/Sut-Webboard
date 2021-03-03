<?php
$conn=mysqli_connect("localhost", "root", "","helloboard_db");
$conn->query("SET NAMES UTF8");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} else {
// sql to delete a record
$sql = "DELETE FROM webboard WHERE QuestionID ='".$_GET['QuestionID']."'";
$deletesql = "DELETE FROM report WHERE QuestionID ='".$_GET['QuestionID']."'";

if ($conn->query($sql)&$conn->query($deletesql) === TRUE) {
  echo "<script 'text/JavaScript'>";
  echo "alert('Post ID:".$_GET['QuestionID']." has been deleted!!');";
  echo 'document.location.href = "admin.php";';
  echo "</script>";
} else {
    echo "<script 'text/JavaScript'>";
    echo "alert('Post ID: Error deleting record: ".$conn->error.");";
    echo "</script>";
}
$conn->close();
}
?>