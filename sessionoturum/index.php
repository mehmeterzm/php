<?php session_start(); ?>
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
		session_destroy();
		header("refresh:2; url=index.php");
		echo "oturum kapanıyor!!";
	}
	else{
		if(isset($_SESSION["oturum"]))
		{
		?>
	<a href="index.php?kapat=1"><button>OTURUMU KAPAT</button></a>
	aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
	<?php
		}
		else
		{
			if(isset($_POST["oturum"]))
			{
				$ka="";
				if(isset($_POST["ka"]))
					$ka = $_POST["ka"];
				$sifre="";
				if(isset($_POST["sifre"]))
					$ka = $_POST["sifre"];
				if($ka="admin"&& $sifre=="123")
				{
					$_SESSION["oturum"]="acik";
					header("refresh:0; url=index.php");
				}
				else
				{
					echo "kullanıcı adı veya sifre yanlış..."
						header("refresh:2; url=index.php");
				}
				
			}
		}
	}
	
	?>
</body>
</html>