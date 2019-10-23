@extends ('layouts.app')

@section('content')

    <div class="row" id="teams-row">
        <div class="col-md-8 offset-md-2">
            <div class="row">
                <div class="col-md-3">
                    <h3>{{ $player->name }}</h3>
                    <span>{{ $player->position }}</span><br>
                    <span>{{ $player->nationality }}</span><br>
                    <span>{{ $team->name }}</span><br>
                    <span>Rating: @if($finalRating == null)Not yet rated @else{{ $finalRating }}@endif</span>
                    @if(Auth::user()->hasRole('prem_user') && $player->ratings->where('user_id', Auth::user()->id)->count() == 0)
                        {{ Form::open(['url' => '/ratings', 'method' => 'POST']) }}
                        <p>{{ Form::select('rating', [1 => "1", 2 => "2", 3 => "3", 4 => '4', 5 => '5', 6 => '6', 7 => '7', 8 => '8', 9 => '9', 10 => '10']) }}</p>
                        {{ Form::hidden('player_id', $player->id) }}
                        <p>{{ Form::submit('Send') }}</p>
                        {{ Form::close() }}
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Critics</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 offset-md-2">
            @forelse ($player->critics as $critic)
                <div class="critic">
                    <p>{{ $critic->user->name }} {{$critic->created_at}}</p>
                    <p>{{ $critic->critic }}</p>

                    @if (!Auth::guest())

                        @if(Auth::user()->hasRole('moderator') || Auth::user()->hasRole('admin'))
                            <div class="delete-critic">
                                {!! Form::model($critic, ['method' => 'DELETE', 'action' => ['CriticController@destroy', $critic->id]]) !!}
                                {!! Form::submit('Delete critic', ['class' => 'btn btn-danger form-control']) !!}
                                {!! Form::close() !!}
                            </div>
                        @endif

                    @endif

                </div>
            @empty
                <p>This player has no critics</p>
            @endforelse
        </div>
    </div>


    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div id="add-critic">
                <span>
                    @if(Auth::check())
                        Add critic
                    @else
                        <a href="{{ url('/login') }}">Login to add a critic</a>
                    @endif
                </span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div id="critic-form">
                @if (Auth::check())
                    {{ Form::open(['url' => '/critics', 'method' => 'POST']) }}
                    <p>{{ Form::textarea('critic', old('critic')) }}</p>
                    {{ Form::hidden('player_id', $player->id) }}
                    <p>{{ Form::submit('Send') }}</p>
                    {{ Form::close() }}
                @endif
            </div>
        </div>
    </div>

@endsection

