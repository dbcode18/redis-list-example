<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class AppController extends Controller
{
    public function index(){
        $response=Redis::lrange('lista', 0, -1);
        $lista=array();
        $contador=0;
        foreach($response as $element){
            $interno= array(
                "indice" => $contador,
                "valor" => $element,
            );
            array_push($lista, $interno);
            $contador= $contador+1;
        }
        return view('welcome')
        ->with('lista',$lista);
    }

    public function store(Request $request){
        $valor=$request->valor;
        if($request->tipo=='cola'){
            Redis::rpush('lista', $valor);
        }
        elseif($request->tipo=='cabeza'){
            Redis::lpush('lista', $valor);   
        }
        return redirect()->route('index');
    }

    public function set(Request $request){
        $indice=$request->indice;
        $valor=$request->valor;
        Redis::lset('lista', $indice, $valor);
        return redirect()->route('index');
    }

    public function lpop(Request $request){
        Redis::lpop('lista');
        return redirect()->route('index');
    }

    public function rpop(Request $request){
        Redis::rpop('lista');
        return redirect()->route('index');
    }

    public function delete(Request $request){
        $indice=$request->indice;
        $elemento = Redis::lindex('lista', $indice);
        Redis::lrem('lista', 1, $elemento);
        return redirect()->route('index');
    }


}
