<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>



<?php // RAY_temp_scottfo.php
ini_set('display_errors', TRUE);
error_reporting(E_ALL);
echo '<pre>';


// A FUNCTION TO PLUCK OUT THE URL
function pluckurl($str, $sig='URL=')
{
    // NORMALIZE URL
    $str = preg_replace("/$sig/i", strtoupper($sig), $str);

    // LOCATE THE TAG
	
    $poz = strpos($str, $sig) + strlen($sig);
    $str = substr($str, $poz);
    $str = preg_replace("#[^A-Z0-9/?\[\]%:_.-]#i", NULL, $str);
    return $str;
}


// TEST DATA
//$g=file_get_contents('C:\wamp\www\project\er.html');


//

function my_strip($start,$end,$total){
$total = stristr($total,$start);
$f2 = stristr($total,$end);
return substr($total,strlen($start),-strlen($f2));
}
/////////////////////End of function my_strip ///
///////////// Reading of file content////
$url='C:\wamp\www\project\rjkkrgg.html';// Right your path of the file
/*$contents="";
$fd = fopen ($url, "r"); // opening the file in read mode
while($buffer = fread ($fd,1024)){
$contents .=$buffer;
}*/
$contents=file_get_contents($url);

/////// End of reading file content ////////
//////// We will start with collecting title part ///////
$str=my_strip("<head>","<title>",$contents);

echo $str;
//
//$str = '<META content="5;UrL=http://www.google.com/page.html" http-equiv="refresh" />';

// PROCESS THE TEST DATA AND SHOW THE WORK PRODUCT
$new = pluckURL($str);
//echo htmlentities($str);
echo PHP_EOL;
$new = substr($new,0,-1);
$chl=str_replace("http://localhost/project/","",$new);
echo $chl;

$file1= strip_tags(file_get_contents('C:\wamp\www\project\rjkkrgg.html'));
$string1 = preg_replace('/\s+/','',$file1);
$file3=htmlentities(file_get_contents('C:\wamp\www\project\rjkkrgg.html'));
$string3 = preg_replace('/\s+/','',$file3);
$file2 = strip_tags(file_get_contents($chl));
$string2 = preg_replace('/\s+/','',$file2);
$file4=htmlentities(file_get_contents($chl));
$string4 = preg_replace('/\s+/','',$file4);
 $gk= similar_text($string3, $string4,$percentage);

if($percentage==100)
{
	
	echo "cloak status1 clear";
}
 else
 {
	 
	 
	  similar_text($string1, $string2,$per);
	  if ($per==100)
	  {
		echo "cloak status2 clear";  
	  }
	  
	  
	  else
	  {
		 
		$pieces = explode(" ", $file1);
		$coun1=sizeof($pieces);
		$pece = explode(" ",$file2);
		$coun2=sizeof($pece);
		$h=0;
		  for($i=0;$i<$coun1;$i++)
		  {
			  $ch=$pieces[$i];
			  for($k=0;$k<$coun2;$k++)
			  {
				  
			  if ($pece[$k] == $ch)
			  {
				  
			  $h++;
			  
			  
			  }
			  }
		  }
		  
		 $f=$coun1 + $coun2; 
		  
		  $d=(1-(2 * ($h/$f)));
		 // echo $d;
		  
		  
		  if ($d ==0)
		  {
			  
			  
			  
			  echo "status3 not cloaked";
		  }
	else
	{
		
		$file5= strip_tags(file_get_contents('C:\wamp\www\project\rjkkrgg.html'));
$string5 = preg_replace('/\s+/','',$file5);


$file6 = strip_tags(file_get_contents($chl));
$string6 = preg_replace('/\s+/','',$file6);

		
		
		$pi = explode(" ", $file5);
		$con1=sizeof($pi);
		$pe = explode(" ",$file6);
		$con2=sizeof($pe);
		$h1=0;
		  for($j=0;$j<$con1;$j++)
		  {
			  $ch1=$pi[$j];
			  for($m=0;$m<$con2;$m++)
			  {
				  
			  if ($pe[$m] == $ch)
			  {
				  
			  $h1++;
			  
			  
			  }
			  }
		  }
		  
		 $f1=$con1 + $con2; 
		  
		  $d1=(1-(2 * ($h1/$f1)));
		
		$deltad= min($d1,$d);
		
		
		//crawler page diff
		$p3 = explode(" ", $file1);
		$co1=sizeof($p3);
		$p4 = explode(" ",$file5);
		$co2=sizeof($p4);
		$h2=0;
		  for($l=0;$l<$co1;$l++)
		  {
			  $ch2=$p3[$l];
			  for($n=0;$n<$co2;$n++)
			  {
				  
			  if ($p4[$n] == $ch2)
			  {
				  
			  $h2++;
			  
			  
			  }
			  }
		  }
		  
		 $f2=$co1 + $co2; 
		  
		  $d3=(1-(2 * ($h2/$f2)));
		
		
		//browsee
			$p5 = explode(" ", $file2);
		$c1=sizeof($p5);
		$p6 = explode(" ",$file6);
		$c2=sizeof($p6);
		$h3=0;
		  for($o=0;$o<$c1;$o++)
		  {
			  $ch3=$p5[$o];
			  for($p=0;$p<$c2;$p++)
			  {
				  
			  if ($p6[$p] == $ch3)
			  {
				  
			  $h3++;
			  
			  
			  }
			  }
		  }
		  
		 $f3=$c1 + $c2; 
		  echo $h3;
		  $d2=(1-(2 * ($h3/$f3)));
		echo $d3;
		
		$deltas = max($d2,$d3);
		echo $deltas ;
		echo $deltad;
		$score=$deltad/$deltas;
		 if($deltad==0 && $deltas==0)
		 {
			echo "non 4cloaked"; 
		 }
		 else if ($deltas ==0 && $deltad>0)
		 {
			 echo "cloaked1";
			 
		 }
		 
		

		 else if ($score>=20)
		 {
			 
			 echo "cloaked2";
		 }
		 else
		 {
			 echo "not5 cloaked";
		 }
		
		
	}
		  
			  
			  
		
		
		
		
		
		
		  
		  
	  }
	  
	  
	  
 }




?>

                
</body>
</html>