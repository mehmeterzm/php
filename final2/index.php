<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Başlıksız Belge</title>
	<script>
		function islemsecenek()
		{
			islem=document.getElementsByName("islem")[0].value;
			document.getElementsByName("gonder")[0].value= islem;
			
		}
		var OncekiSatir=-1;
		function kayitAl(satir)
		{
			islem=document.getElementsByName("islem").[0].value;
			if(islem=="KAYIT GÜNCELLE" || islem=="KAYIT SİL")
			{
			if(OncekiSatir!=-1)
				{
					document.getElementById("s"+OncekiSatir).style.backgroundColor="";
				}
			document.getElementById("s"+satir).style.backgroundColor="yellow";
			OncekiSatir= satir;
			num=document.getElementById("h"+satir+"-0").innerHTML;
			document.getElementsByName("num")[0].value=num;
			ad=document.getElementById("h"+satir+"-1").innerHTML;
			document.getElementsByName("ad")[0].value=nad;
			adr=document.getElementById("h"+satir+"-2").innerHTML;
			document.getElementsByName("adr")[0].value=adr;
			maas=document.getElementById("h"+satir+"-3").innerHTML;
			document.getElementsByName("maas")[0].value=maas;
				document.getElementsByName("numD")[0].value=maas;
			}
		}
		function kontrol()
		{
			islem= document.getElementsByName("islem")[0].value;
			if(islem=="KAYIT SİL")
				{
					cevap = confirm("kayıt silinsin mi?");
					return cevap;
				}else
					return true;
		}
	</script>
	<?php include "fonks.php" ; ?>
</head>

<body>
	<h2>KAYIT İŞLEMLERİ</h2>
	<table style="border: 1px solid; width: 100%">
	    <tr>
		  <td style="text-align: right; width: 17%">
			<form action="index.php" method="post" onSubmit="return konrol()">
				işlem:<select size="1" name="islem" onChange="islemsecenek()">
				<option hidden>işlem seçiniz</option>
				<option>KAYIT LİSTELE</option>
				<option>KAYIT ARA</option>
				<option>KAYIT EKLE</option>
				<option>KAYIT GÜNCELLE</option>
				<option>KAYIT SİL</option>
				</select>
				<br/>
				<span id="uyarİG"></span><br/>
				<input type="submit" value="Kayıt Listele" name="gonder"/><br/><br/>
				Numara: <input type="text" name="num"/> <br/>
				Ad: <input type="text" name="ad"/> <br/>
				Adres: <input type="text" name="adr"/> <br/>
				Maaş: <input type="text" name="maas"/> <br/>
				<input type="text" name="numD" hidden />			
			  </form>
		  </td>
		  <td id="sonuc">
			  <?php
			
			 
				   $islem="";
			  if(!empty($_POST["islem"]));
			  $islem=$_POST["islem"];
				  
				  $numara="0";
				  if(!empty($_POST["num"]));
			      $num=$_POST["num"];
				  
				  $ad="";
				  if(!empty($_POST["ad"]));
			      $ad=$_POST["ad"];
				  
				  $adr="";
				  if(!empty($_POST["adr"]));
			      $adr=$_POST["adr"];
				  
				  $maas="0";
				  if(!empty($_POST["maas"]));
			      $maas=$_POST["maas"];
				  
				  $numD="0";
				  if(!empty($_POST["numD"]));
			      $numD=$_POST["numD"];
				  
				  $aK[0]= $num; $aK[1]= $ad;
				  $aK[2]= $adr; $aK[3]= $maas;
				  switch($islem)
				  {
					  case "KAYIT ARA":
						  if($ad=="") $aK[1]="%"; if($adr=="") $aK[2]="%"; break;
					  case "KAYIT EKLE":
						  ekle($aK); break;
					  case "KAYIT GÜNCELLE":
						  guncelle($numD,$aK); break;	
					  case "KAYIT SİL":
						  sil($numD); break;
						  
						  
				  }
				  listele($islem,$aK);	
				  
			 
			  ?>
			  
		  </td>
			
		</tr>
	
	</table>
</body>
</html>