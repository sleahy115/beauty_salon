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

        function getStylistName()
        {
            return $this->stylist_name;
        }

        function setStylistName($new_stylist)
        {
            $this->stylist_name = $new_stylist;
        }
        function save()
        {
          $stylist = $GLOBALS['DB']->exec("INSERT INTO stylists (stylist_name) VALUES ('{$this->getStylistName()}');");
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

        }
        function find()
        {

        }
        function update()
        {

        }
        function delete()
        {

        }
    }

 ?>
