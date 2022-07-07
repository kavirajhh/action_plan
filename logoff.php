<?php
session_start();
session_destroy();
unset($_SESSION['s_cOde']);
header("Location: index.php");
?>