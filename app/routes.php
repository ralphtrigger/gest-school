<?php
// Home
$app->match('/', 
    function () use ($app) {
        $classes = $app['dao.class']->findAll();
        
        // get students from the class supplied
        if (isset($_POST['classe'])) {
            $classe = $_POST['classe'];
            $students = $app['dao.student']->findAllByClass($classe);
            $nbStudents = 1;
        }
        
        ob_start();
        require '../views/home.php';
        $view = ob_get_clean();
        return $view;
    });