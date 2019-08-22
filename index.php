<?php
// Подключение необходимых файлов
require_once('./uttils/helpers.php');
require_once('./uttils/data.php');
require_once('./uttils/functions.php');
require_once('./uttils/db.php');

$link = mysqli_connect($db['host'], $db['user'], $db['password'], $db['database']);

if (!$link) {
    $error = mysqli_connect_error();
    $mainContent = include_template('error.php', ['error' => $error]);
} else {
    mysqli_set_charset($link, 'utf8');

    $sql = "SELECT name FROM project WHERE userId = ?";
    $data = [1];
    $projects = db_fetch_data($link, $sql, $data);

    $sql = "SELECT t.name AS taskName, p.name AS category, createdDate, taskStatus, fileUrl, termDate FROM task t JOIN project p ON t.projectId = p.id WHERE t.userId = ?";
    $date = [1];
    $tasks = db_fetch_data($link, $sql, $data);

    // HTML код главной странцы
    $mainContent = include_template('main.php', ['projects' => $projects, 'tasks' => $tasks, 'show_complete_tasks' => $show_complete_tasks]);
}

// Итоговый HTML код
$layoutContent = include_template('layout.php', ['title' => 'Дела в порядке', 'userName' => 'Константин', 'content' => $mainContent]);

print($layoutContent);
