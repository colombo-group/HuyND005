<?php
	if($_SERVER['REQUEST_METHOD']=="POST"){
		$a=$_POST['numa'];
		// $chart1=isset($_POST['chart1'])?$_POST['chart1']:"";
		$name_chart= array();
		for($i=0;$i<$a;$i++){
			$name_chart[$i]=isset($_POST['chart'.$i])?$_POST['chart'.$i]:"";
			$val[$i]=isset($_POST[$i])?$_POST[$i]:"";
		}
	}
?>
<form method="post">
	<div class="row">
		So luong do thi: <input type="number" value="<?php echo isset($a)?$a:""; ?>" name="numa">
	</div>
	<hr>
	<div>

		<?php if(isset($a)){ 
			// echo "Nhap ten bieu do: <br>";
			for($i=0;$i<$a;$i++){
				echo "Nhap ten bieu do: <input type='text' required value='".$name_chart[$i]."' name='chart".$i."' placeholder='Nhap ten cua bieu do thu:".$i."'><br>";
			}
		?>
	</div>
	<hr>
	<div >
		<?php
			for($i=0;$i<$a;$i++){
				if($name_chart[$i]!=""){
					echo $name_chart[$i].": <input required type='number' min='1' max='100' name='".$i."' value='".$val[$i]."'><br>";
				}
			}
		?>
	</div>
	<hr>
	<div>
		<?php
		echo "<table border='1'>";
			for($i=0;$i<$a;$i++){

				if($val[$i]!=""){
					$check="check";
					echo "<tr style='border:1px solid black;'><td >";
					echo $name_chart[$i]."</td>";
					echo "<td style='font-size:10px'><div style='float:left;background:red;height:10px;width:".$val[$i]."px'></div>".$val[$i]." %</td></tr>";
				}
			}
		}?>
	</div>
	<?php if(!isset($check)){ ?>
	<div><input type="submit" value="<?php echo 'Next'; ?>" name=""></div>
	<?php } ?>
</form>