@extends('layouts.main')

@section('title','Wifi Information')

@section('content') 
<div class="container-fluid">

    @if(auth()->user()->id == $member->user_id)
    <!-- .row -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">Wifi Information</div>
                <div class="panel-wrapper">
                    <div class="panel-body">
                        <form class="form-horizontal form-material">
                            @csrf
                            <div class="form-group">
                                <label class="col-md-12">SSID</label>
                                <div class="col-md-4">
                                    <input type="text" value="{{$member->wifi_ssid}}" placeholder="SSID Name" class="form-control form-control-line" name="SSID" id="SSID" autocomplete="off" readonly> </div>
                            </div>
                            <div class="form-group">
                                <label for="username" class="col-md-12">Username</label>
                                <div class="col-md-4">
                                    <input type="text" value="{{$member->wifi_username}}" placeholder="Your WIFI Username" class="form-control form-control-line" name="username" id="username" autocomplete="off" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Password</label>
                                <div class="col-md-4">
                                    <div class="input-group" id="show_hide_password">
                                        <input type="password" value="{{ $member->getWifiPassword() }}" placeholder="Your WIFI Password" class="form-control form-control-line" name="password" id="password" autocomplete="off" readonly>
                                        <a><i class="fa fa-eye-slash" aria-hidden="false"></i></a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
    @endif
</div>
@endsection

@section('js')
<script>
$(document).ready(function() {
    $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass( "fa-eye-slash" );
            $('#show_hide_password i').addClass( "fa-eye" );
        }else if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "fa-eye-slash" );
            $('#show_hide_password i').removeClass( "fa-eye" );
        }
    });
});
</script>
@endsection