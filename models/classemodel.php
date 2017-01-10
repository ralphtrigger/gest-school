<?php
require_once 'dblink.php';

function getAllClasses()
{
    // get all classes' code
    $link = getConnection();
    $query = "select * from Classe order by code_cl";
    $classes = mysqli_query($link, $query);
    mysqli_close($link);
    return $classes;
}