<?php
  // Create database connection
session_start();
  require_once '../../controllers/conn.php';

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
    $target = "img/".basename($_FILES['image']['name']);

    $pic = $_FILES['image']['name'];
    $title = $_POST['title'];
    $typ = $_POST['select'];
    $descr = $_POST['Descr'];
    $price = $_POST['Price'];
    $userID = $_SESSION['id'];
    echo $title, $typ,$descr,$userID;

    $query = "INSERT INTO property (UserID, Title,Picture,Type,Description) VALUES ('$userID', '$title', '$pic','$typ','$descr')";
    $prep = $conn-> prepare($query);
    //print_r(gettype($prep))
    
    if($prep->execute()){
      echo "progress";
      if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
        echo "<script>alert('Property Successfully added to the market')</script>";
      }else{
        $errors['db_error'] = "Database Error".$conn->error;
        print_r($errors);
      }
  }
}

?>