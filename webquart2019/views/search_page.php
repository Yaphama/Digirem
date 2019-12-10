<?php
require("addCustomer_process.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Search Here</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../css/feed.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
  <div class="container">
    <a class="navbar-brand" href="#">
          <img src="../images/logo.jpg" alt="">
        </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

     <div class="container h-100">
      <div class="d-flex justify-content-center h-100">
        <div class="searchbar">
          <input class="search_input" type="text" name="" placeholder="Search...">
          <a href="#" class="search_icon"><i class="fas fa-search"></i></a>
        </div>
      </div>
    </div>   
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Welcome,<?php echo $_SESSION['username']?>
                <span class="sr-only">(current)</span>
              </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="nalika\product-uploaded.php">Go to my Dashboard</a>
        </li>
        <li class="nav-item"><a href="logOut.php">Logout</a></li>
        
      </ul>
    </div>
  </div>
</nav>

  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-left">
        <h1 class="mt-5">Search Results</h1>
        
      </div>
    </div>
  </div>

  <div class="container">
    <div class='row'>

  <!-- Page Heading -->  
<?php 
 

   $query = "SELECT *  FROM property";
   $result = $conn-> query($query);
   while ($row = $result->fetch_assoc()) {
    echo"<div class='col-lg-3 col-md-4 col-sm-6 mb-4'>";
      echo"<div class='card h-100'>";
        echo"<img class='card-img-top'  width='200' height='200' src='img/".$row['Picture']."' alt=''>";
        echo "<div class='card-body'>";
          echo"<h4 class='card-title'>";
            echo $row['Title'];
          echo"</h4>";
          echo"<p class='card-text'>";
          echo "<strong>".$row['Type']."</strong><br/>".$row['Description']."</p>";
          
          $query = "SELECT * FROM user WHERE id=?";
          $prep = $conn-> prepare($query);
          $prep->bind_param("s",$row['UserID']);
          $prep->execute();
          $rr = $prep->get_result();
          $user = $rr->fetch_assoc();

          echo"</br><p><Strong>".$user['FirstName']." ".$user['LastName']."</strong></p>";
          echo"</br><p><strong>".$user['phoneNumber']."</strong></p>";

        echo"</div>
      </div>
      </div>
  ";
   }
?>
  </div>
</div>
  <!--.row -->

</div>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
