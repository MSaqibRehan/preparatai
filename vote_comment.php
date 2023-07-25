<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["comment_id"]) && !empty($_POST["vote_type"])) {
        $comment_id = mysqli_real_escape_string($connection, $_POST["comment_id"]);
        $vote_type = mysqli_real_escape_string($connection, $_POST["vote_type"]);
        $user_ip = mysqli_real_escape_string($connection, $_SERVER["REMOTE_ADDR"]);

        $check_vote_query = "SELECT * FROM comment_votes WHERE comment_id = '$comment_id' AND user_ip = '$user_ip'";
        $check_vote_result = $connection->query($check_vote_query);

        if ($check_vote_result->num_rows > 0) {
            echo json_encode(array("status" => "error", "message" => "You have already voted on this comment."));
        } else {
            $vote_query = "INSERT INTO comment_votes (comment_id, vote_type, user_ip) VALUES ('$comment_id', '$vote_type', '$user_ip')";
            $vote_result = $connection->query($vote_query);

            if ($vote_result) {
                $update_query = $vote_type === "like" ? "UPDATE comments SET likes = likes + 1 WHERE id = '$comment_id'" : "UPDATE comments SET dislikes = dislikes + 1 WHERE id = '$comment_id'";
                $update_result = $connection->query($update_query);

                if ($update_result) {
                    echo json_encode(array("status" => "success", "message" => "Your vote has been recorded."));
                } else {
                    echo json_encode(array("status" => "error", "message" => "Failed to update vote count."));
                }
            } else {
                echo json_encode(array("status" => "error", "message" => "Failed to record vote."));
            }
        }
    } else {
        echo json_encode(array("status" => "error", "message" => "Invalid request."));
    }
}
?>