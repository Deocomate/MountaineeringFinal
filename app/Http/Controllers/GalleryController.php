<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $categories = DB::table('category')->get();
        $tags = DB::table('tag')->get();
        $data = DB::table('gallery')->paginate();
        return view('pages.gallery.gallery',compact(['data','categories','tags']));
    }
    public function index()
    {
        $data = DB::table('gallery')
        ->join('tag', 'gallery.tag_id', '=', 'tag.id')
        ->join('category', 'gallery.category_id', '=', 'category.id')
        ->select('gallery.*', 'tag.tag_name', 'category.cate_name')
        ->latest()
        ->paginate(4);
        return view('admin.gallery.show',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tagOPT = DB::table('tag')->get();
        $categoryOPT = DB::table('category')->get();
        return view('admin.gallery.create',compact([
            'tagOPT','categoryOPT'
        ]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('img_link')) {
            $filename = $request->file('img_link')->getClientOriginalName();
            $request->file('img_link')->move('gallery_img', $filename);
            $data = [
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
                'img_link'=>$filename,
                'title'=>$request->title,
                'category_id'=>(int)$request->category_id,
                'tag_id'=>(int)$request->tag_id,
            ];
            DB::table('gallery')->insert($data);
            return redirect()->route('admin.gallery');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('gallery')->where('id','=',$id)->first();
        $tagOPT = DB::table('tag')->get();
        $categoryOPT = DB::table('category')->get();
        return view('admin.gallery.edit',compact([
            'tagOPT','categoryOPT','data'
        ]));
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
        if ($request->hasFile('img_link')) {
            unlink('gallery_img/'.DB::table('gallery')->where('id','=',$id)->get()->first()->img_link);
            $filename = $request->file('img_link')->getClientOriginalName();
            $request->file('img_link')->move('gallery_img', $filename);
            DB::table('gallery')
                ->where('id','=',$id)
                ->update([
                    'updated_at'=>Carbon::now(),
                    'img_link'=>$filename,
                    'title'=>$request->title,
                    'category_id'=>(int)$request->category_id,
                    'tag_id'=>(int)$request->tag_id,
                ]);
        } else {
            DB::table('gallery')
                ->where('id','=',$id)
                ->update([
                    'updated_at'=>Carbon::now(),
                    'title'=>$request->title,
                    'category_id'=>(int)$request->category_id,
                    'tag_id'=>(int)$request->tag_id,
                ]);
        }
        return redirect()->route('admin.gallery');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        DB::table('gallery')->where('id','=',$id)->delete();
        return redirect()->route('admin.gallery');
    }
}
