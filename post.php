<?php 
    include('./connectdb.php');
    $id;
    if($_REQUEST['id']) {
        $id = $_REQUEST['id'];
    }
    $query = "SELECT * FROM posts WHERE id = '$id'";
    $result = $conn->query($query);
    $post = mysqli_fetch_assoc($result);
    if(isset( $_POST['delete'])) {
        $deleteID = $_POST['delete'];
        
        $deleteQuery = "DELETE from posts WHERE id = '$deleteID'";
        if($conn->query($deleteQuery)) {
            header("Location:{$baseURL}index.php");
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body class="container">
    <?php include('./header.php') ?>
    
        <div class="card">
            <div class="card-body">
                <img src="<?= $post['img_path'] ?>" style="width:200px">
                <h5 class="card-title">Title: <?=$post['title'] ?></h5>
                <h6 class="card-subtitle">Author: <?=$post['author']?></h6>
                <p class="card-text">Body: <?=$post['body'] ?></p>
                <p class="card-text">Created at: <?=$post['created_at'] ?></p>
                <a href="<?=$baseURL?>index.php">Back</a>
                <a href="<?=$baseURL?>edit.php?id=<?= $id ?>" class="float-right">Edit</a>
                <form  action="<?= $baseURL ?>post.php" method="POST">
                    <input type="hidden" name="delete" value="<?= $post['id']?>">
                    <input type="submit" class="btn btn-danger" value="Delete">
                </form>
            </div>
        </div>
    
</body>
</html>