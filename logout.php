<?php
// Start session
session_start();

// Unset the 'visited' session variable
unset($_SESSION['visited']);

// Destroy the session
session_destroy();

// Redirect to index.php after destroying the session
header("location: index.php");
exit();
?>
