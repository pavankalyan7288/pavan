<?php
session_start();
session_destroy();
header('Location: login.php');
exit();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
</head>
    <link rel="icon" type="image/x-icon" href="https://freepngimg.com/thumb/facebook/62487-bluetie-icons-computer-facebook-login-icon-email.png">
    <p style="text-align:right;font: size:20px;color:black;font-weiht:bold;"><a href="logout.php">Logout</a></p>

<body>
    
</body>
</html>