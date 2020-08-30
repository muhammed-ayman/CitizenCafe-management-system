<?php

require 'db-connect.php';
$sql = "SELECT * FROM `instantorder`";
$res = $conn->query($sql);
foreach ($res as $row) {
  $prodata = new stdClass;
  $prodata->id =$row[0];
  $prodata->tableName =$row[1];
  $prodata->product =$row[2];
  $prodata->productType =$row[3];
  $prodata->number =$row[4];
  $prodata->price =$row[5];
  $product = json_encode($prodata, JSON_UNESCAPED_UNICODE);
  echo '<script type="text/javascript">tempData.unshift('.$product.')</script>';
}
?>
