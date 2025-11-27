<?php
$servername = "localhost";
$username   = "root";
$password   = "password";

$conn = new PDO("mysql:host=$servername", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// create DB and use it
$conn->exec("CREATE DATABASE IF NOT EXISTS Lunchesa1");
$conn->exec("USE Lunchesa1");

// -------- tblusers --------
$conn->exec("DROP TABLE IF EXISTS tblusers");
$conn->exec("
    CREATE TABLE tblusers (
        UserID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        Username VARCHAR(20) NOT NULL,
        Surname VARCHAR(20) NOT NULL,
        Forename VARCHAR(20) NOT NULL,
        Password VARCHAR(200) NOT NULL,
        Year INT(2) NOT NULL,
        Balance DECIMAL(15,2) NOT NULL,
        Role TINYINT(1)
    )
");

$hashedpassword = password_hash('password', PASSWORD_DEFAULT);

$stmt = $conn->prepare("
    INSERT INTO tblusers (UserID, Username, Surname, Forename, Password, Year, Balance, Role)
    VALUES
    (NULL,'cunniffe.r','Cunniffe','Rob', :pwd, 12, 10.50, 1),
    (NULL,'arnold.k','Arnold','Kev', :pwd, 12, 10.50, 0)
");
$stmt->execute([':pwd' => $hashedpassword]);

// -------- tblfood --------
$conn->exec("DROP TABLE IF EXISTS tblfood");
$conn->exec("
    CREATE TABLE tblfood (
        FoodID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        Name VARCHAR(20) NOT NULL,
        Description VARCHAR(200) NOT NULL,
        Category VARCHAR(20) NOT NULL,
        Price DECIMAL(15,2) NOT NULL
    )
");

$conn->exec("
    INSERT INTO tblfood (FoodID, Name, Description, Category, Price) VALUES
    (NULL,'Banana', 'long thing','Snack', 10),
    (NULL,'Cucumber','long thing','Snack', 20)
");

echo 'DB made and data inserted';
?>