
<form method="post">
<div>
	<input type="number" name="number" required>
	<input type="submit" name="" min="1" value="Draw">	
</div>
</form>
<?php
	if($_SERVER['REQUEST_METHOD']=="POST"){
		$number=$_POST['number'];
		// $content=" ";
		for($i=1;$i<=$number;$i++){
			for($j=$i;$j>0;$j--){
				$k=$j%10;
				echo $k.' ';
			}
			echo "<br>";
		}
		
	}
?>