<?php
include "C:/xampp/htdocs/act1sir/connection.php"; 

if (isset($_POST["submit"])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $sql = "INSERT INTO `product` (`name`, `Description`, `Price`, `Quantity`, `created_act1`, `updated_act1`) VALUES (?, ?, ?, ?, NOW(), NOW())";
    $stmt = $db->prepare($sql);
    try {
        $stmt->execute([$name, $description, $price, $quantity]);
        header("Location: index.php?msg=New record created successfully");
        exit;
    } catch (PDOException $e) {
        echo "Failed: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Product</title>
</head>
<body>

<h3>Add New Product</h3>
<p>Complete the form below to add a new product</p>

<form action="" method="post">
    <label>Name:</label>
    <input type="text" name="name" placeholder="Banana" required>
    <br>
    <label>Description:</label>
    <input type="text" name="description" placeholder="Banana is..." required>
    <br>
    <label>Price:</label>
    <input type="text" name="price" placeholder="28" required>
    <br>
    <label>Quantity:</label>
    <input type="text" name="quantity" placeholder="1" required>
    <br>
    <button type="submit" name="submit">Add</button>
    <a href="index.php">Cancel</a>
</form>

</body>
</html>
