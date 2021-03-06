<?php

namespace App\Http\Controllers;

use App\Article;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Article $article)
    {
        $sizes = Product::sizes();
        return view('products.create', compact('sizes', 'article'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $this->validate(request(), [
            'id' => 'required|numeric|unique:products,id|between:1000000000000,9999999999999',
            'article_id' => 'required|exists:articles,id',
            'size' => 'required',
            'stock' => 'required|numeric'
        ]);

        Product::create(request(['article_id', 'id', 'size', 'stock']));
        return redirect('/article/' . request('article_id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article, Product $product)
    {
        //
        //return $product;
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article, Product $product)
    {
        //
        $sizes = Product::sizes();
        return view('products.edit', compact('product', 'sizes', 'article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article, $id)
    {
        //
        $this->validate(request(), [
            'article_id' => 'required|exists:articles,id',
            'size' => 'required',
            'stock' => 'required|numeric'
        ]);

        $product = Product::find($id);
        $product->size = request('size');
        $product->stock = request('stock');
        $product->save();
        return redirect('/article/' . $product->article->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article, Product $product)
    {
        //
        $id = $product->article_id;
        Product::destroy($product->id);
        return redirect('/article/' . $id);
    }
}
