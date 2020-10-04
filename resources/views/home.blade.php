@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-3.5">
                    <!--employee-profile-->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><b>Profile Details</b></h3>
                        </div>

                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item" style="display:flex; justify-content:center;"><img src="{{ url(\Illuminate\Support\Facades\Session::get('image')) }}" style="width:180px; border-radius: 50%;"></li>
                            </ul>
                        </div>
                    </div>
                </div><!--col-3-->

                <div class="col-md-8">

                    <!--employee-image-->
                    <div class="card">


                        <div class="card-body">
                            <div class="tab-content">

                                <table>

                                    <tr>
                                        <td><b>User ID:</b></td>
                                        <td>{{\Illuminate\Support\Facades\Session::get('id')}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>User Name:</b></td>
                                        <td>{{\Illuminate\Support\Facades\Session::get('name')}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Email:</b></td>
                                        <td>{{\Illuminate\Support\Facades\Session::get('email')}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                </div><!--col-9-->
            </div>
        </div>
    </div>
@endsection
