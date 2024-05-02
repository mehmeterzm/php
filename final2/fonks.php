<?php
$tablo="KAYIT";
function baglan()
{
	try
	{
		$sunucu="localhost"; $vt="030623vt"; $ka="030623vt"; $sifre="123";
		$bag=new PDO("mysql:host=$sunucu; dbname=$vt; charset=utf8", $ka, $sifre);
		return $bag;
	}
	catch(PDOException $hata)
	{
		echo "<script>alert('".$hata->getMessage()."');</script>";
	}
	$bag=null;
}

function listele($islem, $aK)
{
	$bag=baglan();
	global $tablo;
	
	if($islem!="KAYIT ARA")
	$sorgu=$bag->prepare("SELECT * FROM $tablo ORDER BY NUMARA");
	else
	{
		$sql= "SELECT FROM $tablo WHERE";
		if($aK[0]!="0") $sql.="NUMARA = :num AND";
		$sql.="AD LİKE :ad AND";
		$sql.="ADRES LİKE :adr AND";
		if($aK[3]!="0") $sql.="MAAŞ = :maas AND";
		$sql=substr($sql,0,strlen($sql)-5);
		$sql.="ORDER BY NUMARA";
		$sorgu=$bag->prepare($sql);
		if($aK[0]!="0") $sorgu->bindParam(":num" , $aK[0]);
		$sorgu->bindParam(":ad" , $aK[1]);
		$sorgu->bindParam(":adr" , $aK[2]);
		if($aK[3]!="0") $sorgu->bindParam(":maas" , $aK[3]);
		
	}
	$sorgu->execute();
	
	$tablo="<table border='1' cellspacing='0'><tr>
	<th>NUMARA</th><th>AD</th><th>ADRES</th><th>MAAŞ</th></tr>";
	$i=0;
	if($sorgu->rowCount())
	{
		while($satir=$sorgu->fetch(PDO::FETCH_ASSOC))
		{
			$tablo.="<tr id='s$i' onClick='kayitAl($i)'>
			<td id='h$i=0'>".$satir["NUMARA"]."</td>";
			$tablo.="td id='h$i=-1'>".$satir["AD"]."</td>";
			$tablo.="td id='h$i=-2'>".$satir["ADRES"]."</td>";
			$tablo.="td id='h$i=-3'>".$satir["MAAŞ"]."</td></tr>";
			$i++;
		}
	}
	$tablo.="</table>";
	echo $tablo;
}

function ekle($eK)
{
	$bag=baglan();
	global $tablo;
	$komut ="INSERT INTO $tablo VALUES(:num, :ad, :adr, :maas)";
	$sorgu=$bag->prepare($komut);
	$sorgu->bindParam(".num", $eK[0]);
	$sorgu->bindParam(".ad", $eK[1]);
	$sorgu->bindParam(".adr", $eK[2]);
	$sorgu->bindParam(".maas", $eK[3]);
	$sorgu->execute();
	echo "<script>alert('Kayıt Eklendi!...');</script>";
	
}

function guncelle($gn,$gK)
{
	$bag=baglan();
	global $tablo;
	$komut ="UPDATE $tablo SET NUMARA=:num, AD=:ad, ADRES=:adr, MAAŞ=:maas WHERE NUMARA=:gn";
	$sorgu=$bag->prepare($komut);
	$sorgu->bindParam(".num", $gK[0]);
	$sorgu->bindParam(".ad", $gK[1]);
	$sorgu->bindParam(".adr", $gK[2]);
	$sorgu->bindParam(".maas", $gK[3]);
	$sorgu->bindParam(".gn", $gn);
	$sorgu->execute();
	echo "<script>alert('Kayıt Güncellendi!...');</script>";
}

function sil()
{
	$bag=baglan();
	global $tablo;
	$komut="DELETE FROM $tablo WHERE NUMARA=:sn";
	$sorgu=$bag->prepare($komut);
	$sorgu->bindParam(":sn",$sn);
	$sorgu->execute();
	"<script>alert('Kayıt Silindi!...');</script>";
	
}

?>