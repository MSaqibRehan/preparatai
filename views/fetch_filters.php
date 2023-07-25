<?php

include '../db.php';

$connection->set_charset("utf8");
$data = [
    'professions' => [],
    'institutes' => []
];

$result = mysqli_query($connection, "SELECT DISTINCT profession_1 FROM doctors");

while ($row = mysqli_fetch_assoc($result)) {
    $data['professions'][] = $row['profession_1'];
}

$result = mysqli_query($connection, "SELECT DISTINCT hospital_1 FROM doctors");

while ($row = mysqli_fetch_assoc($result)) {
    $data['institutes'][] = $row['hospital_1'];
}

// print_r($data);
mysqli_close($connection);
// array_walk_recursive($data, function (&$value, $key) {
//     if (is_string($value)) {
//         $value = utf8_encode($value);
//     }
// });
header('Content-Type: application/json');
echo json_encode($data);

?>
