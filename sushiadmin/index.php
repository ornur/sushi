<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Admin Panel</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <style>
        main{
            display:flex;
            height: 100hv;
            justify-content: center;
            align-items: center;
        }
    </style>
    <body>
        <main style="margin-top: 20px;">
            <form action="login.php" method="POST" style="width: 400px;">
            <h2>Вход в админ панель</h2>
                <div class="mb-3">
                    <label for="var-title" class="form-label">Логин</label>
                    <input type="text" name="Slogin" class="form-control" id ="var-title">
                </div>
                <div class="mb-3">
                    <label for="var-title" class="form-label">Пароль</label>
                    <input type="password" name="Spassword" class="form-control" id ="var-title">
                </div>
                <div class="row mb-3 col-12">
                    <button type="submit" class="btn btn-primary">Вход</button>
                </div>
            </form>
        </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    </body>
</html>