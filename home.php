<?php
include("configuration.php");
session_start();
if(!isset($_SESSION['email']))
{
	header("location:index.php");
}
$email=$_SESSION['email'];
$sql=mysqli_query($al,"SELECT * FROM users WHERE email='$email'");
$b=mysqli_fetch_array($sql);
$name=$b['name'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Chat Box | HOME</title>
<link href="scripts/styleSheet.css" rel="stylesheet" type="text/css" />
</head>

<body>
<span class="heading">Welcome <?php echo $name;?></span><span style="float:right"><a href="logout.php">
<img src="images/logout.png" height="50" width="100"  /></a></span>
<hr style="border:6px dotted #63C;"/><br />
<br /><div align="center">
<table class="table" cellpadding="6" cellspacing="6">
<tr><td align="center">
<span class="tableHead" style="text-decoration:none;">USER PANEL</span><br /><br />
<a href="box.php"><img src="images/box.jpg" height="130" width="190" style="border-radius:6px;" /></a>
<a href="conversation.php"><img src="images/conv.jpg" height="130" width="190" style="border-radius:6px;" /></a><br />
<a href="changePassword.php"><img src="images/pass.jpg" height="130" width="190" style="border-radius:6px;" /></a>
</td></tr></table>
<br />
<br />
<br />

<table class="table" cellpadding="6" cellspacing="6">
<tr><td>
<span class="tableHead" style="text-decoration:underline;">Online Users</span><br /><br />
<?php $on = mysqli_query($al, "SELECT * FROM users WHERE status = 1");
	while($pr = mysqli_fetch_array($on))
	{
		?>
        <span class="labels" style="color:rgba(42,255,0,1.00);"><?php echo $pr['name'];?><br></span>
        <?php
	}?>
</td></tr></table></div>
</body>
<!-- 
Property of Tech Vegan Not For Sell/Not for Selling through any Blog/Website
Designed &amp; Developed by:
								Ashish Labade - https://www.ashishvegan.com 
                                Tech Vegan YouTube Channel Link: https://bit.ly/2MFT35Q
                                Copyright 2021 - Tech Vegan
-->
</html>