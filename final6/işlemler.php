<?php
function goster($kayitlar)
{
	echo "<table border='1'><tr><th>NUMARA</th><th>AD</th>";
	echo "<th>ADRES</th><th>MAAŞ</th><tr>";
	foreach($kayitlar as $kayit)
	{
		echo "<tr><td>".$kayit["NUMARA"]."</td><td>".$kayit["AD"]."</td>";
		echo "<td>".$kayit["ADRES"]."</td><td>".$kayit["MAAŞ"]."</td><tr>";
	}
	echo "</table>";
}
  if(!empty($_POST["islem"]))
  {
	  $islem=$_POST["islem"];
	  $numara=0;
	  if(!empty($_POST["num"])) $numara=$_POST["num"];
	  
	  $ad="";
	  if(!empty($_POST["ad"])) $numara=$_POST["ad"];
	  $adres="";
	  if(!empty($_POST["adr"])) $numara=$_POST["adr"];
	  $maas=0;
	  if(!empty($_POST["maas"])) $numara=$_POST["maas"];
	  try
	  {
		  $server="localhost"; $user="030623vt"; $sifre="123";
		  $vt="030623vt"; $tablo="KAYIT";
		  $bag= new 
			  PDO("mysql:host=$server;dbname=$vt;charset=utf8",$user,$sifre);
		  switch($islem)
		  {
			  case "1": 
				  if($numara>0 && $ad!="")
				  {
					  $komut=$bag->prepare("INSERT INTO $tablo VALUES(:num,:ad,:adr,:maas)");
					  $komut->bindParam(":num", $numara);
					   $komut->bindParam(":ad", $ad);
					   $komut->bindParam(":adr", $adr);
					   $komut->bindParam(":maas", $maas);
					  $komut->execute();
					  
					  $komut=$bag->prepare("SELECT FROM $tablo");
					  $komut->execute();
					  $sonuc=$komut->fetchAll();
					  if(count($sonuc)>0){
						  goster($sonuc); 
					  }
				  }
				  break;
			     case "2":
				  $sorgu="SELECT * FROM $tablo WHERE";
				  if($numara>0) $sorgu.="NUMARA = :num AND";
				  else $sorgu.="NUMARA > :num AND ";
				  if($ad=="") $ad="%"; $sorgu.="AD LİKE = :ad AND";
				  if($adr=="") $adr="%"; $sorgu.="ADRES LİKE = :adr AND";
				  if($maas>0) $sorgu.="MAAŞ = :maas AND";
				  else $sorgu.="MAAŞ > :maas AND ";
				  $komut=$bag->prepare($sorgu);
					  $komut->bindParam(":num", $numara);
					   $komut->bindParam(":ad", $ad);
					   $komut->bindParam(":adr", $adr);
					   $komut->bindParam(":maas", $maas);
					  $komut->execute();
				  $sonuc=$komut->fetchAll();
				  if(count($sonuc)>0)
				  {
					  goster($sonuc);
				  }
				  	
				  break;
				  case "3": 
				  if($numara>0 && $ad!="")
				  {
					  $komut=$bag->prepare("UPDATE $tablo SET AD=:ad,ADRES=:adr,MAAŞ=:maas WHERE NUMARA=:num");
					  $komut->bindParam(":num", $numara);
					   $komut->bindParam(":ad", $ad);
					   $komut->bindParam(":adr", $adr);
					   $komut->bindParam(":maas", $maas);
					  $komut->execute();
					  $komut=$bag->prepare("SELECT * FROM $tablo");
					  $komut->execute();
					  $sonuc=$komut->fetchAll();
					  if(count($sonuc)>0)
					  {
						  goster($sonuc);
					  }
				  }
				  break;
				  case "4": 
				  $sorgu="DELETE * FROM $tablo WHERE";
				  if($numara>0) $sorgu.="NUMARA = :num AND";
				  else $sorgu.="NUMARA > :num AND ";
				  if($ad=="") $ad="%"; $sorgu.="AD LİKE = :ad AND";
				  if($adr=="") $adr="%"; $sorgu.="ADRES LİKE = :adr AND";
				  if($maas>0) $sorgu.="MAAŞ = :maas AND";
				  else $sorgu.="MAAŞ > :maas AND ";
				  $komut=$bag->prepare($sorgu);
					  $komut->bindParam(":num", $numara);
					   $komut->bindParam(":ad", $ad);
					   $komut->bindParam(":adr", $adr);
					   $komut->bindParam(":maas", $maas);
					  $komut->execute();
				  $komut=$bag->prepare("SELECT * FROM $tablo");
				  $sonuc=$komut->fetchAll();
				  if(count($sonuc)>0)
				  {
					  goster($sonuc);
				  }
				  	
				  break;
		  }
	  }catch(PDOException $hata)
	  {
		  echo "HATA OLUŞTU: ".$hata->getMessage();
	  }
	  $bag=null;
  }
?>