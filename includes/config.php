<?php
ob_start();
session_start();

$timezone = date_default_timezone_set("America/New_York");

$con = mysqli_connect("localhost", "root", "", "spotify");

if (mysqli_connect_errno()) {
    echo "Failed to connect to database: " . mysqli_connect_errno();
}
