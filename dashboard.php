<?php
session_start();

if (!isset($_SESSION["nama_petugas"])) {
    header("login.php");
    exit;
}

$user_name = $SESSION["nama_petugas"];
$user_type = $SESSION["level"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>