<?php
	//header("content-type:image/png");
	$num='';
	for($i=0;$i<4;$i++){
		$num.=dechex(rand(0,15));
	}
	//session_start();
	//session_destroy();
	//$_SESSION['scode'] = $num;
	//$num = $_GET['num'];
	$imagewidth=60;
	$imageheight=24;

	$numimage = imagecreate($imagewidth,$imageheight);
	imagecolorallocate($numimage,240,240,240);
	for($i=0;$i<strlen($num);$i++){
		$x = mt_rand(1,8)+$imagewidth*$i/4;
		$y = mt_rand(1,$imageheight/4);
		$color=imagecolorallocate($numimage,mt_rand(0,150),mt_rand(0,150),mt_rand(0,150));
		imagestring($numimage,5,$x,$y,$num[$i],$color);
	}

	for($i=0;$i<200;$i++){
  		$randcolor=imagecolorallocate($numimage,rand(200,255),rand(200,255),rand(200,255));
  		imagesetpixel($numimage,rand()%70,rand()%20,$randcolor); 
	}
	imagepng($numimage);
	imagedestroy($numimage);
?>