@extends ('layouts.app')

@section('content')

    <div class="row" id="teams-row">
        <div class="col-md-8 offset-md-2">
            <div class="row">
                <div class="col-md-12">
                    <div class="search-wrapper">
                        {!! Form::open(['method' => 'GET', 'url' => '/search']) !!}
                        {!! Form::text('search', null, ['class' => 'form-control']) !!}
                        {{ Form::label('position', 'Players: ') }}
                        {{ Form::label('position', 'Goalkeeper') }}
                        {{ Form::radio('position', 'Goalkeeper', false) }}
                        {{ Form::label('position', 'Defender') }}
                        {{ Form::radio('position', 'Defender', false) }}
                        {{ Form::label('position', 'Midfielder') }}
                        {{ Form::radio('position', 'Midfielder', false) }}
                        {{ Form::label('position', 'Attacker') }}
                        {{ Form::radio('position', 'Attacker', false) }}
                        {{ Form::label('position', 'Staff: ') }}
                        {{ Form::radio('position', '', false) }}
                        <a href="/teams/{{$teams->id}}">Reset</a>
                        {!! Form::hidden('team_id', $teams->team_id) !!}
                        {!! Form::submit(null, ['class' => 'btn btn-primary form-control']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
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

