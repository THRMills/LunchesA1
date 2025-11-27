<?php
    #create varialbes with server details on
    $servername="localhost";
    $username="root";
    $password="password";

    $conn=new PDO("mysql:host=$servername",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql="CREATE DATABASE IF NOT EXISTS Lunchesa1";
    $conn->exec($sql);
    $sql="USE Lunchesa1";
    $conn->exec($sql);
    echo("DB made");
    $stmt1= $conn->prepare("DROP TABLE IF EXISTS tblusers;
    CREATE TABLE tblusers
    (UserID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Username VARCHAR (20) NOT NULL,
    Surname VARCHAR(20) NOT NULL,
    Forename VARCHAR(20) NOT NULL,
    Password VARCHAR(200) NOT NULL,
    Year INT(2) NOT NULL,
    Balance DECIMAL (15,2) NOT NULL,
    Role TINYINT(1));
    ");
    $stmt1->execute();
    //add in some data 
    $hashedpassword=password_hash("password", PASSWORD_DEFAULT);
    echo($hashedpassword);
    $stmt1= $conn->prepare("INSERT INTO tblusers
    (UserID,Username, Surname, Forename, Password, Year, Balance, Role)
    VALUES
    (NULL,'Kirk.C','Kirk', 'Charlie', :Password, 12, 1000, 1),
    (NULL,'penty.A','Penty', 'Austen', :Password, 110, 2200, 0)
    ");
   
   
    $stmt1->bindParam(":Password",$hashedpassword);
  
    $stmt1->execute();

    $stmt1= $conn->prepare("DROP TABLE IF EXISTS tblfood;
    CREATE TABLE tblfood
    (FoodID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(20) NOT NULL,
    Description VARCHAR(200) NOT NULL,
    Category VARCHAR(20) NOT NULL,
    Price DECIMAL (15,2) NOT NULL);
    ");
    $stmt1->execute();
    //add in some data 
    $stmt1= $conn->prepare("INSERT INTO tblfood
    ($row["Name"]." ".$row["Description"]." ".$row["Price"]))
    VALUES
    ($row["Name"]." ".$row["Description"]." ".$row["Price"])
    ");
    
        $foodCount = $conn->query("SELECT COUNT(*) FROM tblfood")->fetchColumn();
        if ($foodCount == 0) {
            $conn->exec("INSERT INTO tblfood (Name, Description, Category, Price) VALUES
                ('Orange Juice', 'Carton of chilled orange juice', 'drink', 1.20),
                ('Still Water', '500ml bottled spring water', 'drink', 0.80),
                ('Crisps', 'Sea salt potato chips', 'snack', 0.90),
                ('Granola Bar', 'Oat and honey granola bar', 'snack', 1.10),
                ('Ham Sandwich', 'Ham and cheese on brown bread', 'sandwich', 2.50),
                ('Veggie Wrap', 'Roasted veg with hummus wrap', 'sandwich', 2.80)");
        }
    }
    catch (PDOException $e) {
        echo("connection failed " . $e->getMessage() . "<br>");
    }
?>
?>