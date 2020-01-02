<?php 
      include('./connectdb.php');
       session_start();
      $title;
      $body;
      $author;
    //   UPLOAD IMAGE
   
  
      if(!empty($_REQUEST['title'])) {
             $image_dir = "images/";
      $image_name = $image_dir. $_FILES['fileToUpload']['name'];
      if($_FILES['fileToUpload']) {
         if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $image_name)) {
            
         }
          
      }
          $title = filter_var($_REQUEST['title'], FILTER_SANITIZE_STRING);
          $body = filter_var($_REQUEST['body'], FILTER_SANITIZE_STRING);
          $author = filter_var($_REQUEST['author'], FILTER_SANITIZE_STRING);
            $query = "INSERT INTO posts (title, body, author, img_path) VALUES ('$title','$body','$author','$image_name')";
            $message ='';
            if($conn->query($query)) {
                $message = 'Successful added post';
            }
            else {
                $message = "Error when created by {$conn->error}";
            }
            $_SESSION['message'] = $message;
            header("Location:{$baseURL}");
      }
      else {
          echo "You have to fill all the field";
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
    <form action="<?= $baseURL ?>create.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Your blog title">
        </div>
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" name="author"id="author" class="form-control" placeholder="Your name">
        </div>
          <div class="form-group">
            <label for="body">Body</label>
            <textarea type="text" id="body" name="body" class="form-control" placeholder="Your blog body"></textarea>
        </div>
        <div class="form-group">
            <input type="file" name="fileToUpload" id="fileToUpload">
        </div>
        <input type="submit" name="submit" class="btn btn-primary" value="Submit">
    </form>
</body>
</html>