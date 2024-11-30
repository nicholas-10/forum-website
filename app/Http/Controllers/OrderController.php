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
    public static function search(Request $request){
        $posts = Post::withCount('likes')->where('title', 'like', "%{$request->search}%")->paginate(12);
        foreach ($posts as $post) {
            $post->likes = $post->likes_count;
        }
        foreach ($posts as $post){
            $post->name = DB::table('users')->where('id', '=', $post->user_id)->get()[0]->name;
        }
        return view('search', ['posts'=>$posts]);
    }
    public static function search_article(Request $request){
        $posts = Article::where('title', 'like', "%{$request->search}%")->paginate(12);
        foreach ($posts as $post){
            $post->name = DB::table('users')->where('id', '=', $post->user_id)->get()[0]->name;
        }
        return view('search', ['posts'=>$posts]);
    }
}
