<?php

namespace App\Http\Controllers;

use App\Article;
use App\Pickup;
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
        $article = Article::create([
            'id' => $request->id,
            'name' => $request->name,
            'description' => $request->description,
        ]);
        $article->products()->create([
            'size' => 'XS',
            'stock' => $request->stck_XS,
            'id' => $request->id_XS,
        ]);
        $article->products()->create([
            'size' => 'S',
            'stock' => $request->stck_S,
            'id' => $request->id_S,
        ]);
        $article->products()->create([
            'size' => 'M',
            'stock' => $request->stck_M,
            'id' => $request->id_M,
        ]);
        $article->products()->create([
            'size' => 'L',
            'stock' => $request->stck_L,
            'id' => $request->id_L,
        ]);
        $article->products()->create([
            'size' => 'XL',
            'stock' => $request->stck_XL,
            'id' => $request->id_XL,
        ]);
        return redirect('/article/index');
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
        $pickups = [];
        foreach (Pickup::years() as $year){
            foreach (Pickup::months($year) as $month){
                $pickups[$year][$month] = Pickup::statistics($year, $month, $id);
            }
        }
        $article = Article::find($id);
        return view('article.show', compact('article', 'pickups'));
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

        $article = Article::find($id);
        $sizes = ['XS', 'S', 'M', 'L', 'XL'];
        return view('article.edit', compact('article', 'sizes'));
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
        $article = Article::find($id);
        $article->id = $request->id;
        $article->name = $request->name;
        $article->description = $request->description;
        $article->save();
        $XS = Product::find($request->id_old_XS);
        $XS->size = "XS";
        $XS->stock = $request->stck_XS;
        $XS->id = $request->id_XS;
        $article->products()->save($XS);
        $S = Product::find($request->id_old_S);
        $S->size = "S";
        $S->stock = $request->stck_S;
        $S->id = $request->id_S;
        $article->products()->save($S);
        $M = Product::find($request->id_old_M);
        $M->size = "M";
        $M->stock = $request->stck_M;
        $M->id = $request->id_M;
        $article->products()->save($M);
        $L = Product::find($request->id_old_L);
        $L->size = "L";
        $L->stock = $request->stck_L;
        $L->id = $request->id_L;
        $article->products()->save($L);
        $XL = Product::find($request->id_old_XL);
        $XL->size = "XL";
        $XL->stock = $request->stck_XL;
        $XL->id = $request->id_XL;
        $article->products()->save($XL);
        return redirect('/article/index');
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
        return redirect('/article/index');
    }
}
