<?php

require_once "db.php";
require_once "classes/seoController.php";

$query = mysqli_query($connection, "SELECT * FROM vardai LIMIT 49000"); 

$seo = new seoNames();

while($data = mysqli_fetch_array($query)) {

	 //$words = count(explode(" ", $data['istrauka']));
$bytes = openssl_random_pseudo_bytes(32);
$uhash = bin2hex($bytes);
	// mysqli_query($db, "UPDATE rastodarbai SET download_hash = '".$uhash."' WHERE id = '".$data['id']."'");
	 //mysqli_query($db, "UPDATE rastodarbai SET words = '".$words."' WHERE id = '".$data['id']."'");
	mysqli_query($connection, "UPDATE vardai SET rewrite = '".$seo->urlTitle($data['vardas'].' '.$data['pak_aprasymas'].' '.$data['farmacine_forma'])."' WHERE id = '".$data['id']."'");
	echo $seo->urlTitle($data['vardas']." ".$data['farmacine_forma'])." - ".$words."<br />";
}
?>