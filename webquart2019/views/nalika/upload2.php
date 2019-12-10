<?php
session_start();
require_once '../../controllers/conn.php';

$target_dir = "img/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 0;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["upload"])) {
    $title = $_POST['title'];
    $typ = $_POST['select'];
    $descr = $_POST['Descr'];
    $price = $_POST['Price'];
    $userID = $_SESSION['id'];
    $pic = $_FILES['image']['name'];

    $query = "INSERT INTO property (UserID, Title,Picture,Type,Description) VALUES ('$userID', '$title', '$pic','$typ','$descr')";
    $prep = $conn-> prepare($query);
    
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "<script>alert('File is not an image.')</script>";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "<script>alert('Sorry, file already exists.')</script>";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["image"]["size"] > 500000) {
    echo "<script>alert('Sorry, your file is too large.')</script>";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<script>alert('Sorry, your file was not uploaded.')</script>";
// if everything is ok, try to upload file
} else {
    if($prep->execute() && move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "<script>alert('Upload Successful')</script>";
        header('location:../search_page.php');
        
    } else {
        echo "<script>alert('Sorry, there was an error uploading your file.')</script>";
        header('location:product-list.php');
    }
}
?>