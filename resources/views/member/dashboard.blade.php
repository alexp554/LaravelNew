@extends('layouts.main')

@section('title','Member Dashboard')

@section('content') 
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title">Welcome, {{ auth()->user()->name }} !</h3>
                </div>
            </div>
        </div>
    </div>
@endsection