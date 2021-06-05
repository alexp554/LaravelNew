@extends('layouts.main')

@section('title','Admin Dashboard')

@section('content')
    <div class="row m-0">
        <div class="col-md-3 col-sm-6 info-box">
            <div class="media">
                <div class="media-left">
                    <span class="icoleaf bg-primary text-white"><i class="icon-people fa-fw"></i></span>
                </div>
                <div class="media-body">
                    <h3 class="info-count text-blue">{{$widget['totalMember']}}</h3>
                    <p class="info-text font-12">Total Member</p>
                    <span class="hr-line"></span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 info-box">
            <div class="media">
                <div class="media-left">
                    <span class="icoleaf bg-primary text-white"><i class="mdi mdi-checkbox-marked-circle-outline"></i></span>
                </div>
                <div class="media-body">
                    <h3 class="info-count text-blue">{{$widget['verifiedMember']}}</h3>
                    <p class="info-text font-12">Verified Member</p>
                    <span class="hr-line"></span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 info-box">
            <div class="media">
                <div class="media-left">
                    <span class="icoleaf bg-primary text-white"><i class="mdi mdi-calendar"></i></span>
                </div>
                <div class="media-body">
                    <h3 class="info-count text-blue">{{$event['totalEvent']}}</h3>
                    <p class="info-text font-12">Total Event</p>
                    <span class="hr-line"></span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 info-box b-r-0">
            <div class="media">
                <div class="media-left">
                    <span class="icoleaf bg-primary text-white"><i class="icon-chart fa-fw"></i></span>
                </div>
                <div class="media-body">
                    <h3 class="info-count text-blue">{{$event['audienceCount']}}</h3>
                    <p class="info-text font-12">Total Event Audience</p>
                    <span class="hr-line"></span>
                </div>
            </div>
        </div>
    </div>
@endsection