<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Otthon</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="register.css">
    <link href="favicon.ico" rel="shortcut icon">
</head>
<body>
    <div id="doboz">
    <h1>Otthon</h1>
    
    <?php if (isset($user)): ?>
        
        <div id="szia">Szia <?= htmlspecialchars($user["name"]) ?>!</div>
        
        <div id="kijelentkezes"><a href="logout.php">Kijelentkezés</a></div><br><a href="index.html">Vissza a főoldalra.</a>
        
    <?php else: ?>
        
        <div id="szoveg">
            <div id="login"><a href="jelentkez.php">Jelentkezzen be </a></div>
            <div id="signup"><a href="signup.html"> Regisztráljon</a></div>
        </div>
        
    <?php endif; ?>
    </div>
</body>
</html>
    
    
    
    
    
    
    
    
    
    
    