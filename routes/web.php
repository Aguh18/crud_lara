<?php

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



// route ke halaman about
Route::get('/about', [App\Http\Controllers\booklist::class, 'index']
);


route::get('/posts{{$slug}}', function ($slug) {
    return view('posts', [
        "title" => "Halaman Blog"

    ]);
});

// route untuk input
Route::get('/input', [App\Http\Controllers\booklist::class, 'input']
);


Route::post('/input', [App\Http\Controllers\booklist::class,'store']
);

// route destroy
Route::delete('/delete/{id}', [App\Http\Controllers\booklist::class, 'destroy']
);

// route update
Route::get('/update/{id}', [App\Http\Controllers\booklist::class, 'edit']
);

Route::put('/update/{id}', [App\Http\Controllers\booklist::class, 'update']
);





