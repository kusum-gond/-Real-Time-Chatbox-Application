<?php
include("configuration.php");
session_start();
if(isset($_SESSION['email']))
{
	header("location:home.php");
}
$email=$_POST['email'];
$password=$_POST['password'];
if($email==NULL || $_POST['password']==NULL)
{
	/*
 			*****	This Project is developed in 2021	*****
	 Designed &amp; Developed by Tech Vegan YouTube 
 Subscribe for More Projects Download Source Codes
 Channel Link https://bit.ly/2MFT35Q
 
 Don't Share this Project on any Blog or YouTube 
 All Projects &amp; Tech Vegan Contents are Managed by Bumble Tech(TM) Solutions (Registered by Government of India).
 You can use this Project
 You can submit this Project in College/Schools
 You cannot Sell this Project
 Thank you!
 */
}
else
{
	$sql=mysqli_query($al,"SELECT * FROM users WHERE email='".mysqli_real_escape_string($al,$email)."' AND password='".mysqli_real_escape_string($al,sha1($password))."'");	
	if(mysqli_num_rows($sql)==1)
	{
		$_SESSION['email']=$_POST['email'];
		mysqli_query($al,"UPDATE users SET status = 1 WHERE email = '".$_SESSION['email']."'");
		header("location:home.php");
	}
	else
	{
		$info="Incorrect Email or Password";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to Chat Box</title>
<link href="scripts/styleSheet.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div align="center"><br />
<span class="heading">Welcome to Chat Box</span><br />
<br /><br />
<br />
<form method="post" action="">
<table class="table" cellpadding="4" cellspacing="4">
<tr><td align="center" colspan="2" class="tableHead">User Login</td></tr>
<tr><td align="center" class="info" colspan="2"><?php echo $info;?></td></tr>
<tr><td class="labels">Email ID : </td><td><input type="email" name="email" class="fields" size="30" required="required" placeholder="Enter Email ID" /></td></tr>
<tr><td class="labels">Password : </td><td><input type="password" name="password" class="fields" size="30" required="required" placeholder="Enter Password" /></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="Login" class="commandButton" /></td></tr>
</table>
</form>
<br />

<br />
<span class="text">New User..? </span><a href="registration.php">Register Here</a><br />
<span class="text">Admin Login </span><a href="adminLogin.php">Click Here</a>
<br />
<span class="text">Subscribe SIES GST </span>


<br />
<br />
</div>
</body>
<!-- 
Property of SIES GST
Designed &amp; Developed by:
								SIES GST
                                Copyright 2024 - Tech Vegan
-->
</html>