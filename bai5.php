<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
		$number=$_POST['number'];
}
?>
<form method="post">
<div>
	<input type="number" value="<?php echo isset($number)?$number:''; ?>" name="number" required>
	<input type="submit" name="" min="1" value="Draw">	
</div>
</form>
<div style="text-align: center;">
<?php
	if($_SERVER['REQUEST_METHOD']=="POST"){
		// $number=$_POST['number'];
		// $content=" ";
		for($i=1;$i<=$number;$i++){
			for($j=$i;$j>$i/2;$j--){
				$k=$j%10;
				echo $k.' ';
			}
			for($m=ceil($i/2);$m<$i;$m++){
				$x=$m%10;
				echo $x.' ';
			}
		echo "<br>";
		}
		
	}
?></div>