@extends ('layouts.app')

@section('content')

    <div class="player-detail-container">
        <div class="row" id="teams-row">
            <div class="col-md-8 offset-md-2">
                <div class="row">
                    <div class="col-md-3">
                        <h3>{{ $player->name }}</h3>
                        <span>Position: {{ $player->position }}</span><br>
                        <span>Nationality: {{ $player->nationality }}</span><br>
                        <span>Team: {{ $team->name }}</span><br>
                        <span>Rating: @if($finalRating == null)Not yet rated @else{{ $finalRating }}@endif</span>
                        @if (!Auth::guest())
                            @if(Auth::user()->hasRole('prem_user') && $player->ratings->where('user_id', Auth::user()->id)->count() == 0)
                                {{ Form::open(['url' => '/ratings', 'method' => 'POST']) }}
                                <p>{{ Form::select('rating', [1 => "1", 2 => "2", 3 => "3", 4 => '4', 5 => '5', 6 => '6', 7 => '7', 8 => '8', 9 => '9', 10 => '10']) }}</p>
                                {{ Form::hidden('player_id', $player->id) }}
                                <p>{{ Form::submit('Send') }}</p>
                                {{ Form::close() }}
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="critic-container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1>Critics</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 offset-md-2">
                @forelse ($player->critics as $critic)
                    @if($critic->hidden == 0 && (Auth::user()->hasRole('user') || Auth::user()->hasRole('prem_user')))
                        <div class="critic">
                            <div class="created-by">
                                <p>Created by {{ $critic->user->name }} at {{$critic->created_at}}</p>
                            </div>
                            <p>{{ $critic->critic }}</p>
                        </div>
                    @else
                        @if (!Auth::guest())
                            @if(Auth::user()->hasRole('moderator') || Auth::user()->hasRole('admin'))
                                <div class="critic @if($critic->hidden == 1) hidden @endif">
                                    <p>{{ $critic->user->name }} {{$critic->created_at}}</p>
                                    <p>{{ $critic->critic }}</p>
                                    <div class="delete-critic">
                                        {!! Form::model($critic, ['method' => 'DELETE', 'action' => ['CriticController@destroy', $critic->id]]) !!}
                                        {!! Form::submit('Delete critic', ['class' => 'btn btn-danger form-control']) !!}
                                        {!! Form::close() !!}

                                        <label class="switch">
                                            <input type="checkbox" class="check" value="testuser"
                                                   data-valuetwo="{{ $critic->id }}"
                                                   @if($critic->hidden == 1) checked @endif>
                                            <span class="slider round"></span>
                                        </label>

                                    </div>
                                </div>
                            @endif
                        @endif
                    @endif
                @empty
                    <p>This player has no critics</p>
                @endforelse
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div id="add-critic">
                <span>
                    @if(Auth::check())
                        Add critic<i class="fa fa-sort-down"></i>
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


