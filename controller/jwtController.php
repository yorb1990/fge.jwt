<?php
namespace fge\jwt\controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class jwtController extends Controller
{
    public function create(Request $request){
        $token=new \fge\jwt\src\jwt($request->input("clave"));
        $error="";
        $obj=new \fge\jwt\object\user();
        $obj->user=$request->input("email");
        $obj->created=date("c");
        $obj->access=[
            "AZ09s",
            "AZ08"
        ];
        if(!$token->genjwt($obj,$error)){
            return \Response::json($error,506);
        }
        return \Response::json($token->token);   
    }
}