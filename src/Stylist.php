<?php
    class Stylist
    {
        private $stylist_name;
        private $id;
        function __construct($stylist_name, $id)
        {
            $this->stylist_name = $stylist_name;
            $this->id = $id;
        }

        function setStylistName($new_name)
        {
            $this->stylist_name = $new_name;

        }

        function getStylistName()
        {
            return $this->stylist_name;
        }
        function getId()
        {
            return $this->id;
        }
        function setId($new_id)
        {
            $this->id = $new_id;
        }
        function save()
        {
          $GLOBALS['DB']->exec("INSERT INTO stylists (stylist_name) VALUES ('{$this->getStylistName()}');");
          $this->id = $GLOBALS['DB']->lastInsertId();
        }
        static function getAll()
        {
          $stylists = array();
          $found_stylists = $GLOBALS['DB']->query("SELECT * FROM stylists;");
          foreach ($found_stylists as $stylist) {
             $stylist_name = $stylist['stylist_name'];
             $id = $stylist['id'];
             $new_stylist = new Stylist($stylist_name, $id);
             array_push($stylists,$new_stylist);
          }
          return $stylists;
        }
        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM stylists;");
        }
        static function find($search_id)
    {
        $found_stylist = null;
        $stylists = Stylist::getAll();
        foreach ($stylists as $stylist) {
            $stylist_id = $stylist->getId();
            if ($stylist_id == $search_id)
            {
                $found_stylist = $stylist;
            }
        }
        return $found_stylist;
    }
        function update($new_name)
        {
            $GLOBALS['DB']->exec("UPDATE stylists SET stylist_name = '{$new_name}' WHERE id = {$this->getId()};");
            $this->setStylistName($new_name);
        }
        function delete()
        {
            $GLOBALS['DB']->exec("DELETE FROM stylists WHERE id = {$this->getId()};");
        }
    }
 ?>
