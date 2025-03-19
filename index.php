<?php
	$data =[];

	$paketo = $_POST["paketo"];
	$net = $_POST["net"];
	$ihl = $_POST["ihl"];

	$Payload_leght = (int)(($net - $ihl * 4) / 8) ;

	echo $Payload_leght, "<br>" ;

	$n = 8 * $Payload_leght;

	echo $n;

	$paketa =(int)($paketo / $n) ;
	$periseui = $paketo % $n;
	
	echo "<br>", $paketa,"<br>";
	echo "<br>",$periseui,"<br>";

	if ($periseui != 0 ){
		$paketa += 1;
	}

	for ($i = 0;$i < $paketa -1 ;$i++){
		echo $i,". Πακέτο θα είναι: ", $n, "<br>";
		array_push($data,(int)($i), $n);
	}

	echo $paketa,". Πακέτο θα είναι: ", $periseui-20,"<br>";
	print_r ($data);
	//$Fragment_offset = 

	echo "<br>";
	echo "<a href='main.html'>Πάνε πίσω</a>";
?>