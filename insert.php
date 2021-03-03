<?php
$conn=mysqli_connect("localhost", "root", "","helloboard_db");
$conn->query("SET NAMES UTF8");
 
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} else {

$sql1 = "SELECT * FROM user WHERE username = '".$_POST['username']."'";
$result = mysqli_query($conn, $sql1);
$pw = md5($_POST['password']);
if(mysqli_num_rows($result) == 0){ //dont have this username then insert

$sql = "INSERT INTO user (user_id, username, password, role, image, major) 
VALUES (null,'".$_POST['username']."','".$pw."',0,'".$_POST['avatar']."','".$_POST['major']."')";

if ($conn->query($sql) === TRUE) {
  echo "<script 'text/JavaScript'>";
  echo "alert('sign up successful!');";
  echo "</script>";
  echo "<meta http-equiv='refresh' content='0;URL=login.htm'>"; //redirect page

} else {
  echo "<script 'text/JavaScript'>";
  echo "alert('error!');";
  echo "</script>";
  echo "<meta http-equiv='refresh' content='0;URL=signup.htm'>";
};

}else{ 
  echo "<script 'text/JavaScript'>";
  echo "alert('This username has been taken!');";
  echo "</script>";
  echo "<meta http-equiv='refresh' content='0;URL=signup.htm'>";
}
}
$conn->close();
?>
