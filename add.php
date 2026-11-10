<?php

include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $item = $_POST["item"];
    $borrower = $_POST["borrower"];
    $due_date = $_POST["due_date"];

    $stmt = $conn->prepare(
        "INSERT INTO loans(item, borrower, due_date, returned)
         VALUES (?, ?, ?, 0)"
    );

    $stmt->bind_param(
        "sss",
        $item,
        $borrower,
        $due_date
    );

    $stmt->execute();

    header("Location: list.php");
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Loan</title>
</head>
<body>

<h2>Add New Loan</h2>

<form method="post">

    Item:
    <input type="text" name="item" required>

    <br><br>

    Borrower:
    <input type="text" name="borrower" required>

    <br><br>

    Due Date:
    <input type="date" name="due_date">

    <br><br>

    <button type="submit">
        Save Loan
    </button>

</form>

<br>

<a href="list.php">View Loans</a>

</body>
</html>