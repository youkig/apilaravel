<div class="col-md-2">
    <ul class="list-group">
        @foreach ($wethernav as $data)
        <li class="list-group-item"><a href="/detail?id={{ $data['id'] }}">{{ $data['datename']}}</a></li>
        @endforeach
    </ul>
    </div>