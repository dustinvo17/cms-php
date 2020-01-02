<?php 
    session_start();
    include('./connectdb.php');
    $sql = "SELECT * FROM posts";
    $result = $conn->query($sql);

    $posts = mysqli_fetch_all($result,MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
   
</head>
<body class="container">
    <?php include('./header.php') ?>

   

    <?php foreach($posts as $post) : ?>
        <div class="card">
            <div class="card-body">
             <img src="<?= $post['img_path'] ?>" style="width:200px">
                <h5 class="card-title"><?=$post['title'] ?></h5>
                <p class="card-text"><?=$post['body'] ?></p>
                <a class="btn btn-primary" href="<?=$baseURL?>post.php?id=<?=$post['id']?>">See Detail</a>
            </div>
        </div>
    <?php endforeach ?>
    
</body>
</html>