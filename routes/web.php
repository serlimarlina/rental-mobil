<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserControlController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['guest'])->group(function () {

    $katalog = App\Models\katalog::get();
    Route::view('/', 'halaman_depan/index',['katalog'=>$katalog]);
    Route::get('/sesi', [AuthController::class, 'index'])->name('auth');
    Route::post('/sesi', [AuthController::class, 'login']);
    Route::get('/reg', [AuthController::class, 'create'])->name('registrasi');
    Route::post('/reg', [AuthController::class, 'register']);
    Route::get('/verify/{verify_key}', [AuthController::class, 'verify']);
});


Route::middleware(['auth'])->group(function () {
    Route::redirect('/home', '/user');
    Route::get('/admin', [AdminController::class, 'index'])->name('admin')->middleware('userAkses:admin');
    Route::get('/user', [UserController::class, 'index'])->name('user')->middleware('userAkses:user');

    Route::get('/usercontrol', [UserControlController::class, 'index'])->name('usercontrol');

    Route::get('logout', function ()
    {
        auth()->logout();
        Session()->flush();
    
        return Redirect::to('/');
    })->name('logout');
    

    Route::get('/tambahuc', [UserControlController::class, 'tambah']);
    Route::get('/edituc/{id}', [UserControlController::class, 'edit']);
    Route::post('/hapusuc/{id}', [UserControlController::class, 'hapus']);
    Route::post('/tambahuc', [UserControlController::class, 'create']);
    Route::post('/edituc', [UserControlController::class, 'change']);

    Route::post('/uprole/{id}', [UproleController::class, 'index']);
});



//pemanggilan
Route::get('/Page/katalog', [App\Http\Controllers\PageController::class, 'katalog'])->name('/Page/katalog');
// katalog 
Route::get('/Profile/katalog',[App\Http\Controllers\ProfileController::class,'katalogGet'])->name('Profile.katalog.index');
Route::get('/Profile/katalog/create',[App\Http\Controllers\ProfileController::class,'katalogCreate'])->name('Profile/katalog/create');
Route::get('/Profile/katalog/edit/{katalog}',[App\Http\Controllers\ProfileController::class,'katalogEdit'])->name('Profile.katalog.edit');
Route::post('/Profile/katalog/post',[App\Http\Controllers\ProfileController::class,'katalogPost'])->name('Profile.katalog.post');
Route::get('/Profile/katalog/index/delete/{id}', [App\Http\Controllers\ProfileController::class,'katalogDel']);

//pemanggilan
Route::get('/Page/penyewa', [App\Http\Controllers\PageController::class, 'penyewa'])->name('/Page/penyewa');
// penyewa 
Route::get('/Profile/penyewa',[App\Http\Controllers\ProfileController::class,'penyewaGet'])->name('Profile.penyewa.index');
Route::get('/Profile/penyewa/create',[App\Http\Controllers\ProfileController::class,'penyewaCreate'])->name('Profile/penyewa/create');
Route::get('/Profile/penyewa/edit/{penyewa}',[App\Http\Controllers\ProfileController::class,'penyewaEdit'])->name('Profile.penyewa.edit');
Route::post('/Profile/penyewa/post',[App\Http\Controllers\ProfileController::class,'penyewaPost'])->name('Profile.penyewa.post');
Route::get('/Profile/penyewa/index/delete/{id}', [App\Http\Controllers\ProfileController::class,'penyewaDel']);

//pemanggilan
Route::get('/Page/supir', [App\Http\Controllers\PageController::class, 'supir'])->name('/Page/supir');
// supir 
Route::get('/Profile/supir',[App\Http\Controllers\ProfileController::class,'supirGet'])->name('Profile.supir.index');
Route::get('/Profile/supir/create',[App\Http\Controllers\ProfileController::class,'supirCreate'])->name('Profile/supir/create');
Route::get('/Profile/supir/edit/{supir}',[App\Http\Controllers\ProfileController::class,'supirEdit'])->name('Profile.supir.edit');
Route::post('/Profile/supir/post',[App\Http\Controllers\ProfileController::class,'supirPost'])->name('Profile.supir.post');
Route::get('/Profile/supir/index/delete/{id}', [App\Http\Controllers\ProfileController::class,'supirDel']);


