<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ConfigController extends Controller
{
    public function index(){
        $config = Config::find(1);
        return view('back.config.index',compact('config'));
    }

    public function update(Request $request){

        $request->validate([
            'title'      => 'required|min:3',
            'logo'       => 'image|mimes:jpeg,png,jpg|max:2048',
            'favicon'    => 'mimes:ico|max:100',
        ]);

        $config = Config::find(1);

        if($request->hasFile('logo')){
            $imageName = Str::slug($request->title).'logo.'.$request->logo->getClientOriginalExtension();
            $request->logo->move(public_path('uploads'),$imageName);
            $config->logo = 'uploads/'.$imageName;
        }
        if($request->hasFile('favicon')){
            $imageName = Str::slug($request->title).'favicon.'.$request->favicon->getClientOriginalExtension();
            $request->favicon->move(public_path('uploads'),$imageName);
            $config->favicon = 'uploads/'.$imageName;
        }

        $config->title     = $request->title;
        $config->active    = $request->active;
        $config->facebook  = $request->facebook;
        $config->twitter   = $request->twitter;
        $config->linkedin  = $request->linkedin;
        $config->instagram = $request->instagram;
        $config->youtube   = $request->youtube;
        $config->save();

        toastr()->success('Ayarlar başarıyla kaydetildi', 'Başarılı');
        return redirect()->route('adminConfig');

    }
}
