<?php
      header("Location: https://calendarapp.hostfl.ru/index.php");
      $servername = "127.0.0.1";
      $dbname = 'calendarapp60';
      $username = 'calendarapp60';
      $password = 'wsflt20a';
      $dbo = new PDO("mysql:host=$servername;port=3306;dbname=$dbname", $username, $password);
      $dbo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $topic = $_POST['topicInputUpdate'];
      $type = $_POST['typeInputUpdate'];
      $date = $_POST['dateInputUpdate'];
      $duration = $_POST['durationInputUpdate'];
      $comment = $_POST['commentInputUpdate'];
      $id = $_POST['idInputUpdate'];

    //   UPDATE `tasks` SET `comment` = 'Hello', `type` = 'Business', `due_date` = '2021-07-30', `duration` = 1 WHERE `topic` = 'cure'
      $update = "UPDATE `tasks` SET `topic` = '$topic', `type` = '$type', `due_date` = '$date', `duration` = '$duration', `comment` = '$comment' WHERE `id` = '$id'";
    $dbo->exec($update); 
    exit();
            ?>