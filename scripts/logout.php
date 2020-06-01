<?php
session_start();
session_unset();
session_destroy();
echo "Wylogowano";
$_SESSION['logout'] = 'Wylogowano';
header('location: ../index.php?logout=success')
?>
