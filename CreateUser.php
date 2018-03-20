<?php
  $nameId = $_POST['user'];
  $mysqli = new mysqli("mysql.eecs.ku.edu", "d746g521", "aabu3Xee", "d746g521");
  if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
  }
  if(isset($nameId)){
    $userCheck = $mysqli->query("SELECT * FROM Users WHERE (user_id = '$nameId')");
    $addUser = "INSERT INTO Users (user_id) VALUES ('$nameId');";
    if(mysqli_num_rows($userCheck) > 0){
      echo "This user name has already been created!";
      exit();
    }
    else if($mysqli->query($addUser)=== TRUE){
      echo "User has been added!";
    }
    else{
      echo "Error adding user<br>";
    }
      $mysqli->close();
  }
  else{
    echo "Blank input <br>";
    exit();
  }
 ?>
