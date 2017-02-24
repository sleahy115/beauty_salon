<?php
    date_default_timezone_set ("America/Los_Angeles");

    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Stylist.php";


    $app = new Silex\Application();

    $server = 'mysql:host=localhost:8889;dbname=hair_salon';
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
    $app->get("/delete_all", function() use ($app) {
        Stylist::getAll();
        Stylist::deleteAll();
     return $app['twig']->render("stylist_list.html.twig", array('stylists'=>Stylist::getAll()));
    });
    $app->get("/update_stylist/{id}", function($id) use ($app) {
        $stylist_found = Stylist::find($id);
        return $app['twig']->render("update_stylist.html.twig", array('stylists'=>Stylist::getAll(),'stylist'=>$stylist_found));
    });
    $app->patch("/updated_stylist/{id}", function($id) use ($app) {
        $new_name = $_POST['new_name'];
        $stylist = Stylist::find($id);
        $stylist->update($new_name);
        return $app['twig']->render("stylist_list.html.twig", array('stylists'=>Stylist::getAll()));
    });
    $app->delete("/deleted_stylist/{id}", function($id) use ($app) {
        $stylist = Stylist::find($id);
        $stylist->delete();
        return $app['twig']->render("stylist_list.html.twig", array('stylists'=>Stylist::getAll()));
    });


return $app;
