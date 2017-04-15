<?php

namespace App\Http\Controllers;

use App\Article;
use App\Pickup;
use App\Product;
use Illuminate\Http\Request;

class ArticleController extends Controller
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
        $this->validate(request(), [
            'id' => 'required|numeric|unique:articles,id',
            'name' => 'required',
            'description' => 'required'
        ]);

        $article = Article::create([
            'id' => $request->id,
            'name' => $request->name,
            'description' => $request->description,
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
        foreach (Pickup::years($id) as $year){
            foreach (Pickup::months($year, $id) as $month){
                $pickups[$year][$month] = Pickup::statistics($year, $month, $id);
            }
        }
        $article = Article::find($id);
        $products = $article->products;
        return view('article.show', compact('article', 'pickups', 'products'));
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
        $this->validate(request(), [
            'id' => 'required|numeric',
            'name' => 'required',
            'description' => 'required'
        ]);

        $article = Article::find($id);
        foreach ($article->products as $product){
            $product->article_id = request('id');
            $product->save();
        }
        $article->id = request('id');
        $article->name = request('name');
        $article->description = request('description');
        $article->save();
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
