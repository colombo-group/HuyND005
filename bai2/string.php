<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
	$para=$_POST['para'];
	$char=$_POST['char'];
	$paraArr=array();
	//tach cac tu cua doan
	$paraArr=explode(" ", $para);
	$count=0;
	//dem so lan xuat hien cua ki tu
	$word=array();
	for($i=0;$i<sizeof($paraArr);$i++){
		$text="";
		$text=$paraArr[$i];
		$temp=array();
		$temp=str_split($text);
		for($j=0;$j<sizeof($temp);$j++){
			if($temp[$j]==$char){
				$count++;
				$word[]=$text;
			}
		}

	}
	//in ra cac tu chua ki tu
	 
}
function ech_para2($paraArr,$char){
	for($i=0;$i<count($paraArr);$i++){
		$paraArr[$i]=str_replace($char, "<b>".$char."</b>", $paraArr[$i]);
	}
	echo implode(" ",$paraArr);
}
function ech_para1($word,$paraArr){
	for($i=0;$i<count($paraArr);$i++){
		for($j=0;$j<count($word);$j++){
			if($word[$j]==$paraArr[$i]){
				$paraArr[$i]="<b>".$paraArr[$i]."</b>";
			}
		}
	}
	echo implode(" ", $paraArr);
	

}
function ech_word($word){
	$text=str_replace(',', "", $word);
	$text=str_replace('.', "", $word);
	for($i=0;$i<count($word);$i++){
		for($j=$i+1;$j<count($word);$j++){
			if($word[$i]==$word[$j]){
				$word[$j]="";
			}
		}
	}
	//in ra cac ki tu
	for($i=0;$i<count($word);$i++){
		echo $word[$i]."&nbsp;";
	}
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>
		Trainee005 String
	</title>
</head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<body>
<style type="text/css">
	
	.front textarea{
		width: 100%;
		height: 300px;
		overflow: scroll;
		margin: 50px;
		margin-left: 0px;

	}
	.front input{
		margin:50px;
		margin-bottom: 0px;
		margin-left: 0px;
	}
	.back{
		margin-top: 50px;
	}
	.back .textarea{
		width: 100%;
		height: 150px;
		overflow: scroll;
	}

</style>
<div class="container">
	<div class="col-lg-6 front">
		<form method="post">
			<div class="top">
				<textarea class="form-control" name="para" placeholder="Nhap doan van ban!!"><?php echo isset($para)?$para:""; ?></textarea>
			</div>	
			<div class="bottom">

				<input class="form form-control" value="<?php echo isset($char)?$char:""; ?>" type="text" name="char" placeholder="Nhap ki tu ban can tim vao!!">
				<input class="btn btn-primary" type="submit" name="" value="Xem ket qua">
			</div>

		</form>
	</div>

	<div class="col-lg-6 back">
		<div class="result">
			<div class="title">So lan xuat hien cua ki tu <?php echo isset($char)?"<b>".$char."</b>":""; ?>:</div>
			<div class="count"><input type="text" value="<?php echo isset($count)?$count:""; ?>" class="form-control" name="" disabled ></div>
			<div class="title">Danh sach cac tu chua ki tu <?php echo isset($char)?"<b>".$char."</b>":""; ?>: </div>
			<div class="count"><input type="text" value="<?php if(isset($word)) ech_word($word); ?>" class="form-control" name="" disabled ></div>
			<div class="title">Doan van ban voi cac ki tu <?php echo isset($char)?"<b>".$char."</b>":""; ?> duoc in dam:  </div>
			<div class="count"><div class="textarea" name=""  ><?php if(isset($paraArr)) ech_para2($paraArr,$char); ?></div></div>
			<div class="title">Doan van van voi cac tu chua ki tu <?php echo isset($char)?"<b>".$char."</b>":""; ?> duoc in dam:</div>
			<div class="count"><div class="textarea" name=""  ><?php if(isset($word)) ech_para1($word,$paraArr); ?></div></div>
			
			
		</div>
	</div>

</div>
</body>
</html>