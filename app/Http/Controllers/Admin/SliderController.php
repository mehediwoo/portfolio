<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\slider;
use Image;

class SliderController extends Controller
{
    public function index()
    {
        return view('admin.slider.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'slider_intro'=>'required',
            'slider_title'=>'required',
            'slider_subtitle'=>'required',
            'thumb'=>'required|image',
        ],[
            'thumb.required'=>'Slider image is required',
            'thumb.image'=>'Slider image must be an image',
        ]);

        $slider = new slider;
        $slider->intro	 = $request->input('slider_intro');
        $slider->title	 = $request->input('slider_title');
        $slider->sub_title	 = $request->input('slider_subtitle');

        // slider image insert
        $folder = 'slider_image';

        if(!file_exists(base_path('storage/app/public/'). $folder)){
            mkdir(base_path('storage/app/public/') . $folder,755,true);
        }

        if($request->hasFile('thumb')){
            $file = $request->file('thumb');
            $name  = Str::random(25).".".$file->extension();
            $image = Image::make($file)->resize(1000,1200);
            $image->save(base_path('storage/app/public/').$folder."/".$name);
            $slider->image = $folder."/".$name;
        }

        $result = $slider->save();
        if ($result) {
            return true;
        }else{
            return false;
        }

    }

    public function show()
    {
        $slider = slider::latest()->get();
        return view('admin.slider.ajax.show')->with('slider',$slider);
    }

    public function update(Request $request)
    {
        $request->validate([
            'slider_intro'=>'required',
            'slider_title'=>'required',
            'slider_subtitle'=>'required',
            'thumb'=>'image',
        ],[
            'thumb.image'=>'Slider image must be an image',
        ]);

        $id = $request->input('editId');

        $slider = slider::findOrFail($id);
        $slider->intro	 = $request->input('slider_intro');
        $slider->title	 = $request->input('slider_title');
        $slider->sub_title	 = $request->input('slider_subtitle');

        // slider image insert
        $folder = 'slider_image';

        if(!file_exists(base_path('storage/app/public/'). $folder)){
            mkdir(base_path('storage/app/public/') . $folder,755,true);
        }

        if($request->hasFile('thumb')){
            if (file_exists(base_path('storage/app/public/').$slider->image) && $slider->image !='') {
                unlink(base_path('storage/app/public/').$slider->image);
            }
            $file = $request->file('thumb');
            $name  = Str::random(25).".".$file->extension();
            $image = Image::make($file)->resize(1000,1200);
            $image->save(base_path('storage/app/public/').$folder."/".$name);
            $slider->image = $folder."/".$name;
        }

        $result = $slider->update();
        if ($result) {
            return true;
        }else{
            return false;
        }
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id');
        $slider= slider::findOrFail($id);
        if ($slider==true) {
            if (file_exists(base_path('storage/app/public/').$slider->image) && $slider->image !='') {
                unlink(base_path('storage/app/public/').$slider->image);
            }
            $slider->delete();
            return true;
        }else{
            return false;
        }
    }
}
