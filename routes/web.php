<?php


use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\SocieteController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
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

Route::get('/', [EmployeeController::class,'ezr']);

Route::get('/theme', function(){
    return view('index');
})->middleware('authAdmin');
Route::get('/contact', function(){
    return view('contact');
})->middleware('authAdmin');
Route::get('/about', function(){
    return view('about');
});

Route::get('/theme1', function(){
    return view('theme1');
})->middleware('authAdmin');
Route::get('/forms',function(){
    return view('forms');
});
Route::get('/dashboard', function(){
    return view('dashboard');
})->middleware('authAdmin');


Route::get('/ttr',function(){
    return view('auth.passwords.register');
    });
Route::post('/x',[EmployeeController::class,'add1']);


Route::get('/postuler/{id}', [OffreController::class, 'postuler']);

Route::get('/listesociete', [AdminController::class, 'allsociete'])->middleware('authAdmin');
Route::get('/formaddSociete', [AdminController::class, 'formaddSociete'])->middleware('authAdmin');
Route::post('/addsociete', [AdminController::class, 'addsociete'])->middleware('authAdmin');
Route::get('/formeditSociete', [AdminController::class, 'formeditSociete'])->middleware('authAdmin');
Route::post('/editSociete/{id}', [AdminController::class, 'editSociete'])->middleware('authAdmin');
Route::get('/deleteSociete/{id}', [AdminController::class, 'deleteSociete']);



Route::get('/listeEmployee', [AdminController::class,'allemployee'])->middleware('authAdmin');
Route::get('/ajoutEmployee', [AdminController::class, 'formaddEmployee']);
Route::post('/addEmployee', [EmployeeController::class, 'add1']);
Route::get('/formeditEmployee', [AdminController::class, 'formeditEmployee'])->middleware('authAdmin');
Route::post('/editEmployee/{id}', [AdminController::class, 'editEmployee'])->middleware('authAdmin');
Route::get('/deleteEmployee/{id}', [AdminController::class, 'deleteEmployee'])->middleware('authAdmin');


Route::get('/listeCategorie', [AdminController::class, 'allcategorie'])->middleware('authAdmin');
Route::get('/ajoutCategorie', [AdminController::class, 'formaddCategorie'])->middleware('authAdmin');
Route::post('/addCategorie', [AdminController::class, 'addCategorie'])->middleware('authAdmin');
Route::get('/formeditCategorie', [AdminController::class, 'formeditCategorie'])->middleware('authAdmin');
Route::post('/editCategorie/{id}', [AdminController::class, 'editCategorie'])->middleware('authAdmin');
Route::get('/deleteCategory/{id}', [AdminController::class, 'deleteCategorie'])->middleware('authAdmin');

Route::get('/listeAdmin', [AdminController::class, 'alladmin'])->middleware('authAdmin');
Route::get('/ajoutAdmin', [AdminController::class, 'formaddAdmin'])->middleware('authAdmin');
Route::post('/addAdmin', [AdminController::class, 'addAdmin'])->middleware('authAdmin');
Route::get('/formeditAdmin', [AdminController::class, 'formeditAdmin'])->middleware('authAdmin');
Route::post('/editAdmin/{id}', [AdminController::class, 'editAdmin'])->middleware('authAdmin');
Route::get('/deleteAdmin/{id}', [AdminController::class, 'deleteAdmin'])->middleware('authAdmin');






Route::get('/listeOffre', [SocieteController::class, 'alloffre']);
Route::get('/formaddoffre', [SocieteController::class, 'formaddoffre'])->middleware('authSociete');
Route::post('/addoffre', [SocieteController::class, 'addoffre'])->middleware('authSociete');
Route::get('/listeoffre', [SocieteController::class, 'listeoffre']);
Route::get('/formmodifoffre', [SocieteController::class, 'formmodifoffre']);
Route::post('/modifoffre/{id}', [SocieteController::class, 'modifoffre']);
Route::get('/supprimeroffre/{id}', [SocieteController::class, 'supprimeroffre']);

Route::post('/registersociete', [SocieteController::class, 'registersociete']);
Route::get('/offress',[OffreController::class,'offres']);


Route::get('/listesociete', [SocieteController::class, 'allSociete'])->middleware('authAdmin');
Route::get('/supprimerSociete/{id}', [SocieteController::class, 'supprimerSociete'])->middleware('authAdmin');

Route::get('/listePostulation', [OffreController::class, 'showContactView'])->middleware('authAdmin');
Route::get('/postulation1', [OffreController::class, 'showContactView1'])->middleware('authSociete');
Route::get('/supprimerPostulation/{id}', [SocieteController::class, 'supprimerPostulation'])->middleware('authAdmin');




Route::get('/contact', function () {
    return view('contact');
});
Route::get('/formsoffre',[OffreController::class,'addOffreCateg']);
Route::post('/ajoutOffre', [OffreController::class, 'ajouterOffre']);



Route::post('/ajouterContact',[ContactController::class,'add']);
Route::get('/listeContact',[ContactController::class,'getContact'])->middleware('authAdmin');
Route::get('/afficherContact/{id}',[ContactController::class,'afficherMessage']);
Route::get('/deleteContact/{id}',[ContactController::class,'delete']);









Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
