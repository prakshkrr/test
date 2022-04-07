<?php
use App\Modules\Category\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin/category')->group(function() 
{
    Route::group(["middleware" => ["auth"]], function(){
Route::get('/', 'CategoryController@welcome')->name('category.index');
Route::get('/addcategory', [CategoryController::class,'formdata'])->name('category.add');
Route::post('/addcategory', [CategoryController::class,'getdata'])->name('category.save');
Route::post('/deletecategory', [CategoryController::class,'deletedata'])->name('category.delete');
Route::post('/restoreall', [CategoryController::class,'Restoreall'])->name('category.restoreall');
Route::post('/changestatus', [CategoryController::class,'changestatus']);

Route::get('/edit/{id}', [CategoryController::class,'edit'])->name('category.edit');
Route::post('/update/{id}', [CategoryController::class,'update'])->name('category.update');

Route::get('/trash',[CategoryController::class,'showtrash'])->name('category.showtrash');
Route::post('/restoretrash', [CategoryController::class,'restoretrash'])->name('category.restoretrash');
});
});