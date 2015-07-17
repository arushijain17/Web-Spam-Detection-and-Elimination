<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>


<?php

$links = array( 
        1 => array(2,3,4,5,6),
        2 => array(1,3,4,5,6),
        3 => array(1,2,4,5,6),
        4 => array(1,2,3,5,6),
        5 => array(1,2,3,4,6),
        6 => array(1,2,3,4,5),
		7=> array (11),
		8=>array(7,9),
		9=> array(7),
		10=> array(8),
		11=> array(8,10),
       
);


$results=array();
foreach($links as $link){
    foreach($link as $value){
        $results[$value] = isset($results[$value]) ? $results[$value]+1 : 1;
    }
}
print_r($results);


?>
</body>
</html>