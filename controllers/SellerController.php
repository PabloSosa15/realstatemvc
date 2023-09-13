<?php

namespace Controllers;
use MVC\Router;
use Model\Sellers;

class SellerController {
    public static function create(Router $router) {
        $fixs = Sellers::getFixs();

        $seller = new Sellers;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $seller = new Sellers($_POST['sellers']);
        
            $fixs = $seller->validate();
        
            if(empty($fixs)) {
                $seller->save();
            }
        }

        $router->render('/sellers/create', [
            'fixs'=>$fixs,
            'seller'=>$seller
        ]);
    }

    public static function update(Router $router ) {
        $id = validate('/admin');

       //Get vendor data on update
       $seller = Sellers::find($id);
        
        $fixs = Sellers::getFixs();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Assign the values
            $args = $_POST['sellers'];
        
            //Synchronize the objects in memory with what the user wrote
            $seller->sync($args);
        
            //Validate
            $fixs = $seller->validate();
        
            if(empty($fixs)) {
                $seller->save();
            }
        }

        $router->render('sellers/update', [
            'fixs'=>$fixs,
            'seller'=>$seller

        ]);
    }
    public static function delete( ) {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Validate the id
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if($id) {
            $type = $_POST['type'];
            if(validatecontentype($type)) {
                    $seller = Sellers::find($id);
                    $seller->delete();
            }
            }
        }
    }
}