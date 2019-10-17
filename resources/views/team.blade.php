@extends ('layout.master')

@section('content')

    <div class="row" id="teams-row">
        <div class="col-md-8 offset-md-2">
            <div class="row">
                @foreach($players as $player)
                    <div class="col-md-3">
                        <h3>{{ $player->name }}</h3>
                        <span>{{ $player->position }}</span><br>
                        <span>{{ $player->nationality }}</span>
                        <a href="{{ url('/teams/'.$teams->id.'/'.$player->id)}}">Link</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection

