<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\Homepage;
use \App\Http\Controllers\back\Dashboard;
use App\Http\Controllers\back\AuthController;
use \App\Http\Controllers\back\PostsController;
use \App\Http\Controllers\back\CategoryController;
use App\Http\Controllers\back\PageController;
use App\Http\Controllers\back\MessageController;
use App\Http\Controllers\back\ConfigController;
/**
 * Blog Pages
 */

Route::get('offline', function (){
    return view('front.offline');
});
Route::get('/', [Homepage::class,'index'])->name('home');
Route::get('/iletisim', [Homepage::class,'contactList'])->name('contact');
Route::post('/iletisim', [Homepage::class,'contactSave'])->name('contact');
Route::get('/blog/{Posts}', [Homepage::class,'single'])->name('single');
Route::get('/kategori/{id}', [Homepage::class,'categoryList'])->name('categoryId');
Route::get('/sayfa/{slug}', [Homepage::class,'pageList'])->name('pageSlug');


Route::prefix('admin')->group(function(){
    /**
     * Login
     */
    Route::get('cikis', [AuthController::class,'logout'])->name('logout');

    Route::middleware('isLogin')->group(function () {   //middleware:eğer giriş yapmışsa tekrar logine sokma yönlendir
        Route::get('giris', [AuthController::class,'login'])->name('login');
        Route::post('giris', [AuthController::class,'loginPost'])->name('login.post');
    });

    /**
     * Admin
     */
    Route::middleware('isAdmin')->group(function () { //middleware:eğer giriş yapmamışsa logine yönlendir.
        Route::get('/', [Dashboard::class,'index'])->name('adminDashboard');
        Route::get('/', [Dashboard::class,'index'])->name('adminDashboard');

        Route::resource('yayinlar',PostsController::class);

        Route::get('kategori',[CategoryController::class,'index'])->name('adminCategoryIndex');
        Route::get('kategori/olustur',[CategoryController::class,'getCreate'])->name('adminGetCategoryCreate');
        Route::post('kategori/olustur',[CategoryController::class,'save'])->name('adminPostCategory');
        Route::get('kategori/{id}/duzenle',[CategoryController::class,'getEdit'])->name('adminGetCategoryEdit');
        Route::PUT('kategori/{id}/duzenle',[CategoryController::class,'update'])->name('adminPostCategoryEdit');
        Route::delete('kategori/{id}',[CategoryController::class,'delete'])->name('adminCategoryDelete');

        Route::get('sayfalar',[PageController::class,'index'])->name('adminPagesList');
        Route::get('sayfalar/switch',[PageController::class,'switch'])->name('adminPagesSwitch');
        Route::get('satfalar/orders',[PageController::class,'orders'])->name('adminPageOrders');

        Route::get('sayfalar/olustur',[PageController::class,'getCreate'])->name('adminGetPagesCreate');
        Route::post('sayfalar/olustur',[PageController::class,'save'])->name('adminPostPagesCreate');
        Route::get('sayfalar/{id}/duzenle',[PageController::class,'getEdit'])->name('adminGetPagesEdit');
        Route::PUT('sayfalar/{id}/duzenle',[PageController::class,'update'])->name('adminPostPagesEdit');
        Route::delete('sayfalar/{id}',[PageController::class,'delete'])->name('adminPagesDelete');

        Route::get('mesajlar',[MessageController::class,'getMessage'])->name('adminMessage');

        Route::get('ayarlar',[ConfigController::class,'index'])->name('adminConfig');
        Route::post('ayarlar',[ConfigController::class,'update'])->name('adminConfigUpdate');
    });
});




