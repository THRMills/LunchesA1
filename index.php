<!DOCTYPE HTML>
<html>
<head>          
    <title>PHP Info</title>
</head>

<body>
    <?php
        session_start();
        print_r($_SESSION);
        echo isset($_SESSION["firstname"]) ? "Welcome, " . htmlspecialchars($_SESSION["firstname"]) . "!" : "Welcome, guest!";
    ?>
  <h1>Main Page</h1>
  <a href= "user.php"> add user </a><br>
  <a href= "food.php"> add user </a><br>
  <a href= "login.php"> add user </a><br>
    
</body>
</html>