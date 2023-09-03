<?php

namespace Model;

class ActiveRecord{
   //DT
   protected static $db;
   protected static $columnsDB = [];
   protected static $table = '';
    
    
   //Fixs
   protected static $fixs = [];

    public $id;
    public $images;

    public $name;
    public $lastname;
    public $phonenumber;
    public $email;


   // Define the connection to the database
   public static function setDB($database) {
           self::$db = $database;
    }



   public function save() {
       if(!is_null($this->id)){
           //Update
           $this->update();
       } else {
           //Create a new register
           $this->create();
       }
   }


   public function create() {

        //Sanitize data 
       $attributes = $this->sanitizeData();



       //Insert in the db
       $query = " INSERT INTO " . static::$table . " ( ";
       $query .= join(', ', array_keys($attributes));
       $query .=  " ) VALUES (' ";
       $query .= join("', '", array_values($attributes));
       $query .= " ') ";

     $result = self::$db->query($query);
       //Success message
        if ($result) {
             //Redirect user

             header('Location: /admin?result=1');
              }


   }

   public function update() {
       //Sanitize data 
       $attributes = $this->sanitizeData();

       $values = [];
       foreach($attributes as $key =>$value) {
           $values[] = "{$key}='{$value}'";
       }

       $query = "UPDATE " . static::$table . " SET ";
       $query .=  join(', ', $values ); 
       $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
       $query .= " LIMIT 1 ";

       $result = self::$db->query($query);

       if($result) {
           //Redirect user
           header('Location: /admin?result=2');
       }
   }

   //Delete a record
   public function delete() {
       // Delete the register
       $query = "DELETE FROM " . static::$table ." WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
       $result = self::$db->query($query)
       ;
       return $result;
    
       if ($result) {
           $this->imageDelete();
           header('Location: /admin?result=3');
       }
   }

   //Identify and match database attributes
   public function attributes() {
       $attributes = [];
       foreach(static::$columnsDB as $column) {
           if($column === 'id') continue;
           $attributes[$column] = $this->$column;
       }
       return $attributes;
   }

   public function sanitizeData() {
       $attributes = $this->attributes();
       $sanitized = [];
       

       foreach($attributes as $key => $value) {
           $sanitized[$key] = self::$db->escape_string($value);
       }

       return $sanitized;
   }

   //File Upload
   public function setImage($images) {

       //Delete the previous image
       if(!is_null($this->id)) {
           $this->imageDelete();
       }
       //Assign the image attribute the name of the image
       if($images){
           $this->images = $images;
       }
   }

   //Delete file
   public function imageDelete() {
       //Check if there is
       $existsFile = file_exists(IMAGE_FOLDER . $this->images);
        if($existsFile) {
           unlink(IMAGE_FOLDER . $this->images);
           }
   }

   //Validation
   public static function getFixs() {
       return static::$fixs;
   }

   public function validate() {
    static::$fixs = [];

   //files to a variable

       return static::$fixs;
   }

   // List all properties
   public static function all() {
       $query = "SELECT * FROM " . static::$table;

       $result = self::consultSQL($query);
       return $result;
   }

   //Gets certain number of records
   public static function get($amount) {
    $query = "SELECT * FROM " . static::$table . " LIMIT " . $amount;

    $result = self::consultSQL($query);
    return $result;
}

   // Search for a property by its id
   public static function find($id) {
       $query = "SELECT * FROM " . static::$table ." WHERE id = ${id}";

       $result = self::consultSQL($query);
       return array_shift($result);
   }



   public static function consultSQL($query) {
       //Consult db
       $result = self::$db->query($query);

       //Iterate the results
       $array = [];
       while($register = $result->fetch_assoc()){
           $array[] = static::createObj($register);
       }

       //Free the memory
       $result->free();

       //Return the results
       return $array;
   }

   protected static function createObj($register) {
       $obj = new static;

       foreach($register as $key => $value) {
           if(property_exists( $obj, $key)) {
               $obj->$key = $value;
           }
   }
       return $obj;
}

// Synchronizes the object with the changes made by the user
   public function sync( $args = []) {
       foreach ($args as $key => $value) {
           if(property_exists($this,$key) && !is_null($value) ) {
               $this->$key = $value; 
           }
       }
   }

}