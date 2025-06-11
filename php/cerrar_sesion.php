<?php

session_start();
session_destroy();
header("location: ../a.inicio/login_register.php");
die();
?>