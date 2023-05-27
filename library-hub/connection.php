<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "library-hub";

// Check connection
if (!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
    exit("Connection failed");
}
