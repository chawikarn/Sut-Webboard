<html>
    <head>
        <title>Edit Account</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="signup.css">
        <?php
            session_start();
            $conn=mysqli_connect("localhost", "root", "","helloboard_db");
            $conn->query("SET NAMES UTF8");

            error_reporting(0);
            ini_set('display_errors', 0); //hide error

                    if($_SESSION['username'] == ""){
                        echo "<center>Please Login!<center>";
                    } 
                    else{
                        $sql="SELECT * FROM user WHERE username = '".$_SESSION['username']."' ";
                    }
            $rs=$conn->query($sql);
            while($row = $rs->fetch_assoc()) { ?>
    </head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script>
        var newPhoto = "";
        var btn = document.getElementById('submit');
        btn.addEventListener('click', func);  
     function selectPhoto (img){
          if(img == 1){
            newPhoto = "img1";
          }else if(img == 2){
              newPhoto = "img2";
          }else if(img == 3){
              newPhoto = "img3";
          }else{
              newPhoto = "img4";
          }  
          str = "<img src= './images/" + newPhoto + ".png' width='100' />";
        document.getElementById("pic2").innerHTML = str;
        str2 = "./images/" + newPhoto + ".png";
        document.getElementById('hid').value = str2;
     };
        function func() {
            document.getElementById('theForm').submit('hid');
    };
    </script>
    <form action="edit.php" id="theForm" method="post" onsubmit="return checkPassword();">
    <body>
    
        <div class="header">
            <h1>SUT WEBBOARD</h1>
            <p><b>Edit Your Account</b></p>
        </div>
        <br/>
<table align="center" border="0">
    <tr>
        <td width="600px" align="center">    
        <table align="center" border="0">
            <tr>
                <td><p id ="pic2" ><img src="<?php echo $row['image'] ?>" width="100" onclick="selectPhoto(1)"></p>
                <input type= "hidden" id="hid" name="avatar" value = "<?php echo $row['image'] ?>" ></td>
                <td><p > <b>Select your avatar</b></p></td>
            </tr>
        </table>
        <br/>
        <table border="0"  >
            <tr>
                 <!-- "padding: [top] [right] [bottom] [left]" -->
              <td > Username </td>
              <td ><input type="text" value ="<?php echo $row['username']; ?>" id="username" name="username" placeholder="Username" pattern="^[a-z0-9_-]{5,15}$" disabled><span id="user-availability-status" ><img src=''></span></td>
            </tr> 
            <tr >
                <td > Major </td>
                <td >
                <input name="major" id="major" value ="<?php echo $row['major'] ?>" disabled>
                </td>
            </tr>
            <tr>
                <td > Current Password:</td>
                <td ><input type="password" name="c_password" placeholder="Current Password" id="c_password" required></td>
            </tr>
            <tr>
                <td > New Password:</td>
                <td ><input type="password" name="password" placeholder="New Password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"></td>
            </tr>
            <tr>
                <td > Confirm New password:</td>
                <td ><input type="password" name="confirm_password" placeholder="Confirm New Password" id="confirm_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"></td>
            </tr>
            <tr>
                <td id="des" colspan = "2" >
                    <br>Username accepts 6 to 20 characters with any lower case character, 
                    <br>digit or special symbol "_" or "-" only.<br>
                    <br>Password must contain at least one number and one uppercase and lowercase letter, 
                    <br>and at least 8 up to 30 characters.
                </td>
            </tr>
            <tr>
                <td colspan ="2"><p align="center"><input class="button" type="submit" value="Save" id="submit"></p></td>
            </tr>
        </table>
        </td>
        <td>
            <center>
            <table >
                <tr>     
                    <td ><img id=1 src="./images/img1.png" width="100" onclick="selectPhoto(1)"></td>
                    <td ><img id=2 src="./images/img2.png" width="100" onclick="selectPhoto(2)"></td>
                </tr>
                <tr>
                    <td><img id=3 src="./images/img3.png" width="100" onclick="selectPhoto(3)"></td>
                    <td><img id=4 src="./images/img4.png" width="100" onclick="selectPhoto(4)"></td>
                </tr>
            </table>
            </form>
            <script>
                function checkPassword(){
                var1 = document.getElementById("password");
                var2 = document.getElementById("confirm_password");
                if(var1.value != var2.value){
                    var2.setCustomValidity("Passwords Don't Match");
                    //alert("Passwords do not match, please try again!");
                    return false;   
                    }
                    else{
                        return true;
                    }
                }
        </script>
            <center>        
        </td>
</table>
    </body>
    <?php } ?>
</html>