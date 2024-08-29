<?php
include "C:/xampp/htdocs/act1sir/connection.php";

if (!isset($_GET['id'])) {
    header("Location: index.php?msg=No product ID specified");
    exit;
}

$id = $_GET['id'];

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $sql = "UPDATE `product` SET `name` = ?, `Description` = ?, `Price` = ?, `Quantity` = ?, `updated_act1` = NOW() WHERE `id` = ?";
    $stmt = $db->prepare($sql);

    try {
        $stmt->execute([$name, $description, $price, $quantity, $id]);
        header("Location: index.php?msg=Product updated successfully");
        exit;
    } catch (PDOException $e) {
        echo "Failed: " . $e->getMessage();
    }
}

$sql = "SELECT * FROM `product` WHERE `id` = ?";
$stmt = $db->prepare($sql);
$stmt->execute([$id]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$product) {
    header("Location: index.php?msg=Product not found");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
</head>
<body>

<h3>Edit Product</h3>

<form action="" method="post">
    <label>Name:</label>
    <input type="text" name="name" value="<?php echo htmlspecialchars($product['name']); ?>" required>
    <br>
    <label>Description:</label>
    <input type="text" name="description" value="<?php echo htmlspecialchars($product['Description']); ?>" required>
    <br>
    <label>Price:</label>
    <input type="text" name="price" value="<?php echo htmlspecialchars($product['Price']); ?>" required>
    <br>
    <label>Quantity:</label>
    <input type="text" name="quantity" value="<?php echo htmlspecialchars($product['Quantity']); ?>" required>
    <br>
    <button type="submit" name="submit">Update</button>
    <a href="index.php">Cancel</a>
</form>

</body>
</html>
