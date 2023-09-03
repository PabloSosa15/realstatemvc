<?php

namespace Model;

class Admin extends ActiveRecord {
    //DB 
    protected static $table = 'users';
    protected static $columnsDB = ['id', 'email', 'password'];

    public $id;
    public $email;
    public $password;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
    }

    public function validate(){
        if(!$this->email) {
            self::$fixs[] = "The e-mail is mandatory";
        }
        if(!$this->password) {
            self::$fixs[] = "The password is mandatory";
        }

        return self::$fixs;
    }

    public function existsUser() {
        //Check if a user exists or not
        $query = "SELECT * FROM " . self::$table . " WHERE email = '" . $this->email . "' LIMIT 1";
        $result = self::$db->query($query);
        
        if(!$result->num_rows) {
            self::$fixs[] = 'Username does not exist';
            return;
        }
        return $result;
    }

    public function checkPassword($result){
        $user = $result->fetch_object();

        $authenticated = password_verify($this->password, $user->password);

        if(!$authenticated) {
            self::$fixs[] = "The passwiord is wrong"
            ;
        }
        return $authenticated;
    }
    public function authenticate()
    {
        session_start();
        $_SESSION['user'] = $this->email;
        $_SESSION['login'] = true;

        header('Location: /admin');
    }
}