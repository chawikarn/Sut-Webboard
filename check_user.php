<?php session_start();?>
<?php
$conn=mysqli_connect("localhost", "root", "","helloboard_db");
$conn->query("SET NAMES UTF8");
 
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
    $Username = $_POST['username'];
    $Password = md5($_POST['password']);
  //query 
    $sql="SELECT * FROM user where username='".$Username."' and password='".$Password."'";

    $result = mysqli_query($conn,$sql);
  
    if(mysqli_num_rows($result)==1){

        $row = mysqli_fetch_array($result);

        $_SESSION["username"] = $row["username"];
        $_SESSION["role"] = $row["role"];

            if($_SESSION["role"]=="1"){ 

            Header("Location: admin.php");

            }

            else if ($_SESSION["role"]=="0"){  

            Header("Location: Webboard.php");


            }else{
                echo "<script>";
                echo "alert('username or password not correct!');"; 
                echo "window.history.back()";
                echo "</script>";
                }

    }else{
      echo "<script 'text/JavaScript'>";
      echo "alert('username or password not correct!');";
      echo "</script>";
      echo "<meta http-equiv='refresh' content='0;URL=login.htm'>";
      //user & password incorrect back to login again
        }
?>