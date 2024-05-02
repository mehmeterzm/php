<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Başlıksız Belge</title>
	<script src="jquery-3.7.0.min.js"></script>
	<script>
	$(function(){
		$("gonder").click(function(){
			$.ajax({
				type:"POST",
				url: "işlem.php",
				data: $('veri-formu').serialize(),
				success:function(result)
				{
					$('#sonuc').html(result);
				},
				error:function(){
					$("sonuc").html("Hata");
				},
			});
			
		});		
	});
	</script>
</head>

<body>
	<form id="veri-formu" method="post">
		Adres: <input type="text" name="adr" /> </br>
	<input type="button" value="KAYIT ARA" id="gonder"/>
	
	
	</form>
	</br></br>
<div id="sonuc"> </div>
	
</body>
</html>