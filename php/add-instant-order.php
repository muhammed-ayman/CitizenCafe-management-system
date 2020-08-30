<?php

if (isset($_POST['productName'])) {
  $id = $_POST['id'];
  $tableName = $_POST['tableName'];
  $productName = $_POST['productName'];
  $productType = $_POST['productType'];
  $number = $_POST['number'];
  $price = $_POST['price'];
  require 'db-connect.php';
  $sql = "INSERT INTO `instantorder` (id,tableName,product,productType,number,price) VALUES ('$id','$tableName','$productName','$productType','$number','$price')";
  $conn->exec($sql);
}

?>
