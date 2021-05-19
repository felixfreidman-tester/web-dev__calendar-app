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
    <header class="header-section">
      <div class="header-section__logo-section">
        <img src="/src/images/favicon.png" alt="" />
        <span>CALENDAR APP</span>
      </div>
      <div class="header-section__navigation-section">
        <a href="../../index.php">
          <div class="header-section__navigation-link">Tasks List</div>
        </a>
        <a href="/src/pages/createTask.php">
          <div class="header-section__navigation-link">Add Task</div>
        </a>
      </div>
    </header>
    <main class="main-section">
      <form action="/src/scripts/addData.php" class="main-section__form" method= "POST">
        <div class="main-section__header">Create the Task</div>
        <label for="topicInput" class="main-section__label">Topic</label>
        <input
          type="text"
          name="topicInput"
          id="topicInput"
          class="main-section__input-text"
          placeholder="Homework"
          pattern="^[a-zA-Z]+$"
          required
        />
        <label for="topicInput" class="main-section__label">Type</label>
        <select
          name="typeInput"
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
          name="dateInput"
          max="2021-12-31"
          class="main-section__input-text"
        />
        <label for="topicInput" class="main-section__label">Duration</label>
        <input
          type="text"
          name="durationInput"
          id="durationInput"
          class="main-section__input-text"
          placeholder="1 hour"
          pattern="^[ 0-9]+$"
          required
        />
        <label for="topicInput" class="main-section__label">Comment</label>
        <textarea
          type="text"
          name="commentInput"
          id="commentInput"
          class="main-section__input-text"
          required
        ></textarea>
        <button type="submit" class="main-section__btn">Submit</button>
      </form>
    </main>
    <script src="/src/scripts/index.js"></script>
    
  </body>
</html>
