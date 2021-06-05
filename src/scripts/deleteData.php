<?php
      header("Location: https://calendarapp.hostfl.ru/index.php");
      $servername = "127.0.0.1";
      $dbname = 'calendarapp60';
      $username = 'calendarapp60';
      $password = 'wsflt20a';
      $dbo = new PDO("mysql:host=$servername;port=3306;dbname=$dbname", $username, $password);
      $dbo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      
      $id = $_POST['idInputDelete'];
    $delete = "DELETE FROM `tasks` WHERE `id` = '$id'";
    echo $id;
    $dbo->exec($delete); 
    exit();
            ?>