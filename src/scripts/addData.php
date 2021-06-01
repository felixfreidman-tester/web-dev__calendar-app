<?php
      header("Location: https://calendarapp.hostfl.ru/index.php");
      $servername = "127.0.0.1";
      $dbname = 'calendarapp60';
      $username = 'calendarapp60';
      $password = 'wsflt20a';
      $dbo = new PDO("mysql:host=$servername;port=3306;dbname=$dbname", $username, $password);

try{
    $dbo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $topic = $_POST['topicInput'];
      $type = $_POST['typeInput'];
      $date = $_POST['dateInput'];
      $duration = $_POST['durationInput'];
      $comment = $_POST['commentInput'];
      $insert = "INSERT INTO `calendarapp60`.`tasks` (`topic`, `type`, `due_date`, `duration`, `comment`) VALUES ('$topic','$type','$date','$duration','$comment');";
    // $insert = 'INSERT INTO `calendarapp60`.`tasks` (topic, `type`, `due_date`, `duration`, `comment`) VALUES ("Homework","Business","28-01-2021","1","TEST3")'; 
    $dbo->exec($insert); 
    echo "New record created successfully";
}catch(PDOException $e)
{

    echo $sql . "<br>" . $e->getMessage();
}
exit();
            ?>