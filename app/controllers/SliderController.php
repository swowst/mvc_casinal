<?php

namespace app\controllers;
use app\models\Slider;
use core\FileService;

class SliderController
{
    private FileService $fileService;

    public function __construct()
    {
        $this->fileService=new FileService();
    }

    public function index()
    {
        $sliderModel = new Slider();
        $slider = $sliderModel->first();
        return view('admin/slider',compact('slider'));
    }

    public function store()
    {
        $sliderModel = new Slider();
        $title = htmlentities(postData('title'));
        $text = htmlentities(postData('text')   );
        $slider = $sliderModel->first();

            $data = [
                'title' => $title,
                'text' => $text
            ];

        if ($this->fileService->hasFile('image')){
            if (!$this->fileService->validateType('image', ['jpeg','jpg','png'])){
                throw new \Error('Faylin tipi sehvdi');
            }
            $fileName = $this->fileService->upload('image');
            $data['image'] = $fileName;
        }
        if (!$slider){
            $sliderModel->buildCreate($data);
        }else{
            if ($this->fileService->hasFile('image')){
                $this->fileService->delete($slider['image']);
            }else{
                $data['image'] = $slider->image;
            }


            $sliderModel->where('id', $slider['id'])->update($data);
        }
        return redirect(url('/admin/slider'),true);

    }
}