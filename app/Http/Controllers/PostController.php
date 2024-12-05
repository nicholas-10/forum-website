<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\User;

use App\Http\Controllers\CommentController;
use App\Http\Controllers\CommentLikeController;
use App\Http\Controllers\LikeController;
use Illuminate\Pagination\Paginator;

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
        $post = new Post();
        $post->title = $request->title;
        $post->edited = 0;
        $post->datetime_posted = date('Y-m-d'); //  H:i:s');
        $post->content = $request->content;
        $post->user_id = Auth::user()->id;
        $post->slug = Str::of($request->title)->slug('-');
        $post->save();
        $post->slug = Str::of($request->title)->slug('-') . '-' . $post->id ;
        $post->delete();
        $post->save();
        return redirect()->route('posts.show', $post->slug);
    }
    public function get_popular()
    {
        $posts = Post::withCount('likes')->paginate(12);
        foreach ($posts as $post) {
            $post->likes = $post->likes_count;
        }
        foreach ($posts as $post) {
            $user = DB::table('users')->where('id', '=', $post->user_id)->get()[0];
            $post->gender = $user->gender;
            $post->age = $user->age;
        }
        foreach ($posts as $post) {
            $post->score = $post->likes  + (time() - strtotime($post->updated_at)) / 100000;
        }
        return view('display', ['posts' => $posts]);
    }
    public function get_recent()
    {
        $posts = Post::withCount('likes')->orderBy('updated_at', 'desc')->paginate(12);
        foreach ($posts as $post) {
            $post->likes = $post->likes_count;
        }
        foreach ($posts as $post) {
            $user = DB::table('users')->where('id', '=', $post->user_id)->get()[0];
            $post->gender = $user->gender;
            $post->age = $user->age;
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
            $user = DB::table('users')->where('id', '=', $post->user_id)->get()[0];
            $post->gender = $user->gender;
            $post->age = $user->age;
        }

        return view('display', ['posts' => $posts]);
    }

    public function show_post($slug)
    {
        $post = Post::withCount('likes')->where('posts.slug', '=', $slug)->firstOrFail();
        $post->likes = $post->likes_count;
        $user = DB::table('users')->where('id', '=', $post->user_id)->get()[0];
        $post->gender = $user->gender;
        $post->age = $user->age;
        $comments = CommentController::get_comments($post->id);
        if (Auth::check()) {
            $post->is_liked_by_user = LikeController::is_liked_by_user(Auth::user()->id, $post->id);
            foreach ($comments as $comment) {
                $comment->is_liked_by_user = CommentLikeController::is_liked_by_user(Auth::user()->id, $comment->id);

            }
        }
        return view('post', ['post' => $post, 'comments' => $comments]);
    }

    public function delete_post(Request $request)
    {
        $deleted = DB::table('posts')->where('posts.id', '=', $request->post_id)->delete();
        return redirect(route('newest'));
    }
}
