<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Article;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //
    public static function search(Request $request)
    {
        $posts = Post::withCount('likes')->where('title', 'like', "%{$request->search}%")->orderBy('updated_at', 'desc')->paginate(12);
        foreach ($posts as $post) {
            $post->likes = $post->likes_count;
        }
        foreach ($posts as $post) {
            $user = DB::table('users')->where('id', '=', $post->user_id)->get()[0];
            $post->gender = $user->gender;
            $post->age = $user->age;
        }
        return view('search', ['posts' => $posts, 'search' => $request->search]);
    }
    public static function search_article(Request $request)
    {
        $articles = Article::where('title', 'like', "%{$request->search}%")->orderBy('updated_at', 'desc')->paginate(12);
        foreach ($articles as $article) {
            $user = DB::table('users')->where('id', '=', $article->user_id)->get()[0];
            $article->name = $user->name;
        }
        return view('search', ['articles' => $articles, 'search' => $request->search]);
    }
}
