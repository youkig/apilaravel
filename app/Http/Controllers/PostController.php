<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Whether;

use GuzzleHttp\Client;

class PostController extends Controller
{
    public function index()
    {
        $tag_id = "laravel";
        $title = "東京の今日天気予報";
        //$url = "https://www.jma.go.jp/bosai/forecast/data/overview_forecast/130000.json";
        $url = "https://weather.tsukumijima.net/api/forecast?city=130010";
        $method = "GET";

        //接続
        $Client = new Client();

        $response = $Client->request($method, $url);
        
        $posts = $response->getBody();
        $posts = json_decode($posts, true);
        //dd($posts);
        
        $wether = new Whether;
        $wether2 = Whether::where('datename',$posts['forecasts'][0]['date'])->first();

        $wethernav = Whether::orderBy('datename','desc')->get();

        if(!$wether2){
        $wether->datename = $posts['forecasts'][0]['date'];
        $wether->weather = $posts['forecasts'][0]['telop'];
        $wether->text = $posts['description']['text'];
        $wether->save();
        return view('index',[
            'posts'=>$posts,
            'wethernav'=>$wethernav,
            ]
        )->with('title',$title);
        }else{
            $message = "既に登録があります";
            return view('index',[
                'message'=>$message,
                'posts'=>$posts,
                'wethernav'=>$wethernav,
            ])->with('title',$title);
        }
    }


}
