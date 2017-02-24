<?php
/**
* @backupGlobals disabled
* @backupStaticAttributes disabled
*/
require_once "src/Client.php";

$server = 'mysql:host=localhost:8889;dbname=hair_salon_test';
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
       var_dump($result);

       //Assert
       $this->assertEmpty(false,$result);
   }
}
 ?>
