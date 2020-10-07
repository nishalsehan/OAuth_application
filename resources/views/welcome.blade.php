@extends('layouts.app')

@section('content')
    <?php
        Session()->regenerate(); ?>
    @if(\Illuminate\Support\Facades\Session::has('login_status'))
        <script type="text/javascript">
           window.location = "/home";
        </script>
    @else

    @endif
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ">
                    <img src="{{ url('img/bg.jpg') }}" style="width:100%; margin-top: 50px;">
                </div>
                <div class="col-md-4 pull-right" >
                    <div class="" style="margin-top: 180px;margin-left: 30px">
                        <a href="{{route('google.login')}}">
                            <img src="{{asset('img/signin_btn.png')}}" width="100%">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
