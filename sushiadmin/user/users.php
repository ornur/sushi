<?php
    //Connection with database
    require_once($_SERVER['DOCUMENT_ROOT'] . '/sushi/config/dbcontroller.php');

    //Getting data from table and storing in array 
    $users= mysqli_query($link, "SELECT * FROM `users`");
    $user=[];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Admin Dashboard</title>
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
                    <a href="../logout.php" style="color:#ffffff; text-decoration:none;">Выход</a>
                </div>
            </div>
        </nav>

        <main style="margin-top: 20px;">
            <div class="container">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Имя пользователя</th>
                            <th scope="col">Email</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <!-- A loop for displaying users in a table -->
                    <?php
                    
                        while($user = mysqli_fetch_assoc($users)){
                            echo '<tr>
                            <th scope="row">'. $user["id"] .'</th>
                            <td>'. $user["username"] .'</td>
                            <td>'. $user["email"] .'</td>
                            <td align="right">
                                <!-- This is button to remove user -->
                                <div class="btn-group">
                                    <button type="button" class="btn">
                                        <a href="delete-user.php?id='.$user["id"].'">Удалить</a>
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