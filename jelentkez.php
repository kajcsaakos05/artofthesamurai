<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = sprintf("SELECT * FROM user
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
    
    if ($user) {
        
        if (password_verify($_POST["password"], $user["password_hash"])) {
            
            session_start();
            
            session_regenerate_id();
            
            $_SESSION["user_id"] = $user["id"];
            
            header("Location: mainreg.php");
            exit;
        }
    }
    
    $is_invalid = true;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Bejelentkezés</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="register.css">
<body>
    <div id="doboz">
    <h1>Bejelentkezés</h1>
    
    <?php if ($is_invalid): ?>
        <em>Helytelen belépés</em>
    <?php endif; ?>
    
    <form method="post">
        <div id="email">
        <label for="email">email</label>
        <input type="email" name="email" id="email"
               value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
        </div>
        <div id="jelszo">
        <label for="password">jelszó</label>
        <input type="password" name="password" id="password">
        </div>
        <button>Bejelentkezés</button>
    </form>
    </div>
    
</body>
</html>







