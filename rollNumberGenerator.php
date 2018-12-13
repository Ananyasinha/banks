<?php
	// Roll Number Generator Through Function
	$rollNo = rollNoGenerator(99887);
    echo $rollNo;

	function rollNoGenerator($insertId){
		$numLength = strlen((string)$insertId);
		$zerosReq = 7 - $numLength;
	    $zeros = 0;
		
		for ($i=0; $i < $zerosReq - 1; $i++) { 
			$zeros = $zeros.'0';
		}

		if($insertId <= 9999999) {
			$rollNo = "IDMAC".$zeros.$insertId;
		}else {
			$rollNo = "IDMAC".$insertId;
		}
	    
	    return $rollNo;
	}


	// Direct Roll Number Generator
	$insertId = 99887;
	$numLength = strlen((string)$insertId);
	$zerosReq = 7 - $numLength;
    $zeros = 0;
	
	for ($i=0; $i < $zerosReq - 1; $i++) { 
		$zeros = $zeros.'0';
	}

	if($insertId <= 9999999) {
		$rollNo = "IDMAC".$zeros.$insertId;
	}else {
		$rollNo = "IDMAC".$insertId;
	}
    
    echo $rollNo;
?>