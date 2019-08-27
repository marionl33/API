<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Article;
use App\Http\Resources\Article as ArticleResource;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get articles
        $articles = Article::paginate(15);

        // return collection of articles as a ressource
        return ArticleResource::collection($articles);
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
        $article = $request->isMethod('put') ? Article::findOrFail($request->id) : new Article;

        $article->antenna = $request->input('antennaPort');
        $article->number = $request->input('epc');
        $article->tps = $request->input('firstSeenTimestamp');
        $article->RSSI = $request->input('peakRssi');
        //$article->heart = $request->input('isHeartBeat');

        if ($article->save()){
            return new ArticleResource($article);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Get a single article 
        $article=Article::findOrFail($id);
        
        //Return single article as a resource
        return new ArticleResource($article);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Get a single article 
        $article=Article::findOrFail($id);
        
        if ($article->delete()){
            return new ArticleResource($article);
        }
    }
}
