<?php
date_default_timezone_set('Europe/Kiev');

/**
 * Подситывает количество проектов
 * @param array $arrayTask Массив с данными для поиска
 * @param string $projectName Название проекта
 * @return integer Количество проектов в массиве
 */
function getCountProjects($arrayTask, $projectName) {
    $count = 0;

    foreach($arrayTask as $item) {
        if ($item["category"] === $projectName) {
            $count++;
        }
    }
    return $count;
}

/**
 * Определяет является ли задача важной. (Если осталось 24 часа или меньше до завершения)
 * @param string $dateToEnd Время когда необходимо завершить задачу
 * @return bool True если задача важная
 */
function isTaskImportant($dateToEnd) {
    return floor((strtotime($dateToEnd) - time()) / 3600) <= 24 ? true : false;
    // return floor(date_diff(strtotime($dateToEnd), date('d.m.Y'))) <= 24 ? true : false;
}