<?php session_start() ?>
<html>
<head>
  <title>My posts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" href="admin.css"> -->
    <link rel="stylesheet" type="text/css" href="webboard.css">
    <link rel="stylesheet" type="text/css" href="Navbar_cat.css">
    <link rel="stylesheet" type="text/css" href="Topic.css">
</head>
<body>
<div class="navbar">
  <div class="subnav">
      <button class="subnavbtn">Public<i class="fa fa-caret-down"></i></button>
      <div class="subnav-content">
          <a href="Webboard.php">ALL</a>
            <li><a href="Webboard_Love.php">Love</a></li>
            <li> <a href="Webboard_Education.php">Educations</a> </li>
            <li><a href="Webboard_Drama.php">Drama</a></li>
            <li> <a href="Webboard_Health.php">Health</a> </li>
            <li><a href="Webboard_Game.php">Game</a></li>
            <li> <a href="Webboard_Idol.php">Idol</a> </li>
    </div>
    </div> 
<!-- ---------------------------------------- -->
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
  <table align="center">
<tr>
  <div class="header">
      <h1>SUT WEBBOARD</h1>
      <p>---My Post---</p>
  </div>
  
</tr>
<tr>
    <td>
    <div class="form-group">
        <div class="input-group">
              <a class="button" href="NewQuestion.php">New Topic</a>
              <input type="text" name="search_text" id="search_text" class="form-control" placeholder="Search...."/>
              <label class="form-label" for="form1"></label>
        </div>
      </div>
<form action="delete_mypost.php" method="GET">
<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "helloboard_db");
$output = '';
if(isset($_POST["query"])){
    $search = mysqli_real_escape_string($connect, $_POST["query"]);
    $query = "SELECT * FROM webboard WHERE  Name = '".$_SESSION['username']."' ";
}
else{
    $query = "SELECT * FROM webboard WHERE  Name = '".$_SESSION['username']."' ";
}

$result = $connect->query($query);

if(mysqli_num_rows($result) > 0){
 $output .= '
  <div class="table-responsive" align="center">
   <table>
    <tr>
     <th>QuestionID</th>
     <th>Question</th>
     <th>Name</th>
     <th>CreateDate</th>
     <th>View</th>
     <th>Reply</th>
     <th>Topic</th>
     <th></th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result)){
  $output .= '
   <tr>
    <td>'.$row["QuestionID"].'</td>
    <td id="quest"><a class="tp" href="ViewWebboard.php?QuestionID='.$row["QuestionID"].'">'.$row["Question"].'</a></td>
    <td>'.$row["Name"].'</td>
    <td>'.$row["CreateDate"].'</td>
    <td>'.$row["View"].'</td>
    <td>'.$row["Reply"].'</td>
    <td >'.$row["Category"].'</td>
    <td ><a href="delete_mypost.php?QuestionID='.$row["QuestionID"].'">Delete</a></td>
   </tr>
  ';
 }
 echo $output;
}
else{
    $output .= '
  <div class="table-responsive" align="center">
   <table>
    <tr>
     <th>QuestionID</th>
     <th>Question</th>
     <th>Name</th>
     <th>CreateDate</th>
     <th>View</th>
     <th>Reply</th>
     <th>Topic</th>
     <th></th>
    </tr>
    <tr>
        <center><p>You never post anything on webboard!<p>
    </tr>
   </div>
 ';
 echo $output;
}
?><!-- <div id="result"></div> -->
  
</body> 
</html