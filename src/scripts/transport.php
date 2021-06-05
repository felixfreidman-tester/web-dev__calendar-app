<?php
    $taskType = $_POST['showTasks'];
    if($taskType === 'ongoingTask') {
        header("Location: https://calendarapp.hostfl.ru/src/scripts/ongoingTasks.php");
    } else if($taskType === 'expiredTask'){
        header("Location: https://calendarapp.hostfl.ru/src/scripts/expiredTasks.php");
    } else
    header("Location: https://calendarapp.hostfl.ru/index.php");
    
?>