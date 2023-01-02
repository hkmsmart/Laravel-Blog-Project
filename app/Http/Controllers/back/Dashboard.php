<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Page;
use App\Models\Posts;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index(){
        $post = Posts::all()->count();
        $hit = Posts::sum('hit');
        $category = Category::all()->count();
        $page     = Page::all()->count();
        $contact  = Contact::all()->count();

        return view('back.dashboard',compact('post','hit','category','page','contact'));
    }


}
