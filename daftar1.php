<?php 
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    $tampilData = mysqli_query($conn,"SELECT * FROM user");
    if(mysqli_num_rows($tampilData) >0){
        while($t = mysqli_fetch_assoc($tampilData)){
            echo $t['username'];
            echo $t['password'];
        }
    }
    ?>
</body>
</html>