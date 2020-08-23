<?php

if (isset($_POST['productName'])) {
  $productName = $_POST['productName'];
  $price = $_POST['price'];
  require 'db-connect.php';
  $sql = "INSERT INTO `products` (product,price) VALUES ('$productName','$price')";
  $conn->exec($sql);
}

?>
