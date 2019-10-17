@extends('layouts.app')

@section('content')

    <div class="row" id="teams-row">
        <div class="col-md-8 offset-md-2">
            <div class="row">
                @foreach($teams as $team)
                    <div class="col-md-3">
                        <h3>{{ $team->name }}</h3>
                        <a href="{{ url('/teams/'.$team->id)}}"><span>link</span></a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection

