<?php

include '../db.php';

$connection->set_charset("utf8");
$offset = isset($_GET['offset']) ? intval($_GET['offset']) : 0;

$profession_filter = isset($_GET['profession_filter']) ? json_decode($_GET['profession_filter']) : [];
$institute_filter = isset($_GET['institute_filter']) ? json_decode($_GET['institute_filter']) : [];

$where = [];

if (count($profession_filter) > 0) {
    $professions = "'" . implode("', '", $profession_filter) . "'";
    $where[] = "profession_1 IN ($professions)";
}

if (count($institute_filter) > 0) {
    $institutes = "'" . implode("', '", $institute_filter) . "'";
    $where[] = "hospital_1 IN ($institutes)";
}

$where_sql = count($where) > 0 ? 'WHERE ' . implode(' AND ', $where) : '';

// $sql = "SELECT * FROM doctors $where_sql LIMIT 15 OFFSET $offset";
$sql = "SELECT doctors.id as did, doctors.*, ratings.*, COUNT(ratings.id) as ratings_count FROM doctors 
        LEFT JOIN ratings ON doctors.id = ratings.doctor_id
        $where_sql
        GROUP BY doctors.id, ratings.id
        LIMIT 15 OFFSET $offset";
$result = mysqli_query($connection, $sql);

$doctors = [];

while ($row = mysqli_fetch_assoc($result)) {
    $doctors[] = $row;
}

mysqli_close($connection);

header('Content-Type: application/json');
echo json_encode($doctors);

?>
