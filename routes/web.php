<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\ProduitController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureUserIsAdmin;

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

/*Route::get('/', function () {
    return view('pages.front-office.welcome');
})->name('accueil');
Route::get('/procedure', function () {
    return view('pages.front-office.procedure');
})->name('procedure');*/

/*Approche Controller*/
Route::get('/',[MainController::class,'afficheAccueil'])->name('page.accueil');

Route::get('procedure/{username}',[MainController::class,'afficheProcedure'])->name('procedure');
//Appel de la fonction ajoutProduit --première approche
Route::get('ajouter-produit',[MainController::class,'ajoutProduit'])->middleware('isAdmin')->name('a.produit');

//Appel de la fonction ajoutProduit --deuxième approche
Route::get('ajout-produit',[MainController::class,'ajoutProduitEncore'])->middleware('IsAdmin')->name('a.produit2');

Route::get('/admin', function () {
    return view('pages.back-office.login');
})->name('admin');

Route::get('/compte', function () {
    return view('pages.back-office.compte');
})->name('compte');

//Liste des produits
Route::get('list-produits', [MainController::class, 'getList'])->name('listP');
//Route pour la modification de produits
Route::get('modification/{id}', [MainController::class, 'modifierProduit']);
//Route pour la suppression 1 de produits
Route::get('suppression/{id}', [MainController::class, 'supprimerProduit']);
//Route pour la suppression 2 de produits
Route::get('suppression2/{id}', [MainController::class, 'supprimerProduit2'])->name('supprimer');
//Route pour l'affichage de la liste de produits 
Route::get('lesproduits/liste', [MainController::class, 'produitsListe'])->name('produits.liste');
//Route pour ajouter produit via formilaire
Route::get('produit/ajouter',[MainController::class, 'produitForm'])->middleware(['auth','isAdmin'])->name('new.produit');
//Route pour enrgistrer les produits dans la BD
Route::post('produits/enregistrer',[MainController::class, 'enregistrerProduit'])->name('produit.enregistrer');
//Routes pour modifier un produit via son ID
//Route::get('produit/modifier/{produit}', [ProduitController::class, 'edit'])->name('edit.produit');
//Route pour export de produits sous format excel
Route::get('excel-export',[MainController::class,'excelExport'])->name('excel.export');

//Route pour l'affichage de la liste de ministères 
Route::get('lesministeres/liste', [MainController::class, 'ministereListe'])->name('ministere.liste');

//Route pour la suppression  de ministere
Route::get('suppression_ministere/{id}', [MainController::class, 'supprimerMinistere'])->name('supprimer.ministere');
//Route pour Ajouter Commande
Route::get('ajouter-commande/{id}', [MainController::class, 'ajouterCommande'])->name('ajout.commande');
//Route pour Annuler Commande
Route::get('annuler-commande/{id}', [MainController::class, 'annulerCommande'])->name('annuler.commande');

//Route pour ajouter ministere via formilaire
Route::get('ministere/ajouter',[MainController::class, 'ministereForm'])->name('new.ministere');

Route::put('produit/update/{id}',[MainController::class, 'updateProduit'])->name('produit.update');

Route::resource('produits',ProduitController::class);


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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
 
require __DIR__.'/auth.php';

//Groupe de middleware
Route::middleware(['auth','isAdmin'])->group(function(){
    Route::get('produit/ajouter',[MainController::class, 'produitForm'])->name('new.produit');
    Route::post('produits/enregistrer',[MainController::class, 'enregistrerProduit'])->name('produit.enregistrer');
    Route::put('produit/update/{id}',[MainController::class, 'updateProduit'])->name('produit.update');
    Route::get('excel-export',[MainController::class,'excelExport'])->name('excel.export');
    Route::get('modification/{id}', [MainController::class, 'modifierProduit']);
    Route::get('suppression/{id}', [MainController::class, 'supprimerProduit']);
});

//Test-collection
Route::get('test-collection',[ProduitController::class, 'index']);
