@extends('layouts.app')


@section('content')

<div class="col-md-8">        
                 <ul class="list-group">   

                    <li class="list-group-item">日付：{{ $posts[0]['datename'] }}</li>
                    <li class="list-group-item">天気： {{ $posts[0]['weather']}}</li>
                    <li class="list-group-item">{!! nl2br(e($posts[0]['text'])) !!}</li>
                 </ul>  

@endsection