<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$links = array( 
        strcat(1,html) => array(p5),
        p2 => array(p4, p7, p8),
        p3 => array(p1, p3, p4, p7, p9),
        p4 => array(p1, p2, p4, p8),
        p5 => array(p1, p6, p7, p9),
        p6 => array(p1, p5, p8),
        p8 => array(p3, p4),
        p9 => array(p1, p4, p6, p8)
);



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
					//echo 
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


$u=calculatePageRank($links,  0.15);
print_r( $u);
?>
</body>
</html>