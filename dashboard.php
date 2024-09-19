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
    <title>Dashboard <?php echo ucfirst($user_name); ?></title>
    <link rel="stylesheet" href="style_dashboard.css">
</head>
<body>
    <div class="container">
        <h1>Selamat datang, <?php echo htmlspecialchars($user_name); ?>!</h1>

        <div class="menu">
            <?php if ($user_type == 'admin'): ?>
                <a href="#">Tambah Siswa</a>
                <a href="#">Tambah Petugas</a>
                <a href="#">Data Siswa</a>
                <a href="#">Data Petugas</a>

            <?php elseif ($user_type == 'petugas'): ?>
                <a href="#">Tambah Petugas</a>
                <a href="#">Data Siswa</a>
                <a href="#">Data Petugas</a>

            <?php elseif ($user_type == 'user_kantin'): ?>
                <a href="#">Data Siswa</a>
                <a href="#">Data Petugas</a>
            <?php endif; ?>
        </div>

        <a href="logout.php" class="logout-btn">Logout</a>
    </div>
</body>
</html>