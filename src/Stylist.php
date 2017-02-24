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
            $this->stylist_name = $stylist_name;
        }
        function setStylistName()
        {
            return $this->stylist_name;
        }
        function save()
        {

        }
        static function getAll()
        {

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
