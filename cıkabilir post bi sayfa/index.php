<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Başlıksız Belge</title>
</head>
	<link rel="stylesheet" type="text/css" href="bicim.css">
	<?php include("tasarım.php") ?>

<body>
	<?php
	if(empty($_GET["gonder"]))
	{
		
	?>
	<form action="index.php" method="get">
	      numara: <input type="text" name="num" /> <br/>
		  ad: <input type="text" name="ad" /> <br/>
		  bölüm: <select name="bol" size="1">
		        <option>Bilgisayar</option>
		<option>makine</option>
		<option>elektrik</option>
		<option>otomotiv</option><br/>
		<input type="submit" value="GÖNDER" name="gonder" /><br/>	
		</select>
		<?php
	}
	else
	{
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
	
	}
		?>
	
</body>
</html>