<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index(){
        $pages = Page::orderby('order','asc')->get();
        return view('back.pages.index',compact('pages'));
    }

    public function switch(Request $request){
        $pages = Page::findORFail($request->id);
        $pages->status = $request->statu;
        $pages->save();
    }

    public function delete($id)
    {
        $Page = Page::findOrFail($id);
        $Page->delete();

        toastr()->success('Sayfa başarıyla silindi', 'Başarılı');
        return redirect()->route('adminPagesList');
    }

    public function getCreate(){
        return view('back.pages.create');
    }

    public function getEdit($id){
        $pages = Page::findOrFail($id);
        return view('back.pages.edit',compact('pages'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'title'       => 'min:3',
            'image'       => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'contentText' => 'required',
        ]);
        if($request->hasFile('image')){
            $imageName = Str::slug($request->title).'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imageName);
        }

        $order = $request->order;
        if($order == null){
            $order = $this->last('order') +1;
        }

        $pages = new Page();
        $pages->image       = 'uploads/'.$imageName;
        $pages->title       = $request->title;
        $pages->slug        = Str::slug($request->title);
        $pages->content     = $request->contentText;
        $pages->status      = $request->status;
        $pages->order       = $order;
        $pages->save();
        toastr()->success('Sayfa başarıyla oluşturuldu', 'Başarılı');

        return redirect()->route('adminPagesList');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'       => 'min:3',
            'image'       => 'image|mimes:jpeg,png,jpg|max:2048',
            'contentText' => 'required',
        ]);

        $page = Page::findOrFail($id);

        if($request->hasFile('image')){
            $imageName = Str::slug($request->title).'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imageName);

            $page->image       = 'uploads/'.$imageName;
        }

        $order = $request->order;

        if($order == null){
            $order = $this->last('order') +1;
        }

        $page->title       = $request->title;
        $page->slug        = Str::slug($request->title);
        $page->content     = $request->contentText;
        $page->status      = $request->status;
        $page->order       = $order;
        $page->save();
        toastr()->success('Sayfa başarıyla düzenlendi', 'Başarılı');
        return redirect()->route('adminPagesList');
    }

    public function last($field){
         $last = Page::latest()->first();
        return $last->$field;
    }

    public function orders(Request $request){
        $orderArr = explode('_',$request->htmlText);
        $count    = 1;
        foreach ($orderArr as $v){
            if (Str::length($v) == 1) {
                Page::where('id',$v)->update(['order'=>$count]);
                $count++;
            }
        }
    }
}
