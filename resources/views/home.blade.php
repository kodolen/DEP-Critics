@extends('layouts.app')

@section('content')

    <div class="home-container">
        <video autoplay muted loop>
            <source src="{{ asset('storage/video/trailer-dep.mp4') }}" type="video/mp4">
        </video>

        <h1>Dutch Eredivisie <br> Player Critics</h1>
        <p>DEP Critics is a web application where Dutch Eredivisie players and teams can be rated in the form of ratings and critics</p>
        <div class="prim-button"><a href="{{ url('teams') }}"><span>Go to Teams</span></a></div>
    </div>

@endsection

