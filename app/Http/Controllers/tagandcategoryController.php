<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class tagandcategoryController                                                                                                                                                                                                                                        extends Controller
{
    public function index()
    {
        $tags = DB::table('tag')->paginate(3, ['*'], "categories");
        $categories = DB::table('category')->paginate(3, ['*'], "tags");
        return view('admin.gallery.tag', compact([
            'tags', 'categories'
        ]));
    }
    public function add_tag(Request $request)
    {
        DB::table('tag')->insert([
            'tag_name' => $request->tag_name,
        ]);
        return redirect()->route('admin.gallery.tag');
    }
    public function add_category(Request $request)
    {
        DB::table('category')->insert([
            'cate_name' => $request->category_name,
        ]);
        return redirect()->route('admin.gallery.tag');
    }
    public function del_tag($id)
    {
        DB::table('tag')->where('id', '=', $id)->delete();
        return redirect()->route('admin.gallery.tag');
    }
    public function del_category($id)
    {
        DB::table('category')->where('id', '=', $id)->delete();
        return redirect()->route('admin.gallery.tag');
    }
    public function edit_tag($id)
    {
        $data = DB::table('tag')->where('id', '=', $id)->get()->first();
        return view('admin.gallery.edit_tag', compact(['id', 'data']));
    }
    public function edit_category($id)
    {
        $data = DB::table('category')->where('id', '=', $id)->get()->first();
        return view('admin.gallery.edit_category', compact(['id', 'data']));
    }
    public function update_tag(Request $request, $id)
    {
        DB::table('tag')->where('id', '=', $id)->update([
            'tag_name' => $request->tag_name,
        ]);
        return redirect()->route('admin.gallery.tag');
    }
    public function update_category(Request $request, $id)
    {
        DB::table('category')->where('id', '=', $id)->update([
            'cate_name' => $request->cate_name,
        ]);
        return redirect()->route('admin.gallery.tag');
    }
    public function searchTag($content)
    {
        $categories = DB::table('category')->get();
        $tags = DB::table('tag')->get();
        $tag = DB::table('tag')->where('tag_name', '=', $content)->first();
        $data = DB::table('gallery')->where('id', '=', $tag->id)->paginate(6);
        $count = 0;
        foreach ($data as $item) {
            $count++;
        }
        if ($count == 0) {
            $message = true;
        } else {
            $message = false;
        }
        return view('pages.gallery.gallery', compact(['data', 'tag', 'tags', 'categories', 'message']));
    }
    public function searchCategory($content)
    {
        $categories = DB::table('category')->get();
        $tags = DB::table('tag')->get();
        $category = DB::table('category')->where('cate_name', '=', $content)->first();
        $data = DB::table('gallery')->where('id', '=', $category->id)->paginate(6);
        $count = 0;
        foreach ($data as $item) {
            $count++;
        }
        if ($count == 0) {
            $message = true;
        } else {
            $message = false;
        }
        return view('pages.gallery.gallery', compact(['data', 'category', 'tags', 'categories', 'message']));
    }
}
