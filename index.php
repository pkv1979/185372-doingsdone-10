<?php
// Подключение необходимых файлов
require_once('./uttils/helpers.php');
require_once('./uttils/data.php');
require_once('./uttils/functions.php');


// HTML код главной странцы
$mainContent = include_template('main.php', ['projects' => $projects, 'tasks' => $tasks, 'show_complete_tasks' => $show_complete_tasks]);
// Итоговый HTML код
$layoutContent = include_template('layout.php', ['title' => 'Дела в порядке', 'userName' => 'Константин', 'content' => $mainContent]);

print($layoutContent);
