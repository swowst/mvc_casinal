<?php

namespace app\controllers;

use app\models\Contact;

class ContactController
{
    public function contact(){
        $name=postData('name');
        $surname=postData('surname');
        $email=postData('email');

        $data = [
            'name' => $name,
            'surname' => $surname,
            'email' => $email
        ];

        (new Contact())->buildCreate($data);
        return view('/contact');
    }



    public function index(){
        return view('/contact');
    }


}