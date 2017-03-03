<?php
	$result=0;
	echo "<table border='1'><tr>";
	for($i=1;$i<=10;$i++){
		if($i==6){
			echo "</tr><tr>";
		}
		echo "<td style='text-align:justify;'>";
		for($j=1;$j<=10;$j++){
			$result=$i*$j;
			echo $i."x".$j."=".$result."<br>";
		}
	}
?>

