<?php

include 'config.php';

// //Handle image upload
// $targetFile = $_FILES['picture']['name'];
// $targetDir = "upload/".$targetFile;
// $upload = 1;
// $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

$name = $_POST["name"];
$age = $_POST["age"];
$qual = $_POST["qual"];

// // Check if the file is an image
// $check = getimagesize($_FILES["picture"]["tmp_name"]);
// if ($check === false) {
//     echo "File is not an image.";
//     $upload = 0;
// }

// //Check file size
// if ($_FILES["picture"]["size"] > 50000) {
//     echo "Sorry, your file is too large.";
//     $upload = 0;
// }

// // Allow only certain file formats
// $allowedFormats = array("jpg", "jpeg", "png", "gif");
// if (!in_array($imageFileType, $allowedFormats)) {
//     echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
//     $upload = 0;
// }

// // Check if $uploadOk is set to 0 by an error
// if ($upload == 0) {
//     echo "Sorry, your file was not uploaded.";
// // If everything is ok, try to upload file and insert data into the database
// } else {
//     if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
//         // Insert data into the database
//         $sql = "INSERT INTO people (name, age, qualification, profile_picture) VALUES ('$name', $age, '$qualification', '$target_file')";

//         if ($conn->query($sql) === TRUE) {
//             echo "Data uploaded successfully.";
//         } else {
//             echo "Error: " . $sql . "<br>" . $conn->error;
//         }
//     } else {
//         echo "Sorry, there was an error uploading your file.";
//     }
// }

$sql = "INSERT INTO staff_info (name, age, qualification) VALUES ('$name', $age, '$qual')";

if($conn->query($sql) === TRUE) {
    echo "Staff information successfully inserted";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>