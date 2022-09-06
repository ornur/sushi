<?php
    //Connecting to Database
    require_once($_SERVER['DOCUMENT_ROOT'] . '/sushi/config/dbcontroller.php');

    //Getting table data
    $sushis= mysqli_query($link, "SELECT * FROM `tbl_sushi`");
    $sushi=[];

    //Getting second table data
    $rolls= mysqli_query($link, "SELECT * FROM `tbl_roll`");
    $roll=[];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Admin Dashboard</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src  = "../logos/logo.png" alt="" height="40" width="40" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto mg-lg-0">
                        <li class="nav-item" style="padding-right:20px;">
                            <a class="nav-link active" aria-current="page" href="#roll">Таблица Роллы</a>
                        </li>
                        <li class="nav-item" style="padding-right:20px;">
                            <a class="nav-link active" aria-current="page" href="#sushi">Таблица Суши</a>
                        </li>
                        <li class="nav-item" style="padding-right:20px;">
                            <a class="nav-link active" aria-current="page" href="#add">Добавить еду</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="user/users.php">Пользователи</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="review/review.php">Отзывы</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="orders/orders.php">Сделанные заказы</a>
                        </li>
                    </ul>
                    <a href="logout.php" style="color:#ffffff; text-decoration:none;">Выход</a>
                </div>
            </div>
        </nav>

        <main style="background-image: url(http://trumpwallpapers.com/wp-content/uploads/Sushi-Wallpaper-08-2880x1800-1-scaled.jpg);">
            <div class="container bg-white">
                <div id="roll" class="mb-5 pb-2"></div>
                <h1><center>Роллы</center></h1>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Название</th>
                            <th scope="col">Код</th>
                            <th scope="col">Описание</th>
                            <th scope="col">Цена</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    
                        while($roll = mysqli_fetch_assoc($rolls)){
                            echo '<tr>
                            <th scope="row">'. $roll["id"] .'</th>
                            <td>'. $roll["name"] .'</td>
                            <td>'. $roll["code"] .'</td>
                            <td>'. $roll["description"] .'</td>
                            <td>'. $roll["price"] .'₸</td>
                            <td align="right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Действие</button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="roll/update-roll.php?id='.$roll['id'].'">Изменить</a></li>
                                        <li><a class="dropdown-item" href="roll/delete-roll.php?id='.$roll["id"].'">Удалить</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>';
                        }

                    ?>

                    </tbody>
                </table>
                <div id="sushi" class="mb-5 pb-5"></div>
                <h1><center>Суши</center></h1>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Название</th>
                            <th scope="col">Код</th>
                            <th scope="col">Описание</th>
                            <th scope="col">Цена</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    
                        while($sushi = mysqli_fetch_assoc($sushis)){
                            echo '<tr>
                            <th scope="row">'. $sushi["id"] .'</th>
                            <td>'. $sushi["name"] .'</td>
                            <td>'. $sushi["code"] .'</td>
                            <td>'. $sushi["description"] .'</td>
                            <td>'. $sushi["price"] .'₸</td>
                            <td align="right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Действие</button>
                                    <ul class="dropdown-menu" style="">
                                        <li><a class="dropdown-item" href="sushi/update-sushi.php?id='.$sushi['id'].'">Изменить</a></li>
                                        <li><a class="dropdown-item" href="sushi/delete-sushi.php?id='.$sushi["id"].'">Удалить</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>';
                        }

                    ?>
                    </tbody>
                </table>

                <div class="p-3 bg-warning">
                <h3 id="add" class="mt-4 mb-3">Добавить еду</h3>
                    <form action="/sushi/sushiadmin/add-food.php" class="needs-validation" method="post" enctype="multipart/form-data" novalidate>
                        <div class="col-md-3 mb-3">
                            <label for="data-type" class="form-label">Выберите таблицу</label><br>
                            <select id="data-type"class="custom-select custom-select-md"cname="table">
                                <option value="1" selected>Роллы</option>
                                <option value="2">Суши</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="var-title">Имя еды</label>
                            <input type="text" name="name" class="form-control" id="var-title" required>
                            <div class="invalid-feedback"><b>Вам нужно ввести название блюда</b></div>
                        </div>

                        <div class="col-md-12">
                            <label for="text" class="form-label">Уникальный код для еды</label>
                            <input type="text" name="code" class="form-control" id="text" required>
                            <div class="invalid-feedback"><b>Вам нужно ввести код еды</b></div>
                        </div>

                        <div class="col-md-12">
                            <label for="text" class="form-label">Содержимое еды</label>
                            <input type="text" name="description" class="form-control" id="text" required>
                            <div class="invalid-feedback"><b>Вам нужно ввести содержимое еды</b></div>
                        </div>

                        <div class="col-md-12">
                            <label for="text" class="form-label">Цена еды</label>
                            <input type="text" name="price" class="form-control" id="text" pattern="[0-9]{3,7}" required>
                            <div class="invalid-feedback"><b>Вам нужно ввести цену</b></div>
                        </div>

                        <div class="col-md-12 d-done">
                            <label class="form-label" for="image">Изображение еды</label><br>
                            <input type="file" name="image" id="image" required>
                            <div class="invalid-feedback"><b>Вам нужно указать путь к изображению</b></div>
                        </div>
                        <br>
                        <div class="col-12 mb-5">
                            <button type="submit" class="btn btn-primary">Добавить</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
        <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function () {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
                })
            })()
        </script>
    </body>
</html>