<?php
session_start(); // Memulai session

// Hapus variabel sesi untuk logout
unset($_SESSION['username']);

// Hapus sesi
session_destroy();

// Redirect ke halaman login atau beranda
header("Location: dashboard.php");
exit();
?>