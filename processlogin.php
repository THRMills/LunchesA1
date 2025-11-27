<?php
  header("location: index.php");
  session_start(); #starts the session if you want to use session variables
  print_r($_POST);
  array_map("htmlspecialchars",$_POST);
  include_once("connection.php");
  $stmt1= $conn->prepare("SELECT * FROM tblusers WHERE Username=:Username");
  $stmt1->bindParam(":Username", $_POST["username"]);
  $stmt1->execute();
    while ($row = $stmt1->fetch(PDO::FETCH_ASSOC)) s
   {
    $hashed=$row["Password"];
    $attempt=$_POST["password"];
    echo($hashed.$attempt);
    
    print_r($row);
    if($row["Password"]==$_POST["password"]){
      echo("valid password");
      $_SESSION["firstname"]=$row["Forename"];
      $_SESSION["loggedinuser"]=$row["UserID"];
      $_SESSION["role"]=$row["Role"];

   }
    else{
        echo("Invalid password");
    }
         
   }

    ?>