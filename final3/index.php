<?php
session_start();
include "islemler.php";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Başlıksız Belge</title>
</head>

<body>
	<?php
	if(isset($_SESSION["oturum"]))
	{
		if(isset($_GET["kapat"]))
		{
			session_destroy();
			echo "Oturum Kapandı...";
			header("Refresh: 2;url=index.php");
		}
		else
		{
			echo "<h2>KAYIT LİSTESİ</h2>";
			$islem= new VTislemleri();
			$tablo = $islem->listele();
			echo $tablo;
			echo "<a href='index.php?kapat=1'><input type='button' value='OTURUMU KAPAT' /></a>";
		}
	}
	else
	{
		if(isset($_POST["gonder"]))
		{
			$ka="";
			if(!empty($_POST["ka"]))
				$ka=$_POST["ka"];
			$sifre="";
			if(!empty($_POST["sifre"]))
				$sifre=$_POST["sifre"];
			
			$oturum= new oturum($ka,$sifre);
			if($oturum->kontrol())
			{
				$_SESSION["oturum"]="açık";
				echo "oturum açıldı..";
				header("Refresh: 2;url=index.php");
			}
			else
			{
				echo "kullanıcı adı veya sifre yanlış..";
				echo "oturum açılamadı!";
				header("Refresh: 2;url=index.php");
			}
		}
		else
		{
			echo "<form action='index.php' method='post'>";
			echo "Kullanıcı Adı: <input type='text' name='ka' /> <br/>";
			echo "Şifre: <input type='text' name='sifre' /> <br/>";
			echo "<input type='submit' value='Oturum Aç' name='gonder' /> </form>";
		}
	}
	?>
	
</body>
</html>