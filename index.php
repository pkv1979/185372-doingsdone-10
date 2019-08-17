<?php
// Подключение необходимых файлов
require_once('helpers.php');

// показывать или нет выполненные задачи
$show_complete_tasks = rand(0, 1);

// Массив проектов
$projects = ["Входящие", "Учеба", "Работа", "Домашние дела", "Авто"];
// Массив задач
$tasks = [
    [
        "taskName" => "Собеседование в IT компании",
        "dateCompletion" => "01.12.2018",
        "category" => "Работа",
        "completed" => false
    ],
    [
        "taskName" => "Выполнить тестовое задание",
        "dateCompletion" => "25.12.2018",
        "category" => "Работа",
        "completed" => false
    ],
    [
        "taskName" => "Сделать задание первого раздела",
        "dateCompletion" => "21.12.2018",
        "category" => "Учеба",
        "completed" => true
    ],
    [
        "taskName" => "Встреча с другом",
        "dateCompletion" => "22.12.2018",
        "category" => "Входящие",
        "completed" => false
    ],
    [
        "taskName" => "Купить корм для кота",
        "category" => "Домашние дела",
        "completed" => false
    ],
    [
        "taskName" => "Заказать пиццу",
        "category" => "Домашние дела",
        "completed" => false
    ]
];

function getCountProjects($arrayTask, $projectName) {
    $count = 0;

    foreach($arrayTask as $item) {
        if ($item["category"] === $projectName) {
            $count++;
        }
    }
    return $count;
}

// HTML код главной странцы
$mainContent = include_template('main.php', ['projects' => $projects, 'tasks' => $tasks, 'show_complete_tasks' => $show_complete_tasks]);
// Итоговый HTML код
$layoutContent = include_template('layout.php', ['title' => 'Дела в порядке', 'userName' => 'Константин', 'content' => $mainContent]);

print($layoutContent);
