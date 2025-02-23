<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$con = mysqli_connect('db', 'admin', 'admin123', 'db_tarz');
if (!$con) {
    echo 'please check your Database connection';
}
