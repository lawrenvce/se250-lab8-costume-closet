<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include "db.php";

$sql = "SELECT * FROM loans";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
<title>Costume Closet</title>
</head>
<body>

<h2>Campus Costume Closet</h2>

<a href="add.php">Add New Loan</a>

<br><br>

<?php

if(mysqli_num_rows($result) > 0){

?>

<table border="1" cellpadding="10">

<tr>
<th>ID</th>
<th>Item</th>
<th>Borrower</th>
<th>Due Date</th>
<th>Status</th>
<th>Actions</th>
</tr>

<?php

while($row = $result->fetch_assoc()){

?>

<tr>

<td><?php echo $row["id"]; ?></td>
<td><?php echo $row["item"]; ?></td>
<td><?php echo $row["borrower"]; ?></td>
<td><?php echo $row["due_date"]; ?></td>

<td>
<?php
if($row["returned"] == 1){
    echo "Returned";
}
else{
    echo "Still Out";
}
?>
</td>

<td>

<a href="mark_returned.php?id=<?php echo $row["id"]; ?>">
Mark Returned
</a>

|

<a href="delete.php?id=<?php echo $row["id"]; ?>"
onclick="return confirm('Delete this loan?')">
Delete
</a>

</td>

</tr>

<?php
}
?>

</table>

<?php

}else{

    echo "<h3>No loans yet. The closet is empty!</h3>";

}

?>

</body>
</html>