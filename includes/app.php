<?php

require 'functions.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';
use Model\ActiveRecord;


//Connect to the database
$db = conectDB();


ActiveRecord::setDB($db);