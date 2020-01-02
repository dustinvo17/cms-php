<?php 
    $baseURL = 'http://localhost/cms-php/';
    $conn = new mysqli('localhost','root','','phpblog');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
  



    


?>