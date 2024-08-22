<?php
session_start(); // Memulai sesi

// Koneksi ke database
// ...

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form dan lakukan sanitasi
    $user = clean_input($_POST['username']);
    $pass = clean_input($_POST['password']);

    // Validasi input
    if (empty($user) || empty($pass)) {
        echo "Username dan password harus diisi.";
        exit();
    }

    // Query untuk mencari user
    $stmt = $conn->prepare("SELECT password FROM user WHERE username = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        // Verifikasi password
        if (password_verify($pass, $hashed_password)) {
            // Set session untuk pengguna
            $_SESSION['username'] = $user;
            // Redirect ke dashboard
            header("Location: dashboard.php");
            exit();
        } else {
            echo "Username atau password tidak valid.";
        }
    } else {
        echo "Username atau password tidak valid.";
    }

    $stmt->close();
}

$conn->close();
?>