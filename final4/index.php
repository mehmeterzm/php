<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Başlıksız Belge</title>
	<!--<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>-->
	<script src="jquery-3.7.0.min.js"></script>
	<script>
	$(function()/* ajax kısmı */
	 {
		$("#hesapla").click(function(){
			var s1=document.getElementById("s1").value;
			var s2=document.getElementById("s2").value;
			var islem=document.getElementById("islem").value;
			$.ajax({
				type: "POST",
				url: 'islem.php',
				data: {s1,s2,islem},
				success: function (result)
				{
					document.getElementById("sonuc").innerHTML = result;
					//$("#sonuc").html(result);
				},
				
				
				
			}
			);
		});
	});
	</script>
</head>

<body>
	<h2>DÖRT İŞLEM</h2>
	işlemler:<select id="islem" size="1">
	<option>Toplama</option>
	<option>Çıkarma</option>
	<option>Çarpma</option>
	<option>Bölme</option>
	</select>
	</br>
	1. Sayı: <input type="text" id="s1" /> </br>
    2. Sayı: <input type="text" id="s2" /> </br>
<input type="button" id="hesapla" value="HESAPLA" />
</br></br>
<span id="sonuc"></span>

</body>
</html>