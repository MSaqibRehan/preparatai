<?php
include '../db.php';
$connection->set_charset("utf8");

function getDoctor($id) {
    global $connection;
    $sql = "SELECT * FROM doctors WHERE id = $id";
    $result = mysqli_query($connection, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function getDoctors() {
    global $connection;
    $sql = "SELECT * FROM doctors";
    $result = mysqli_query($connection, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
function gettotalratings($doctor_id) {
    global $connection;
    $sql = "SELECT COUNT(*) as total FROM ratings WHERE doctor_id = " . $doctor_id;
    $result = mysqli_query($connection, $sql);
    return mysqli_fetch_assoc($result);
}


function getratingsforgraph($doctor_id) {
    global $connection;
    $sql = "SELECT AVG((question1 + question2 + question3 + question4 + question5) / 5) as avg_rating, created_at FROM ratings WHERE doctor_id = " . $doctor_id." ORDER BY created_at DESC LIMIT 10";
    $result = mysqli_query($connection, $sql);
    return $result;
}
function getlastratings($doctor_id) {
    global $connection;
    $sql = "SELECT id,date_created FROM ratings WHERE doctor_id = " . $doctor_id." ORDER BY id DESC LIMIT 1";
    $result = mysqli_query($connection, $sql);
    return mysqli_fetch_assoc($result);
}

function getAverageRatings($doctor_id) {
    global $connection;
    $sql = "SELECT AVG(question1) as question1, AVG(question2) as question2, AVG(question3) as question3, AVG(question4) as question4, AVG(question5) as question5 FROM ratings WHERE doctor_id = " . $doctor_id;
    $result = mysqli_query($connection, $sql);
    return mysqli_fetch_assoc($result);
}

function hasUserRatedDoctor($doctor_id) {
    global $connection;
    $user_ip =  $_SERVER["REMOTE_ADDR"];
    $sql = "SELECT * FROM ratings WHERE doctor_id = " . $doctor_id . " AND user_ip = '" . $user_ip . "'";
    $result = mysqli_query($connection, $sql);
    return mysqli_num_rows($result) > 0;
}
function submitRating($doctor_id, $name, $email, $review_message, $question1, $question2, $question3, $question4, $question5) {
    global $connection;
    $user_ip =  $_SERVER["REMOTE_ADDR"];

    $sql = "INSERT INTO ratings (doctor_id, user_email, question1, question2, question3, question4, question5, review_message, user_ip) VALUES ($doctor_id, '$email', $question1, $question2, $question3, $question4, $question5, '$review_message', '$user_ip')";

if (mysqli_query($connection, $sql)) {
    return true;
} else {
    return false;
}

}

?>
