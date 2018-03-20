<?php
  $nameId = $_POST['user'];
  $post = $_POST['post'];
  $mysqli = new mysqli("mysql.eecs.ku.edu", "d746g521", "aabu3Xee", "d746g521");
  if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
  }
  if(isset($nameId)){
    $userCheck = $mysqli->query("SELECT * FROM Users WHERE (user_id = '$nameId')");
    $addUser = "INSERT INTO Posts (content, author_id ) VALUES ('$post','$nameId');";
    if($nameId === ""){
      echo "You need to enter a User name!";
    }
    else if(mysqli_num_rows($userCheck) == 0){
      echo "User does not exist!";
      exit();
    }
    else if($post === ""){
      echo "You need to write something in the post box!";
    }
    else{
      if($mysqli->query($addUser) === TRUE){
        echo "Post was added!";
      }
    }
      $mysqli->close();
      exit();
  }
  else{
    echo "Blank input <br>";
    exit();
  }
 ?>
