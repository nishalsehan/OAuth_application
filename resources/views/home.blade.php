@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <!--employee-profile-->
                    <div class="card" >
                        <div class="card-header">
                            <h3 class="card-title"><b>Profile Details</b></h3>
                        </div>

                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item" style="display:flex; justify-content:center;"><img src="{{ url(\Illuminate\Support\Facades\Session::get('image')) }}" style="width:180px; border-radius: 50%;"></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card">


                        <div class="card-body">
                            <div class="tab-content">

                                <table>

                                    <tr>
                                        <td height="50"><b>User ID:</b></td>
                                        <td>{{\Illuminate\Support\Facades\Session::get('id')}}</td>
                                    </tr>
                                    <tr>
                                        <td height="50"><b>User Name:</b></td>
                                        <td>{{\Illuminate\Support\Facades\Session::get('name')}}</td>
                                    </tr>
                                    <tr>
                                        <td height="50"><b>Email:</b></td>
                                        <td>{{\Illuminate\Support\Facades\Session::get('email')}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div><!--col-3-->

                <div class="col-md-8">
                    <!--employee-profile-->
                    <div class="card" style="min-height: 495px">
                        <div class="card-header">
                            <h3 class="card-title"><b>Google Driver Upload</b></h3>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('upload_file') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group row" style="margin-top:50px;">
                                    <div class="col-md-4">
                                        <label><b>{{ __('Folder Name') }}</b></label>
                                    </div>
                                    <div class="col-md-8">
                                        <input id="folder" type="text" class="form-control @error('folder') is-invalid @enderror" name="folder" value="{{ old('folder') }}" placeholder="Folder Name">
                                        @error('folder')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label><b>{{ __('Description') }}</b></label>
                                    </div>
                                    <div class="col-md-8">
                                        <textarea id="folder" rows="4" class="form-control @error('description') is-invalid @enderror" name="description"  placeholder="Description">{{ old('description') }}</textarea>
                                        @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row" >
                                    <div class="col-md-4">
                                        <label><b>{{ __('File to Upload') }}</b></label>
                                    </div>
                                    <div class="col-md-8">
                                        <input id="file" type="file" class="form-control @error('file') is-invalid @enderror" name="file" value="{{ old('file') }}" autofocus>
                                        @error('file')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row" style="margin-top: 10px">
                                    <div class="col ">
                                        <button type="submit" class="btn btn-primary float-right">
                                            {{ __('Upload') }}
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
