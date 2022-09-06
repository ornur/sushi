<?php

//Admin login and password
$Slogin="Sushiadmin";
$Spassword="Adm1nS";


//Checking process 
if ($Slogin === $_POST['Slogin'] && $Spassword === $_POST['Spassword']){
    header("location:content.php");
}else{
    //Error message
    echo "Неправильно ввели логин и пароль";
    }
?>