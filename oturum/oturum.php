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
	?>
	<form action="kontrol.php" method="post">
	kullanıcı adi: <input type="text" name="ka"/> <br/>
	sifre: <input type="text" name="sifre" /> <br/>
		<input type="submit" value="GİRİŞ YAP" name="gonder">
	
	
	
	
	</form>
</body>
</html>