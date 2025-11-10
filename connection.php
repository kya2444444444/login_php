<?php

$conn = mysqli_connect("localhost", "root", "", "pplg");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    exit();
}

?>