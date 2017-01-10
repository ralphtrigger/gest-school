<?php
require '../models/classemodel.php';
require '../models/studentmodel.php';

$classes = getAllClasses();

// get students from the class supplied
if (isset($_POST['classe'])) {
    $classe = $_POST['classe'];
    $students = getStudentByClasse($classe);
    $nbStudents = 1;
}

require '../views/home.php';
