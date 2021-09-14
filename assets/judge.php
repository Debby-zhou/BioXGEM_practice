<?php
	//read the file and save it as a string $record here
	$record = file_get_contents("assets/record.txt");
	//
	
	$gene = false;
	//we assume that there is no such gene amoung the cattles

	$cattles = explode("\n", $record);
	//Since each piece of record is separated by a "\n",
	//$cattles saves each piece of record separately by
	//distinguishing "\n".
	
	foreach($cattles as $status)
	{
	//$status is the phenotype of each cattle
	//foreach() judges a piece of record at a time

		if($status=="flipped ear")
		{// FIRST IF: which condition would make us believe the cattles might be the carriers?
			$gene = !$gene;
			//the condition demonstrates their mother should've been at least a carrier.
			//Thus, we now turn the "false" $gene carrier into "not false", "true"  $gene carrier.
		}
		if( $status=="flipped ear" || $status == "end")
			break;
		//SECOND IF: when one of the conditions happens, we would like to end the judging process
		//and directly tell the answer.
		//(1) we've known there is a cattle with the phenotype
		//(2) we've reached to the end of the file --- written already
		
	}	
	
	//differentiate the condition and echo TRUE or FALSE
	//if($gene){}
	if($gene==true){
		$result = "TRUE";
	}else{
		$result = "False"; 
	}

?>
