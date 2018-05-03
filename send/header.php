<?php
const _DB_HOST='localhost';
const _DB_ID='u593351327_jaan';
const _DB_PW='jaan12345';
const _DB_NAME='u593351327_jaan';

$mysqli = new mysqli(_DB_HOST, _DB_ID, _DB_PW, _DB_NAME);
if ($mysqli->connect_error) {
    die('無法連上資料庫 (' . $mysqli->connect_errno . ') '
        . $mysqli->connect_error);
}
$mysqli->set_charset("utf8");

date_default_timezone_set("Asia/Taipei");
