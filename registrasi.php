<?php 
include 'config.php';
session_start();
if(isset($_POST['daftar']))
{
    //cek ada/ga user nya
    $uname =$_POST['uname'];
    $psw = password_hash($_POST['psw'],PASSWORD_DEFAULT);
    $email =$_POST['email'];
    $hp = $_POST['hp'];
    $alamat = $_POST['alamat'];


    $daftar = mysqli_query($conn,"INSERT INTO user(username,password,email,hp,alamat,role) VALUES('$uname','$psw','$email','$hp','$alamat','member')");
     
    if ($daftar){
		echo " <div class='alert alert-success'>
			Berhasil mendaftar, silakan masuk.
		  </div>
		<meta http-equiv='refresh' content='1; url= login.php'/>  ";
		} else { echo "<div class='alert alert-warning'>
			Gagal mendaftar, silakan coba lagi.
		  </div>
		 <meta http-equiv='refresh' content='1; url= registrasi.php'/> ";
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
    input[type=password],
    input[type=email],
    input[type=number] {
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

  <h2>Regsitrasi Form</h2>

  <form action="" method="POST">
    <div class="imgcontainer">
      <img src="avatar.jpg" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
      <label for="email"><b>Email</b></label>
      <input type="email" class="form-control" placeholder="Enter Email" name="email" required>

      <label for="hp"><b>Nomor Handphone</b></label>
      <input type="number" placeholder="Enter Phone Number" name="hp" required>
      <label for="alamat"><b>Alamat</b></label>
      <input type="text" placeholder="Enter Address" name="alamat" required>


     <button name="daftar" type="submit">Daftar</button>
     </form>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" class="cancelbtn">Cancel</button>
      <span class="psw"><a href="login.php">Login </a></span>
    </div>


</body>

</html>