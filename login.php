<?php
include 'koneksi.php';
session_start();

if (isset($_POST['login'])) {
    $nama_petugas = $_POST['nama_petugas'];
    $password = $_POST['password'];

    if (empty($nama_petugas) || empty($password)) {
        $error = "Username dan Password harus diisi!";
    } else {
        $stmt = $conn->prepare("SELECT id_petugas, password_petugas, level FROM petugas WHERE nama_petugas = ?");
        $stmt->bind_param("s", $nama_petugas);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $hashed_password = $row['password_petugas'];

            if (password_verify($password, $hashed_password)) {
                $_SESSION['nama_petugas'] = $nama_petugas;
                $_SESSION['level'] = $row['level'];

                header('Location: dashboard.php');
                exit;
            } else {
                $error = 'Nama petugas atau Password salah!';
            }
        } else {
            $error = 'Nama petugas tidak ditemukan!';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" href="style_login.css">
    <link rel="stylesheet" href="style_login2.css">
</head>
<body>
    <div class="login-container">
        <h2>Login Petugas</h2>

        <?php if (isset($error)): ?>
            <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>

        <form method="POST" action="">
            <label for="nama_petugas">Username</label>
            <input type="text" id="nama_petugas" name="nama_petugas" required><br>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required><br>

            <input type="submit" name="login" value="Login">
        </form>
        <br>
            <form action="index.html">
                <button type="submit" class="blue-button">Kembali ke Depan</button>
            </form>
    </div>
</body>
</html>