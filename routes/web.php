<?php

use App\Models\Oli;
use App\Models\Region;
use App\Models\Accesories;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MotorController;
use App\Http\Controllers\DealerController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\WilayahController;
use App\Http\Controllers\AccesoriesController;
use App\Http\Controllers\ArtikelController;

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

//Content

Route::get('/', function () {
    return view('content.home');
});

Route::get('/produk', function () {
    $regions = Region::orderBy('created_at','asc')->get();
    return view('content.product', compact('regions'));
});
Route::get('/dealer', function () {
    $regions = Region::orderBy('created_at','asc')->get();
    return view('content.dealer', compact('regions'));
});
Route::get('/contact', function () {
    return view('content.contact');
});


Route::get('/artikel', [ArtikelController::class, 'list_artikel']);
Route::get('/artikel/{artikel:slug}', [ArtikelController::class, 'artikel'])->name('slug');

Route::get('/dealer/list-dealer/{id}', [DealerController::class, 'listDealer']);
Route::get('/dealer/list-dealer/detail/{id}', [DealerController::class, 'detailDealer']);

Route::get('/produk/list-motor/{id}', [MotorController::class, 'listMotor']);
Route::get('/produk/list-motor/detail/{id}', [MotorController::class, 'detailMotor']);

Route::get('/testimonial', function () {
    return view('content.testimonial');
});
Route::get('/about-us', function () {
    return view('content.about-us');
});

Route::get('/accesories', function () {
    $accesories = Accesories::all();
    return view('content.accesories', compact('accesories'));
});

Route::get('/sitemap.xml', [ContentController::class, 'sitemapArtikel']);

Route::get('/yamalube', function () {
    $oli = Oli::all();
    $matic = Oli::where('jenis', 'Matic Oil')->get();
    $sport = Oli::where('jenis', 'Sport Oil')->get();
    $moped = Oli::where('jenis', 'Moped Oil')->get();
    $chemical = Oli::where('jenis', 'Chemical')->get();
    $yamalube = Oli::where('jenis', 'Yamalube Technology')->get();
    return view('content.oli', compact('oli', 'matic', 'sport', 'moped', 'chemical', 'yamalube'));
});
// Route::get('/accesories/details/{id}', function () {
//     return view('content.accesories-detail');
// });
Route::get('/accesories/details/{id}', [AccesoriesController::class, 'detailAcc']);
Route::get('/yamalube/details/{id}', [AccesoriesController::class, 'detailOli']);

//akhir route content


Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'storeLogin']);
Route::middleware('auth')->group(function () {
    Route::middleware('is.admin')->group(function () {
        Route::get('logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('admin', [AdminController::class, 'index']);
        Route::get('admin/wilayah', [WilayahController::class, 'indexWilayah'])->name('index');
        Route::get('admin/wilayah/add', [WilayahController::class, 'create'])->name('add.wilayah');
        Route::post('admin/wilayah/store', [WilayahController::class, 'store'])->name('store.wilayah');
        Route::get('admin/wilayah/edit/{id}', [WilayahController::class, 'edit']);
        Route::post('admin/wilayah/update/{id}', [WilayahController::class, 'update']);
        Route::get('admin/wilayah/delete/{id}', [WilayahController::class, 'destroy']);

        Route::get('admin/artikel', [ArtikelController::class, 'index'])->name('index.artikel');
        Route::get('admin/artikel/add', [ArtikelController::class, 'create'])->name('create.artikel');
        Route::post('admin/artikel/add', [ArtikelController::class, 'store'])->name('store.artikel');
        Route::get('admin/artikel/edit/{id}', [ArtikelController::class, 'edit']);
        Route::post('admin/artikel/update/{id}', [ArtikelController::class, 'update']);
        Route::get('admin/artikel/delete/{id}', [ArtikelController::class, 'destroy']);

        Route::get('admin/motor', [MotorController::class, 'index'])->name('indexMotor');
        Route::get('admin/motor/add', [MotorController::class, 'create'])->name('add.motor');
        Route::get('admin/motor/colour/{id}', [MotorController::class, 'updateColour']);
        Route::post('admin/motor/store', [MotorController::class, 'store'])->name('store.motor');
        Route::get('admin/motor/edit/{id}', [MotorController::class, 'edit']);
        Route::post('admin/motor/update/{id}', [MotorController::class, 'update']);
        Route::get('admin/motor/delete/{id}', [MotorController::class, 'destroy']);
        Route::post('admin/store-colour', [MotorController::class, 'storeColour']);

        Route::get('admin/accesories', [AccesoriesController::class, 'indexAccesories'])->name('index.acc');
        Route::get('admin/accesories/add', [AccesoriesController::class, 'create'])->name('add.accesories');
        Route::post('admin/accesories/store', [AccesoriesController::class, 'store'])->name('store.accesories');
        Route::get('admin/accesories/edit/{id}', [AccesoriesController::class, 'edit']);
        Route::post('admin/accesories/update/{id}', [AccesoriesController::class, 'update']);
        Route::get('admin/accesories/delete/{id}', [AccesoriesController::class, 'destroy']);

        Route::get('admin/yamalube', [AccesoriesController::class, 'indexOli'])->name('index.oli');
        Route::get('admin/yamalube/add', [AccesoriesController::class, 'createOli'])->name('add.oli');
        Route::post('admin/yamalube/store', [AccesoriesController::class, 'storeOli'])->name('store.oli');
        Route::get('admin/yamalube/edit/{id}', [AccesoriesController::class, 'editOli']);
        Route::post('admin/yamalube/update/{id}', [AccesoriesController::class, 'updateOli']);
        Route::get('admin/yamalube/delete/{id}', [AccesoriesController::class, 'destroyOli']);

        Route::get('admin/dealer', [DealerController::class, 'index'])->name('index.dealer');
        Route::get('admin/dealer/add', [DealerController::class, 'create'])->name('add.dealer');
        Route::post('admin/dealer/store', [DealerController::class, 'store'])->name('store.dealer');
        Route::get('admin/dealer/edit/{id}', [DealerController::class, 'edit']);
        Route::post('admin/dealer/update/{id}', [DealerController::class, 'update']);
        Route::get('admin/dealer/delete/{id}', [DealerController::class, 'destroy']);
    });
});

// Ajax
Route::post('switch-warna', [AjaxController::class, 'switchwarna']);
Route::post('search-motor-name', [AjaxController::class, 'searchMotorName']);
Route::post('search-trans-name', [AjaxController::class, 'searchTransName']);
Route::post('get-by-nopol', [AjaxController::class, 'searchNopolAdmin']);
Route::post('show-list-motor', [AjaxController::class, 'showListMotor']);
Route::post('get-motor-admin', [AjaxController::class, 'getListMotor']);
Route::post('kategori-motor', [AjaxController::class, 'getKategoriMotor']);
