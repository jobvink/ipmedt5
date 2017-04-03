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
            'stock' => $request->stck_xs,
            'id' => $request->id_xs,
        ]);
        $article->products()->create([
            'size' => 'S',
            'stock' => $request->stck_s,
            'id' => $request->id_s,
        ]);
        $article->products()->create([
            'size' => 'M',
            'stock' => $request->stck_m,
            'id' => $request->id_m,
        ]);
        $article->products()->create([
            'size' => 'L',
            'stock' => $request->stck_l,
            'id' => $request->id_l,
        ]);
        $article->products()->create([
            'size' => 'XL',
            'stock' => $request->stck_xl,
            'id' => $request->id_xl,
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
        return view('article.edit', compact('article'));
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
        $xs = new Product;
        $xs->size = "XS";
        $xs->stock = $request->stck_xs;
        $xs->id = $request->id_xs;
        $article->products()->save($xs);
        $s = new Product;
        $s->size = "S";
        $s->stock = $request->stck_s;
        $s->id = $request->id_s;
        $article->products()->save($s);
        $m = new Product;
        $m->size = "M";
        $m->stock = $request->stck_m;
        $m->id = $request->id_m;
        $article->products()->save($m);
        $l = new Product;
        $l->size = "L";
        $l->stock = $request->stck_l;
        $l->id = $request->id_l;
        $article->products()->save($l);
        $xl = new Product;
        $xl->size = "XL";
        $xl->stock = $request->stck_xl;
        $xl->id = $request->id_xl;
        $article->products()->save($xl);
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
    }
}
