@extends('layouts.main_pwd')
@section('title','Forgot Password')
@section('content')
<div class="form-gap"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                        <h2 class="text-center">{{ __('Reset Password') }}</h2>
                        <p>You can reset your password here.</p>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="panel-body">
            
                            <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                                <br>
                                <div class="form-group">
                                    <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="email address">
                                    </div>
                                </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        <br>
                                    </span>
                                @enderror
                                <br>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                                </div>

                            </form>
            
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection