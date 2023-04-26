<?php

namespace app\controllers;
use app\models\Blog;
use app\models\Slider;

class HomeController
{
    public function index(){
        $slider = (new Slider())->first();
        $blogs = (new Blog())->limit(3)->all();
        return view('home', compact('slider', 'blogs'));
    }

    public function blogDetail($slug){
        $blog = (new Blog())->where('slug', $slug)->first();
        if (!$blog){
            throw new \Exception('No data');
        }

        return view('/blog-single', compact('blog'));
    }



}