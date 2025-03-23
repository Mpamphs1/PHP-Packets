<?php
	echo "<link rel='stylesheet' href='Assets/index_php.css'>";
	$plirofories = [
		"Μήκος Επικεφαλίδας",
		"Συνολικό μήκος",
		"Μήκος Δεδομένων",
		"Αναγνώριση",
		"DF",
		"MF",
		"Σχετική Θέση Τμήματος (ΣΘΤ/ΔΕΤ)"
	];

	$data =[
	
	];
	
	$paketo = $_POST["paketo"];
	$net = $_POST["net"];
	$ihl = $_POST["ihl"];
	$ana = $_POST["ana"];

	$Payload_leght = (int)(($net - $ihl * 4) / 8) ;

	//echo $Payload_leght, "<br>" ;

	$n = 8 * $Payload_leght;

	//echo $n;

	$paketa =(int)($paketo / $n);
	$periseui = $paketo % $n;
	
	if ($periseui != 0){
		$sunolika = $paketa + 1;
	}
	else{
		$sunolika = $paketa;
	}
	//echo "<br>", $paketa,"<br>";
	//echo "<br>",$periseui,"<br>";

	for ($j = 0;$j < $sunolika; $j++){
		$Fragment_offset = $j * $Payload_leght ;
		if($j+1 == $sunolika){
			$data[$j] = [$ihl *4, $n+($ihl *4),$n, $ana, 0,0, $Fragment_offset];
		}
		else{
			$data[$j] = [$ihl *4, $n+($ihl *4),$n, $ana, 0,1, $Fragment_offset];
		}
		
	}
	
	print_r ($data);
	//$Fragment_offset = $n * $Payload_leght 

	echo "<table border='1' width='100%' style='text-align: center;'>";

	echo "<tr class='kati'>";
	for ($i = 1; $i <= $paketa; $i++) {
		echo "<th>$i</th>";
	}
	echo "</tr>";

	for ($j = 0; $j < 7; $j++) {
		echo "<tr>";
		for ($i = 0; $i < $sunolika; $i++) {
			echo "<td class='kati'>{$plirofories[$j]}: {$data[$i][$j]}</td>";
		}
		echo "</tr>";
	}

	echo "</table>";
	
?>

