@extends('layouts.app')

@section('content')

    <div class="team-container">
        <div class="row" id="teams-row">
            <div class="col-md-8 offset-md-2">
                <div class="row">
                    <div class="cl-md-12">
                        <h1>TEAMS</h1>
                    </div>
                </div>
                <div class="row">
                    @foreach($teams as $team)
                        <div class="col-md-2">
                            <div class="logo-holder">
                                <div class="background">
                                    <a class="logo" href="{{ url('/teams/'.$team->id) }}">
                                        <img src="{{ $team->logo }}" alt="">
                                    </a>
                                </div>
                            </div>
                            {{--                                <a href="{{ url('/teams/'.$team->id)}}"><span class="sec-button">SHOW</span></a>--}}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection

