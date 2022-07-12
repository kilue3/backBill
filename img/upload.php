<?php
//Upload folder
$target_dir = "upload/";
$target_file = $target_dir . basename($_FILES["myFile"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
  $check = getimagesize($_FILES["myFile"]["tmp_name"]);
  if($check !== false) {
  //Move File To Uploads Folder
    if (move_uploaded_file($_FILES["myFile"]["tmp_name"], $target_file)) {
    echo "The file ". basename( $_FILES["myFile"]["name"]). " has been uploaded.";
    } else {
    echo "Sorry, there was an error uploading your file.";
    }
    
  } else {
    echo "File is not an image.";
    
  }
?>
้<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<a href="../img/upload/history.png">กด</a>
</head>
<body>
    
</body>
</html>