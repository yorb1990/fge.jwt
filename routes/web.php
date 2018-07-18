<?php
use Illuminate\Http\Request;
Route::get('/login', function () {
    if(env("CLAVE")==null){
        return Redirect::to('fge_tok/regmod1');
    }
    return view("fge_tok-jwt::login");
});