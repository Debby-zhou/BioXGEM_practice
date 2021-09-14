<?php

	echo "\n\n---------bingo chart----------\n";
	//line 5 ~ 8: declaration of an empty 2D array
	$bingo = array();
	
	for($i = 0; $i < 5; $i++)
		$bingo[] = array();



	for($i = 1; $i <= 25; $i++)
	{//looping based on the size of the bingo chart
		do{
			$row = rand(0, 4);
			$col = rand(0, 4);
		}while(isset($bingo[$row][$col]));
		//if the position has been filled with number already,
		//keep generating a new pair of random coordination
		//thus, by line 22, we'll receive a coordination with no
		//number recorded inside.

		$bingo[$row][$col] = $i;
	}

	//use for() loops and 
	//str_pad() to specify the length of each echoed number
	
	$result = array();
	for($i=0;$i<count($bingo);$i++){
		for($j=0;$j<count($bingo[$i]);$j++){
			$result[$i] .= str_pad((string)$bingo[$i][$j],3," ",STR_PAD_RIGHT);
		}
	}
	foreach($result as $v){
		echo str_pad($v,30," ",STR_PAD_BOTH)."\n";
	}


?>