<?php include '../db.php';
$connection->set_charset("utf8");?>
<?php



$sql = "SELECT DISTINCT hospital_1 FROM doctors";
$result = mysqli_query($connection, $sql);

$professions = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $professions[] = $row["hospital_1"];
    }
}

header('Content-Type: application/json');
echo json_encode($professions);

mysqli_close($connection);
?>
