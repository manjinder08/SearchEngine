<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\test;
use App\Models\Registration;
use App\CustomRepo\Searchrepo;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('register');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::post('/registration',[UserController::class,'store']);
Route::post('Sign',[UserController::class,'login']);

Route::get('/index', function () {
       return view('index', [
         'users' =>  App\Models\Book::query()
         ->join('authors','authors.id','=','books.author_id')
         ->get(),
     ]);
 });

Route::get('/search', function(Searchrepo $search){
    $query=request('query');    
    $data =  Redis::get('data');
    if (strpos($data, $query) !== false) {
        echo "redis";
            $data=json_decode(Redis::get('data'));
        return view('index', [
        'users' => $data,
        ]);
    }

    $user = $search->search(request('query'));
    // dd($user);
    return view('index', [
        'users' => $user,
        ]);
 });
Route::get('/logout',[UserController::class,'logout']);
Route::view('/register','register');
Route::view('/signin','signin');
Route::get('/test',[test::class,'a']);;
// Route::view('/search','search');
// Route::view('/index','index');
// Route::view('/nav','layouts/nav');
// Route::view('/author','author');
// Route::view('/book','book');
// Route::view('/publisher','publisher');
// Route::view('/footer','layouts/footer');

// Route::post('author/save',[UserController::class,'author']);
// Route::post('book/save',[UserController::class,'book']);
// Route::post('publisher/save',[UserController::class,'publisher']);

   