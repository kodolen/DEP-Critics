@extends('layouts.app')

@section('content')

    @if (Auth::check())

        @if (Auth::user()->hasRole("admin"))

            <div class="row" id="teams-row">
                <div class="col-md-8 offset-md-2">
                    <h1>Users:</h1>
                    <div class="row">
                        @foreach($users as $user)
                            <div class="col-md-12">
                                <span>Username: </span><a href="{{ url('/users/'.$user->id) }}"><span>{{ $user->name }}</span></a><br>
                                <span>Email: {{ $user->email }}</span><br>
                                <span>Role: {{ $user->roles->first()->name }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        @endif

    @endif

@endsection

