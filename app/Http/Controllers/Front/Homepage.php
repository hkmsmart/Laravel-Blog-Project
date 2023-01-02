<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use App\Models\Config;
use App\Models\Contact;
use App\Models\Page;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Posts;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
class Homepage extends Controller
{
    public function __construct(){
        if(Config::find(1)->active==0){
            return redirect()->to('offline')->send();
        }
        View::share('menu',Page::select('slug','title')->where('status',1)->orderBy('order','asc')->get());
        View::share('categories',Category::all());
        View::share('config',Config::find(1));


    }

    public function index(){
        $data = Array(
            'posts'      => Posts::where('deleted_at',null)->orderby('hit','desc')->paginate(5),
        );

        if(empty($data['posts'][0])) abort('404');
        return view('front.homepage',$data);
    }

    public function single(Posts $Posts){
        if(!empty($Posts->deleted_at)){
            abort('404');
        }
        $Posts->increment('hit');

        $data = Array(
            'Posts'         => $Posts,
            'PostsCategory' => $Posts->getCategory()->first(),
        );
        return view('front.single',$data);
    }

    public function categoryList($id){
        $data = Array(
            'posts'      => Posts::where('deleted_at',null)->whereCategory_id($id)->limit(6)->orderby('hit','desc')->paginate(5),
        );

        if(empty($data['posts'][0])) abort('404');
        return view('front.homepage',$data);
    }

    public function pageList($slug){
        $data = Array(
            'page' => Page::whereSlug($slug)->first(),
        );
        if(empty($data['page'])) abort('404');
        return view('front.page',$data);
    }

    public function contactList(){
        return view('front.contact');
    }

    public function contactSave(Request $request){
        $rules = [
            'name'    => 'required|min:5',
            'email'   => 'required|email',
            'topic'   => 'required|min:5',
            'message' => 'required|min:5',
        ];
        $valid = Validator::make($request->post(),$rules);

        if($valid->fails()){
            return redirect()->route('contact')->withErrors($valid)->withInput();
        }
        else{
            Mail::send([],[],function($message) use($request){
                    $message->from('iletisim@blogsitesi.com','Blog Sitesi');
                    $message->to('iletisim@blogsitesi.com');
                    $message->setBody(  '<b>Mesajı Gönderen:</b>'.$request->name.'<br>'.
                                        '<b>Mesajı Gönderen Mail:</b>'.$request->email.'<br>'.
                                        '<b>Mesaj Konusu:</b>'.$request->topic.'<br>'.
                                        '<b>Mesaj İçerik:</b>'.$request->message.'<br><br>'.
                                        '<b>Mesaj Gönderilme Tarihi:</b>'.now().'<br>','text/html');

                    $message->subject($request->name. 'İletişimden Mesaj Gönderdi');
            });

            $request->request->remove('_token');
            Contact::create($request->all());
            return redirect()->route('contact')->with('success','Mesajınız iletilmiştir, teşekkürler');
        }



    }
}
