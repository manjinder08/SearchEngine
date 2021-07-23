<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

 Route::view('/register','register');
Route::post('/registration',[UserController::class,'store']);


 Route::view('/signin','signin');
 Route::post('/Sign/In',[UserController::class,'login']);

 Route::view('/index','index');

 Route::view('/search','search');

 Route::get('/searchall', function () {
    return view('search', [
        'users' =>  App\Models\Registration::all(),
    ]);
});

Route::get('/search', function(Searchrepo $fun){
    $query=request('query');    
    
    $data =  Redis::get('data');
    if (strpos($data, $query) !== false) {
        echo "redis....";
        return json_decode($data);
    }
    // if(!empty($data[0]['name']) && $query === $data[0]['name']){
    //     echo "redis....";
    //     $data =  json_decode(Redis::get('data'), true);    
    //     return $data;
    // }
    
    $user = $fun->search(request('query'));
 
    Redis::setex('data',60*24, $user);
    echo "here....";
       return json_decode($user);
});
