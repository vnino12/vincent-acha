<?php
include "C:/xampp/htdocs/act1sir/connection.php";

$sql = "SELECT * FROM `product`";
$stmt = $db->query($sql);
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
</head>
<body>

<h3>Product List</h3>
<a href="add.php">Add New Product</a>

<?php if (isset($_GET['msg'])): ?>
    <p><?php echo htmlspecialchars($_GET['msg']); ?></p>
<?php endif; ?>

<table border="1">
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo htmlspecialchars($product['name']); ?></td>
                <td><?php echo htmlspecialchars($product['Description']); ?></td>
                <td><?php echo htmlspecialchars($product['Price']); ?></td>
                <td><?php echo htmlspecialchars($product['Quantity']); ?></td>
                <td><?php echo htmlspecialchars($product['created_act1']); ?></td>
                <td><?php echo htmlspecialchars($product['updated_act1']); ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $product['id']; ?>">Edit</a>
                    <a href="delete.php?id=<?php echo $product['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
