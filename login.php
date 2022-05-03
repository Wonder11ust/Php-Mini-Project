<?php 
include 'config.php';
session_start();
if(!isset($_SESSION['log'])){

}else{
  header('location:index.php');
}

if(isset($_POST['login']))
{
    //cek ada/ga user nya
    $uname =mysqli_real_escape_string($conn,$_POST['uname']);
    $pass = mysqli_real_escape_string($conn,$_POST['psw']);
    $cek = mysqli_query($conn,"SELECT * FROM user WHERE username='$uname' AND password='$pass'");
  if(mysqli_num_rows($cek) > 0){
    while($c = mysqli_fetch_assoc($cek)){
     
          $_SESSION['id'] = $c['id'];
      $_SESSION['uname'] = $c['username'];
      $_SESSION['role'] = $c['role'];
      $_SESSION['log'] = "logged";
      header('location:index.php');
      
    }
  }else{
    echo 'login gagal';
  }

}
?>

<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
    }

    form {
      border: 3px solid #f1f1f1;
    }

    input[type=text],
    input[type=password] {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }

    button {
      background-color: #4CAF50;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 100%;
    }

    button:hover {
      opacity: 0.8;
    }

    .cancelbtn {
      width: auto;
      padding: 10px 18px;
      background-color: #f44336;
    }

    .imgcontainer {
      text-align: center;
      margin: 24px 0 12px 0;
    }

    img.avatar {
      width: 20%;
      border-radius: 30%;
    }

    .container {
      padding: 16px;
    }

    span.psw {
      float: right;
      padding-top: 16px;
    }

    /* Change styles for span and cancel button on extra small screens */
    @media screen and (max-width: 300px) {
      span.psw {
        display: block;
        float: none;
      }

      .cancelbtn {
        width: 100%;
      }
    }
  </style>
</head>

<body>

  <h2>Login Form</h2>

  <form action="" method="POST">
    <div class="imgcontainer">
      <img src="avatar.jpg" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>

     <button type="submit" name="login">Login</button>
      </form>

      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" class="cancelbtn">Cancel</button>
      <span class="psw"><a href="registrasi.php">Daftar </a></span>
    </div>

</body>

</html>