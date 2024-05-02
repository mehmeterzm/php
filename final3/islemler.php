<?php

function baglan()
{
	$sunucu="localhost";
	$vt ="030623vt";
	$ka = "030623vt";
	$sifre = "123";
	try{
		$bag= new PDO("mysql:host=$sunucu;dbname=$vt;charset=utf8",$ka,$sifre);
		return $bag;
	}
	catch(PDOException $hata)
	{
		echo "Hata: ".$hata->getMessage();
	}
	
}
class oturum //sınıf
{
	private $ka="";
	private $sifre="";
	
	public function __construct($k,$s)
	{
		$this->ka=$k; $this->sifre=md5($s);
	}
	public function kontrol()
	{
		$sonuc = false;
		try{
		$bag=baglan();
		$sorgu = $bag->prepare("SELECT * FROM KULLANICILAR WHERE KA = :k AND SIFRE = :S");
		$sorgu->bindParam(":k",$this->ka);
		$sorgu->bindParam(":s",$this->sifre);
		$sorgu->execute();
		if($sorgu->rowCount()>0) $sonuc = true;
		else $sonuc = false;
		}
		catch(PDOException $hata)
		{
			echo "<script>alert('".$hata->getMessage()."')</script>";
		}
		$bag=null;
		return $sonuc;
		
	}
}
class VTislemleri
{
	public function liste()
	{
		try
		{
			$bag=baglan();
			$sorgu=$bag->prepare("SELECT * FROM KAYIT");
			$sorgu->execute();
			$alanSayisi=$sorgu->columntCount();
			for($i=0;$i<$alanSayisi;$i++)
			{
				$alanBilgi = $sorgu->getColumnMeta($i);
				$alan[$i] = $alanBilgi["name"];
			}
			$tablo="<table border='1' cellspacing='0'><tr>";
			for($i=0;$i<$alanSayisi;$i++)
			{
				$tablo.="<th>".$alan[$i]."</th>";
			}
			$tablo.="</tr>";
			if($sorgu->rowCount())
			{
				while($satir=$sorgu->fetch(PDO::FETCH_NUM))
				{
					$tablo.="<tr>";
					for($i=0;$i<$alanSayisi;$i++)
					{
						$tablo.="<td>".$satir[$i]."</td>";
						$tablo.="</tr>";
					}
				}
				$tablo.="</table>";
			}
			else
			{
				$tablo="Kayıt Yok...";
			}
		}
		catch(PDOException $hata)
		{
			echo "<script>alert('".$hata->getMessage()."')</script>";
		}
		$bag=null;
		return $tablo;
	}
}

?>