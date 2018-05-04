<?php
session_start();
unset($_SESSION['id']);
unset($_SESSION['name']);
unset($_SESSION['phone']);
unset($_SESSION['type']);
unset($_SESSION['email']);
unset($_SESSION['password']);
unset($_SESSION['section']);
session_destroy();
header('Location: index.php');