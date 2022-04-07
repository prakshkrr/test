<?php

use App\Modules\Color\Http\Controllers\ColorController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin/color')->group(function() 
{
    Route::group(["middleware" => ["auth"]], function(){
Route::get('/', 'ColorController@welcome')->name('color.index');
Route::get('/addcolor', [ColorController::class,'formdata'])->name('color.add');
Route::post('/addcolor', [ColorController::class,'getdata'])->name('color.save');
Route::post('/deletecolor', [ColorController::class,'deletedata'])->name('color.delete');
Route::post('/restoreall', [ColorController::class,'Restoreall'])->name('color.restoreall');
Route::post('/changestatus', [ColorController::class,'changestatus']);
Route::get('/edit/{id}', [ColorController::class,'edit'])->name('color.edit');
Route::post('/update/{id}', [ColorController::class,'update'])->name('color.update');
Route::get('/trash','ColorController@showtrash')->name('color.showtrash');
Route::post('/restoretrash', 'ColorController@restoretrash')->name('color.restoretrash');
});
});