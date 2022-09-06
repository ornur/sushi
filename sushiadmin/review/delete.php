<?php

//Connection with database
require_once($_SERVER['DOCUMENT_ROOT'] . '/sushi/config/dbcontroller.php');

//Getting id 
$id=$_GET["id"];

//SQL query to delete the user
mysqli_query($link, "DELETE FROM `review` WHERE `review`.`id` = $id");

//Redirecting back
header("Location:review.php");

?>