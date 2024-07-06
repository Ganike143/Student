<?php session_start();
include('dbconnect.php');

if(isset($_POST['submit']))
  {
    $uname=$_POST['id'];
    $emailid=$_POST['emailid'];
    $Password=$_POST['password'];
    $query=mysqli_query($con,"select ID,loginid from tbl_login where  loginid='$uname' && AdminEmail='$emailid' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
$ret=mysqli_query($con,"update tbl_login set password='$Password' where loginid='$uname' && AdminEmail='$emailid' ");
echo '<script>alert("Your password successully changed.")</script>';
echo "<script>window.location.href='index.php'</script>";
    }
    else{
 echo '<script>alert("invalid details")</script>';
    }
  }
  ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>TailWebs </title>

    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
	<link rel="stylesheet" href="assests/custom.css">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="../dist/css/jquery.validate.css" />
</head>
<body><div class="container">
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
                <input type="text" placeholder="Admin Email id"  id="emailid" name="emailid">
            </div>
        </div>
		
		  <div class="inputs">
            <div class="input">
                <img src="" alt="">
                <input type="password" id="password" name="password" placeholder="New Password" value="" required>
            </div>
        </div>
        <div class="forgotPassword">Login ? <span  ><a href="index.php"> Click here!</a></span></div>
        <div class="submit-container">
			<input class="submit newbtn" type="submit" value="Change Password" name="submit">

        </div>
		</form>
    </div>

   

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
 <script src="dist/jquery-1.3.2.js" type="text/javascript"></script>
 <script src="dist/jquery.validate.js" type="text/javascript"></script>
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
