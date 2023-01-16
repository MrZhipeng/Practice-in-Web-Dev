 <!-------w-----------

    Assignment 3
    Name: Zhipeng Ding
    Date: 2022-08-02
    Description: Assignment 3 Blog
    
-------------------->

 <?php
     define('DB_DSN','mysql:host=localhost;dbname=serverside;charset=utf8');
     define('DB_USER','serveruser');
     define('DB_PASS','gorgonzola7!');     
     
     try {
         // Try creating new PDO connection to MySQL
         $db = new PDO(DB_DSN, DB_USER, DB_PASS);
     } catch (PDOException $e) {
         print "Error: " . $e->getMessage();
         die();
     }
 ?>