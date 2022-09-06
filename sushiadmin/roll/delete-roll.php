<?php

//Connection with databse
require_once($_SERVER['DOCUMENT_ROOT'] . '/sushi/config/dbcontroller.php');

//Getting ID of product
$id=$_GET["id"];

//Deleting food by ID
mysqli_query($link, "DELETE FROM `tbl_sushi_roll` WHERE `tbl_sushi_roll`.`id` = $id");

// Back to content page
header("Location:../content.php");

?>