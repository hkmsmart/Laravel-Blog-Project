<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(){
        $category = Category::all();
        return view('back.category.index',compact('category'));
    }

    public function delete($id){
        if($id == 1){
            toastr()->warning('İlk Kategori Silinemez', 'Hata');
            return redirect()->route('adminCategoryIndex');
        }

        $Category = Category::findOrFail($id);

        Posts::where('category_id',$id)->update(['category_id'=>1]);

        $Category->delete();

        toastr()->success('Kategori başarıyla silindi', 'Başarılı');
        return redirect()->route('adminCategoryIndex');
    }

    public function getCreate(){
        return view('back.category.create');
    }

    public function save(Request $request){
        $request->validate([
            'name'       => 'min:3|required',
        ]);

        $Category = new Category();
        $Category->name = $request->name;
        $Category->slug = Str::slug($request->name,'-');
        $Category->save();

        toastr()->success('Kategori başarıyla eklendi', 'Başarılı');
        return redirect()->route('adminCategoryIndex');

    }

    public function getEdit($id){
        $cat = Category::findOrFail($id);
        return view('back.category.edit',compact('cat'));
    }

    public function update(Request $request, $id){

        $request->validate([
            'name'       => 'min:3|required'
        ]);
        $Category = Category::findOrFail($id);

        $Category->name = $request->name;
        $Category->slug = Str::slug($request->name,'-');
        $Category->save();

        toastr()->success('Makele başarıyla düzenlendi', 'Başarılı');
        return redirect()->route('adminCategoryIndex');
    }
}
