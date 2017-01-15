<?php
// Home
$app->match('/', function () use ($app) {
    require '../models/classemodel.php';
    require '../models/studentmodel.php';

    $classes = getAllClasses();

    // get students from the class supplied
    if (isset($_POST['classe'])) {
        $classe = $_POST['classe'];
        $students = getStudentByClasse($classe);
        $nbStudents = 1;
    }
    ob_start();
    require '../views/home.php';
    $view = ob_get_clean();
    return $view;
});