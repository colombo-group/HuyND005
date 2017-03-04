<?php

	$number1="";
	$number2="";
	if($_SERVER['REQUEST_METHOD']=="POST"){
		$number1=$_POST['number1'];
		$number2=$_POST['number2'];
		if(!is_numeric($number1)||!is_numeric($number2)){
			if(!is_numeric($number2)){
				$erro="So khong hop le! Nhap lai";
			
		}
			if(!is_numeric($number1)){
				$erro="So khong hop le! Nhap lai";
				
			}
		}
		else{
			$equal=0;
			if(isset($_POST['plus'])){
				$equal=$number1+$number2;
			}
			if(isset($_POST['div'])){
				$equal=$number1-$number2;
			}
			if(isset($_POST['mul'])){
				$equal=$number1*$number2;
			}
			if(isset($_POST['sub'])){
				if($number2==0){
					echo "<script>alert('So thu 2 phai lon hon 0');</script>";
					// header('bai6.php');
					
				}
				else $equal=$number1/$number2;
			}
			if(isset($_POST['pow'])){
				$equal=pow($number1, $number2);
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		May tinh
	</title>
</head>
<style type="text/css">
	body{
		width: 80%;
		margin:0 auto;

	}
	input{
		/*width: px;*/
		
		border: 1px solid black;
	}
	
</style>
<body>
<form method="post">
<input required type="text" value="<?php if(isset($erro)){ echo $erro; } else echo isset($number1)?$number1:''; ?>" placeholder="Nhap so thu nhat!" id="number1" name="number1">
<input type="submit" value="+" name="plus" style="border:1px solid black; width: 30px">
<input type="submit" value="-" name="div" style="border:1px solid black; width: 30px">
<input type="submit" value="x" name="mul" style="border:1px solid black; width: 30px">
<input type="submit" value="/" name="sub" style="border:1px solid black; width: 30px">
<input type="submit" value="^" name="pow" style="border:1px solid black; width: 30px">
<input required type="text" placeholder="Nhap so thu hai!" value="<?php if(isset($erro)){ echo $erro; } else echo isset($number2)?$number2:''; ?>" id="number2" name="number2">
<span>=</span>
<input type="text" value="<?php echo isset($equal)?$equal:""; ?>" placeholder="Ket qua!" disabled  id="equal">
</form>

</body>

</html>
