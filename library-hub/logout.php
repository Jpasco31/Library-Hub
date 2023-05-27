<?php

session_start();

if (isset($_SESSION['accountId'])) {
    unset($_SESSION['accountId']);
}

header("Location: login.php");
exit;