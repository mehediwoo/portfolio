<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facade\Str;
use App\Models\about;

class AboutController extends Controller
{
    public function index()
    {
        $about = about::first();
        return view('admin.about.index')->with('about',$about);
    }

    public function update(Request $request)
    {
        $request->validate([
            'resume_file'=>'mimes:pdf|max:10000',
            'image'=>'image'
        ]);

        $data =  about::first();
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->birth_date = $request->input('birth_date');
        $data->address = $request->input('address');
        $data->post_code = $request->input('post_code');
        $data->phone = $request->input('phone');
        $data->about_text = $request->input('about_text');
        $data->done_project = $request->input('about_text');

        $folder = 'resume';

        if(!file_exists(base_path('storage/app/public/'). $folder)){
            mkdir(base_path('storage/app/public/') . $folder,755,true);
        }
        // About image
        if ($request->hasFile('image')) {
            $about_img = $request->file('image');
            $name = Str::random(15).'.'.$about_img->extension();
            $image= Image($about_img)->resize(1000,1200);
            $about_img->save(base_path('storage/app/public/').$folder.'/'.$name);
            $data->image = $folder.'/'.$name;
        }
        // For pdf
        if ($request->hasFile('resume_file')) {
            $resume = $request->file('resume_file');
            $name = 'Mehedi_Hasan_Resume'.'.'.$resume->extension();
            $resume->move(public_path('storage/').$folder.'/'.$name);
            $data->resume = $folder.'/'.$name;
        }
        $result = $data->save();
        if ($result) {
            return true;
        }else{
            return false;
        }
    }
}
