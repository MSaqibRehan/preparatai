<?php
require_once "db.php";		

	$keyword = strval($_POST['query']);
	$search_param = "{$keyword}%";

	$sql = $connection->prepare("SELECT DISTINCT vardas FROM vardai WHERE vardas LIKE ?");
	$sql->bind_param("s",$search_param);			
	$sql->execute();
	$result = $sql->get_result();
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		$countryResult[] = $row["vardas"];
		}
		echo json_encode($countryResult);
	}
?>