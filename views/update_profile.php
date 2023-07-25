<?php include '../db.php';
$connection->set_charset("utf8");?>
<?php

// Check if the request is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Process form data
  $doctor_id=$_POST['doctor_id'];
  $name = $_POST['name'];
  $gender = $_POST['gender'];
  $professions = explode(',', $_POST['professions']); // Split professions into an array
  $institutionsArray = explode(',', $_POST['institutions']); // Split institutions into an array
  $description = $_POST['description'];
  
  $deleteAccount = isset($_POST['deleteAccount']) && $_POST['deleteAccount'] == 'on';

  for ($i = 1; $i <= 5; $i++) {
    ${"profession_$i"} = !empty($professions[$i - 1]) ? trim($professions[$i - 1]) : NULL;
    ${"institution_$i"} = !empty($institutionsArray[$i - 1]) ? trim($institutionsArray[$i - 1]) : NULL;
  }
  // Prepare and execute the SQL query for inserting or updating the record in doctor_updates
  if ($deleteAccount) {
    // Insert a new record into doctor_updates with the delete request
    $sql = "INSERT INTO doctor_updates (doctor_id, confirmed,delete_request) VALUES ('$doctor_id', 0,1) ON DUPLICATE KEY UPDATE confirmed = 0,delete_request =1";
    $result = mysqli_query($connection, $sql);
  } else {
   
    $sql = "INSERT INTO doctor_updates (doctor_id, name, gender, profession_1, profession_2, profession_3, profession_4, profession_5, hospital_1, hospital_2, hospital_3, hospital_4, hospital_5,description,  confirmed)
    VALUES ('$doctor_id', '$name', '$gender', '$profession_1', '$profession_2', '$profession_3', '$profession_4', '$profession_5', '$institution_1', '$institution_2', '$institution_3', '$institution_4', '$institution_5','$description', 0)
    ON DUPLICATE KEY UPDATE
      name = VALUES(name),
      gender = VALUES(gender),
      profession_1 = VALUES(profession_1),
      profession_2 = VALUES(profession_2),
      profession_3 = VALUES(profession_3),
      profession_4 = VALUES(profession_4),
      profession_5 = VALUES(profession_5),
      hospital_1 = VALUES(hospital_1),
      hospital_2 = VALUES(hospital_2),
      hospital_3 = VALUES(hospital_3),
      hospital_4 = VALUES(hospital_4),
      hospital_5 = VALUES(hospital_5),
      description = VALUES(description),
      
      confirmed = 0";
$result = mysqli_query($connection, $sql);
  }

  // Send a success message or error message
  if ($result) {
    echo json_encode(['success' => true]);
  } else {
    echo json_encode(['success' => false, 'error' => $connection->error]);
  }

  
}
?>
