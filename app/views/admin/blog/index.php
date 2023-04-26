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
    <h2>Blog Lists</h2>

    <a class="btn btn-primary" href="<?= url('/admin/blog/create') ?>">Blog Add</a>

    <table class="table">
        <thead>
            <tr>
                <th>id</th>
                <th>title</th>
                <th>slug</th>
                <th>edit</th>
                <th>delete</th>
            </tr>
        </thead>

        <tbody>
           <?php foreach ($blogs as $blog): ?>
               <tr>
                   <td><?= $blog['id'] ?></td>
                   <td><?= $blog['title'] ?></td>
                   <td><?= $blog['slug'] ?></td>

                   <td>
                       <a href="<?= url('/admin/blog/'. $blog['id']) ?>">Edit</a>
                   </td>

                   <td>
                       <form action="<?= url('/admin/blog-delete/'. $blog['id']) ?>" method="post">
                           <button class="btn btn-danger">Delete</button>
                       </form>
                   </td>
               </tr>
            <?php endforeach ?>
        </tbody>
    </table>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
