<?php

namespace App\Http\Controllers;

use App\Product;
use App\Rack;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    /**
     * deze functie is verantwoordelijk voor het teruggeven van json informatei over een product
     * @param Product $product
     * @return mixed
     */
    public function showJson($id){
        $product = Product::find($id);

        if ( ! $product ) {
            return json_encode(['status' => 'faild']);
        }

        return $product;
    }

    /**
     * deze functie is verantwoordelijk voor het invoegen van een product op het rek
     *
     * @param Request $request
     * @return string
     */
    public function attach(Request $request){
        $data = $request->json()->all();
        $rack = Rack::find($data['rack']);
        $barcode = $data['barcode'];
        if(count($rack->products()->where('products.id', $barcode)->get())){
            $rack->incrementCount($barcode);
        } else {
            $rack->products()->attach($barcode, ['count' => 1]);
        }
        return json_encode(['status' => 'attach_succes']);
    }

    /**
     * deze functie is verantwoordelijk voor het loskoppelen van een product op het rek
     *
     * @param Request $request
     * @return string
     */
    public function detach(Request $request){
        $data = $request->json()->all();
        $rack = Rack::find($data['rack']);
        $barcode = $data['barcode'];
        if($rack->count($barcode)>1){
            $rack->decrementCount($barcode);
        } else {
            $rack->products()->detach($barcode);
        }
        return json_encode(['status' => 'detach_succes']);
    }


}
