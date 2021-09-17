<?php

namespace App\Http\Controllers;

use App\Models\AppConst;
use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $request->category_ids;
        $articlesQuery = Article::where('valid_date', '>=', Carbon::now())
        ->whereHas('user', function($query){
            $query->where('blocked', false);
        });
        if($request->category_ids){
            $articlesQuery->whereHas('categories', function($query) use ($request){
                $query->whereIn('categories.id', $request->category_ids);
            });
        }
        $articles = $articlesQuery->latest()->paginate(AppConst::HOME_ARTICLE_PER_PAGE);

        return view('home.index', compact('articles'));
    }
}
