<?php

if (empty($_POST["name"])) {
    die("A név kitöltése kötelező");
}

if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Érvényes e-mail cím szükséges.");
}

if (strlen($_POST["password"]) < 8) {
    die("A jelszónak legalább 8 karakter hosszúnak kell lennie.");
}

if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
    die("A jelszónak legalább egy betűt kell tartalmaznia.");
}

if ( ! preg_match("/[0-9]/", $_POST["password"])) {
    die("A jelszónak legalább egy számot kell tartalmaznia.");
}

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("A jelszavaknak egyezniük kell.");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO user (name, email, password_hash)
        VALUES (?, ?, ?)";
        
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sss",
                  $_POST["name"],
                  $_POST["email"],
                  $password_hash);
                  
if ($stmt->execute()) {

    header("Location: signup-succes.html");
    exit;
    
} else {
    
    if ($mysqli->errno === 1062) {
        die("Ez az email már foglalt");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}







