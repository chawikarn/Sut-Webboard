<?php session_start();?>
<html>
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="login.css">
      </head>
    
<center>
  <div class="header">
    <h1>SUT WEBBOARD</h1>
    <p><b>Let's talk and discuss</b></p>
</div>
<body>
      <form name="frmlogin"  method="post" action="check_user.php">
        <table border="0">
            <br><br>
            <tr>
                 <!-- "padding: [top] [right] [bottom] [left]" -->
              <td > Username:</td>
              <td ><input type="text" name="username" required></td>
            </tr>
            <tr>
              <td > Password:</td>
              <td ><input type="password" name="password" required></td>
            </tr>
            <tr >
                <td colspan="2" align="center" id="btn"><button class="button" type="submit"><span><b>Login</b></span></button></td>
              </tr>
       </table>
       <a  href="signup.htm">Sign Up</a>
      </form>
</body>
</center>
</html>