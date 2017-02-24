<?php
    date_default_timezone_set ("America/Los_Angeles");

    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Stylist.php";


    $app = new Silex\Application();

    $server = 'mysql:host=localhost:8889;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    $app['debug'] = true;

     use Symfony\Component\HttpFoundation\Request;
     Request::enableHttpMethodParameterOverride();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

        $app->get("/", function() use ($app) {
           return $app['twig']->render("stylist_list.html.twig", array('stylists'=>Stylist::getAll()));
       });
       $app->post("/", function() use ($app) {
           $new_stylist = new Stylist($_POST['stylist_name'], null);
           $new_stylist->save();
          return $app['twig']->render("stylist_list.html.twig", array('stylists'=>Stylist::getAll()));
      });

return $app;
