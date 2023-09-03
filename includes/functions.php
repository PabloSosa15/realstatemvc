<?php

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCTIONS_URL', __DIR__ . 'functions.php');
define('IMAGE_FOLDER', $_SERVER['DOCUMENT_ROOT'] . '/images/'); 

function includeTemplate(string $name, bool $start = false) {
    include TEMPLATES_URL . "/${name}.php"; 
}

function isAuthenticated() {
    session_start();

    if (!$_SESSION['login']) {
        header('Location: /');
    }
}

function debug($property){
    echo '<pre>';
    var_dump($property);
    echo '</pre>';
};

//Scape the HTML
function s($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}

//Validate content type
function validatecontentype($type) {
    $types = ['seller', 'property'];

    return in_array($type, $types);
}

//Show the alerts
function showAlert($code) {
    $message = '';

    switch($code) {
        case 1:
            $message = 'Created Successfully';
            break;
        case 2:
            $message = 'Update Successfully';
            break;
        case 3:
            $message = 'Remover Successfully';
            break;
        default:
            $message = false;
            break;
    }
    return $message;
}

function validate(string $url) {
    //Validate URL by valid ID
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if(!$id){
    header("Location: /{$url}");
}
    return $id;
}