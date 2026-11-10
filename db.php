<?php

$conn = new mysqli(
    "localhost",
    "root",
    "root",
    "costume_closet"
);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>