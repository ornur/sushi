<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/sushi/config/dbcontroller.php');
    $rolls= mysqli_query($link, "SELECT * FROM `tbl_roll`");

    $id = $_GET["id"];
    $roll = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM `tbl_roll` WHERE `id` = $id"));

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
                    <img src = "../../logos/logo.png" alt="" width="40" height="40" class=""/>
                    Aдмин
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto mg-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../content.php">Добавить еду</a>
                        </li>
                    </ul>
                    <a href="logout.php" style="color:#ffffff; text-decoration:none;" class="position-relative left-0 end-50">Выход</a>
                </div>
            </div>
        </nav>

        <main style="margin-top: 20px;">
            <div class="container">

                <h3 id="add" class="mt-4 mb-3">Обновить еду</h3>

                <form action="save-roll.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" value="<?php echo $roll["id"];?>" name="id"> 
                    <div class="col-md-6">
                        <label class="form-label" for="var-title">Новая имя еды</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $roll["name"]?>" id="var-title">
                    </div>

                    <div class="col-md-12" id="text-form">
                        <label for="text" class="form-label">Новая содержимое еды</label>
                        <input type="text" name="description" value="<?php echo $roll["description"]?>" class="form-control" id="text">
                    </div>

                    <div class="col-md-12" id="text-form">
                        <label for="text" class="form-label">Новая цена еды</label>
                        <input type="text" name="price" class="form-control" value="<?php echo $roll["price"]?>" id="text" pattern="[0-9]{3,7}">
                    </div>

                    <div class="col-md-12 d-done" id="image-form">
                        <label class="form-label" for="image">Новая изображение еды</label><br>
                        <input type="file" name="image" id="image">
                    </div>
                    <br>
                    <div class="col-12 mb-5">
                        <button type="submit" class="btn btn-primary">Изменить</button>
                    </div>
                </form>
            </div>
        </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    </body>
</html>