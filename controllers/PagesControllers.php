<?php

namespace Controllers;
use MVC\Router;
use Model\Property;
use PHPMailer\PHPMailer\PHPMailer;

class PagesControllers {
    public static function index (Router $router) {
        $properties = Property::get(3);
        $start = true;

        $router->render('pages/index', [
            'properties'=>$properties,
            'start'=>$start
        ]);
    }
    public static function us (Router $router) {
        $router->render('pages/us', []);
    }
    public static function properties (Router $router) {
        $properties = Property::all();

        $router->render('pages/properties', [
            'properties'=>$properties
        ]);
    }
    public static function property (Router $router) {
        $id = validate('/properties');
        //Search the property by its id
        $property = Property::find($id);
        $router->render('pages/property', [
            'property'=>$property
        ]);
    }
    public static function blog (Router $router) {
        $router->render('pages/blog');
    }
    public static function entrance (Router $router) {
        $router->render('pages/entrance');
    }
    public static function contact (Router $router) {
        $message = null;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $answer = $_POST['contact'];
            
            //Create new instancia of PHPMailer
            $mail = new PHPMailer();

            //STMP
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = '37d8662f8a31c2';
            $mail->Password = '660633ec3250f9';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 2525;

            //Configure of the content the email
           $mail->setFrom('admin@realstates.com');
           $mail->addAddress('admin@realstates.com', 'RealSatates.com');
           $mail->Subject = 'You have a New Message';

            //Enable the HTML
           $mail->isHTML(true);
           $mail->CharSet = 'UTF-8';

            //Define the content
            $content = '<html>';
            $content .=  '<p>You have a New Message</p>';
            $content .=  '<p>Name: ' . $answer['name'] . ' </p>';


            // Conditionally send some email or phone fields
            if($answer['contact'] === 'phone') {
                $content .= '<p>You chose to be contacted by phone</p>';
                $content .=  '<p>Phone: ' . $answer['phone'] . ' </p>';
                $content .=  '<p>Contact Date : ' . $answer['date'] . ' </p>';
                $content .=  '<p>Hour : ' . $answer['time'] . ' </p>';

            } else {
                // It's email, we add the email field
                $content .= '<p> You chose to be contacted by email </p>';
                $content .= '<p>E-Mail: ' . $answer['email'] . ' </p>';
                
            }

            $content .=  '<p>Message: ' . $answer['message'] . ' </p>';
            $content .=  '<p>Sell Or Buy : ' . $answer['type'] . ' </p>';
            $content .=  '<p>Price or Budget : $' . $answer['price'] . ' </p>';
            $content .=  '<p>Prefer to be contacted by : ' . $answer['contact'] . ' </p>';
            $content .= '</html>';
            $mail->Body = $content;


            //Send the email
            if($mail->send()){
                $message =  "Message sent successfully";
            }else {
                $message = "The message could not be sent";
            };
        }

        $router->render('pages/contact', [
            'message'=>$message
        ]);
    }
}
