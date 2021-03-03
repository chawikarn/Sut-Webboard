<!DOCTYPE html>
<?php
session_start();
error_reporting(0);
ini_set('display_errors', 0); //hide error
$conn=mysqli_connect("localhost", "root", "","helloboard_db");
date_default_timezone_set("Asia/Bangkok"); 
$date = date("Y-m-d H:i:s", time());
if(isset($_GET["Action"]))
{
  if($_GET["Action"] == "Save")
  {
      //*** Insert Reply ***//
      $strSQL = "INSERT INTO reply (QuestionID,CreateDate,Details,Name) VALUES('".$_GET["QuestionID"]."','".$date."','".$_POST["txtDetails"]."','".$_POST["txtName"]."')";
      $rs = mysqli_query($conn,$strSQL);
      
      //*** Update Reply ***//
      $strSQL = "UPDATE webboard SET Reply = Reply + 1 WHERE QuestionID = '".$_GET["QuestionID"]."' ";
      $rs = mysqli_query($conn,$strSQL);	
  }
}
?>

<html>
<head>

  <title>SUT WEBBOARD</title>
  <meta http-equiv="Content-Type" content="text/html; charset=windows-874">
  <link rel="stylesheet" type="text/css" href="viewwebboard.css">
</head>

<body>

<?php
    //*** Select Question ***//
    $strSQL = "SELECT * FROM webboard  WHERE QuestionID = '".$_GET["QuestionID"]."' ";
    $rs = mysqli_query($conn,$strSQL) or die ("Error Query [".$strSQL."]");
    $objResult = mysqli_fetch_array($rs);

    //*** Update View ***//
    $strSQL = "UPDATE webboard SET View = View + 1 WHERE QuestionID = '".$_GET["QuestionID"]."' ";
    $objQuery = mysqli_query($conn,$strSQL);	
?>
<p></p>
<table id="header" width="1000px" align="center" border="1" cellpadding="1" cellspacing="1">
  <tr>
    <td id="header" colspan="2"><center><h1><?=$objResult["Question"];?></h1></center></td>
  </tr>
  <tr>
    <td id="detail" colspan="2"><?=nl2br($objResult["Details"]);?></td>
  </tr>
  <tr>
    <td >Name : <?=$objResult["Name"];?> Create Date : <?=$objResult["CreateDate"];?></td>
    <td >View : <?=$objResult["View"];?> Reply : <?=$objResult["Reply"];?></td>
  </tr>
</table>
<form id= "rp" action="report.php" method="post">
<table>
  <tr >
    <input name="q_id" type="hidden" id="q_id" value="<?php echo $_GET["QuestionID"] ?>" size="50">
    <input name="url" type="hidden" id="url" value="<?php echo $_SERVER['REQUEST_URI'] ?>" size="50">
    <!--<a href="report.php">Report Post</a> -->
  </tr>
</table>
</form>
<div class="btnRP">
    <input class= "button" name="btnSave" type="submit" id="btnReport" value="Report" form="rp">
    <br>
</div>
<br>
<br>

<?php
$intRows = 0;
$strSQL2 = "SELECT * FROM reply  WHERE QuestionID = '".$_GET["QuestionID"]."' ORDER BY CreateDate";
$objQuery2 = mysqli_query($conn,$strSQL2) or die ("Error Query [".$strSQL."]");
while($objResult2 = mysqli_fetch_array($objQuery2))
{
	$intRows++;
?> 
<table class="replyData" width="1000px" align="center" border="1" cellpadding="1" cellspacing="1">
  <tr > 
    <td id="comment" colspan="2">Comment <?=$intRows;?> : <?=nl2br($objResult2["Details"]);?></td>
  </tr>
  <tr>
    <td >Name  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp <?=$objResult2["Name"];?></td>
    <td align="right">Create Date :
    <?=$objResult2["CreateDate"];?></td>
  </tr>
</table><br>
<?php
}
?>
<form action="ViewWebboard.php?QuestionID=<?=$_GET["QuestionID"];?>&Action=Save" method="post" name="frmMain" id="frmMain">
<table class="reply" align="center" border="1" cellpadding="1" cellspacing="1">
    <tr >
      <td id="replyTxt"width="50px">Reply</td>
      <td  id="replyTxt"><textarea name="txtDetails" id="txtDetails"></textarea></td>
    </tr>
    <tr >
      <td id="replyTxt">Name</td>
      <td id="nameTxt"><input name="txtName" type="text" id="txtName" value=""></td>
    </tr>
  </table>
  <br>
  <center><input name="btnSave" class="button" type="submit" id="btnSave" value="Submit">
  <br><br><a href="Webboard.php">Back to Webboard</a> <br></center>
</form>
</body>
<?php mysqli_close($conn);?>

</html>
