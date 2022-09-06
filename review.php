<?php

//Connection with database
require_once ('config/dbcontroller.php');

//Getting posted data from review form
$name = $_POST["name"];
$email = $_POST["email"];
$date = $_POST["date"];
$message = $_POST["message"];

//Saving this in database table
mysqli_query($link, "INSERT INTO `review`(`id`, `name`, `email`, `date`, `message`)
 VALUES (NULL,'$name','$email','$date','$message')");
header('Location: home.php#contact');

?>