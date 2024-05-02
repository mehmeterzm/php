<?php session_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Başlıksız Belge</title>
</head>

<?php
	 
	if(isset($_SESSION["zr"]))
	{
		$zr= $_SESSION["zr"];
		echo "<body bgcolor='".$zr."'>";
	}
	else 
		echo "<body>";
	?>
	<br/>
	SENİ  ÇOOOOOK SEVİYORUM ULAAAAN 0,0<br/><br/><br/>
	<a href="sayfa1.php">sayfa1</a>
	
</body>


</html>