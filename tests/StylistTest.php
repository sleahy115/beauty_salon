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

           //Assert
           $this->assertEmpty(false,$result[1]);
       }
       function test_deleteAll()
       {
           //Arrange
           Stylist::getAll();

           //Act
           $result = Stylist::deleteAll();

           //Act
           $this->assertEquals(null, $result);
       }

       function test_find()
       {
            //Arrange
           $stylist_name = "Debbie";
           $id = 1;
           $stylist_test = new Stylist($stylist_name, $id);
           $stylist_test->save();

           //Act
           $result = Stylist::find($stylist_test->getId());

           //Act
           $this->assertEquals($stylist_test, $result);
       }

       function test_update()
       {
           //Arrange
          $stylist_name = "Debbie";
          $new_name = "Deb";
          $id = 1;
          $stylist_test = new Stylist($stylist_name, $id);
          $updated = $stylist_test->update($new_name);
          $stylist_test->save();

          //Act
          $result = $stylist_test->update($new_name);
          //Assert
          $this->AssertEquals($updated, $result);
       }

       function test_delete()
       {
          //Arrange
          $stylist_name = "Debbie";
          $id = 1;
          $stylist_test = new Stylist($stylist_name, $id);
          $stylist_test->save();

          //Act
          $result = $stylist_test->delete();

          //Assert
          $this->assertEquals(null, $result);

       }


    }
