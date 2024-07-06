<?php session_start();
include('dbconnect.php');

if(isset($_POST['submit']))
  {
    $uname=$_POST['id'];
    $Password=$_POST['password'];
    $query=mysqli_query($con,"select ID,loginid from tbl_login where  loginid='$uname' && password='$Password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['aid']=$ret['ID'];
      $_SESSION['login']=$ret['loginid'];
     header('location:manage-courses.php');
    }
    else{
      echo "Invalid Details";
    }
  }
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assests/custom.css">
    <title>Tailwebs</title>
</head>
<body>
    	<div class="container">
        <div class="header">
            <div class="text">Tailwebs</div>
            <div class="underline"></div>
        </div>
		<form method="post">
        <div class="inputs">
            <div class="input">
                <img src="" alt="">
                <input type="text" id="id" name="id" placeholder="Username">
            </div>
        </div>
      
        <div class="inputs">
            <div class="input">
                <img src="" alt="">
                <input type="password" id="password"name="password" placeholder="Password">
            </div>
        </div>
        <div class="forgotPassword">Lost Password ? <span  ><a href="password-recovery.php"> Click here!</a></span></div>
        <div class="submit-container">
			<input class="submit" type="submit" value="Login" name="submit">

        </div>
		</form>
    </div>
	 <script type="text/javascript">
            
            jQuery(function(){
                jQuery("#id").validate({
                    expression: "if (VAL.match(/^[a-z]$/)) return true; else return false;",
                    message: "Should be a valid id"
                });
                jQuery("#password").validate({
                    expression: "if (VAL.match(/^[a-z]$/)) return true; else return false;",
                    message: "Should be a valid password"
                });
                
            });
            
        </script>
</body>
</html>