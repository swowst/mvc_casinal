<?php

namespace app\controllers;

use app\models\Blog;
use app\models\Slider;
use Core\FileService;

class BlogController
{
    private FileService $fileService;

    public function __construct()
    {
        $this->fileService = new FileService();
    }

    public function index(){
        $blogs = (new Blog())->all();
        return view('admin/blog/index', compact('blogs'));

    }

    public function create()
    {
        return view('admin/blog/form', ['blog' => null]);
    }

    public function store(){
        $title = htmlentities(postData('title'));
        $text = htmlentities(postData('text'));
        $slug = htmlentities(postData('slug'));

        $this->fileService->checkFile('image');

        if (!$this->fileService->validateType('image',['jpeg', 'jpg', 'png'])) {
            throw new \Exception('Fayl duzgun deyil');
        }
        $filename = $this->fileService->upload('image');

        (new Blog())->buildCreate(
            [
                'title' => $title,
                'text' => $text,
                'slug' => $slug,
                'image' => $filename
            ]
        );

        return redirect(url('/admin/blog'),true);
    }


    public function edit($id){
        $blog = (new Blog())->where('id', (int)$id)->first();

        if (!$blog){
            throw new \Exception("No data");
        }

        return view('admin/blog/form', ['blog' => $blog]);

    }



    public function update($id)
    {

        $blog = (new Blog())->where('id', (int)$id)->first();

        if (!$blog){
            throw new \Exception("Nott data");
        }



        $title = htmlentities(postData('title'));
        $text = htmlentities(postData('text'));
        $slug = htmlentities(postData('slug'));

        $data =  [
            'title' => $title,
            'text' => $text,
            'slug' => $slug,
        ];

        if ($this->fileService->hasFile('image')){
            if (!$this->fileService->validateType('image',['jpeg', 'jpg', 'png'])) {
                throw new \Exception('Fayl duzgun deyil');
            }
            $filename = $this->fileService->replace('image', $blog['image']);
            $data['image'] = $filename;
        }


        (new Blog())->where('id', (int)$id)->update($data);
        return redirect(url('/admin/blog'),true);
    }


    public function delete($id){
        (new Blog())->where('id', (int)$id)->delete();
        return redirect(url('/admin/blog'),true);
    }

    public function blogList(){
        $blogs = (new Blog())->all();
        return view('blog', compact('blogs'));
    }
}