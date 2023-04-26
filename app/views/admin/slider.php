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


    <div class="container my-2">

        <h1>Slider section</h1>
        <form action="<?= url('/admin/slider') ?>" method="post" enctype="multipart/form-data">
            <input class="form-control my-2" value="<?= $slider['title'] ?? '' ?>" name="title" type="text" placeholder="Enter title...">
            <textarea name="text" class="form-control my-2" placeholder="Enter text..."><?= $slider['text'] ?? '' ?></textarea>
            <?php


            if ($slider['image'] ?? ''){
                ?>
                <img style="width: 120px" src="<?= img($slider['image'] ?? '') ?>" alt="">
                <?php
            }



            ?>
            <input class="form-control my-2" type="file" name="image">
            <button class="btn btn-primary">Save</button>
        </form>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
