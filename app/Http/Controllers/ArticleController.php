<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\User;

use App\Http\Controllers\CommentController;
use App\Http\Controllers\CommentLikeController;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;

class ArticleController extends Controller
{
    //
    public function add(Request $request){

        $validated = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'content' => 'required',
            'image' => 'required'
        ]);

        $path = $request->file('image')->store('images', "public");
        $path = "/storage/" . $path;
        $article = new Article();
        $article->title = $request->title;
        $article->content = $request->content;
        $article->datetime_posted = date('Y-m-d'); //  H:i:s');
        $article->slug = Str::of($request->title)->slug('-');
        $article->user_id = Auth::user()->id;
        $article->image_path = $path;
        $article->save();

        return redirect()->route('article.show', $article->slug);
    }
    public static function show_articles(){

        $articles = Article::orderBy('datetime_posted', 'desc')->paginate(5);
        foreach ($articles as $article){
            $article->name = DB::table('users')->where('id', '=', $article->user_id)->get()[0]->name;
        }
        return view('articles', ['articles' => $articles]);
    }
    public function show_article($slug)
    {
        $article = Article::where('articles.slug', '=', $slug)->firstOrFail();
        $article->name = DB::table('users')->where('id', '=', $article->user_id)->get()[0]->name;
        return view('article', ['article' => $article]);
    }
}
