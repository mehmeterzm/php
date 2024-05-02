<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Başlıksız Belge</title>
	<script src="jquery-3.7.0.min.js"></script>
	<script>
		var islem;
		function islemsec(secim)
		{
			document.getElementById("dugme").style.visibility="visible";
			switch(secim)
				{
					case 1: baslik= "Kayıt Ekleme"; break;
						case 2: baslik= "Kayıt Arama"; break;
						case 3: baslik= "Kayıt Güncelleme"; break;
						case 4: baslik= "Kayıt Silme"; break;
				}
			islem=secim;
			document.getElementById("dugme").value=baslik;
		}
		$(function(){
			$("#dugme").click(function(){
				cevap=true;
				if(islem==4)
					{
						cevap=confirm("Kayıt Silinsin mi?");
					}
				if(cevap)
					{
				gönderilen = $('veriler').serialize() + "&islem"+islem;
			  $.ajax({
				  type:"POST",
				  url: "işlemler.php",
				  data:gönderilen,
				  success:function(result){
					  $("#sonuc").html(result);
				  },
				  error:function(){
					   $("#sonuc").html("hata olustu");
				  }
				  
				  
			  });
					}
			});
			
		});
		
	</script>
</head>

<body>
	<h3>İŞLEMLER</h3>
	<input type="radio" name="secenek" onClick="islemsec(1)"/> Kayıt Ekleme
	<input type="radio" name="secenek" onClick="islemsec(2)" style="margin-left:30px"/> Kayıt Arama
	<input type="radio" name="secenek" onClick="islemsec(3)" style="margin-left:30px"/> Kayıt Güncelleme
	<input type="radio" name="secenek" onClick="islemsec(4)" style="margin-left:30px"/> Kayıt Silme
	<br/> <hr/>
	<table>
		<tr><td align="right" valign="top">
			<form id="veriler" method="post">
				NUMARA : <input type="text" name="num" /> <br/>
				AD : <input type="text" name="ad" /> <br/>
				ADRES : <input type="text" name="adr" /> <br/>
				MAAŞ : <input type="text" name="maas" /> <br/>
				<input type="button" value="" id="dugme" style="visibility: hidden;"/>				
			</form>
			</td>
			<td valign="top" id="sonuc">
			
			</td>
		</tr>
	</table>
	
</body>
</html>