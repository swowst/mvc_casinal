<?php



    if ($_SERVER['REQUEST_METHOD']=='POST'){
        if (!isset($_POST['login']) || !isset($_POST['password']) &&
            empty($_POST['login']) && empty($_POST['password']) )
        {
            echo "<h2>Admin Tapilmadi</h2>";
        }
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container">
    <h1>Admin Login</h1>
    <form action="<?= url('/login') ?>" method="post">
        <input type="text" class="form-control my-2" name="login" placeholder="LOGIN...">
        <input type="password" class="form-control my-2" name="password" placeholder="PASSWORD...">
        <button class="btn-primary btn">LOGIN</button>
    </form>
</div>
</body>
</html>