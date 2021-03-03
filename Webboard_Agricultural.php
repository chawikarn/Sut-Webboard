<?php
session_start();


error_reporting(0);
ini_set('display_errors', 0); //hide error

$connect=mysqli_connect("localhost", "root", "","helloboard_db");
$connect->query("SET NAMES UTF8");
$strSQL = "SELECT * FROM user WHERE username = '".$_SESSION['username']."' ";
$result = mysqli_query($connect, $strSQL);
?>
<html>
<head>
<title>SUT WEBBOARD</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" /> -->
<link rel="stylesheet" type="text/css" href="Navbar_cat.css"> 
<link rel="stylesheet" type="text/css" href="Webboard.css">
<link rel="stylesheet" type="text/css" href="Topic.css">

<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"fetchAgricultural.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>

</head>
<body>
<div class="container">
<div class="navbar">
    <a href="Webboard.php">Public</a>
    <div class="subnav">
        <button class="subnavbtn">Major<i class="fa fa-caret-down"></i></button>
        <div class="subnav-content">
        <a href="Webboard_Social_Technology.php">Social Technology</a>
        <a href="Webboard_Science.php">Science</a>
        <a href="Webboard_Agricultural.php">Agricutural</a>
        <a href="Webboard_Engineer.php">Engineering</a>
        <a href="Webboard_Medicine.php">Medicine</a>
        <a href="Webboard_Dentistry.php">Dentistry</a>
        <a href="Webboard_Nurse.php">Nurse</a>
        <a href="Webboard_Public_Health.php">Public Health</a>
      </div>
    </div> 
    <a href="editForm.php" <?php if($_SESSION['username'] == "")  {echo "style='display: none;'";} ?>> Account</a>
    <div class="subnav1">
      <a href="login.htm" <?php if($_SESSION['username'] == "")  {echo "style='display: none;'";} ?>> Logout</a>
      </div>
  </div>
  </div>
  <table  align="center">
<tr>
  <div class="header">
    <h1>SUT WEBBOARD</h1>
    <p>School of Agricultual</p>
  </div>
  </tr>
<tr>
  <ul>
    <li><a href="Webboard_Agricultural.php">ALL</a></li>
    <li><a href="Webboard_topic_Agri.php?Topic=Love">Love</a></li>
    <li> <a href="Webboard_topic_Agri.php?Topic=Education">Educations</a> </li>
    <li><a href="Webboard_topic_Agri.php?Topic=Drama">Drama</a></li>
    <li> <a href="Webboard_topic_Agri.php?Topic=Health">Health</a> </li>
    <li><a href="Webboard_topic_Agri.php?Topic=Game">Game</a></li>
    <li> <a href="Webboard_topic_Agri.php?Topic=Idol">Idol</a> </li>
  </ul>
</tr>
<tr>
<td>
<form name="frmSearch" method="get" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
<div class="container">
  <div class="form-group">
    <div class="input-group">
          <a class="button" href="NewQuestion.php">New Topic</a>
          <a class="button" href="mypost.php" <?php if($_SESSION['username'] == "")?>>My Post</a>
          <input type="text" name="search_text" id="search_text" class="form-control" placeholder="Search...."/>
          <label class="form-label" for="form1"></label>
    </div>
  </div>
   <div id="result"></div>
   </div>
  </div>
</form>
</td>
</tr>
</body>
</html>
