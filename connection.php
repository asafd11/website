<?php

$username = "booking";
$password = "david";
$hostname = "localhost"; 
$mysql_booking = new mysqli($hostname,$username , $password, 'booking');
$mysql_booking->set_charset("utf8");




