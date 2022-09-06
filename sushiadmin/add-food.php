<?php

//Connection database
require_once($_SERVER['DOCUMENT_ROOT'] . '/sushi/config/dbcontroller.php');

//Getting data from content page form
$name=$_POST["name"];
$code=$_POST["code"];
$description=$_POST["description"];
$price=$_POST["price"];

//Saving image path 
$path = "images/" . time(). $_FILES["image"]["name"];
move_uploaded_file($_FILES["image"]["tmp_name"], '../' .$path);
$image = $path; 

//Request to save data in which table
if ($_POST["type"]==1){
    mysqli_query($link, 
     "INSERT INTO `tbl_roll` (`id`, `name`, `code`, `image`, `description`, `price`) 
     VALUES (NULL, '$name', '$code', '$image', '$description', '$price')");
}else{
    mysqli_query($link, 
     "INSERT INTO `tbl_sushi` (`id`, `name`, `code`, `image`, `description`, `price`) 
     VALUES (NULL, '$name', '$code', '$image', '$description', '$price')");
}

//Getting back to content page
header('Location:/sushi/sushiadmin/content.php');

?>