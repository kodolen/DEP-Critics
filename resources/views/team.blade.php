@extends ('layouts.app')

@section('content')

    <div class="team-container">
        <div class="row" id="teams-row">
            <div class="col-md-8 offset-md-2">
                <div class="row">
                    <div class="col-md-12">
                        <div class="detail-holder">
                            <div class="logo-team-holder">
                                <img src="{{ $teams->logo }}" alt="">
                            </div>
                            <div class="details">
                                <h1> {{ $teams->name }} </h1>
                                <span>City:</span><br>
                                <span>Website:</span><br>
                                @foreach($players as $player)
                                    @if($player->position == "")
                                        <span>Coach: {{ $player->name }}</span>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="search-wrapper">
                            {!! Form::open(['method' => 'GET', 'url' => '/search']) !!}
                            {{ Form::select('position', ['' => "Select one", "Defender" => "Defender", "Midfielder" => "Midfielder", "Attacker" => 'Attacker', "Goalkeeper" => "Goalkeeper"], ['class' => 'filter-form', 'disabled' => true]) }}
                            {!! Form::text('search', null, ['class' => 'search-form']) !!}
                            {{--                            {{ Form::label('position', 'Players: ') }}--}}
                            {{--                            {{ Form::label('position', 'Goalkeeper') }}--}}
                            {{--                            {{ Form::radio('position', 'Goalkeeper', false) }}--}}
                            {{--                            {{ Form::label('position', 'Defender') }}--}}
                            {{--                            {{ Form::radio('position', 'Defender', false) }}--}}
                            {{--                            {{ Form::label('position', 'Midfielder') }}--}}
                            {{--                            {{ Form::radio('position', 'Midfielder', false) }}--}}
                            {{--                            {{ Form::label('position', 'Attacker') }}--}}
                            {{--                            {{ Form::radio('position', 'Attacker', false) }}--}}
                            {{--                            {{ Form::label('position', 'Staff: ') }}--}}
                            {{--                            {{ Form::radio('position', '', false) }}--}}

                            {!! Form::hidden('team_id', $teams->team_id) !!}
                            {!! Form::submit(null, ['class' => 'btn btn-primary']) !!}
                            {!! Form::close() !!}
                        </div>
                        <a href="/teams/{{$teams->id}}">Reset filters</a>
                    </div>
                </div>
                <div class="row">
                    @foreach($players as $player)
                        @if(!$player->position == "")
                            <div class="col-md-6">
                                <a href="{{ url('/teams/'.$teams->id.'/'.$player->id)}}" class="card-link">
                                    <div class="player-card">
                                        <div class="play-wrapper">
                                            <h3>{{ $player->name }}</h3>
                                            <span>{{ $player->position }}</span><br>
                                        </div>
                                        <span class="shirt-number"># {{ $player->shirtNumber }}</span>
                                    </div>
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection

