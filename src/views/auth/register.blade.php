@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>
                    <div class="panel-body" align="center">
                        <form method="post" action="{{ URL::route('postRegister') }}">
                            {!! csrf_field() !!}

                            <div>
                                Name
                                <input type="text" name="name" value="{{ old('name') }}">
                            </div><br>

                            <div>
                                Email
                                <input type="email" name="email" value="{{ old('email') }}">
                            </div><br>

                            <div>
                                Password
                                <input type="password" name="password">
                            </div><br>

                            <div>
                                Confirm Password
                                <input type="password" name="password_confirmation">
                            </div><br>

                            <div>
                                <button type="submit">Register</button>
                            </div>
                            <input type="hidden" name="save" value="1"><br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection