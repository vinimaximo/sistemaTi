<?php 
session_name('Chulettaaa');
session_start();
session_destroy();
header('location: ../index.php');
exit;
?>