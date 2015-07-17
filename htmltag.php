<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<body>


     <?php
	
	 ///////////////function my_strip///////////
function my_strip($start,$end,$total){
$total = stristr($total,$start);
$f2 = stristr($total,$end);
return substr($total,strlen($start),-strlen($f2));
}
/////////////////////End of function my_strip ///
///////////// Reading of file content////
$url="gl.html";// Right your path of the file
$contents="";
$fd = fopen ($url, "r"); // opening the file in read mode
while($buffer = fread ($fd,1024)){
$contents .=$buffer;
}
/////// End of reading file content ////////
//////// We will start with collecting title part ///////
$t=my_strip("<title>","</title>",$contents);
echo $t;
$len=preg_split('/[\s,.;":!()?\'\-\[\]]+/', $t, -1, PREG_SPLIT_NO_EMPTY);
$count=sizeof($len);
$site  = file_get_contents("$url");
$links = substr_count($site, "<a href=");













//ancchor text length check

$html=file_get_contents($url);
	$dom = new DOMDocument;
@$dom->loadHTML($html);

$f=0;
foreach ($dom->getElementsByTagName('a') as $link){
    //Extract and show the "href" attribute.
         $txt= $link->nodeValue;
    $se = preg_split('/[\s,.;":!()?\'\-\[\]]+/',$txt, -1, PREG_SPLIT_NO_EMPTY);
 $wo = sizeof($se);
 
 
 
 
 
	if($wo>6)
	{
		$f=1;
		break;
		
		
	}
	else
	{
		
		$f=0;
	}
	
	
}

//repeat words
$gm=array_count_values(str_word_count($t, 1));
$lm=str_word_count($t, 1, 'àáãç3');
$t1=sizeof($lm);
 $rep=0;
 for($gr=0;$gr<$t1;$gr++)
 {
	if ($gm[$lm[$lgr]]>=2)
	{
	$rep=1;
	break;	
	}
	 
 }












//

 $flag=0;
		 $stopcontent = file_get_contents('C:\wamp\www\project\stop.txt');

$s = preg_split('/[\s,.;":!()?\'\-\[\]]+/', $stopcontent, -1, PREG_SPLIT_NO_EMPTY);
 $w = sizeof($s);
 

$words = preg_split('/[\s,.;":!()?\'\-\[\]]+/', $t, -1, PREG_SPLIT_NO_EMPTY);
 $a = sizeof($words);	
 
 
 
	 for ($m=0;$m<$w;$m++)
{$ch=$s[$m];

for($i=0;$i<$a;$i++)
{

if($words[$i] == $ch)
{
$flag=1;
break;
}
}


}















if($count>6)
{
	
	
	echo "this page may be spam";
}




else if ($links>10)
{
	echo "spam";
}
	
	
	else if ($rep==1)
	{
	echo "spam";	
	}
	
	
	
	
	else if ($f==1)
	{
		echo "spam";
	}
	 
	 else if ($flag==1)
{
	
	echo "this is spam";
}
	 
		 
		


else
{

	header('location:gl.html');
}



		 
	 
	 
	 

	 
	 
	 
	 
	 
	 
	 ?>
</body>
</html>