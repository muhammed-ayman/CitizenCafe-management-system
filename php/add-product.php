<?php

if (isset($_POST['productName'])) {
  $productName = $_POST['productName'];
  $price = $_POST['price'];
  $productType = $_POST['productType'];
  require 'db-connect.php';
  $sql = "INSERT INTO `products` (product,price,productType) VALUES ('$productName','$price','$productType')";
  $conn->exec($sql);
}

?>
