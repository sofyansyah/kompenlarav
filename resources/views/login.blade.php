@extends('layouts.app')
@section('content')
<style type="text/css">
    .panel-default{padding: 20px;}
    .nopadding{
        padding:0!important;
    }
    .col-md-5{
        padding-bottom: 100px;
    }
    .navbar, .footer{
        display: none!important;
    }
    .main{
        margin-left: 0px!important;
        width: 100%!important;
    }
    @media screen and (min-width: 767px) {
        .container{margin: 5% 25%;}
    }
</style>

<div class="container">
    <div class="col-sm-12">
        <div class="col-xs-12 col-sm-12 col-md-9  nopadding">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <div class="text-center">
                        <img src="{{asset('images/download.jpg')}}" width="200">
                    </div>
                <br>
                    <h4><b>Login System</b></h4>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{url('login')}}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="username" class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
                                <input id="username" type="email" class="form-control" name="email" value="{{ old('username') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Password</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>



    </div>
</div>
@endsection
