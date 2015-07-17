<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>
</title>
</head>
<body>
<?php
 
$button = $_GET ['submit'];
$search = $_GET ['search']; 
 $x=0;
 $construct="";
if(!$button)
echo "you didn't submit a keyword";
else
{
     if(strlen($search)<=1)
echo "Search term too short";
else{
echo "You searched for <b>$search</b> <hr size='1'></br>";
mysql_connect("localhost","root","");
mysql_select_db("project");
 
$search_exploded = explode (" ", $search);

foreach($search_exploded as $search_each)
{
$x++;
if($x==1)
$construct .="keywords LIKE '%$search_each%'";
else
$construct .="AND keywords LIKE '%$search_each%'";
 
}
 
$construct ="SELECT * FROM searchengine WHERE $construct";
$run = mysql_query($construct);
 
$foundnum = mysql_num_rows($run);
 
if ($foundnum==0)
echo "Sorry, there are no matching result for <b>$search</b>.</br></br>1. 
Try more general words. for example: If you want to search 'how to create a website'
then use general keyword like 'create' 'website'</br>2. Try different words with similar
 meaning</br>3. Please check your spelling";
else
{
echo "$foundnum results found !<p>";
///////////////////////////////
if ($search =="urbanization")
{
	$newarr=array();
	$ps="";
	while($gh=mysql_fetch_array($run))
	{
		$jk= $gh['url'];
		$title = $gh ['title'];
$desc = $gh ['description'];
$ps=trim($jk,'.html');
$newarr[$ps]=array();
$htmlpage=file_get_contents($jk);
$dompage = new DOMDocument;
@$dompage->loadHTML($htmlpage);

foreach ($dompage->getElementsByTagName('a') as $nodepage) {
    $domaref= $nodepage->getAttribute( 'href' );
	//$newsuba=array();
	$newsub=trim($domaref,'.html');
	

	array_push($newarr[$ps],$newsub);
	//$links=array_fill_keys($newarr, $newsuba);
	}
	//print_r($newsuba);
	$ps++;
	

//$links = array($newchar=>$newsuba);

//$ps++;


	}
	
	
	
	//print_r($links[);
	
	
	/*$links = array( 
        1 => array(2,3,4,5,6),
        2 => array(1,3,4,5,6),
        3 => array(1,2,4,5,6),
        4 => array(1,2,3,5,6),
        5 => array(1,2,3,4,6),
        6 => array(1,2,3,4,5),
	
		
       
);*/




function calculatePageRank($linkGraph, $dampingFactor = 0.15) {
        $pageRank = array();
        $tempRank = array();
        $nodeCount = count($linkGraph); 

        // initialise the PR as 1/n
        foreach($linkGraph as $node=>$outbound) {
			//$node means each page
		
                $pageRank[$node] = 1/$nodeCount;
                $tempRank[$node] = 0;
				
        }

        $change = 1;
        $i = 0;
        while($change > 0.00005 && $i < 100) {
                $change = 0;
                $i++;

                // distribute the PR of each page
                foreach($linkGraph as $node => $outbound) {
				
                        $outboundCount = count($outbound);
					
                        foreach($outbound as $link) { 
					
                                $tempRank[$link] += $pageRank[$node] / $outboundCount;
                        }
						
                }
                
                $total = 0;
                // calculate the new PR using the damping factor
                foreach($linkGraph as $node => $outbound) {
					
                        $tempRank[$node]  = ($dampingFactor / $nodeCount)
                                                + (1-$dampingFactor) * $tempRank[$node];
                        $change += abs($pageRank[$node] - $tempRank[$node]);
                        $pageRank[$node] = $tempRank[$node];
                        $tempRank[$node] = 0;
                        $total += $pageRank[$node];
                }

                // Normalise the page ranks so it's all a proportion 0-1
                foreach($pageRank as $node => $score) {
                        $pageRank[$node] /= $total;
                }
        }
        
        return $pageRank;
}


$u=calculatePageRank($newarr,  0.15);
$check12=array_diff($u, array_diff_assoc($u, array_unique($u)));
$common=array_diff_assoc($u,$check12);

	
//$psr=array_keys( $common);	
$gpatemp=array();
$gprank=array();
$damp=0.15;
$nodeck=count($common);

$results=array();
foreach($newarr as $link){
    foreach($link as $value){
        $results[$value] = isset($results[$value]) ? $results[$value]+1 : 1;
    }
}




foreach ($common as $nj=>$out)
{
	foreach ($newarr as $ko=>$ouj)
	{
		//$countgpa = count($ouj);
		
		if ($nj == $ko)
		{
			
			
			
			foreach($ouj as $lk)
			
			{
				
				
				$gpatemp[$nj]+=$u[$lk]/$results[$lk];
			
				
				
				
				
			}
			
			
		}
		
		
		
		$gprank[$nj] = (1-$damp)/$nodeck +$damp * $gpatemp[$nj];
		
	}
	
}

	$check132=array_diff($gprank, array_diff_assoc($gprank, array_unique($gprank)));
$commons=array_diff_assoc($gprank,$check132);
	
	
	
	
	
	

	
	mysql_data_seek( $run, 0 );
	$ure="";
	while($pr=mysql_fetch_array($run))
	{$title=$pr['title'];
		$fk=$pr['url'];
		$desc=$pr['description'];
		$ty=trim($fk,'.html');
		$uy=$fk;
		foreach ($commons as $rs=>$outs)
		{
			
			if ($ty == $rs)
			{
				$fk="spam.php";
			}
			
			
		}
		echo "<a href=$fk>". $title."</a>";?>
<br /><?php
echo $desc."<br>";	
echo "<a href=$fk>".$uy."</a>"."<br>";
		
	}
	
	
	//
	
}


else
{










///////////////////////////////
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


function my_strip($start,$end,$total){
$total = stristr($total,$start);
$f2 = stristr($total,$end);
return substr($total,strlen($start),-strlen($f2));
}
while($runrows = mysql_fetch_array($run))
{
$title = $runrows ['title'];
$desc = $runrows ['description'];
$url = $runrows ['url'];
 //////////////////

	
	
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 ///////////////////



//cloak
//ini_set('display_errors', TRUE);
//error_reporting(E_ALL);
echo '<pre>';

// A FUNCTION TO PLUCK OUT THE URL



// TEST DATA
//$g=file_get_contents('C:\wamp\www\project\er.html');


//




// Right your path of the file
$contents="";
$fd = fopen ($url, "r"); // opening the file in read mode
while($buffer = fread ($fd,2058)){
$contents .=$buffer;
}

/////// End of reading file content ////////
//////// We will start with collecting title part ///////
$sr=my_strip("<head>","<title>",$contents);

$new= pluckURL($sr);


if($new )
{
	
	echo PHP_EOL;
//echo htmlentities($str);

$new = substr($new,0,-1);
$chl=str_replace("http://localhost/project/","",$new);
$file1= strip_tags(file_get_contents($url));
$string1 = preg_replace('/\s+/','',$file1);

$file3=htmlentities(file_get_contents($url));
$string3 = preg_replace('/\s+/','',$file3);

$file2 = strip_tags(file_get_contents($chl));
$string2 = preg_replace('/\s+/','',$file2);
$file4=htmlentities(file_get_contents($chl));
$string4 = preg_replace('/\s+/','',$file4);
 $gk= similar_text($string3, $string4,$percentage);



if($percentage==100)
{
	$ur=$url;
}
 else
 {
	 
	 
	  similar_text($string1, $string2,$per);
	  if ($per==100)
	  {
	$ur=$url;
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
			  
			  
			  
			 $ur=$url;
		  }
	else
	{
		
		$file5= strip_tags(file_get_contents($url));
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
		  
		  $d2=(1-(2 * ($h3/$f3)));
		
		
		$deltas = max($d2,$d3);
		error_reporting(E_ERROR|E_PARSE);
		$score=$deltad/$deltas;
		 if( $deltas==0 && $deltad==0)
		 {
			 $ur=$url;
		 }
			
		 else if ( $deltas==0 && $deltad>0)
		 {
			$ur="spamcloak.php";
			 
		 }
		 
		 
		 

		else if ($score>=0)
		 {
			 
			$ur="spamcloak.php";
		 }
		 else
		 {
			$ur=$url;
		 }
		
		
	}
		  
			  
			  
		
		
		
		
		
		
		  
		  
	  }
	  
	  

 }

}

else
{
$contents="";
$fd = fopen ($url, "r"); // opening the file in read mode
while($buffer = fread ($fd,1024)){
$contents .=$buffer;
}
/////// End of reading file content ////////
//////// We will start with collecting title part ///////
$t=my_strip("<title>","</title>",$contents);

$len=preg_split('/[\s,.;":!()?\'\-\[\]]+/', $t, -1, PREG_SPLIT_NO_EMPTY);
$count=sizeof($len);
//$site  = file_get_contents("$url");
//$links = substr_count($site, "<a href=");













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
 
 
 
 
 
	if($wo>20)
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
	
	
	$ur="spam.php";
}




/*else if ($links>10)
{
	$ur="spam.php";
}
	*/
	
	else if ($rep==1)
	{
	$ur="spam.php";	
	}
	
	
	
	
	else if ($f==1)
	{$ur="spam.php";
	}
	 
	 else if ($flag==1)
{
	
	$ur="spam.php";
}
	 
		 
		


else
{

	$ur=$url;
}	
}
echo "<a href=$ur>". $title."</a>";?>
<br /><?php
echo $desc."<br>";	
echo "<a href=$ur>".$url."</a>"."<br>";  






 


 
}
}
}
 
}
}
 ?>

</body>
</html>
