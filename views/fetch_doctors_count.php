
<?php
require_once "../db.php"; 
$connection->set_charset("utf8");

// $professionFilter = isset($_GET["profession_filter"]) ? json_decode($_GET["profession_filter"], true) : [];
// $instituteFilter = isset($_GET["institute_filter"]) ? json_decode($_GET["institute_filter"], true) : [];


// $professionFilterPlaceholders = implode(',', array_fill(0, count($professionFilter), '?'));
// $instituteFilterPlaceholders = implode(',', array_fill(0, count($instituteFilter), '?'));

$sql = "SELECT COUNT(*) as total FROM doctors WHERE 1";
$professionFilter = isset($_GET["profession_filter"]) ? json_decode($_GET["profession_filter"], true) : [];
$instituteFilter = isset($_GET["institute_filter"]) ? json_decode($_GET["institute_filter"], true) : [];

if (is_array($professionFilter) && count($professionFilter) > 0) {
    $professionFilterPlaceholders = implode(',', array_fill(0, count($professionFilter), '?'));
    $sql .= " AND profession_1 IN ($professionFilterPlaceholders)";
}

if (is_array($instituteFilter) && count($instituteFilter) > 0) {
    $instituteFilterPlaceholders = implode(',', array_fill(0, count($instituteFilter), '?'));
    $sql .= " AND hospital_1 IN ($instituteFilterPlaceholders)";
}


$stmt = mysqli_prepare($connection, $sql);
if (is_array($professionFilter) && is_array($instituteFilter)) {
    $mergedFilters = array_merge($professionFilter, $instituteFilter);
} else {
    $mergedFilters = [];
}
if (!empty($mergedFilters)) {
    $types = str_repeat('s', count($mergedFilters));
    mysqli_stmt_bind_param($stmt, $types, ...$mergedFilters);
}

mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);

header('Content-Type: application/json');
echo json_encode($data);

mysqli_stmt_close($stmt);
mysqli_close($connection);
?>
