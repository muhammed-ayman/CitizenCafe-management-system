<?php


if (isset($_POST['productname'])) {
  $productname = $_POST['productname'];
  require 'db-connect.php';
  $sql = "DELETE FROM `products` WHERE product='$productname'";
  $conn->exec($sql);
}


?>
