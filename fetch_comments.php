<?php
include "db.php";

if(isset($_GET['action'])){
    $vardai_id=$_GET['vardai_id'];    
    
$query = "SELECT id FROM comments WHERE vardai_id=$vardai_id";
$result = $connection->query($query);
$commentcount['total'] = $result->num_rows;
echo json_encode($commentcount);
}else{
$offset = isset($_GET["offset"]) ? intval($_GET["offset"]) : 0;
$limit = isset($_GET["limit"]) ? intval($_GET["limit"]) : 20;
$vardai_id=$_GET['vardai_id'];

$query = "SELECT id, name, comment, type,likes,dislikes,DATE_FORMAT(created_at,'%Y-%m-%d') as date_created FROM comments WHERE vardai_id=$vardai_id ORDER BY id DESC LIMIT $offset, $limit";
$result = $connection->query($query);
$comments = array();

while ($row = $result->fetch_assoc()) {

    $comments[] = $row;
}


echo json_encode($comments);
}
?>