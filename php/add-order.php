<?php

if (isset($_POST['product'])) {
  $productName = $_POST['product'];
  $productType = $_POST['productType'];
  $tableName = $_POST['tableName'];
  $number = $_POST['number'];
  $price = $_POST['price'];
  $datenow = date("Y/m/d");
  date_default_timezone_set("Africa/Cairo");
  $timenow = strtoupper(date("H:i:s"));
  require 'db-connect.php';
  $sql = "INSERT INTO `orders` (time, date, product, number, total, productType, tableName) VALUES ('$timenow','$datenow','$productName','$number','$price','$productType','$tableName')";
  $conn->exec($sql);
}

?>
