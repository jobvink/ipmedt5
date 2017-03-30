<?php

namespace App\Http\Controllers;

use App\Article;
use App\Product;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // deze funcite maakt een view met alle articlen
        $articles = Article::all();
        return view('article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // deze functie vangt het article op en bewaart het in de database.
        $article = new Article;
        $article->id = $request->id;
        $article->name = $request->name;
        $article->description = $request->description;
        $xs = new Product;
        $xs->size = 'XS';
        $s = new Product;
        $s->size = 'S';
        $m = new Product;
        $m->size = 'M';
        $l = new Product;
        $l->size = 'L';
        $xl = new Product;
        $xl->size = 'XL';
        $xs->id = $request->id-xs;
        $s->id = $request->id-s;
        $m->id = $request->id-m;
        $l->id = $request->id-l;
        $xl->id = $request->id-xl;
        $xs->stock = $request->stck-xs;
        $s->stock = $request->stck-s;
        $m->stock = $request->stck-m;
        $l->stock = $request->stck-l;
        $xl->stock = $request->stck-xl;
        $xs->stock = $request->stck-xs;
        $s->stock = $request->stck-s;
        $m->stock = $request->stck-m;
        $l->stock = $request->stck-l;
        $xl->stock = $request->stck-xl;
        $article->save();
        $article->products()->save($xs);
        $article->products()->save($s);
        $article->products()->save($m);
        $article->products()->save($l);
        $article->products()->save($xl);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
       $article = Article::find($id);
        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Article::destroy($id);
    }
}
