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

        else if($_SESSION['role'] != "1")
        {
            echo "<center>You don't have permission to access this page!</center>";
        }else{


        $connect=mysqli_connect("localhost", "root", "","helloboard_db");
        $connect->query("SET NAMES UTF8");

$output = '';
if(isset($_POST["query"]))
{
    $search = mysqli_real_escape_string($connect, $_POST["query"]);
    $query = "SELECT * FROM user WHERE username LIKE '%".$search."%' ";
}
else
{
    $query = "SELECT * FROM user ORDER BY user_id ";
}

$result = $connect->query($query);

if(mysqli_num_rows($result) > 0)
{
 $output .=
        '<table style="width:100%">
        <th>User_ID</th>
        <th>Image</th>
        <th>Username</th>
        <th>Major</th>
        <th>Role</th>
        <th>    </th>
        <th>    </th>
        ';
while($row = mysqli_fetch_array($result))
        {
            if($row["role"]==0)
            {
                $s= "user";
            } 
            if($row["role"]==1)
            {
                $s= "admin";
            }

         $a1="<a onClick=\"javascript: return confirm('Are you sure to change role this #username ".$row['username']."');\"";
         $a2="<a onClick=\"javascript: return confirm('Are you sure to delete this username #username ".$row['username']."');\"";
         $output .= '
         <tr>
            <td>'.$row["user_id"].'</td>
            <td><img src='.$row["image"].' width =50 px></td>
            <td>'. $row["username"] .'</td>
            <td>'. $row["major"] .'</td>
            <td>'. $s.'</td>
            <td>'. $a1.' href="edit_role.php?user_id='.$row['user_id'].'">Change role</a></td>
            <td>'. $a2.' href="delete_user.php?username='.$row['username'].'">Delete</a></td>
        </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}
        }
?>