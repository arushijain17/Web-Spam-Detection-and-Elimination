<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
include("conf.php");
$stopcontent = file_get_contents('C:\wamp\www\project\stop.txt');

$s = preg_split('/[\s,.;":!()?\'\-\[\]]+/', $stopcontent, -1, PREG_SPLIT_NO_EMPTY);
 $w = sizeof($s);
$filecontent = file_get_contents('C:\Users\parul\Desktop\voip.txt');

$words = preg_split('/[\s,.;":!()?\'\-\[\]]+/', $filecontent, -1, PREG_SPLIT_NO_EMPTY);
 $a = sizeof($words);



for ($m=0;$m<$w;$m++)
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
}

echo $k;
$up="insert into h (word,freq)    value('$ch','$k') ";

$x=mysql_query($up);


}



$g="select * from h";
$flag=0;
$f=mysql_query($g);
$bg=0.2*$w;
while($c=mysql_fetch_array($f))
{

	if($c['freq']>$bg)
	
	
	{
		$flag=1;
	}
	
	
	else
	{
		$flag=0;;
	}
}

if($flag==1)
{
	echo"spam";
	$yt="delete * from h";
	$ok=mysql_query($yt);
}
else
{
	$er="insert into ";
	
	//echo"no";
	
}
?>
</body>
</html>