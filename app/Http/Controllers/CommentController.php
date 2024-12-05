<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function delete_comment(Request $request)
    {
        $deleted = DB::table('comments')->where('comments.id', '=', $request->comment_id)->delete();
        return redirect()->back();
    }

    public function comment(Request $request)
    {
        $validation = $request->validate([
            'content' => 'required|max:800',
        ]);
        $comment = new Comment();
        $comment->edited = 0;
        $comment->datetime_commented = date('Y-m-d');
        $comment->content = $request->content;
        $comment->user_id = Auth::user()->id;
        $referer = $request->headers->get('referer');
        $temp = explode('/', $referer);
        $slug = end($temp);
        $comment->post_id = DB::table('posts')->where('posts.slug', '=', $slug)->get()[0]->id;
        $comment->save();

        return redirect()->back()->with('success', 'Comment submitted successfully!');
    }
    public static function get_comments($post_id)
    {
        $comments = Comment::withCount('comment_likes')->join('users', 'users.id', 'comments.user_id')
            ->where('comments.post_id', '=', $post_id)->orderBy('updated_at', 'asc')->get();
        foreach ($comments as $comment) {
            $comment->name = DB::table('users')->where('users.id', '=', $comment->user_id)->get()[0]->name;
        }
        return $comments;
    }

}
