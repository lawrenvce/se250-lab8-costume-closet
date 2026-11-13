<?php
session_start();

// Security Fix: Make sure the user is logged in before deleting
if (!isset($_SESSION["user_id"])) {
    http_response_code(403);
    die("Unauthorized access.");
}

include "db.php";

$id = (int)$_GET["id"];

// Security Fix: Use a prepared statement
$stmt = $conn->prepare("DELETE FROM loans WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: list.php");
exit;
?>