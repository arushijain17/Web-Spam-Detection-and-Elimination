<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>admin logint</title>
</head>

<body>



<?php
 include("conf.php");
 
 if(isset($_POST['login']))
 {
	 $a=$_POST['admin'];
$b=$_POST['pass'];


if ($a== 'admin' && $b=='password')
	 {
		 
		 header('location:adminhome.php');
		 
	 }
	 
	 
 }

 
 
 

?>


<center>

<B><I><U>ADMIN PANEL</U></I></B>
<form id="form1" name="form1" method="post" >
  <p>admin id 
  <input type="text" name="admin" id="admin" />
  </p>
  <p>password 
    
    <input type="text" name="pass" id="pass" />
  </p>
  <p>&nbsp;</p>
  <p>&nbsp;  </p>
  <input type="submit"  name="login" value="submit" />
</form>
</center>


</body>
</html>