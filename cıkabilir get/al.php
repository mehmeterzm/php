<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Başlıksız Belge</title>
</head>

<body>
	<?php
	$numara=0;
	if(isset($_GET["num"]))
	{
		$numara= $_GET["num"];
	}
	$ad="";
	if(isset($_GET["ad"]))
	{
		$ad= $_GET["ad"];
	}
	$bolum="";
	if(isset($_GET["bol"]))
	{
		$bolum= $_GET["bol"];;
	}
	echo "HOŞ GELDİN ".$ad;
	echo "gönderdiğiniz veriler: <br/>";
	echo "numaranız: ".$numara."<br/>";
	echo "bölümünüz: ".$bolum;
	
	
	
	?>
</body>
</html>