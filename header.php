
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
     <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="navbar navbar-light bg-light">
        <ul class="navbar-nav">
            <li><a class="navbar-item <?php echo strpos($_SERVER['REQUEST_URI'],'index') ? 'btn-outline-success' :'' ?>" href="http://localhost/cms-php/index.php">Home</a></li>
             <li><a class="navbar-item <?php echo strpos($_SERVER['REQUEST_URI'],'create') ? 'btn-outline-success' :'' ?>" href="http://localhost/cms-php/create.php">Create</a></li>
        </ul>
    </div>
</body>
</html>