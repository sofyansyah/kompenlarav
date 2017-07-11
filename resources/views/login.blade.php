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
    .panel-default{padding: 20px;}
    .cover{
        background:url(/images/pln1.jpg);
        background-repeat: no-repeat;
        background-size: 100%;

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
