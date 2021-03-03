<?php
$image1 = "./images/right.png";
$image2 = "./images/wrong.png";

	$con=mysqli_connect("localhost", "root", "","helloboard_db");
	if(!$con){
       die("Failed to connect:" . mysqli_connect_error());
    } 
	if(isset($_POST['type']) == 1){
		$username =$_POST['username'];
		$query ="SELECT * FROM user where username ='".$username."'";
		$result =mysqli_query($con, $query);
		$rowcount=mysqli_num_rows($result);
		if($rowcount >0){
			echo "<span class='status-not-available'><img src='".$image2."' width='25'></span>";
		}else{
			echo "<span class='status-not-available'><img src='".$image1."' width='25'></span>";
		}
	}
?>