<?php
session_start();
// Menghapus data session


// // Menghapus cookie session pada sisi pengguna
// setcookie(session_name(), '', time() - 3600);
session_destroy();
// Redirect atau tampilkan pesan logout berhasil
header('Location: index.php');
exit();
?>