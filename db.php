<?php

include "linksniai.php";
$l = new Linksniai;

$connection = mysqli_connect('localhost', 'teriai_vardai', 'Vs6VWfFfmSupu2fJ');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'teriai_vardai');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}
