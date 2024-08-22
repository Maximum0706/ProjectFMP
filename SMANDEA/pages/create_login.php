<?php
session_start(); // Memulai session untuk melacak login pengguna

// Koneksi ke database
$servername = "localhost";
$username = "root"; // Ganti dengan username database
$password = ""; // Ganti dengan password database
$dbname = "dea_analysis"; // Nama database

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fungsi untuk membersihkan input
function clean_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Jika form di-submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form dan lakukan sanitasi
    $user = clean_input($_POST['username']);
    $pass = clean_input($_POST['password']);

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
            echo "Username atau password salah.";
        }
    } else {
        echo "Username tidak ditemukan.";
    }

    // Menutup statement
    $stmt->close();
}

// Menutup koneksi
$conn->close();
?>