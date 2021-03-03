<?php 
session_start();

        error_reporting(0);
        ini_set('display_errors', 0); //hide error

        $conn=mysqli_connect("localhost", "root", "","helloboard_db");
        $conn->query("SET NAMES UTF8");
        $strSQL = "SELECT * FROM user WHERE username = '".$_SESSION['username']."' ";
        $result = mysqli_query($conn, $strSQL);   

        if($_SESSION['username'] == "")
        {
            echo "<center>Please Login!<center>";
        }

date_default_timezone_set("Asia/Bangkok"); 
$date = date("Y-m-d H:i:s", time());

$conn=mysqli_connect("localhost", "root", "","helloboard_db");
$conn->query("SET NAMES UTF8");
$insertsql="INSERT INTO report (rp_id,QuestionID,userName,date) VALUES ('','".$_POST["q_id"]."','".$_SESSION['username']."','".$date."')";
$rs=$conn->query($insertsql);
        echo "<script 'text/JavaScript'>";
        echo "alert('Report successful!');";
        echo "</script>";
        echo "<meta http-equiv='refresh' content='0;URL=".$_POST['url']."'>"; //redirect page
$conn->close();

?>