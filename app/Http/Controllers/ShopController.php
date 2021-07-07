<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $res = \App\Item::all();

        $results = array();

        foreach($res as $r){
            array_push($results, ["id"=>$r->id, "name"=>$r->name, "description"=>$r->description, "price"=>$r->price, "photo"=>$r->photo, "category" => $r->category()]);
        }

        $cats = \App\Categories::all();

        return view('shop')->with('products', $results)->with('cats', $cats);
    }

    public function checkout(Request $request){
        
        $products = array();

        $flag = true;
        $idcount = 1;
        
        while($flag){
            if($request["id_".$idcount] == null){
                $flag = false;
            } else {
                if($request["id_".$idcount."_count"] == null){
                    break;
                } else {
                    array_push($products, (object)['product' => \App\Item::find($request["id_".$idcount]), 'count' => $request["id_".$idcount."_count"]]);
                    $idcount++;
                }
            }
        }

        // dd($products);




        return view('checkout')->with('products', $products);
    }
}
