<?php
$conn = mysqli_connect("php-website.cefkjzu19slj.us-east-1.rds.amazonaws.com", "admin", "12345678", "login2");

if (!$conn) {
    echo "Connection Failed";
}
