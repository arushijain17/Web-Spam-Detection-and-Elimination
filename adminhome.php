<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<p>
  <?php
include("conf.php");
if((isset($_POST['extract'])) && (isset($_FILES['extract']['name'])))

{
	$filename=$_FILES['extract']['name'];
		$title=$_POST['title'];
		$desc=$_POST['desc'];
$key=$_POST['key'];
	$stopcontent = file_get_contents('C:\wamp\www\project\stop.txt');

$s = preg_split('/[\s,.;":!()?\'\-\[\]]+/', $stopcontent, -1, PREG_SPLIT_NO_EMPTY);

 $w = sizeof($s);
 
 
 
 
 
 
 
 
 
 $save = 'C:/Users/parul/Desktop/project/'.$filename;
 

 function my_strip($start,$end,$total){
$total = stristr($total,$start);
$f2 = stristr($total,$end);
return substr($total,strlen($start),-strlen($f2));
}
/////////////////////End of function my_strip ///
///////////// Reading of file content////
//$url=".\masterfile\hk.html";// Right your path of the file
$contents="";
$fd = fopen ($save, "r"); // opening the file in read mode
while($buffer = fread ($fd,1024)){
$contents .=$buffer;
}

/////// End of reading file content ////////
//////// We will start with collecting title part ///////
$t=my_strip("<body>","</body>",$contents);
 
 
 
 
 
//$filecontent = file_get_contents($save);

$words = preg_split('/[\s,.;":!()?\'\-\[\]]+/', $t, -1, PREG_SPLIT_NO_EMPTY);

 $a = sizeof($words);
$y="create table h (word varchar(30), freq int(10))";
	$n=mysql_query($y);


/*for ($m=0;$m<$w;$m++)
{$ch=$s[$m];
$y="create table h (word varchar(30), freq int(10))";
	$n=mysql_query($y);
	$k=0;
for($i=0;$i<$a;$i++)
{

if($words[$i] == $ch)
{

$k++;

}
}}


*/

$gm=array_count_values(str_word_count($t, 1));
$lm=str_word_count($t, 1, 'àáãç3');
$t1=sizeof($lm);
for($ih=0;$ih<$t1;$ih++)
{
	$rt=$lm[$ih];
$up="insert into h (word,freq)    value('$lm[$ih]','$gm[$rt]') ";

$x=mysql_query($up);


}

$g="select * from h";
$flag=0;
$f=mysql_query($g);
//$bg=0.2*$w;

while($c=mysql_fetch_array($f))
{
	
$che=$c['freq']/$a;


	if($che>0.1)
	
	
	{
		$flag=1;
		break;
	}
	
	
	else
	{
		$flag=0;;
	}
}

if($flag==1)
{
	//echo"spam";
	$yt="drop table h";
	$ok=mysql_query($yt);
	header('location:spam.php');
}
else
{
$qrhy="INSERT INTO  searchengine    (title,description,url,keywords)values('$title','$desc','$filename','$key')";
	$qu=mysql_query($qrhy);
	
	//echo"no";
	$savePath = './'.$filename;
	$msup=move_uploaded_file($_FILES['extract']['tmp_name'], $savePath);
	$ygt="drop table h";
	$ogk=mysql_query($ygt);
	
	echo "<script type='text/javascript'>alert('web page uploaded')</script>";

}
	

	
	
	
	
	
	
	
	
	
}

?>
</p>
<center><B><I>UPLOAD WEB PAGE </I></B></center>
<table cellpadding="10" align="center">
<form name="f5" method="post" enctype="multipart/form-data">

<tr><td>TITLE:</td><td><input name="title" type="text" size="20"  placeholder="Enter  title" /></td></tr>
<tr><td>DESCRIPTION:</td><td><textarea name="desc" rows="5" cols="16"></textarea></td></tr>
<tr><td>KEYWORDS:</td><td><input name="key" size="20" type="text" /></td></tr>
  <tr><td><input name="extract" type="file" size="10" /></td>
<td><input name="extract" type="submit" /></td></tr>


</form>
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;

&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;

<a href="admin.php">LOGOUT</a>

</body>
</html>