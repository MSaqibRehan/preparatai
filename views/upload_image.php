<?php include '../db.php';
$connection->set_charset("utf8");?>
<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming the user is logged in and the id is stored in a session
    
    $doctor_id = $_POST['doctor_id'];

    // Process the image
    $image = $_FILES['image'];
    $imageName = $image['name'];
    $imageTmpName = $image['tmp_name'];
    $imageSize = $image['size'];

    $imageExt = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
    $allowed = array('jpg', 'jpeg', 'png', 'gif');

    if (in_array($imageExt, $allowed)) {
        if ($imageSize < 5000000) { // Limit image size to 5MB
            $newImageName = uniqid('', true) . "." . $imageExt;
            $imageDestination = '../images/' . $newImageName;

            if (move_uploaded_file($imageTmpName, $imageDestination)) {
                // Save the image to the database
                $sql = " INSERT INTO doctor_updates (doctor_id,profile_img) VALUES ('$doctor_id', '$newImageName')
                ON DUPLICATE KEY UPDATE
                profile_img = VALUES(profile_img)";
                $result = mysqli_query($connection, $sql);

                if ($result) {
                    echo json_encode(['success' => true]);
                } else {
                    echo json_encode(['success' => false, 'error' => mysqli_error($connection)]);
                }
            } else {
                echo json_encode(['success' => false, 'error' => 'Failed to move the uploaded file.']);
            }
        } else {
            echo json_encode(['success' => false, 'error' => 'File size exceeds the limit.']);
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'Invalid file type.']);
    }
}
?>
