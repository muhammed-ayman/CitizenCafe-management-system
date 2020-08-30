<?php


if (isset($_POST['id'])) {
  $id = $_POST['id'];
  $tableNumber = $_POST['tableNumber'];
  require 'db-connect.php';
  $sql = "DELETE FROM `instantorder` WHERE id='$id' AND tableName='$tableNumber'";
  $conn->exec($sql);
}


?>
