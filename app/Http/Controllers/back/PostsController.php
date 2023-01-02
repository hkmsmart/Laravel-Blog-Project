<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Posts;
use Illuminate\Support\Str;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Posts::orderby('created_at','DESC')->get();
        return view('back.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('back.posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'min:3',
            'image'       => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'category'    => 'required',
            'contentText' => 'required',
        ]);
        if($request->hasFile('image')){
            $imageName = Str::slug($request->title).'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imageName);
        }

        $posts = new Posts();
        $posts->hit         = 0;
        $posts->image       = 'uploads/'.$imageName;
        $posts->title       = $request->title;
        $posts->slug        = Str::slug($request->title);
        $posts->category_id = $request->category;
        $posts->content     = $request->contentText;
        $posts->deleted_at  = ($request->status == 'pasif') ? date('Y-m-d H:i:s') : null;
        $posts->save();
        toastr()->success('Makele başarıyla oluşturuldu', 'Başarılı');

        return redirect()->route('yayinlar.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $posts = Posts::findOrFail($id);
        return view('back.posts.edit',compact('categories','posts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'       => 'min:3',
            'image'       => 'image|mimes:jpeg,png,jpg|max:2048',
            'category'    => 'required',
            'contentText' => 'required',
        ]);



        $posts = Posts::findOrFail($id);

        if($request->hasFile('image')){
            $imageName = Str::slug($request->title).'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imageName);

            $posts->image       = 'uploads/'.$imageName;
        }

        $posts->hit         = 0;
        $posts->title       = $request->title;
        $posts->slug        = Str::slug($request->title);
        $posts->category_id = $request->category;
        $posts->content     = $request->contentText;
        $posts->deleted_at  = ($request->status == 'pasif') ? date('Y-m-d H:i:s') : null;
        $posts->save();
        toastr()->success('Makele başarıyla düzenlendi', 'Başarılı');

        return redirect()->route('yayinlar.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = Posts::findOrFail($id);
        $posts->delete();

        toastr()->success('Makele başarıyla silindi', 'Başarılı');
        return redirect()->route('yayinlar.index');

    }
}
