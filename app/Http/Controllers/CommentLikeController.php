<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\CommentLike;
class CommentLikeController extends Controller
{
    //
    public function commentLike(Request $request){
        // dd($request);
        // dd($request);
        $user_id = Auth::user()->id;
        $tmp = DB::table('comment_likes')->where('user_id', '=', $user_id)->where('comment_id', '=',  $request->comment_id)->get();
        if (!$tmp->isNotEmpty()){
            // $user_id = Auth::user()->id;
            $referer =  $request->headers->get('referer');
            $temp = explode('/', $referer);
            $slug = end($temp);
            $comment_like = new CommentLike();
            $comment_like->user_id = $user_id;
            // dd($request);
            $comment_like->comment_id = $request->comment_id;
            // dd($comment_like);

            $comment_like->save();
            return redirect()->back()->with('success', 'Liked successfully');
        }else{
            DB::table('comment_likes')->where('user_id', '=', $user_id)->where('comment_id', '=', $request->comment_id)->delete();
            return redirect()->back()->with('success', 'Unliked successfully');
        }
    }
    public function commentAddLike(Request $request){

    }
    public static function is_liked_by_user($user_id, $comment_id){
        if (DB::table('comment_likes')->where('user_id', '=', $user_id)->where('comment_id', '=', $comment_id)->exists()){
            return true;
        }
        return false;
    }
}
