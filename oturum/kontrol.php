<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Başlıksız Belge</title>
</head>

<body>
	<?php
	if(isset($_COOKIE["oturum"]))
	{
		if($_COOKIE["oturum"]=="acık")
		{
			header("refresh:0; url=index.php");
			die();
		}
	}
	if(empty($_POST["gonder"]))
	{
		header("refresh:0; url=oturum.php");
			die();
	}
	$ka= "";
	if(isset($_POST["ka"])) $ka= $_POST["ka"];
	$sifre="";
	if(isset($_POST["sifre"])) $sifre= $_POST["sifre"];
	 
	if($ka=="admin"&& $sifre=="123")
	{
		setcookie("oturum","acık",time()+60);
		header("refresh:0; url=index.php");
	}
	else
	{
		echo "kullanıcı adı veya sifre yanlıs!!!!!";
		header("refresh:2; url=oturum.php");
	}
	?>
</body>
</html>