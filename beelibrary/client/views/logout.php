<?php
session_start();
session_destroy();
header("Location: ../../client/views/login.php");
exit();
?>
