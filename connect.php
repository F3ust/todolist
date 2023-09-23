<?php
    $dbserver = 'sql207.byethost24.com';
    $dbusername = 'b24_35089670';
    $dbpassword = 'Phu0ng@nh';
    $dbname = 'b24_35089670_faust1';

    $connect = new mysqli($dbserver, $dbusername, $dbpassword, $dbname);
    if ($connect->connect_error) {
        die($connect->connect_error);
    }
?>
