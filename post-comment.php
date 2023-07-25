<?php
include "db.php";


$captchaSiteKey = '6LfFiEUlAAAAALeMtiGYpBhS5pSlAQ7nk9sSdCtY';
$captchaSecretKey = '6LfFiEUlAAAAAETsLYeS63TxHaMG_slE7CHwni3K';

function curlRequest($url)
{
    $ch = curl_init();
    $getUrl = $url;
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_URL, $getUrl);
    curl_setopt($ch, CURLOPT_TIMEOUT, 80);
    
    $response = curl_exec($ch);
    return $response;
    
    curl_close($ch);
    
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $createGoogleUrl = 'https://www.google.com/recaptcha/api/siteverify?secret='.$captchaSecretKey.'&response='.$_POST['recaptcha'];
    $verifyRecaptcha = curlRequest($createGoogleUrl);
    $decodeGoogleResponse = json_decode($verifyRecaptcha,true);

    if($decodeGoogleResponse['success'] == 1)
    {
    if (!empty($_POST["name"]) && !empty($_POST["comment"]) && !empty($_POST["type"])) {
        
        $vardai_id = mysqli_real_escape_string($connection, $_POST["vardai_id"]);
        $name = mysqli_real_escape_string($connection, $_POST["name"]);
        $email = mysqli_real_escape_string($connection, $_POST["email"]);
        $comment = mysqli_real_escape_string($connection, $_POST["comment"]);
        $type = mysqli_real_escape_string($connection, $_POST["type"]);
        $user_ip = mysqli_real_escape_string($connection, $_SERVER["REMOTE_ADDR"]);

        $query = "INSERT INTO comments (vardai_id,name, comment, type, user_ip) VALUES ($vardai_id,'$name', '$comment', '$type', '$user_ip')";
        $result = $connection->query($query);

        if ($result) {
            echo json_encode(array("status" => "success", "message" => "Your comment has been posted."));
        } else {
            echo json_encode(array("status" => "error", "message" => "Failed to post comment."));
        }
    } else {
        echo json_encode(array("status" => "error", "message" => "All fields are required."));
    }
} else{
    echo json_encode(array("status" => "error", "message" => "reCaptcha Failed.")); 
}
}
?>

