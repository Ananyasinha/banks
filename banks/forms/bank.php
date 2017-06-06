<?php 
$conn = new MySqli("localhost","root","","banks");


if(count($_GET) == 1){
	
	$bank_name = $_GET['bank_name'];
	// echo $bank_branch;

	$select_banks = "SELECT * FROM bank_details WHERE  (bank_name LIKE '$bank_name%') LIMIT 500";
	$selected = $conn->query($select_banks);
	
	while($row = $selected->fetch_assoc()){
		$bank_id = $row['bank_id'];
		$bank_name = $row['bank_name'];
		$bank_ifsc = $row['bank_ifsc'];
		$bank_branch = $row['bank_branch'];
		$bank_address = $row['bank_address'];
		
		echo $bank_id.'<br>'.$bank_name.'<br>'.$bank_ifsc.'<br>'.$bank_branch.'<br>'.$bank_address.'<br><br><br>';
	}

}


if(count($_GET) == 2){
	
	$bank_branch = $_GET['bank_branch'];
	$bank_name = $_GET['bank_name'];
	// echo $bank_branch;

	$select_banks = "SELECT * FROM bank_details WHERE (bank_branch LIKE '$bank_branch%') AND (bank_name LIKE '$bank_name%') LIMIT 100";
	$selected = $conn->query($select_banks);
	
	while($row = $selected->fetch_assoc()){
		$bank_id = $row['bank_id'];
		$bank_name = $row['bank_name'];
		$bank_ifsc = $row['bank_ifsc'];
		$bank_branch = $row['bank_branch'];
		$bank_address = $row['bank_address'];
		
		echo $bank_id.'<br>'.$bank_name.'<br>'.$bank_ifsc.'<br>'.$bank_branch.'<br>'.$bank_address.'<br><br><br>';
	}

}

?>