<?php

$connection = new mysqli( 'localhost', 'root','','phpproyect01');

if (!$connection) {
    die("connection failed" . mysqli_connect_error());

}
