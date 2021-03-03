<?php
session_start();

$cpw = md5($_POST['c_password']);

$conn=mysqli_connect("localhost", "root", "","helloboard_db");
$conn->query("SET NAMES UTF8");
$sql="SELECT * FROM user WHERE username = '".$_SESSION["username"]."' ";
if ($conn->connect_error) {// Check connection
die("Connection failed: " . $conn->connect_error);
}
$result2 = $conn -> query($sql);
$row2 = $result2 -> fetch_assoc();

if($cpw != $row2['password']){
  echo "<script 'text/JavaScript'>";
  echo "alert('Error: Password not match!');";
  echo 'document.location.href = "webboard.php";';
  echo "</script>";
} else {


// sql to delete a record

$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result)){
//echo $row["user_id"];
if($_POST['password']!=""){
  $pw = md5($_POST['password']);
  $sql = "UPDATE user SET username='".$_SESSION['username']."',password = '".$pw."',role = 0, image = '".$_POST['avatar']."', major = '".$row["major"]."' WHERE user_id = '".$row["user_id"]."'";
}else{
  $sql = "UPDATE user SET username='".$_SESSION['username']."',password = '".$row2['password']."',role = 0, image = '".$_POST['avatar']."', major = '".$row["major"]."' WHERE user_id = '".$row["user_id"]."'";

}
if ($conn->query($sql)) {
  
    echo "<script 'text/JavaScript'>";
    echo "alert('Update Successfully!!');";
		echo 'document.location.href = "webboard.php";';
    echo "</script>";
} else {
    echo "alert('Error Insert record: ' . $conn->error);";
    echo "Error Insert record: " . $conn->error;
};
}
$conn->close();
}
?>
<html>
<br><br>
<a href="Webboard.php">Go to Home</a>
</html>