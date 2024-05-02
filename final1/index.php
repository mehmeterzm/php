<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Başlıksız Belge</title>
	<script>
          function degistir()
		{
			islem = document.getElementsByName("islem")[0].value;
			document.getElementsByName("gonder")[0].value = islem;
			if(islem=="Kayıt Listeleme")
				document.getElementById("degerler").style.visibility= "hidden";
			else
				document.getElementById("degerler").style.visibility= "visible";
		}
	</script>
</head>

<body>
	<h2>KAYIT İŞLEMLERİ</h2>
	<table>
	<tr> 
	    <td align="right">
		<form action="index.php" method="post">
			işlemler: <select name="islem" size:"1" onChange="degistir()">
			<option hidden="hidden">işlem seçiniz: </option>
			<option  >Kayıt Listeleme</option>
			<option >Kayıt Arama</option>
			<option >Kayıt Ekleme</option>
			<option >Kayıt Güncelleme</option>
			<option >Kayıt Silme</option>
			<br/>
			</select>
			<input type="submit" value="Kayıt Listeleme" name="gonder" />
			<div id="degerler" style="visibility: hidden">
				numara: <input type="text" name="num" /> <br/>
				ad: <input type="text" name="ad" /> <br/>
				adres: <input type="text" name="adr" /> <br/>
				maaş: <input type="text" name="maas" /> <br/>
			
			</div>
			</form>	
		</td>
		<td valign="top" id="sonuc">
			<table border="1" cellspacing="1"><tr>
				<th>NUMARA</th><th>AD</th><th>ADRES</th><th>MAAŞ</th></tr>
			</table>
			
			
		</td>
	</tr>
	</table>
</body>
</html>
<?php
include "fonksiyonlar.php";
			if(isset($_POST["gonder"]))
			{
				$islem= "";
				if(!empty($_POST["islem"]))
					$islem = $_POST["islem"];
				
				try
				{
					$bag = baglan();
				switch($islem)
				{
					    case "Kayıt Listeleme":
						    listele($bag);
						break;
						case "Kayıt Arama":
						 $numara="0"; $isim="%"; $adres="%"; $maas="0";
						if(!empty($_POST["num"]))
							$numara=$_POST["num"];
						if(!empty($_POST["ad"]))
							$isim=$_POST["ad"];
						if(!empty($_POST["adr"]))
							$adres=$_POST["adr"];
						if(!empty($_POST["maas"]))
							$maas=$_POST["maas"];
						arama($numara,$ad,$adres,$maas,$bag);
						break;
						case "Kayıt Ekleme":
						
						break;
						case "Kayıt Güncelleme":
						
						break;
						case "Kayıt Silme":
						
						break;
				}
				}
				catch(PDOException $hata)
				{
					
				}
			}
		
            ?>