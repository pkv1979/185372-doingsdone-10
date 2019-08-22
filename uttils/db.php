<?php

require_once('helpers.php');
require_once('data.php');

/**
 * Функция для чтения данных из базы данных
 * @param $link значение возвращаемое функцией подключения к БД
 * @param string $sql SQL запрос
 * @param array $data массив с данными
 * @return array результат выполнения запроса
 */
function db_fetch_data($link, $sql, $data = []) {
    $result = [];
    $stmt = db_get_prepare_stmt($link, $sql, $data);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);

    if ($res) {
        $result = mysqli_fetch_all($res, MYSQLI_ASSOC);
    }

    return $result;
}

/**
 * Функция для вставки записи в базу данных
 * @param $link значение возвращаемое функцией подключения к БД
 * @param string $sql SQL запрос
 * @param array $data массив с данными
 * @return integer id добавленной записи
 */
function db_insert_data($link, $sql, $data = []) {
    $stmt = db_get_prepare_stmt($link, $sql, $data);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        $result = mysqli_insert_id($link);
    }

    return $result;
}
