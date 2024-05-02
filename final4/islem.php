<?php
if($_POST)
{
	$s1=0;
	if(!empty($_POST["s1"]))
		$s1=$_POST["s1"];
	$s2=0;
	if(!empty($_POST["s2"]))
		$s2=$_POST["s2"];
	$islem=0;
	if(!empty($_POST["islem"]))
		$islem=$_POST["islem"];
	switch($islem)
	{
		case "Toplama": $sonuc=$s1+$s2; break;
			case "Çıkarma": $sonuc=$s1-$s2; break;
			case "Çarpma": $sonuc=$s1*$s2; break;
			case "Bölme": $sonuc=$s1/$s2; break;
			
	}
	echo "sonuc: ".$sonuc;
		
}
?>