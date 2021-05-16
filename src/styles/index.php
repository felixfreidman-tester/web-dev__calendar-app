<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/src/styles/index.css" />
    <link
      rel="shortcut icon"
      href="/src/images/favicon.png"
      type="image/x-icon"
    />
    <title>Main Page: Calendar Page</title>
  </head>
  <body>
    <?php
      $servername = "127.0.0.1";
      $dbname = 'calendarapp60';
      $username = 'calendarapp60';
      $password = 'wsflt20a';
      $dbo = new PDO("mysql:host=" . $servername . ";port=3306;dbname=" . $dbname, $username, $password);
// INSERT INTO `calendarapp60`.`tasks` (`topic`, `type`, `due_date`, `duration`, `comment`) VALUES ('Домашняя Работа', 'Дело', '2021-05-28', '11', 'Сделать срочно!');

      ?>
    <header class="header-section">
      <div class="header-section__logo-section">
        <img src="/src/images/favicon.png" alt="" />
        <span>CALENDAR APP</span>
      </div>
      <div class="header-section__navigation-section">
        <a href="index.php">
          <div class="header-section__navigation-link">Tasks List</div>
        </a>
        <a href="/src/pages/createTask.php">
          <div class="header-section__navigation-link">Add Task</div>
        </a>
      </div>
    </header>
    <main class="main-section">
      <form class="main-section__filter-form" method="POST">
        <select
          name="selectTypeofTask"
          id="typeSelect"
          class="filter-form__input-select"
        >
          <option value="anyTask" selected>Any Tasks</option>
          <option value="ongoingTask">Ongoing Tasks</option>
          <option value="expiredTask">Expired Tasks</option>
          <option value="completedTask">Completed Tasks</option>
        </select>
        <button type="submit" class="filter-form__input-button">
          Apply
        </button>
      </form>
      <div class="main-section__task-section">
        <span class="task-section__header">Tasks List</span>
        <div class="task-section__content">
          <?php
foreach ($dbo->query('SELECT * FROM `tasks`;') as $row) {
    echo
        '<div class="task-section__task-card">
  <div class="task-card__content">
    <div class="task-card__column">
      <span class="task-card__header-name">Topic</span>
      <span class="task-card-body-name task-card__topic"
        >' . $row['topic'] . '</span
      >
    </div>
    <div class="task-card__column">
      <span class="task-card__header-name">Type</span>
      <span class="task-card-body-name task-card__type">' . $row['type'] . '</span>
    </div>
    <div class="task-card__column">
      <span class="task-card__header-name">Date</span>
      <span class="task-card-body-name task-card__date">
      ' . $row['due_date'] . '
      </span>
    </div>
    <div class="task-card__column">
      <span class="task-card__header-name">Duration</span>
      <span class="task-card-body-name task-card__duration">
      ' . $row['duration'] . ' hours
      </span>
    </div>
    <div class="task-card__column">
      <span class="task-card__header-name">Comment</span>
      <span class="task-card-body-name task-card__comment"></span>
      ' . $row['comment'] . '
      </span>
    </div>
  </div>
  <div class="task-card__tool-panel">
    <button
      type="button"
      class="task-card__btn task-card__edit-btn"
    ></button>
    <button
      type="button"
      class="task-card__btn task-card__delete-btn"
    ></button>
  </div>
</div>';

}?>
        </div>
      </div>
    </main>
  </body>
</html>
