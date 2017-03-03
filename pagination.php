<?php
	$page_cur=isset($_GET['page'])?$_GET['page']:1;
	if($page_cur<=0){
		$page_cur=1;
	}
	if($_SERVER['REQUEST_METHOD']=="POST"){
		$a=$_POST['numa'];
		$b=$_POST['numb'];
		$c=$_POST['numc'];
	}
	else{
		$a=isset($_GET['a'])?$_GET['a']:" ";
		$b=isset($_GET['b'])?$_GET['b']:" ";
		$c=isset($_GET['c'])?$_GET['c']:" ";
	}
	function pagi($a,$b,$c,$url,$page_cur){
		$comval=array();
		$count=0;
		$link_page="";
		for($i=0;$i<=$a;$i++){
			if($i%$b==0){
				$comval[$count]=$i;
				$count++;
			}
		}
		$total_record=count($comval);
		// echo $page_cur;
		if($total_record>1){
			$val_start=($page_cur-1)*$c;
			$val_finish=$page_cur*$c;
			echo("Gia tri thoa man la: <br>");
			if($val_finish>$total_record){
				$val_finish=$total_record;
			}
			for($i=$val_start;$i<$val_finish;$i++){
				echo "&nbsp;".$comval[$i];
				// echo $total_record;
				// echo $val_finish;
			}
			echo "<hr>";
			$total_page=ceil($total_record/$c);
			// echo $total_page;
			if($total_page>0){
				if($page_cur>1){
					//echo page previous
					$page_prev=$page_cur-1;
					$link_page="<span><a href='".$url."?page=".$page_prev."&a=".$a."&b=".$b."&c=".$c."'>Trang truoc</a></span>&nbsp;&nbsp;";
				}
				// 
				if($total_page>8){
					if($page_cur<=4){
						$page_start=1;
						$page_finish=5;
					}

					// dam bao gia tri page_cur luon nam giua
					else if($page_cur>4&&$page_cur<$total_page-3){
						$page_start=$page_cur-2;
						$page_finish=$page_cur+2;
					}
					else if($page_cur>4&&$page_cur<$total_page-1){
						$page_start=$page_cur-2;
						$page_finish=$total_page;
					}
					else {
						$page_start=$page_cur-3;
						$page_finish=$total_page;
					}
					if($page_cur>4){
						$link_page.="<span><a href='".$url."?page=1&a=".$a."&b=".$b."&c=".$c."'>1</a></span>&nbsp;&nbsp;";
						$link_page.="<span>...</span>&nbsp;&nbsp;";
					}
				}
				else{
					$page_start=1;
					$page_finish=$total_page;

				}

				for($i=$page_start;$i<=$page_finish;$i++){
					if($i==$page_cur){
						// echo "<span><a style='text-decoration:underline;' href='".$url."?a=".$a."&b=".$b."&c=".$c."&page=".$i."'>".$i."</a></span>&nbsp;&nbsp;";
						$link_page.="<span><a style='text-decoration:underline;color:red; font-weigh:bold;' href='".$url."?a=".$a."&b=".$b."&c=".$c."&page=".$i."'>".$i."</a></span>&nbsp;&nbsp;";
					}
					else{
						$link_page.="<span><a href='".$url."?page=".$i."&a=".$a."&b=".$b."&c=".$c."'>".$i."</a></span>&nbsp;&nbsp;";
					}
				}
				if($total_page>8){
					if($total_page-3>$page_cur){
						$link_page.="<span>...</span>&nbsp;&nbsp;";
						$link_page.="<span><a href='".$url."?page=".$total_page."&a=".$a."&b=".$b."&c=".$c."'>".$total_page."</a></span>&nbsp;&nbsp;";
					}
				}
				if($page_cur<$total_page){
					$page_cur=$page_cur+1;
					$link_page.="<span><a href='".$url."?page=".$page_cur."&a=".$a."&b=".$b."&c=".$c."'>Next</a></span>&nbsp;&nbsp;";
				}
				echo $link_page;
			}
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Trainee005 Pagination</title>
</head>
<body>
<form method="post" action="">
<div class="row">
	<span>Num A</span>&nbsp;&nbsp;
	<input type="number" value="<?php echo isset($a)?$a:''; ?>" required name="numa">
</div>
<div class="row">
	<span>Num B</span>&nbsp;&nbsp;
	<input type="number" value="<?php echo isset($b)?$b:''; ?>" required name="numb">
</div>
<div class="row">
	<span>Num C</span>&nbsp;&nbsp;
	<input type="number" value="<?php echo isset($c)?$c:''; ?>" required name="numc">
</div>
<div class="row">
	<input type="submit"  name="sub" value="Show">
</div>
</form>
<?php
if($page_cur>0){
	if($a>$b&&$c>0){
		$url="pagination.php";
		pagi($a,$b,$c,$url,$page_cur);
	}
	else if($a<=$b){
		
		if($a==0&&$b==0&&$c==0&&isset($_POST['sub'])){
			echo "<script>alert('So nhap vao phai lon hon 0');</script>";
			return 0;
		}
		elseif($a!=0||$b!=0&&$a<=$b){
			echo "<script>alert('Num A phai lon hon Num B');</script>";
			return 0;
		}
		else return 1;
		
	}
	else if($a<=0||$b<=0||$c<=0){
		echo "<script>alert('So nhap vao phai lon hon 0');</script>";
		return 0;
	}
	
}
else{
	echo "<script>alert('Error')</script>";
	return 0;
}
?>
</body>
</html>