<?php session_start(); ?>
<html>
<head>
        <title>ADMIN: User Lists</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="list_user.css">
        <!-- <link rel="stylesheet" type="text/css" href="admin.css"> -->
</head>
<body>
<table align="center">
<tr>
    <div class="header">
            <h1>SUT WEBBOARD</h1>
            <p><b>User Control</b></p>
    </div>
</tr>
<tr>
  <td >
<form action="delete_user.php" method="GET">
<form action="edit_role.php" method="GET">
  <form name="frmSearch" method="get" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
    <div class="container">
        <div class="form-group">
          <div class="input-group">
                <input type="text" name="search_text" id="search_text" class="form-control" placeholder="Search username"/>
                <label class="form-label" for="form1"></label>
          </div>
        </div>
      <div id="result"></div>
    </br> 
    </div>
  </form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"searchname.php",
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
</form>
</form>
<center>
<button class="button" onclick="location.href='logout.php'" <?php if($_SESSION['username'] == "")  {echo "style='display: none;'";} ?>> Logout</a>
</body>
</html>