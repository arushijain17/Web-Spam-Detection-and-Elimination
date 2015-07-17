<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php

$html=file_get_contents('C:\xampp\htdocs\project\masterfile\hk.html');
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



if($f==1)
{

echo "spam";
}

 ?>
</body>
</html>