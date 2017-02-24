<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */
    require_once "src/Stylist.php";

    $server = 'mysql:host=localhost:8889;dbname=hair_salon_test';
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

            $stylist_name2 = "Tom";
            $id2 = 2;
            $stylist_test2 = new Stylist($stylist_name2, $id2);
            $stylist_test2->save();
            //Act
            $result = Stylist::getAll();
            //Assert
            $this->assertEmpty(false,$result);
        }
        function test_save()
       {
           //Arrange
           $stylist_name = "Debbie";
           $id = 1;
           $stylist_test = new Stylist($stylist_name, $id);
           $stylist_test->save();

           $stylist_name2 = "Tom";
           $id2 = null;
           $stylist_test2 = new Stylist($stylist_name2, $id2);
           $stylist_test2->save();
           //Act
           $result = Stylist::getAll();
           var_dump($result[0]);
           var_dump($stylist_test);

           //Assert
           $this->assertEmpty(false,$result[1]);
       }
    }
