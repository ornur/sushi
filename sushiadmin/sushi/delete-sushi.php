<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/sushi/config/dbcontroller.php');

$id=$_GET["id"];

mysqli_query($link, "DELETE FROM `tbl_sushi` WHERE `tbl_sushi`.`id` = $id");

header("Location:../content.php");

?>