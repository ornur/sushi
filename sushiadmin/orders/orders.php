<?php
    //Connection with database
    require_once($_SERVER['DOCUMENT_ROOT'] . '/sushi/config/dbcontroller.php');

    //Getting data from table and storing in array 
    $orders= mysqli_query($link, "SELECT * FROM `ordered`");
    $order=[];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Администрирование</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src  = "../../logos/logo.png" alt="" height="40" width="40" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto mg-lg-0">
                        <li class="nav-item mask">
                            <a class="nav-link active" aria-current="page" href="../content.php">Назад</a>
                        </li>
                    </ul>
                    <a href="../../logout.php" style="color:#ffffff; text-decoration:none;">Выход</a>
                </div>
            </div>
        </nav>

        <main style="margin-top: 20px;">
            <div class="container">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Имя</th>
                            <th scope="col">Номер телефона</th>
                            <th scope="col">Адрес</th>
                            <th scope="col">Заказанные продукты</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <!-- A loop for displaying users in a table -->
                    <?php
                    
                        while($order = mysqli_fetch_assoc($orders)){
                            echo '<tr>
                            <th scope="row">'. $order["id"] .'</th>
                            <td>'. $order["name"] .'</td>
                            <td>'. $order["phone"] .'</td>
                            <td>'. $order["adress"] .'</td>
                            <td>'. $order["orders"] .'</td>
                            <td align="right">
                                <!-- This is button to remove order -->
                                <div class="btn-group">
                                    <button type="button" class="btn">
                                    <a href="delete.php?id='.$order["id"].'">Удалить</a>
                                    </button>
                                </div>
                            </td>
                        </tr>';
                        }

                    ?>
                    </tbody>
                </table>
            </div>
        </main>
    </body>
</html>