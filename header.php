<?php 

include 'config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Responsive Pet Food Website Design Tutorial</title>



    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style1.css">
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
  
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />

<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<script src="js/script.js"></script>
  

</head>
<body>
    
<!-- header section starts  -->

<header class="header">

    <?php 
    if(!isset($_SESSION['log'])){

    
    ?>

    <a href="login.php" class="logo"> <i class="fas fa-paw"></i> shop </a>
    <?php 
    }else{

            if($_SESSION['role']=='member'){
                echo ' <a href="cart.php" class="logo"> <i class="fas fa-paw"></i> shop </a>';
            }else{
                echo ' <a href="admin/customer.php" class="logo"> <i class="fas fa-paw"></i> shop </a>';
            }
   
    ?>
    
    <?php 
    }
    ?>

    <nav class="navbar">
        <a href="index.php">home</a>
        <a href="#about">about</a>
        <a href="#shop">shop</a>
        <a href="#services">services</a>
        <a href="#plan">plan</a>
        <a href="daftarorder.php">My Order</a>
    </nav>

    <div class="icons">
        <div class="fas fa-bars" id="menu-btn"></div>
        <a href="cart.php" class="fas fa-shopping-cart"></a>
    <?php 
    if(!isset($_SESSION['log'])){

    
    ?>
         <a href="login.php" class="fas fa-user">Login</a>
         <?php }else{

          ?>
         <a>hi,<?= $_SESSION['uname']; ?></a>
         <a href="logout.php">Log Out</a>
         <?php } ?>
    </div>

    

</header>
