<?php

if (isset($_POST['product'])) {
  $productName = $_POST['product'];
  $number = $_POST['number'];
  $price = $_POST['price'];
  require 'db-connect.php';
  $sql = "INSERT INTO `printorder` (product, number, price) VALUES ('$productName','$number','$price')";
  $conn->exec($sql);
}

?>
