<?php session_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Başlıksız Belge</title>
</head>
<?php
	$zr="white";
	if(isset($_GET["kaydet"]))
	{
		if(isset($_GET["zr"]))
		{ 
			$zr = $_GET["zr"];
			$_SESSION["zr"]= $zr;
		}
	}
	if(isset($_SESSION["zr"]))
	{
		$zr= $_SESSION["zr"];
		echo "<body bgcolor='".$zr."'>";
	}
	else 
		echo "<body>";
	?>
	<form action="sayfa1.php" method="get">
	zemin rengi: <select name="zr" size="1">
		<option value="red">kırmızı</option>
		<option value="lightblue">mavi</option>
		<option value="black">siyah</option>
		</select>
		<input type="submit" name="kaydet" value="KAYDET" />
	
	</form>
	<br/><br/><br/>
	<a href="sayfa2.php">sayfa2</a>

</body>
</html>