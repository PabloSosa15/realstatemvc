<?php

namespace Controllers;
use MVC\Router;
use Model\Property;
use Model\Sellers;
use Intervention\Image\ImageManagerStatic as Image;

class PropertyControllers
{
    public static function index(Router $router)
    {

        $properties = Property::all();
        $sellers = Sellers::all();

        $result = $_GET['result'] ?? null;

        $router->render('properties/admin', [
            'properties' => $properties,
            'result' => $result,
            'sellers'=>$sellers
        ]);
    }

    public static function create(Router $router)
    {
        $property = new Property;
        $sellers = Sellers::all();

        //Fix with error message
        $fixs = Property::getFixs();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {


            //Create a new instance
            $property = new Property($_POST['property']);
            /** File Upload */

            // Generate unique name
            $imageName = md5(uniqid(rand(), true)) . ".jpg";

            //Set the image
            // Make a resize to the image with intervention
            if ($_FILES) {
                $image = Image::make($_FILES['property']['tmp_name']['image'])->fit(800, 600);
                $property->setImage($imageName);
            }

            //Validate
            $fixs = $property->validate();

            // Check that the bugfix is empty

            if (empty($fixs)) {


                // Create Folder
                $folderImage = '../../images/';
                if (!is_dir(IMAGE_FOLDER)) {
                    mkdir(IMAGE_FOLDER);
                }


                //Save image on server
                $image->save(IMAGE_FOLDER . $imageName);

                //Save in the database
                $property->save();

            }

        }

        $router->render('properties/create', [
            'property' => $property,
            'sellers' => $sellers,
            'fixs' => $fixs
        ]);
    }

    public static function update(Router $router)
    {
        $id = validate('/admin');
        $property = Property::find($id);

        $sellers = Sellers::all();

        $fixs = Property::getFixs();

        //Run the code after the user submits the form
    if($_SERVER['REQUEST_METHOD'] === 'POST') {

    //Assign the attributes
    $args = $_POST['property'];

    $property->sync($args);

    //Validate
    $fixs = $property->validate();


    //File upload
    // Generate unique name
    $imageName = md5(uniqid(rand(), true)) . ".jpg";

    if($_FILES['property']['tmp_name']['image']) {
        $image = Image::make($_FILES['property']['tmp_name']['image'])->fit(800, 600);
        $property->setImage($imageName);
    } 
    // Check that the bugfix is empty
    if(empty($fixs)) {
        if ($_FILES['property']['tmp_name']['image']) {
            // Store image
            $image->save(IMAGE_FOLDER . $imageName);
        }

        $property->save();
}

    }

        $router->render('/properties/update', [
            'property' => $property,
            'fixs'=>$fixs,
            'sellers'=>$sellers
        ]);
    }

    public static function delete() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Create id
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            if ($id) {
                $type = $_POST['type'];
                if (validatecontentype($type)) {
                    $property = Property::find($id);
                    $property->delete();
                }
            }
        }
    }
}