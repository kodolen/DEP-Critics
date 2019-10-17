@extends ('layout.master')

@section('content')

    <div class="row" id="teams-row">
        <div class="col-md-8 offset-md-2">
            <div class="row">
                <div class="col-md-3">
                    <h3>{{ $player->name }}</h3>
                    <span>{{ $player->position }}</span><br>
                    <span>{{ $player->nationality }}</span><br>
                    <span>{{ $team->name }}</span>
                </div>
            </div>
        </div>
    </div>

@endsection

