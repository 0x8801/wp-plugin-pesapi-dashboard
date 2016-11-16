<?php

   function connect(){
   
   // import connection params
    $user = DATABASE_USER;
    $pass = DATABASE_PASSWORD;
    $host = DATABASE_HOST;
    $pesapi_db = PESAPI_DATABASE;
    
    return mysqli_connect($host,$user,$pass,$pesapi_db);
  }
?>
