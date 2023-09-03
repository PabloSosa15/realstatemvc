<?php

namespace Model;

class Sellers extends ActiveRecord {

    protected static $table = 'sellersid';
    protected static $columnsDB = ['id', 'name', 'lastname', 'phonenumber', 'email'];

    public $id;
    public $name;
    public $lastname;
    public $phonenumber;
    public $email;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->name = $args['name'] ?? '';
        $this->lastname = $args['lastname'] ?? '';
        $this->phonenumber = $args['phonenumber'] ?? '';
        $this->email = $args['email'] ?? '';
        }
    public function validate()
    {


        //files to a variable


        if (!$this->name) {
            self::$fixs[] = "The name is required";
        }
        if (!$this->lastname) {
            self::$fixs[] = "The last name is required";
        }
        if (!$this->phonenumber) {
            self::$fixs[] = "The phone number is required";
        }
        if(!$this->phonenumber) {
            self::$fixs[] = "Invalid format";
        }
        if (!$this->email) {
            self::$fixs[] = "The email is required";
        }
        return self::$fixs;
    }
}