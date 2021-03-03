<!DOCTYPE html>
<html>
<?php
session_start();
$conn=mysqli_connect("localhost", "root", "","helloboard_db");

date_default_timezone_set("Asia/Bangkok"); //set time zone
$date = date("Y-m-d H:i:s", time());

	$sql = "INSERT INTO webboard(QuestionID,CreateDate,Question,Details,Name,Major,Category) VALUES('','".$date."','".$_POST["txtQuestion"]."','".$_POST["txtDetails"]."','".$_SESSION['username']."','".$_POST["major"]."','".$_POST["topic"]."')";
	$rs = mysqli_query($conn,$sql);
	
	if($rs){
		echo "<script 'text/JavaScript'>";
        echo "alert('Insert Question successful!');";
		echo 'document.location.href = "webboard.php";';
        echo "</script>";
	}else{
		echo mysqli_error($conn);
	}
	mysqli_close($conn); 
?>
</html>