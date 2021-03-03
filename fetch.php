<?php session_start();
error_reporting(0);
ini_set('display_errors', 0); //hide error

$connect=mysqli_connect("localhost", "root", "","helloboard_db");
$connect->query("SET NAMES UTF8");
$strSQL = "SELECT * FROM user WHERE username = '".$_SESSION['username']."' ";
$result = mysqli_query($connect, $strSQL);



if($_SESSION['username'] == "")
{
    echo "<center>Please Login!<br><a href='login.htm'>Login</a><center>";

} else {

//fetch.php
$connect = mysqli_connect("localhost", "root", "", "helloboard_db");
$output = '';
if(isset($_POST["query"]))
{
    $search = mysqli_real_escape_string($connect, $_POST["query"]);
    $query = "SELECT * FROM webboard WHERE Question LIKE '%".$search."%' ";
}
else
{
    $query = "SELECT * FROM webboard ORDER BY QuestionID DESC ";
}

$result = $connect->query($query);

if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table style="width:100%">
    <tr>
     <th>QuestionID</th>
     <th>Question</th>
     <th>Name</th>
     <th>CreateDate</th>
     <th>View</th>
     <th>Reply</th>
     <th>Topic</th>
     <th>Major</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td aling="center">'.$row["QuestionID"].'</td>
    <td id="quest"><a href="ViewWebboard.php?QuestionID='.$row["QuestionID"].'">'.$row["Question"].'</a></td>
    <td aling="center">'.$row["Name"].'</td>
    <td aling="center">'.$row["CreateDate"].'</td>
    <td aling="center">'.$row["View"].'</td>
    <td>'.$row["Reply"].'</td>
    
     <td aling="center"><a href="Webboard_'.$row["Category"].'.php">'.$row["Category"].'</a></td>
     <td aling="center"><a href="Webboard_'.$row["Major"].'.php">'.$row["Major"].'</a></td>
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