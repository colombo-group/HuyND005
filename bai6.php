<?php
	$number1="";
	$number2="";
	if($_SERVER['REQUEST_METHOD']=="POST"){
		$number1=$_POST['number1'];
		$number2=$_POST['number2'];
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
				return 1;
			}
			$equal=$number1/$number2;
		}
		if(isset($_POST['pow'])){
			$equal=pow($number1, $number2);
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
		margin: 200px;
	}
	input{
		width: 80px;
		border-top: 1px solid black;
		border-left: 1px solid black;
	}
	
</style>
<body>
<form method="post">
<input required type="number" value="<?php echo isset($number1)?$number1:""; ?>" id="number1" name="number1">
<input type="submit" value="+" name="plus">
<input type="submit" value="-" name="div">
<input type="submit" value="x" name="mul">
<input type="submit" value="/" name="sub">
<input type="submit" value="^" name="pow">
<input required type="number" value="<?php echo isset($number2)?$number2:""; ?>" id="number2" name="number2">
<span>=</span>
<input type="number" value="<?php echo isset($equal)?$equal:""; ?>" disabled  id="equal">
</form>
<!-- <script type="text/javascript" src="caculator.js"></script> -->
</body>
</html>
