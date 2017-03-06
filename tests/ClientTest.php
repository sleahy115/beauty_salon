<?php
/**
* @backupGlobals disabled
* @backupStaticAttributes disabled
*/
require_once "src/Client.php";

$server = 'mysql:host=localhost:8889;dbname=hair_salon';
$username = 'root';
$password = 'root';
$DB = new PDO($server, $username, $password);

class ClientTest extends PHPUnit_Framework_TestCase
{
    function test_getAll()
    {
        $client_name = "Melissa";
        $id = 1;
        $stylist_id = 1;
        $client_test = new Client($client_name, $id, $stylist_id);
        $client_test->save();

        $client_name2 = "Tim";
        $id2 = 2;
        $stylist_id2 = 1;
        $client_test2 = new Client($client_name2, $id2, $stylist_id);
        $client_test2->save();
        //Act
        $result = Client::getAll();
        //Assert
        $this->assertEmpty(false,$result);
    }

    function test_getStylistId()
    {
      $client_name = "Melissa";
      $id = 1;
      $stylist_id = 1;
      $client_test = new Client($client_name, $id, $stylist_id);
      $client_test->save();

      $result = $client_test->getStylistId();

      $this->AssertEquals(1, $result);
    }
    function test_save()
   {
       //Arrange
       $client_name = "Melissa";
       $id = 1;
       $stylist_id = 1;
       $client_test = new Client($client_name, $id, $stylist_id);
       $client_test->save();

       $client_name2 = "Tim";
       $id2 = null;
       $stylist_id = 1;
       $client_test2 = new Client($client_name2, $id2, $stylist_id);
       $client_test2->save();
       //Act
       $result = Client::getAll();

       //Assert
       $this->assertEmpty(false,$result);
   }
   function test_deleteAll()
   {
       //Arrange
       Client::getAll();

       //Act
       $result = Client::deleteAll();

       //Act
       $this->assertEquals(null, $result);
   }

   function test_find()
   {
        //Arrange
       $client_name = "Debbie";
       $id = 1;
       $stylist_id = 1;
       $client_test = new Client($client_name, $id, $stylist_id);
       $client_test->save();

       //Act
       $result = Client::find($client_test->getClientId());

       //Act
       $this->assertEquals($client_test, $result);
   }

   function test_update()
   {
       //Arrange
      $client_name = "Debbie";
      $new_name = "Deb";
      $id = 1;
      $stylist_id = 1;
      $client_test = new Client($client_name, $id, $stylist_id);
      $updated = $client_test->update($new_name);
      $client_test->save();

      //Act
      $result = $client_test->update($new_name);
      //Assert
      $this->AssertEquals($updated, $result);
   }

   function test_delete()
   {
      //Arrange
      $client_name = "Debbie";
      $id = 1;
      $stylist_id = 1;
      $client_test = new Client($client_name, $id, $stylist_id);
      $client_test->save();

      //Act
      $result = $client_test->delete();

      //Assert
      $this->assertEquals(null, $result);

   }

   function test_findStylist()
   {
     $client_name = "Debbie";
     $id = 1;
     $stylist_id = 1;
     $client_test = new Client($client_name, $id, $stylist_id);
     $client_test->save();

     $client_name2 = "Tom";
     $id2 = 2;
     $stylist_id2 = 1;
     $client_test2 = new Client($client_name2, $id2, $stylist_id2);
     $client_test2->save();

     $stylist_name = "Tom";
     $id = 2;
     $stylist_test = new Stylist($stylist_name, $id);
     $stylist_test->save();

     $result = Client::findByStylist($stylist_test);

     $this->assertEquals([$client_test, $client_test2], $result);
   }

}
 ?>
