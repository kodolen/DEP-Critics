@extends('layouts.app')

@section('content')

    <div class="row" id="teams-row">
        <div class="col-md-8 offset-md-2">
            <div class="row">
                <div class="col-md-4">
                    <h1>EDIT: {{ $user->name }}</h1>

                    {!! Form::model($user, ['method' => 'PATCH', 'action' => ['UserController@update', $user->id]]) !!}

                    <div class="form-group">

                        {!! Form::label('name', 'Username:') !!}
                        {!! Form::text('name', null, ['class' => 'form-control readonly'], ['readonly']) !!}

                    </div>

                    <div class="form-group">

                        {!! Form::label('email', 'Email:') !!}
                        {!! Form::text('email', null, ['class' => 'form-control readonly'], ['readonly']) !!}

                    </div>

                    <div class="form-group">

                        {!! Form::label('first_name', 'First name:') !!}
                        {!! Form::text('first_name', null, ['class' => 'form-control']) !!}

                    </div>

                    <div class="form-group">

                        {!! Form::label('last_name', 'Last name:') !!}
                        {!! Form::text('last_name', null, ['class' => 'form-control']) !!}

                    </div>

                    <div class="form-group">

                        {!! Form::label('favorite_team', 'Favorite team:') !!}<br>
                        {!! Form::select('favorite_team', array($teams), $user->favorite_team, ['class' => 'form-control']) !!}

                    </div>

                    <div class="form-group">

                        {!! Form::submit(null, ['class' => 'btn btn-primary form-control']) !!}

                    </div>

                    {!! Form::close() !!}

                    <div class="form-group">

                        {!! Form::model($user, ['method' => 'DELETE', 'action' => ['UserController@destroy', $user->id]]) !!}
                            {!! Form::submit('Delete Account', ['class' => 'btn btn-danger form-control']) !!}
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

