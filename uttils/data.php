<?php
// показывать или нет выполненные задачи
$show_complete_tasks = rand(0, 1);

// Массив проектов
// $projects = ["Входящие", "Учеба", "Работа", "Домашние дела", "Авто"];
// Массив задач
// $tasks = [
//     [
//         "taskName" => "Собеседование в IT компании",
//         "dateCompletion" => "01.12.2019",
//         "category" => "Работа",
//         "completed" => false
//     ],
//     [
//         "taskName" => "Выполнить тестовое задание",
//         "dateCompletion" => "25.12.2019",
//         "category" => "Работа",
//         "completed" => false
//     ],
//     [
//         "taskName" => "Сделать задание первого раздела",
//         "dateCompletion" => "21.12.2019",
//         "category" => "Учеба",
//         "completed" => true
//     ],
//     [
//         "taskName" => "Встреча с другом",
//         "dateCompletion" => "18.08.2019",
//         "category" => "Входящие",
//         "completed" => false
//     ],
//     [
//         "taskName" => "Купить корм для кота",
//         "category" => "Домашние дела",
//         "completed" => false
//     ],
//     [
//         "taskName" => "Заказать пиццу",
//         "category" => "Домашние дела",
//         "completed" => false
//     ]
// ];

$db = [
    "host" => "localhost",
    "database" => "doingsdone",
    "user" => "root",
    "password" => ""
];
