<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserArticleRequest;
use App\Models\AppConst;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class UserArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = auth()->user()->articles()->paginate(AppConst::USER_ARTICLE_PER_PAGE);
        return view('user.article.list', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::whereNull('parent_id')->with('childrens')->get();
        // return $categories;
        return view('user.article.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserArticleRequest $request)
    {
        $fileName = $request->file('thumbnail')->hashName();
        $img = Image::make($request->file('thumbnail')->getRealPath());
        $img->fit(250, 250);
        $img->save(public_path('storage/thumbnails/thumb_'.$fileName));

        $article = new Article();
        $article->fill($request->all());
        auth()->user()->articles()->save($article);
        $article->categories()->attach($request->category_ids);
        return redirect('/user/articles/create');
    }

    public function uploadImage(Request $request){
        $fileName = $request->file('thumbnail')->hashName();
        $img = Image::make($request->file('thumbnail')->getRealPath());
        $img->fit(250, 250);
        $img->save(public_path('storage/thumbnails/'.$fileName));
        return response()->json(['fileName' => $fileName]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
