<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php
include("conf.php");
$words = 'A string with certain words occuring more more often than other words.';
$g=array_count_values(str_word_count($words, 1));
$f=str_word_count($words, 1, 'àáãç3');
echo $f[7] ."=".$g[$f[7]];

$t1=sizeof($f);
echo $t1;
?>
</body>
</html>



$gm=array_count_values(str_word_count($words, 1));
$lm=str_word_count($words, 1, 'àáãç3');
$t1=sizeof($lm);
for($ih=0;$ih<$t1;$ih++)
{
$up="insert into h (word,freq)    value('$lm','$gm') ";

$x=mysql_query($up);


}