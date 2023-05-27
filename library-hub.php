<?php
$pages = array(
    'index.php',
    'login.php',
    'signup.php',
    'borrow.php',
    'book.php',
    // Add more file names here
);

foreach ($pages as $page) {
    include($page);
}

header("Location: library-hub/index.php");
exit;
?>