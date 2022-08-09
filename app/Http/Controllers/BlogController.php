<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $data = DB::table('blog')->select('id', 'updated_at', 'heading', 'heading_slug', 'title', 'thumbnail', 'locate', 'author')->latest()->paginate(4);
        $latesBlog = DB::table('blog')->select('id', 'updated_at', 'heading', 'heading_slug', 'title', 'thumbnail', 'locate', 'author')->latest()->limit(5)->get();
        foreach ($data as $item) {
            $item->updated_at = new Carbon($item->updated_at);
        }
        foreach ($latesBlog as $item) {
            $item->updated_at = new Carbon($item->updated_at);
        }
        return view('pages.blogs.blogs', compact([
            'data', 'latesBlog'
        ]));
    }
    public function index(Request $request)
    {
        $data = DB::table('blog')->select()->latest()->paginate(4);
        // var_dump($data);
        return view('admin.blogs.show', compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin.blogs.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('thumbnail')) {
            $filename = $request->file('thumbnail')->getClientOriginalName();
            $request->file('thumbnail')->move('blog_img', $filename);
            $data = [
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'heading' => $request->heading,
                'heading2' => $request->heading2,
                'heading_slug'=>Str::slug($request->heading,'-').Str::random(5),
                'title' => $request->title,
                'thumbnail' => $filename,
                'locate' => $request->location,
                'author' => $request->author,
                'content' => $request->content,
            ];
            DB::table('blog')->insert($data);
            return redirect()->route('admin.blog');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $data = DB::table('blog')->where('heading_slug', '=', $slug)->get()->first();
        $comments = DB::table('comment')
        ->join('users', 'comment.user_id', '=', 'users.id')
        ->select('comment.*', 'users.name')
        ->latest('id')
        ->paginate(4);
        $latesBlog = DB::table('blog')->select('id', 'updated_at', 'heading', 'heading_slug', 'title', 'thumbnail', 'locate', 'author')->latest()->limit(5)->get();
        foreach ($latesBlog as $item) {
            $item->updated_at = new Carbon($item->updated_at);
        }
        $user_id = null;
        if (Auth::check()) {
            $user_id = Auth::id();
        }
        return view('pages.blogs.post', compact([
            'data', 'latesBlog','user_id','comments'
        ]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('blog')->where('id', '=', $id)->get()->first();
        // var_dump($data);
        return view('admin.blogs.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->hasFile('thumbnail')) {
            unlink('blog_img/'.DB::table('blog')->where('id','=',$id)->get()->first()->thumbnail);
            $filename = $request->file('thumbnail')->getClientOriginalName();
            $request->file('thumbnail')->move('blog_img', $filename);
            DB::table('blog')
                ->where('id','=',$id)
                ->update([
                    'updated_at'=>Carbon::now(),
                    'heading'=>$request->heading,
                    'heading2'=>$request->heading2,
                    'heading_slug'=>Str::slug($request->heading,'-').Str::random(5),
                    'title'=>$request->title,
                    'thumbnail'=>$request->thumbnail,
                    'locate'=>$request->locate,
                    'author'=>$request->author,
                    'content'=>$request->content,
                ]);
        } else {
            DB::table('blog')
                ->where('id','=',$id)
                ->update([
                    'updated_at'=>Carbon::now(),
                    'heading'=>$request->heading,
                    'heading2'=>$request->heading2,
                    'heading_slug'=>Str::slug($request->heading,'-').Str::random(5),
                    'title'=>$request->title,
                    'locate'=>$request->locate,
                    'author'=>$request->author,
                    'content'=>$request->content,
                ]);
        }
        return redirect()->route('admin.blog');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('blog')->where('id','=',$id)->delete();
        return redirect()->route('admin.blog');
    }
}
