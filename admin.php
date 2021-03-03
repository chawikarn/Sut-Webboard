
<?php 
session_start();

error_reporting(0);
ini_set('display_errors', 0); //hide error


$conn=mysqli_connect("localhost", "root", "","helloboard_db");
$conn->query("SET NAMES UTF8");
$strSQL = "SELECT * FROM user WHERE username = '".$_SESSION['username']."' ";
$result = mysqli_query($conn, $strSQL);

?>
<html>
<head>
    <title>ADMIN: Report List</title>
    <link rel="stylesheet" type="text/css" href="admin.css">
    <!-- <link rel="stylesheet" type="text/css" href="webboard.css"> -->
</head>
<body>
    <div class="header">
        <h1>SUT WEBBOARD</h1>
        <p><b>---ADMIN---</b></p>
    </div>
<center><p>Report List</p>
<form action="delete_topic.php" method="GET">
<?php 

        if($_SESSION['username'] == "")
        {
            echo "<center>Please Login!<center>";
        }

        else if($_SESSION['role'] != "1")
        {
            echo "<center>You don't have permission to access this page!</center>";
        }
        
        else if($_SESSION['role'] != "0")
        {
        // get results from database
        $sql="SELECT  r.rp_id, r.QuestionID, r.date, p.Question, p.Details, p.Major, p.Category, r.userName, p.Name
                FROM webboard p 
                INNER JOIN report r
                ON p.QuestionID = r.QuestionID
                ORDER BY r.date";
                $rs=$conn->query($sql);

    echo "<center><table border='1'>	
        <tr>
            <th width='150px'>Date</th>
            <th width='300px'>Question</th>
            <th width='400px'>Detail</th>
            <th width='150px'>Major</th>
            <th width='150px'>Category</th>
            <th width='80px'></th>
	    </tr>";
    if($result = $conn->query($sql)){
        while($row = $rs->fetch_assoc()) {
    // echo out the contents of each row into a table
    echo    "<tr>";
        echo    "<td>". $row['date'] ."</td>";
        echo    "<td id='quest'>". $row['Question'] ."</td>";
        echo    "<td>". $row['Details'] ."</td>";
        echo    "<td>". $row['Major'] ."</td>";
        echo    "<td><center>". $row['Category'] ."</td>";
        echo    "<td><a onClick=\"javascript: return confirm('Are you sure to delete Question #id ".$row['QuestionID']."');\" href='delete_topic.php?QuestionID=".$row['QuestionID']."'>Delete</a></td>";
        echo	"</tr>";
        }
        echo    "</table></center>";
    }
    $conn->close();
}
?>
</form>
<button id="listUser" class="button" onclick="location.href='list_user.php'" <?php if($_SESSION['username'] == "")  {echo "style='display: none;'";} ?>>List users</button>
<button class="button" onclick="location.href='logout.php'" <?php if($_SESSION['username'] == "")  {echo "style='display: none;'";} ?>> Logout</a>
</body> 

</html>