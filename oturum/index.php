<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Başlıksız Belge</title>
</head>

<body>
	<?php
	if(isset($_GET["kapat"]))
	{
		setcookie("oturum","",time()-3600);
		echo "oturum kapandı!!";
		header("refresh:2; url=oturum.php");
	}
	else{
		if(empty($_COOKIE["oturum"]))
			header("refresh:0; url=oturum.php");
		else
		{
			?>
	<a href="index.php?kapat=1"><button>oturumu kapat</button></a>
	aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
	<?php
	
		}
	}
	?>
</body>
</html>