<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $data = DB::table('admin')
            ->join('users', 'admin.user_id', '=', 'users.id')
            ->select('users.name','admin.*')
            ->latest()
            ->paginate(5);
        return view('admin.dashboard.dashboard',compact('data'));
    }
    public function add(Request $request)
    {
        $id = DB::table('users')->where('email','=',$request->email)->get()->first()->id;
        DB::table('admin')->insert([
            'user_id'=>$id,
        ]);
        return redirect()->route('admin');
    }
    public function delete($id)
    {
        DB::table('admin')->where('id','=',$id)->delete();
        return redirect()->route('admin');
    }
}
