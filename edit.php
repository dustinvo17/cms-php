<?php
      include('./connectdb.php');
          session_start();
        $id;
        if($_REQUEST['id']) {
            $id = $_REQUEST['id'];
        }
        $query = "SELECT * FROM posts WHERE id = '$id'";
        $result = $conn->query($query);
        $post = mysqli_fetch_assoc($result);
        if(!empty($_POST['title'])){
            $title = $_POST['title'];
            $body = $_POST['body'];
            $author = $_POST['author'];
            $id = $_POST['id'];
            
            $editQuery = "UPDATE posts SET title ='$title' , body ='$body' , author = '$author'  WHERE id = $id ";
            $message ='';
           
            
             if($conn->query($editQuery)) {
                $message = 'Successful edit post';
            }
            else {
                $message = "Error when edit by {$conn->error}";
            }
            $_SESSION['message'] = $message;
            header("Location:{$baseURL}");
        }

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
    <?php include('./header.php')?>
    <form action="<?= $baseURL ?>edit.php" method="POST"  enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Your blog title" value="<?= $post['title']?>">
        </div>
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" name="author"id="author" class="form-control" placeholder="Your name" value="<?= $post['author'] ?>">
        </div>
          <div class="form-group">
            <label for="body">Body</label>
            <textarea type="text" id="body" name="body" class="form-control" placeholder="Your blog body" ><?= $post['body'] ?></textarea>
        </div>
         <div class="form-group">
            <input type="file" name="fileToUpload" id="fileToUpload">
        </div>
        <input type="hidden" name="id" value="<?= $post['id'] ?>">
        <input type="submit" name="submit" class="btn btn-primary" value="Submit">
    </form>
</body>
</html>