<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Whether;

class detailController extends Controller
{
    public function detail($id)
    {
        //引数が(Requeset $request)のとき
        //$requestdata=$request->all();
        
        $wether = new Whether;
        $wethernav = Whether::orderBy('datename','desc')->get();
        //$posts =Whether::where('id',$requestdata['id'])->get();
        $posts =Whether::where('id',$id)->get();
        //dd($posts);
        $title = $posts[0]['datename']."の東京の天気予報";
        //return view('detail',[
        //    'posts'=>$posts,
        //    'wethernav'=>$wethernav,
        //    'title'=>$title,
        //]);
            
        return view('detail',compact('posts','wethernav','title'));
    }
}
