<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function postLike(Request $request)
    {
        $user_id = Auth::user()->id;
        $tmp = DB::table('likes')->where('user_id', '=', $user_id)->where('post_id', '=', $request->post_id)->get();
        if (!$tmp->isNotEmpty()) {
            $like = new Like();
            $like->user_id = $user_id;
            $like->post_id = $request->post_id;

            $like->save();
            return redirect()->back()->with('success', 'Liked successfully');
        } else {
            DB::table('likes')->where('user_id', '=', $user_id)->where('post_id', '=', $request->post_id)->delete();
            return redirect()->back()->with('success', 'Unliked successfully');
        }
    }

    public static function is_liked_by_user($user_id, $post_id)
    {
        if (DB::table('likes')->where('user_id', '=', $user_id)->where('post_id', '=', $post_id)->exists()) {
            return true;
        }
        return false;
    }
}
