<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function add(Request $request, $blog_id, $user_id)
    {
        DB::table('comment')->insert([
            'created_at'=> Carbon::now(),
            'content' => $request->cmt,
            'user_id' => $user_id,
            'blog_id' => $blog_id,
        ]);
        return redirect()->route('blog.show', ['slug' => DB::table('blog')->where('id', '=', (int)$blog_id)->get()->first()->heading_slug]);
    }
}
