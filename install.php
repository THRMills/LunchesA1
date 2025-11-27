<?php
    #create variables with server details on
    $servername = "localhost";
    $username = "root";
    $password = "password";
    $dbname = "LunchesA1";

    try {
        $conn = new PDO("mysql:host=$servername", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $conn->exec("CREATE DATABASE IF NOT EXISTS $dbname");
        $conn->exec("USE $dbname");
        echo("DB made");

        $conn->exec("DROP TABLE IF EXISTS tblusers");
        $conn->exec("CREATE TABLE tblusers (
            UserID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            Username VARCHAR(20) NOT NULL,
            Surname VARCHAR(20) NOT NULL,
            Forename VARCHAR(20) NOT NULL,
            Password VARCHAR(200) NOT NULL,
            Year INT(2) NOT NULL,
            Balance DECIMAL (15,2) NOT NULL,
            Role TINYINT(1)
        )");

        $conn->exec("DROP TABLE IF EXISTS tblfood");
        $conn->exec("CREATE TABLE tblfood (
            FoodID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            Name VARCHAR(50) NOT NULL,
            Description VARCHAR(255) NOT NULL,
            Category ENUM('drink','snack','sandwich') NOT NULL,
            Price DECIMAL(8,2) NOT NULL
        )");

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
