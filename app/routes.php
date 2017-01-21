<?php
use GestSchool\Domain\Classe;
use GestSchool\Form\Type\ClassListType;
use Symfony\Component\HttpFoundation\Request;

// Home
$app->get('/', 
    function (Request $request) use ($app) {
        // get all classes
        $classes = $app['dao.class']->findAll();
        // build form
        $class = new Classe();
        $form = $app['form.factory']->create(ClassListType::class, $class, 
            array('classes' => $classes));
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $code = $class->getCode();
            return $app->redirect(
                $app['url_generator']->generate('class_list', array('code' => $code)));
        }
        
        return $app['twig']->render('home.html.twig');
    })
    ->bind('home');
    
// Choose class
$app->match('/class', 
    function (Request $request) use ($app) {
        // get all classes
        $classes = $app['dao.class']->findAll();
        // build form
        $class = new Classe();
        $form = $app['form.factory']->create(ClassListType::class, $class, 
            array('classes' => $classes));
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $code = $class->getCode();
            return $app->redirect(
                $app['url_generator']->generate('class_list', array('code' => $code)));
        }
        
        return $app['twig']->render('chooseclass.html.twig', 
            array('form' => $form->createView(),'code' => current($classes)));
    })
    ->bind('choose_class');

$app->match('/class/{code}/list', 
    function ($code, Request $request) use ($app) {
        $classes = $app['dao.class']->findAll();
        $classCode = $code ? $code : current($classes);
        $students = $app['dao.student']->findAllByClass($classCode);
        
        $class = new Classe();
        $form = $app['form.factory']->create(ClassListType::class, $class, 
            array('classes' => $classes));
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            return $app->redirect(
                $app['url_generator']->generate('class_list', 
                    array('code' => $class->getCode())));
        }
        
        return $app['twig']->render('classlist.html.twig', 
            array(
                'code' => $code,
                'form' => $form->createView(),
                'students' => $students));
    })
    ->bind('class_list');