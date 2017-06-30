@extends('Blog::layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Login</div>
                    <div class="panel-body" align="center">
                        <form method="post" action="{{ route('postLogin') }}">
                            {!! csrf_field() !!}
                            <div >
                                Email
                                <input type="email" name="email" value="{{ old('email') }}">
                            </div><br>

                            <div>
                                Password
                                <input type="password" name="password" id="password">
                            </div><br>

                            <div>
                                <input type="checkbox" name="remember"> Remember Me
                            </div>

                            <div>
                                <button type="submit">Login</button>
                            </div>

                            <div>
                                <a href="{{ URL::route('postRegister') }}">Register</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
