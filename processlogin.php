<?php
    print_r($_POST);
    array_map("htmlspecialcharrs",$_POST);
    include_once("connection.php");
    $stmt1= $conn->prepare("SELECT * FROM tblusers WHERE Username=:Username");
     $stmt1->bindParam(":Username",$_POST["Username"]);
    $stmt1->execute();
    while ($row = $stmt1->fetch(PDO::FETCH_ASSOC))
    {
        echo($row["Forename"]." ".$row["Surname"]."<br>");
    }
    ?>