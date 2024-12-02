<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\User;

use App\Http\Controllers\CommentController;
use App\Http\Controllers\CommentLikeController;
use App\Http\Controllers\LikeController;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function post(Request $request)
    {
        $validation = $request->validate([
            'title' => 'required|max:128',
            'content' => 'required|max:800',
        ]);
        // dd($request->all());
        $post = new Post();
        $post->title = $request->title;
        $post->edited = 0;
        $post->datetime_posted = date('Y-m-d'); //  H:i:s');
        $post->content = $request->content;
        $post->slug = Str::of($request->title)->slug('-');
        $post->user_id = Auth::user()->id;
        $post->save();
        // dd($post);
        return redirect()->route('posts.show', $post->slug);
    }
    public function get_recent()
    {
        // $posts = DB::table('posts')->join('users', 'posts.user_id', '=', 'users.id')->select('posts.*', 'users.name as name')->orderBy('updated_at', 'desc')->paginate(12);
        // foreach ($posts as $post) {
        //     $post->likes = PostController::count_likes($post->id);
        // }
        $posts = Post::withCount('likes')->orderBy('updated_at', 'desc')->paginate(12);
        foreach ($posts as $post) {
            $post->likes = $post->likes_count;
        }
        foreach ($posts as $post) {
            $post->name = DB::table('users')->where('id', '=', $post->user_id)->get()[0]->name;
        }
        return view('display', ['posts' => $posts]);
    }
    public function get_top()
    {
        $posts = Post::withCount('likes')->orderBy('likes_count', 'desc')->paginate(12);
        foreach ($posts as $post) {
            $post->likes = $post->likes_count;
        }
        foreach ($posts as $post) {
            $post->name = DB::table('users')->where('id', '=', $post->user_id)->get()[0]->name;
        }
        // $posts->likes = count($posts->likes);
        // echo $posts;

        return view('display', ['posts' => $posts]);

    }
    // public function count_likes($id){
    //     $likes = DB::table('posts')->join('likes', 'likes.post_id', '=', 'posts.id')->where('post_id', '=', $id)->groupBy('post_id')->count();

    //     return $likes;
    // }
    public function show_post($slug)
    {
        $post = Post::withCount('likes')->where('posts.slug', '=', $slug)->firstOrFail();
        $post->likes = $post->likes_count;
        $post->name = DB::table('users')->where('id', '=', $post->user_id)->get()[0]->name;
        // $post = DB::table('posts')
        //     ->join('likes', 'likes.post_id', '=', 'posts.id')
        //     ->where('slug', $slug)
        //     ->firstOrFail();
        $comments = CommentController::get_comments($post->id);
        // $comments = [];
        // foreach ($temp as $t) {
        //     # code...
        //     $comments = $t;
        // }
        // $user_liked = false;
        if (Auth::check()) {
            $post->is_liked_by_user = LikeController::is_liked_by_user(Auth::user()->id, $post->id);
            foreach ($comments as $comment) {
                $comment->is_liked_by_user = CommentLikeController::is_liked_by_user(Auth::user()->id, $comment->id);

            }
        }

        // $liked_by = DB::table('comment_likes')->where('comment_id', '=', )
        return view('post', ['post' => $post, 'comments' => $comments]);
    }
}
