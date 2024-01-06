<?php

include 'config.php';

$conn = new mysqli($servername, $username, $password, $database);

if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// //Handle image upload
// $targetDir = "./images/";
// $targetFile = $targetDir . $name . "." . pathinfo($_FILES["pfp"]["name"], PATHINFO_EXTENSION);
// $upload = 1;
// $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));



// //Check if file is already exists
// if (file_exists($targetFile)) {
//     echo "Sorry, file already exists.";
//     $upload = 0;
// }

// //Check file size
// if ($_FILES["pfp"]["size"] > 50000) {
//     echo "Sorry, your file is too large.";
//     $upload = 0;
// }



// //Check if any error occured
// if ($upload == 0) {
//     echo "Sorry, your file is not uploaded.";
// } else {
//     //Upload file
//     if (move_uploaded_file($_FILES["pfp"]["tmp_name"], $targetFile)) {
//         $pfpFileName = $name . "." . $imageFileType;
//         $sql = "INSERT INTO staff_info (name, age, qualification, pfp) VALUES ($name, $age, $qual, $pfpFileName)";

//         if ($conn->query($sql) === TRUE) {
//             echo "Data stored successfully";
//         } else {
//             echo "ERROR: " . $sql . "<br>" . $conn->error;
//         }
//     } else {
//         echo "Sorry, there was an error uploading your file.";
//     }
// }

$name = $_POST["name"];
$age = $_POST["age"];
$qual = $_POST["qual"];

$sql = "INSERT INTO staff_info (name, age, qualification) VALUES ('$name', $age, '$qual')";

if($conn->query($sql) === TRUE) {
    echo "Staff information successfully inserted";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
