@extends('layouts.app')
<style>
    .navbar, .footer{
        display: none!important;
    }
    .main{
        margin-left: 0px!important;
        width: 100%!important;
    }
</style>

@section('content')
<style type="text/css">
    .cover{
        background:url(/images/pln1.jpg);
        background-repeat: no-repeat;
        background-size: 107%;

    }
    .nopadding{
        padding:0!important;
    }
    .container{
        width: 900px!important;
    }
    .cover h4{
        padding: 35% 8%;
        font-size: 30px;
        font-weight: bold;
        color: #fafafa;
        background-color: rgba(62, 64, 66, 0.58);
        margin-top: 0;

    }    
    .col-md-5{
        padding-bottom: 100px;
    }
</style>

<div class="container">
    <div class="col-sm-12" style="margin-top: 15%;">
        <div class="col-md-5 cover nopadding">
            <h4>PT PLN Muara Tawar</h4>
        </div>

        <div class="col-md-7 nopadding">
            <div class="panel panel-default">
                <div class="panel-heading text-center">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>



    </div>
</div>
@endsection
