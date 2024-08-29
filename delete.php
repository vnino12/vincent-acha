<?php
include "C:/xampp/htdocs/act1sir/connection.php"; 

if (isset($_GET['id'])) {
    $id = $_GET['id'];

   
    $sql = "DELETE FROM `product` WHERE `id` = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

   
    if ($stmt->execute()) {
        header("Location: index.php?msg=Record deleted successfully");
    } else {
        header("Location: index.php?msg=Failed to delete record");
    }
} else {
    header("Location: index.php");
}
?>
