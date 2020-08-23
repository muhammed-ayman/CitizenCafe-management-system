<?php

require 'db-connect.php';
$sql = "SELECT * FROM `orders`";
$res = $conn->query($sql);
foreach ($res as $row) {
  $prodata = new stdClass;
  $prodata->time =strval($row[1]);
  $prodata->date =strval($row[2]);
  $prodata->product =$row[3];
  $prodata->number =$row[4];
  $prodata->price =strval($row[5]);
  $product = json_encode($prodata, JSON_UNESCAPED_UNICODE);
  echo '<script type="text/javascript">tableData.unshift('.$product.')</script>';
}
?>
