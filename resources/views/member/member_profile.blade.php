@extends('layouts.main')

@section('title','Member Profile')

@section('content') 
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title m-b-0">Member Info
                        @if(auth()->user()->id == $user->id)
                            <a href="{{ route('member.myprofile.edit') }}" title="Edit My Profile" class="btn btn-xs btn-danger"><i class="fa fa-pencil"></i></a>
                        @endif
                    </h3>
                    <hr>
                    <div class="row text-center">
                        <div class="col-md-12 col-xs-12"> <strong>Name</strong>
                            <br>
                            <p class="text-muted">{{ $user->name }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                                <br>
                                <p class="text-muted">{{ $user->email }}</p>
                            </div>
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Mobile Phone</strong>
                                <br>
                                <p class="text-muted">{{ $user->member->phone }}</p>
                            </div>
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Date of Birth</strong>
                                <br>
                                <p class="text-muted">{{ $user->member->dob }}</p>
                            </div>
                            <div class="col-md-2 col-xs-6"> <strong>Gender</strong>
                                <br>
                                <p class="text-muted">{{ $user->member->gender }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Company/Institution</strong>
                                <br>
                                <p class="text-muted">{{ $user->member->company }}</p>
                            </div>
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Bussiness Category</strong>
                                <br>
                                <p class="text-muted">{{ $user->member->bc }}</p>
                            </div>
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Profession</strong>
                                <br>
                                <p class="text-muted">{{ $user->member->profession ? $user->member->profession : "-" }}</p>
                            </div>
                            <div class="col-md-2 col-xs-6"> <strong>Location</strong>
                                <br>
                                <p class="text-muted">{{ $user->member->city }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Instagram</strong>
                                <br>
                                <p class="text-muted">{{ $user->member->instagram }}</p>
                            </div>
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Facebook</strong>
                                <br>
                                <p class="text-muted">{{ $user->member->facebook }}</p>
                            </div>
                            <div class="col-md-2 col-xs-6"> <strong>LinkedIn</strong>
                                <br>
                                <p class="text-muted">{{ $user->member->linkedin }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-info">
                    <div class="panel-heading">SKILL LIST</div>
                    <div class="panel-wrapper collapse in" aria-expanded="true">
                        <div class="panel-body">
                            <div class="row-m-5">
                                @if($hacker)
                                <div class="col-md-3">
                                <strong>Hacker</strong>
                                    @foreach($hacker as $hacker)
                                        <p class="text-muted">{{$hacker}}</p>
                                    @endforeach
                                </div>
                                @endif
                                @if($hustler)
                                <div class="col-md-3">
                                <strong>Hustler</strong>
                                    @foreach($hustler as $hustler)
                                        <p class="text-muted">{{$hustler}}</p>
                                    @endforeach
                                </div>
                                @endif
                                @if($hipster)
                                <div class="col-md-3">
                                <strong>Hipster</strong>
                                    @foreach($hipster as $hipster)
                                        <p class="text-muted">{{$hipster}}</p>
                                    @endforeach
                                </div>
                                @endif
                                @if($other)
                                <div class="col-md-3">
                                <strong>Other</strong>
                                    @foreach($other as $other)
                                        <p class="text-muted">{{$other}}</p>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--./row-->
    </div>
@endsection