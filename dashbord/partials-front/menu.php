<?php include('../config/db_connection.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>PawsitiveMatch</title>
</head>
<body>
    
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid text-color"> <!-- Added d-flex class here -->
    <a class="navbar-brand" href="#"><img src="../images/logo.png" /> </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end " id="navbarNavDropdown">
      <ul class="navbar-nav text-color">
        <li class="nav-item">
          <a class="nav-link " href="<?php echo SITEURL; ?>dashbord/">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  href="<?php echo SITEURL; ?>dashbord/categories.php">Categories </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="<?php echo SITEURL; ?>dashbord/pets.php">Pets </a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link " href="#">Rescue </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Intraction / Guidlines
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Healths</a></li>
            <li><a class="dropdown-item" href="#">Doctor</a></li>
            <li><a class="dropdown-item" href="#">Food & Nutriends</a></li>
          </ul>
        </li> -->
        <!-- <li class="nav-item">
          <a class="nav-link" href="<?php echo SITEURL; ?>dashbord/contactform.php">Contact   </a>
        </li> -->
        <li class="nav-item dropdown" >
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <?php 
              if(isset($_SESSION['userName'])){
                  echo $_SESSION['userName'];
              }else{
                  echo "User";
              }
          ?>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?php echo SITEURL; ?>dashbord/order_history.php">My Order</a></li>
            <li><a class="dropdown-item" href="<?php echo SITEURL; ?>logout.php">LogOut</a></li>
            
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

</body>
</html>
