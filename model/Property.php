<?php

namespace Model;

class Property extends ActiveRecord
{
    protected static $table = 'properties';
    protected static $columnsDB = ['id', 'titles', 'price', 'images', 'description', 'rooms', 'wc', 'parking', 'created', 'sellersid'];

    public $id;
    public $titles;
    public $price;
    public $images;
    public $description;
    public $rooms;
    public $wc;
    public $parking;
    public $created;
    public $sellersid;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->titles = $args['titles'] ?? '';
        $this->price = $args['price'] ?? '';
        $this->images = $args['images'] ?? '';
        $this->description = $args['description'] ?? '';
        $this->rooms = $args['rooms'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->parking = $args['parking'] ?? '';
        $this->created = date('Y/m/d');
        $this->sellersid = $args['sellersid'] ?? '';
    }

    public function validate() {
       

        //files to a variable
     
        
        if(!$this->titles) {
           self::$fixs[] = "You must add a title";
        }
     
        if(!$this->price) {
            self::$fixs[] = "The price is mandatory";
        }
     
        if(strlen($this->description) < 50) {
            self::$fixs[] = "The description is required and must have at least 50 characters";
        }
     
        if(!$this->rooms) {
            self::$fixs[] = "The number of rooms is required";
        }
     
        if(!$this->wc) {
            self::$fixs[] = "The number of bathrooms is required";
        }
     
        if(!$this->parking) {
            self::$fixs[] = "The number of parking lots is mandatory";
        }
     
        if(!$this->sellersid) {
            self::$fixs[] = "Choose the seller";
        }
     
         if(!$this->images) {
             self::$fixs[] = 'The image is Mandatory';
         }
     
            return self::$fixs;
        }
     

}