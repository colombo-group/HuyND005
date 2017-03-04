<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
	$para=$_POST['para'];
	$char=$_POST['char'];
	$vietnamese="ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúủăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼẾỀỂưăạảấầẩẫậắằẳẵặẹẻẽếềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ";
	//khoi tao bien khoang ki tu 
	$pattern_input_char="/[^a-zA-z0-9_".$vietnamese."]/";
	if(!preg_match($pattern_input_char,$char)){
		$pattern_char="/".$char."/";
		$pattern_word="/[a-zA-z0-9_".$vietnamese."]*".$char."[a-zA-z0-9_".$vietnamese."]*/";
		$char_rep="<b>".$char."</b>";
		//tim ki tu can tim trong doan
		preg_match_all($pattern_char, $para, $matches_char,PREG_OFFSET_CAPTURE);
		//tim tu chua ki tu can tim
		preg_match_all($pattern_word, $para, $matches_word,PREG_OFFSET_CAPTURE);
		$check=sizeof($matches_char[0]);
		//kiem tra xem ki tu can tim co ton tai khong.
			if($check>0){
			//mang cac tu chua ki tu can tim can in dam
			$pattern_word_rep=array();
			//mang cac tu can tim
			$word=array();
			//mang cac tu moi chua ki tu da duoc in dam
			$word_rep=array();
			for($i=0;$i<sizeof($matches_word[0]);$i++){
				$word[]=$matches_word[0][$i][0];
				$pattern_word_rep[] = '/'.$matches_word[0][$i][0].'/';
				$word_rep[]='<b>'.$matches_word[0][$i][0].'</b>';
			}
			//thay the thanh cac tu in dam
			$new_word_para=preg_replace($pattern_word_rep, $word_rep, $para);
			//thay the thanh cac ki tu in dam
			$new_char_para=preg_replace($pattern_char, $char_rep, $para);
			$result=array(
			          'status' => true,
			          'count' => $check,
			          'words_finded' => $word,
			          'new_char_para' => $new_char_para,
			          'new_word_para' => $new_word_para
			);
		}
		else{
			$erro="Khong co tim thay ket qua";
		}
	}
	else {
		$erro="Ki tu nhap vao khong hop le";
		// return 0;
	}
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>
		Trainee005 String
	</title>
	<meta charset="utf-8">
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
				<textarea class="form-control" required name="para" placeholder="Nhap doan van ban!!"><?php echo isset($para)?$para:""; ?></textarea>
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
			<div class="count"><input type="text" value="<?php echo isset($check)?$check:''; ?>" class="form-control" name="" disabled ></div>
			<div class="title">Danh sach cac tu chua ki tu <?php echo isset($char)?"<b>".$char."</b>":""; ?>: </div>
			<div class="count"><input type="text" value="<?php 
				if(isset($word)){
					foreach($word as $val){
						echo $val.' ';
					}
				}
			 ?>" class="form-control" name="" disabled ></div>
			<div class="title">Doan van ban voi cac ki tu <?php echo isset($char)?"<b>".$char."</b>":""; ?> duoc in dam:  </div>
			<div class="count"><div class="textarea" name=""  ><?php echo isset($result['new_char_para'])?$result['new_char_para']:''; ?></div></div>
			<div class="title">Doan van van voi cac tu chua ki tu <?php echo isset($char)?"<b>".$char."</b>":""; ?> duoc in dam:</div>
			<div class="count"><div class="textarea" name=""  ><?php 
				echo isset($result['new_word_para'])?$result['new_word_para']:'';
			 ?></div></div>
			
			
		</div>
	</div>

</div>
</body>
</html>