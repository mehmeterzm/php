<?php
if(!empty($_POST["adr"]))
{
	$adres= $_POST["adr"];
	$sorgu="SELECT * FROM KAYIT WHERE ADRES= :adr";
}else $sorgu ="SELECT * FROM KAYIT";
	try
	{
		$server="localhost"; $user="030623vt"; $sifre="123"; $db="030623vt";
		$bag= new PDO("msql:host=$server;dbname=$db;charset=utf8",$user,$sifre);
		$komut=$bag->prepare($sorgu);
		if(!empty($_POST["adr"]))
		$komut->bindParam(":adr",$adres);
		$komut->execute();
		$kayitlar->$komut->fetchAll();
		
		if(count($kayitlar)-0)
		{
			echo "<table border='1'><tr><th>NUMARA</th><th>AD</th><th>ADRES</th><th>MAAŞ</th></tr>";
			foreach($kayitlar as $kayit)
			{
				echo "<tr><td>".$kayit["NUMARA"]."</td>
					<td>".$kayit["AD"]."</td>
					<td>".$kayit["ADRES"]."</td>
					<td>".$kayit["MAAŞ"]."</td></tr>";
			}
			echo "</table>"; 
		}
		else echo "kayıt bulunamadı";
	}
	catch(PDOException $hata)
	{
		echo "HATA: ".$hata->getMessage();
	}
	$bag=null;

?>