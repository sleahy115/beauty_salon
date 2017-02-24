<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */
    require_once "src/Cuisine.php";
    require_once "src/Restaurant.php";

    $server = 'mysql:host=localhost:8889;dbname=beauty_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StylistTest extends PHPUnit_Framework_TestCase
    {
        function test_getAll()
        {
            $stylist_name = "Debbie";
            $id = 1;
            $stylist_test = new Stylist($stylist_name, $id);
            $stylist_test->save();

            $stylist_name = "Tom";
            $id = 2;
            $stylist_test = new Stylist($stylist_name, $id);
            $stylist_test->save();
            //Act
            $result = Stylist::getAll();
            //Assert
            $this->assertEquals($result[0],$stylist_test);
        }
        function test_save()
       {
           //Arrange
           $stylist_name = "Debbie";
           $id = 1;
           $stylist_test = new Stylist($stylist_name, $id);
           $stylist_test->save();

           $stylist_name = "Tom";
           $id = 2;
           $stylist_test = new Stylist($stylist_name, $id);
           $stylist_test->save();
           //Act
           $result = Stylist::getAll();
           //Assert
           $this->assertEquals($result[0],$stylist_test);
       }
    }
