<?php

require_once "functions.php";

header("Content-Type: application/json");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $doctor_id = intval($_POST["doctor_id"]);
    $name = $_POST["ciname"];
    $email = $_POST["ciemail"];
    $review_message = $_POST["cireview"];
    $question1 = intval($_POST["question1"]);
    $question2 = intval($_POST["question2"]);
    $question3 = intval($_POST["question3"]);
    $question4 = intval($_POST["question4"]);
    $question5 = intval($_POST["question5"]);

    if (hasUserRatedDoctor($doctor_id)) {
        echo json_encode(["status" => "error", "message" => "You have already rated this doctor."]);
    } else {
        if (submitRating($doctor_id, $name, $email, $review_message, $question1, $question2, $question3, $question4, $question5)) {
            echo json_encode(["status" => "success"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Could not submit rating."]);
        }
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
}
?>
