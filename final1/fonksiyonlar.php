<?php
function baglan()
{
	$sunucu="localhost";
				$vt="01062023";
				$ka="01062023";
				$sifre="123";
	$bag = new PDO("mysql:host=$sunucu;dbname=$vt;charset=utf8",$ka,$sifre);
	return $bag;
}
function listele($bag)
{
	$sorgu=$bag->prepare("SELECT * FROM KAYIT");
						    $sorgu->execute();
						$tablo="<table border='1' cellspacing='0'><tr>
				<th>NUMARA</th><th>AD</th><th>ADRES</th><th>MAAŞ</th></tr>"; 
						while($kayit=$sorgu->fetch(PDO::FETCH_BOTH))
						{
							$tablo.="<tr>";
							for($i=0;$i<4;$i++)
							{
								$tablo.="<td>".$kayit[$i]."</td>";
								
							}
							$tablo.="</tr>";
						}
						$tablo.="</table>";
						echo '<script>document.getElementById("sonuc").innerHTML="';
						echo $tablo.'";</script>';
}
function arama($numara,$ad,$adres,$maas,$bag)
{
	$sql="SELECT * FROM KAYIT WHERE ";
if($numara[0]!="0") $sql.="NUMARA = :num AND ";
else $sql.="NUMARA > :num AND ";
$sql.="AD LIKE :ad AND ";
$sql.="ADRES LIKE :adr AND ";
if($maas[3]!="0") $sql.="MAAŞ= :maas AND ";
else $sql.="MAAŞ > :maas AND ";
$sql=substr($sql,0,strlen($sql)-5);
$sql.=" ORDER BY NUMARA";
$sorgu=$bag->prepare($sql);
$sorgu->bindParam(":num", $numara[0]);
$sorgu->bindParam(":ad", $ad[1]);
$sorgu->bindParam(":adr", $adres[2]);
$sorgu->bindParam(":maas", $maas[3]);
	  $sorgu->execute();
						$tablo="<table border='1' cellspacing='0'><tr>
				<th>NUMARA</th><th>AD</th><th>ADRES</th><th>MAAŞ</th></tr>"; 
						while($kayit=$sorgu->fetch(PDO::FETCH_BOTH))
						{
							$tablo.="<tr>";
							for($i=0;$i<4;$i++)
							{
								$tablo.="<td>".$kayit[$i]."</td>";
								
							}
							$tablo.="</tr>";
						}
						$tablo.="</table>";
						echo '<script>document.getElementById("sonuc").innerHTML="';
						echo $tablo.'";</script>';
}
?>