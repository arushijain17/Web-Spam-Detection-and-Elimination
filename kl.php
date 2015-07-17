<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php

$url="C:\Users\parul\Desktop\check123\a.html";

 $html1=file_get_contents($url);
	$dom1 = new DOMDocument;
@$dom1->loadHTML($html1);

$fey=0;
foreach ($dom1->getElementsByTagName('a') as $links){
    //Extract and show the "href" attribute.
         $txt1= $links->nodeValue;
    $ser = preg_split('/[\s,.;":!()?\'\-\[\]]+/',$txt1, -1, PREG_SPLIT_NO_EMPTY);}
print_r( $ser);
?>
</body>
</html>