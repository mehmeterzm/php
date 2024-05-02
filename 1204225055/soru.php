<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Başlıksız Belge</title>
</head>


<body>
	<?php
	if(empty($_POST["gonder"]))
	{
		
	?>
	<form action="soru.php" method="post">
		Numara: <input type="text" name = "num"/><br/>
         Ad: <input type="text" name="ad"/><br/>
		
		Adres: <select name="adres" size="1">
	      <option hidden>SEÇİNİZ</option>
		<option>TÜMÜ</option>
		        <option>TEKİRDAĞ</option>
		<option>İSTANBUL</option>
		<option>EDİRNE</option></select>
		Bolum: <select name="bol" size="1">
	      <option hidden>SEÇİNİZ</option>
		<option>Bilgisayar</option>
		        <option>Elektrik</option>
		<option>Makine</option>
		<option>Otomotiv</option>
		
		<input type="submit" value="LİSTELE" name="gonder" /><br/>	
		</select>
		<?php
	}
	else
	{
		?>
		<form action="soru.php" method="post">
		
		
		Adres: <select name="adres" size="1">
	      <option hidden>SEÇİNİZ</option>
		<option>TÜMÜ</option>
		        <option>TEKİRDAĞ</option>
		<option>İSTANBUL</option>
		<option>EDİRNE</option></select>
		
		
		<input type="submit" value="LİSTELE" name="gonder" /><br/>	
		</select>
			<?php
		
		
		if(isset($_POST["num"])) $numara = $_POST["num"];
         if(isset($_POST["ad"])) $ad = $_POST["ad"];
	
	$Adres[0]="";
	for($i=1;$i<=4;$i++)
	{
		if(isset($_POST["adres".$i]))
			array_push($Adres,$_POST["adres".$i]);
			
	}
		$Bolum[0]="";
	for($i=1;$i<=4;$i++)
	{
		if(isset($_POST["bol".$i]))
			array_push($Bolum,$_POST["bol".$i]);
			
	}
		$tablo = "<table border = '1'><tr><th>Numara</th>";
        $tablo.="<td>".$numara."</td></tr>";
        $tablo.="<tr><th>Ad</th><td>".$ad."</td></tr>";
		$tablo.="<tr><th>Adres</th><td>".$Adres."</td></tr>";
        $tablo.="<tr><th>Bölüm</th><td>".$Bolum."</td></tr>";

		echo $tablo;
	
	}
		?>
	
	
</body>
</html>