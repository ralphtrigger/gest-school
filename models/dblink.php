<?php

function getConnection()
{
    // Database parameters
    $host = 'localhost';
    $user = 'gestschool_user';
    $passwd = 'password';
    $dbname = 'gestschooldb';
    
    // Connection to database
    $link = mysqli_connect($host, $user, $passwd, $dbname);
    
    return $link;
}