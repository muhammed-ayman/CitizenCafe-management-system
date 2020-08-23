<?php

require 'db-connect.php';
$sql = "SELECT * FROM `products`";
$res = $conn->query($sql);
foreach ($res as $row) {
  $prodata = new stdClass;
  $prodata->productName =$row[1];
  $prodata->price =$row[2];
  $product = json_encode($prodata, JSON_UNESCAPED_UNICODE);
  echo '<script type="text/javascript">productData.unshift('.$product.')</script>';
}
?>
