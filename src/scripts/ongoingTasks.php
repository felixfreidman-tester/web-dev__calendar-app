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
    <title>Ongoing Tasks</title>
  </head>
  <body>
    <?php
      $servername = "127.0.0.1";
      $dbname = 'calendarapp60';
      $username = 'calendarapp60';
      $password = 'wsflt20a';
      $dbo = new PDO("mysql:host=" . $servername . ";port=3306;dbname=" . $dbname, $username, $password);
// INSERT INTO `calendarapp60`.`tasks` (`topic`, `type`, `due_date`, `duration`, `comment`) VALUES ('Домашняя Работа', 'Дело', '2021-05-28', '11', 'Сделать срочно!');
$dbo->exec('SET NAMES "utf8";');
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
    <div class="dark">
    <div class="main-section__modal-window" id = "modalWindow">
     <form action="/src/scripts/updateData.php" class="main-section__form" method= "POST">
      <button type="button" class="main-section__form-btn" onclick="closeModalWindow()"></button>
        <div class="main-section__header">Edit the Task</div>
        <label for="topicInput" class="main-section__label">Topic</label>
        <input
          type="text"
          name="topicInputUpdate"
          id="topicInput"
          class="main-section__input-text"
          placeholder="Homework"
          pattern="^[a-zA-Z]+$"
          required
        />
        <label for="topicInput" class="main-section__label">Type</label>
        <select
          name="typeInputUpdate"
          id="typeInput"
          class="main-section__input-text"
        >
          <option value="Business">Business</option>
          <option value="Meeting">Meeting</option>
          <option value="Call">Call</option>
          <option value="Session">Session</option>
        </select>
        <label for="topicInput" class="main-section__label">Date</label>
        <input
          type="date"
          id="dateInput"
          name="dateInputUpdate"
          max="2021-12-31"
          class="main-section__input-text"
        />
        <label for="topicInput" class="main-section__label">Duration</label>
        <input
          type="text"
          name="durationInputUpdate"
          id="durationInput"
          class="main-section__input-text"
          placeholder="1 hour"
          pattern="^[ 0-9]+$"
          required
        />
        <label for="topicInput" class="main-section__label" style="visibility:none">Comment</label>
        <textarea
          type="text"
          name="commentInputUpdate"
          id="commentInput"
          class="main-section__input-text"
          style="visibility:none"
        ></textarea>
        <input
          type="text"
          readonly
          name="idInputUpdate"
          id="idInput"
          style = "visibility: hidden"
        />
        <button type="submit" class="main-section__btn">Submit</button>
      </form>
    </div>
    <div class="main-section__modal-window" id = "modalWindowDelete">
      <form action="/src/scripts/deleteData.php" class="main-section__form" method= "POST">
      <button type="button" class="main-section__form-btn" onclick="closeModalWindowDelete()"></button>
      <div class="container">
      <div class="main-section__header">Are you sure?</div>
        <button class = "container__form-btn" type="submit" name = "yesSubmit">Yes</button>
        <button class = "container__form-btn" type="button" onclick="closeModalWindowDelete()">No</button>
        <input
          type="text"
          readonly
          name="idInputDelete"
          id="idInputDelete"
          style = "visibility: hidden"
        />
      </div>
      </form>
    </div>
  </div>
    <main class="main-section">
    <form class="main-section__filter-form" method="POST" action = "/src/scripts/transport.php">
        <select
          name="showTasks"
          id="typeSelect"
          class="filter-form__input-select"
        >
          <option value="anyTask">Any Tasks</option>
          <option value="ongoingTask"  selected>Ongoing Tasks</option>
          <option value="expiredTask" >Expired Tasks</option>
        </select>
        <button type="submit" class="filter-form__input-button">
          Apply
        </button>
      </form>
      <div class="main-section__task-section">
        <span class="task-section__header">Ongoing Tasks List</span>
        <div class="task-section__content">
          <?php
          $currentDay  = date("d");
          $currentMonth = date("m");
          $currentYear = date("Y");
          $currentDate = $currentYear . '-' . $currentMonth . '-' . $currentDay;
          foreach ($dbo->query("SELECT * FROM `tasks` WHERE `due_date` > '$currentDate';") as $row) {
            echo
              '<div class="task-section__task-card" id = "node'.$row['id'].'">
                  <div class="task-card__content">
                    <div class="task-card__column">
                      <div class="task-card__header-name">Topic</div>
                      <div class="task-card-body-name task-card__topic node'.$row['id'].'">' . $row['topic'] . '
                        </div>
                    </div>
                    <div class="task-card__column">
                      <div class="task-card__header-name">Type</div>
                      <div class="task-card-body-name task-card__type node'.$row['id'].'">' . $row['type'] . '</div>
                    </div>
                    <div class="task-card__column">
                      <div class="task-card__header-name">Date</div>
                      <div class="task-card-body-name task-card__date node'.$row['id'].'" >
                      ' . $row['due_date'] . '
                      </div>
                    </div>
                    <div class="task-card__column">
                      <div class="task-card__header-name">Duration(HOURS)</div>
                      <div class="task-card-body-name task-card__duration node'.$row['id'].'" >
                      '.$row['duration'].'
                      </div>
                    </div>
                    <div class="task-card__column">
                      <div class="task-card__header-name">Comment</div>
                      <div class="task-card-body-name task-card__comment node'.$row['id'].'">
                      ' . $row['comment'] . '
                      </div>
                    </div>
                  </div>
                  <div class="task-card__tool-panel">
                    <button
                      type="button"
                      class="task-card__btn task-card__edit-btn node'.$row['id'].'"
                      onclick=openModalWindow("node'.$row['id'].'")
                    >
                    </button>
                    <button
                      type="button"
                      class="task-card__btn task-card__delete-btn"
                      onclick=openModalWindowToDelete("node'.$row['id'].'")
                    ></button>
                  </div>
        </div>';
        
        }?>
                </div>
              </div>
            </main>
            <script src="/src/scripts/index.js"></script>
          </body>
        </html>
        