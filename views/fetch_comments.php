<?php
include "db.php";

$offset = isset($_GET["offset"]) ? intval($_GET["offset"]) : 0;
$limit = isset($_GET["limit"]) ? intval($_GET["limit"]) : 20;
$vardai_id=$_GET['vardai_id'];

$query = "SELECT id, name, comment, type, created_at FROM comments WHERE vardai_id=$vardai_id ORDER BY id DESC LIMIT $offset, $limit";
$result = $connection->query($query);
$comments = array();

while ($row = $result->fetch_assoc()) {
    $comments[] = $row;
}


echo json_encode($comments);
?>