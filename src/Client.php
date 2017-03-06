<?php
class Client
{
    private $client_name;
    private $client_id;
    private $stylist_id;

    function __construct($client_name, $client_id = null, $stylist_id)
    {
        $this->client_name = $client_name;
        $this->client_id = $client_id;
        $this->stylist_id = $stylist_id;
    }

    function setClientName($new_name)
    {
         $this->client_name = $new_name;
    }
    function getClientName()
    {
         return $this->client_name;
    }
    function getClientId()
    {
         return $this->client_id;
    }
    function setClientId($new_id)
    {
         $this->client_id = $new_id;
    }
    function getStylistId()
    {
         return $this->stylist_id;
    }
    function setStylistId($new_id)
    {
         $this->stylist_id = $stylist_id;
    }
    function save()
    {
        $GLOBALS['DB']->exec("INSERT INTO clients(client_name, stylist_id) VALUES ('{$this->getClientName()}', {$this->getStylistId()});");
        $this->client_id = $GLOBALS['DB']->lastInsertId();
    }
    static function getAll()
    {
        $clients = array();
        $found_clients = $GLOBALS['DB']->query("SELECT * FROM clients;");
        foreach ($found_clients as $client) {
            $client_name = $client['client_name'];
            $id = $client['id'];
             $stylist_id = $client['stylist_id'];
             $new_client = new Client($client_name, $id, $stylist_id);
             array_push($clients,$new_client);
          }
        return $clients;
    }
    static function deleteAll()
    {
        $GLOBALS['DB']->exec("DELETE FROM clients;");
    }

    static function find($search_id)
    {
        $found_clients = null;
        $clients = Client::getAll();
        foreach ($clients as $client) {
            $client_id = $client->getClientId();
            if ($client_id == $search_id)
            {
                $found_clients = $client;
            }
    }
    return $found_clients;
    }
    function update($new_name)
    {
        $GLOBALS['DB']->exec("UPDATE clients SET client_name = '{$new_name}' WHERE id = {$this->getClientId()};");
        $this->setClientName($new_name);
    }
    function delete()
    {
        $GLOBALS['DB']->exec("DELETE FROM clients WHERE id = {$this->getClientId()};");
    }
    static function findByStylist($stylist)
    {
        $stylist_id = $stylist->getId();
        $found_clients = $GLOBALS['DB']->query("SELECT * FROM clients WHERE stylist_id = {$stylist_id};");
        $clients = array();
        foreach ($found_clients as $client) {
            $client_name = $client['client_name'];
            $id = $client['id'];
            $stylist_id = $client['stylist_id'];
            $new_client = new Client($client_name, $id, $stylist_id);
            array_push($clients,$new_client);
          }
        return $clients;
    }
}
 ?>
