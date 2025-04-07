<?php

class user
{

    private $conn;
    private $id;
    private $name;
    private $gmail;

    public function __construct($id, $name, $gmail)
    {

        $this->$id = $id;
        $this->$name = $name;
        $this->$gmail = $gmail;
    }

    public function getName():String{
        return $this->name;
    }

}
