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
		[100, 500,100],
		[900,100,430]
	];
	
	$paketo = $_POST["paketo"];
	$net = $_POST["net"];
	$ihl = $_POST["ihl"];

	$Payload_leght = (int)(($net - $ihl * 4) / 8) ;

	//echo $Payload_leght, "<br>" ;

	$n = 8 * $Payload_leght;

	//echo $n;

	$paketa =(int)($paketo / $n) ;
	$periseui = $paketo % $n;
	
	//echo "<br>", $paketa,"<br>";
	//echo "<br>",$periseui,"<br>";

	
	for ($i = 0;$i < $paketa -1 ;$i++){
		echo $i,". Πακέτο θα είναι: ", $n, "<br>";
		array_push($data,$i, $n);
	}

	echo $paketa,". Πακέτο θα είναι: ", $periseui,"<br>";
	print_r ($data);
	//$Fragment_offset = 

	echo "<table border='1' width='100%' style='text-align: center;'>";

	echo "<tr class='kati'>";
	for ($i = 1; $i <= $paketa; $i++) {
		echo "<th>$i</th>";
	}
	echo "</tr>";

	for ($j = 0; $j < 7; $j++) {
		echo "<tr>";
		for ($i = 0; $i < $paketa; $i++) {
			echo "<td class='kati'>{$plirofories[$j]}: {$data[$i][$j]}</td>";
		}
		echo "</tr>";
	}

	echo "</table>";
	
?>

