<?php
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

    // Cek apakah username atau password kosong
    if (empty($user) || empty($pass)) {
        echo "Username atau Password tidak boleh kosong!";
    } else {
        // Hash password sebelum disimpan ke database
        $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

        // Menggunakan prepared statement untuk menghindari SQL injection
        $stmt = $conn->prepare("INSERT INTO user (Username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $user, $hashed_password);

        // Eksekusi query
        if ($stmt->execute()) {
            echo "Registrasi berhasil!";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Menutup statement
        $stmt->close();
    }
}

// Menutup koneksi
$conn->close();
?>