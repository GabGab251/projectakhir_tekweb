<?php
// Start the session
session_start();

// Destroy the session to log the user out
session_destroy();

// Redirect to login page (pastikan pathnya benar)
header("Location: /projek_akhir_tekweb/login.php");
exit();
?>