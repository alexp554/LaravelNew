@extends('layouts.public')

@section('title', 'Public Statistic')

@section('content')
<div id="App" class="container">
    <div class="logo-section">
        <img src="{{ url('plugins/images/logo/jdv.png') }}" class="img-responsive" alt="JDV">
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="white-box text-center">
                <!-- Nav tabs -->
                <ul class="nav customtab2 nav-tabs" role="tablist" style="display: inline-block; border: none; padding: 0;">
                    <li role="presentation" :class="[ activeSection == 'member' ? 'active' : null ]">
                        <a href="javascript://" @click="setActiveSection('member')">
                        Member Growth</a>
                    </li>
                    <li role="presentation" :class="[ activeSection == 'event' ? 'active' : null ]">
                        <a href="javascript://" @click="setActiveSection('event')">
                        Event & Audiences</a>
                    </li>
                    <li role="presentation" :class="[ activeSection == 'visitor' ? 'active' : null ]">
                        <a href="javascript://" @click="setActiveSection('visitor')">
                        Visitor</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row" :class="[ activeSection == 'member' ? null : 'hidden' ]">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Member Growth
                    <div class="panel-action">
                        <div class="dropdown"><a class="dropdown-toggle" id="examplePanelDropdown" data-toggle="dropdown" href="#" aria-expanded="false" role="button">@{{ 'Period: ' + activeBox.member }} <span class="caret"></span></a>
                            <ul class="dropdown-menu bullet dropdown-menu-right" aria-labelledby="examplePanelDropdown" role="menu">
                                <li role="presentation"><a href="javascript:void(0)" @click="setActiveBox().member('daily')" role="menuitem"> Daily</a></li>
                                <li role="presentation"><a href="javascript:void(0)" @click="setActiveBox().member('monthly')" role="menuitem"> Monthly</a></li>
                                {{-- <li class="divider" role="presentation"></li>
                                <li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-settings" aria-hidden="true"></i> Settings</a></li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel-wrapper collapse in" :class="[activeBox.member == 'daily' ? null : 'hidden']">
                    <div class="panel-body">
                        <div id="MemberGrowthDaily"></div>
                        <div class="text-center">
                            <h6>Daily - Last 30 days</h6>
                        </div>
                    </div>
                </div>

                <div class="panel-wrapper collapse in"  :class="[activeBox.member == 'monthly' ? null : 'hidden']">
                    <div class="panel-body">
                        <div id="MemberGrowthMonthly"></div>
                        <div class="text-center">
                            <h6>Monthly - Last 12 months</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-default">
                {{-- Member Daily --}}
                <div class="panel-wrapper collapse in" :class="[activeBox.member == 'daily' ? null : 'hidden']">
                    <div class="panel-body">
                        <div class="text-center">
                            <h6>Daily - Member Growth Table</h6>
                        </div>
                        <div class="scroll-div">
                            <table class="table table-border table-hover table-small">
                                <thead>
                                    <th>Date</th>
                                    <th>Member Count</th>
                                </thead>
                                <tbody>
                                    <tr v-for="(item, idx) in rawData.memberDaily" :key="idx">
                                        <td>@{{ item.x_format }}</td>
                                        <td>@{{ item.y }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="panel-wrapper collapse in" :class="[activeBox.member == 'monthly' ? null : 'hidden']">
                    <div class="panel-body">
                        <div class="text-center">
                            <h6>Monthly - Member Growth Table</h6>
                        </div>
                        <div class="scroll-div">
                            <table class="table table-border table-hover table-small">
                                <thead>
                                    <th>Date</th>
                                    <th>Member Count</th>
                                </thead>
                                <tbody>
                                    <tr v-for="(item, idx) in rawData.memberMonthly" :key="idx">
                                        <td>@{{ item.x_format }}</td>
                                        <td>@{{ item.y }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row" :class="[ activeSection == 'event' ? null : 'hidden' ]">
        {{-- .col-md --}}
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Event Statistic
                    <div class="panel-action">
                        <div class="dropdown"><a class="dropdown-toggle" id="examplePanelDropdown" data-toggle="dropdown" href="#" aria-expanded="false" role="button">@{{ 'Period: ' + activeBox.event }} <span class="caret"></span></a>
                            <ul class="dropdown-menu bullet dropdown-menu-right" aria-labelledby="examplePanelDropdown" role="menu">
                                <li role="presentation"><a href="javascript:void(0)" @click="setActiveBox().event('daily')" role="menuitem"> Daily</a></li>
                                <li role="presentation"><a href="javascript:void(0)" @click="setActiveBox().event('monthly')" role="menuitem"> Monthly</a></li>
                                {{-- <li class="divider" role="presentation"></li>
                                <li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-settings" aria-hidden="true"></i> Settings</a></li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel-wrapper collapse in" :class="[activeBox.event == 'daily' ? null : 'hidden']">
                    <div class="panel-body">
                        <div id="EventGrowthDaily"></div>
                        <div class="text-center">
                            <h6>Daily - Last 30 days</h6>
                        </div>
                    </div>
                    {{-- <div class="panel-footer">- Last 30 days</div> --}}
                </div>

                <div class="panel-wrapper collapse in"  :class="[activeBox.event == 'monthly' ? null : 'hidden']">
                    <div class="panel-body">
                        <div id="EventGrowthMonthly"></div>
                        <div class="text-center">
                            <h6>Monthly - Last 12 months</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-default">
                {{-- Event Daily --}}
                <div class="panel-wrapper collapse in" :class="[activeBox.event == 'daily' ? null : 'hidden']">
                    <div class="panel-body">
                        <div class="text-center">
                            <h6>Daily - Event Table</h6>
                        </div>
                        <div class="scroll-div">
                            <table class="table table-border table-hover table-small">
                                <thead>
                                    <th>Date</th>
                                    <th>Total Participant</th>
                                    <th>Event Count</th>
                                </thead>
                                <tbody>
                                    <tr v-for="(item, idx) in rawData.eventDaily" :key="idx">
                                        <td>@{{ item.x_format }}</td>
                                        <td>@{{ item.y_audiences }}</td>
                                        <td>@{{ item.y }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="panel-wrapper collapse in" :class="[activeBox.event == 'monthly' ? null : 'hidden']">
                    <div class="panel-body">
                        <div class="text-center">
                            <h6>Monthly - Event Table</h6>
                        </div>
                        <div class="scroll-div">
                            <table class="table table-border table-hover table-small">
                                <thead>
                                    <th>Date</th>
                                    <th>Total Participant</th>
                                    <th>Event Count</th>
                                </thead>
                                <tbody>
                                    <tr v-for="(item, idx) in rawData.eventMonthly" :key="idx">
                                        <td>@{{ item.x_format }}</td>
                                        <td>@{{ item.y_audiences }}</td>
                                        <td>@{{ item.y }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row" :class="[ activeSection == 'visitor' ? null : 'hidden' ]">
        {{-- .col-md --}}
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Visitor Statistic
                    <div class="panel-action">
                        <div class="dropdown"><a class="dropdown-toggle" id="examplePanelDropdown" data-toggle="dropdown" href="#" aria-expanded="false" role="button">@{{ 'Period: ' + activeBox.visitor }} <span class="caret"></span></a>
                            <ul class="dropdown-menu bullet dropdown-menu-right" aria-labelledby="examplePanelDropdown" role="menu">
                                <li role="presentation"><a href="javascript:void(0)" @click="setActiveBox().visitor('daily')" role="menuitem"> Daily</a></li>
                                <li role="presentation"><a href="javascript:void(0)" @click="setActiveBox().visitor('monthly')" role="menuitem"> Monthly</a></li>
                                {{-- <li class="divider" role="presentation"></li>
                                <li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-settings" aria-hidden="true"></i> Settings</a></li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel-wrapper collapse in" :class="[activeBox.visitor == 'daily' ? null : 'hidden']">
                    <div class="panel-body">
                        <div id="VisitorGrowthDaily"></div>
                        <div class="text-center">
                            <h6>Daily - Last 30 days</h6>
                        </div>
                    </div>
                    {{-- <div class="panel-footer">- Last 30 days</div> --}}
                </div>

                <div class="panel-wrapper collapse in"  :class="[activeBox.visitor == 'monthly' ? null : 'hidden']">
                    <div class="panel-body">
                        <div id="VisitorGrowthMonthly"></div>
                        <div class="text-center">
                            <h6>Monthly - Last 12 months</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- .col-md --}}

        <div class="col-md-4">
            <div class="panel panel-default">
                {{-- Member Daily --}}
                <div class="panel-wrapper collapse in" :class="[activeBox.visitor == 'daily' ? null : 'hidden']">
                    <div class="panel-body">
                        <div class="text-center">
                            <h6>Daily - Visitor Table</h6>
                        </div>
                        <div class="scroll-div">
                            <table class="table table-border table-hover table-small">
                                <thead>
                                    <th>Date</th>
                                    <th>Visitor Count</th>
                                </thead>
                                <tbody>
                                    <tr v-for="(item, idx) in rawData.visitorDaily" :key="idx">
                                        <td>@{{ item.x_format }}</td>
                                        <td>@{{ item.y }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="panel-wrapper collapse in" :class="[activeBox.visitor == 'monthly' ? null : 'hidden']">
                    <div class="panel-body">
                        <div class="text-center">
                            <h6>Monthly - Visitor Table</h6>
                        </div>
                        <div class="scroll-div">
                            <table class="table table-border table-hover table-small">
                                <thead>
                                    <th>Date</th>
                                    <th>Visitor Count</th>
                                </thead>
                                <tbody>
                                    <tr v-for="(item, idx) in rawData.visitorMonthly" :key="idx">
                                        <td>@{{ item.x_format }}</td>
                                        <td>@{{ item.y }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
        </div>
        <div class="col-md-6">
        </div>
    </div>
</div>
@endsection


@push('css')
    <link href="{{asset('plugins/components/morrisjs/morris.css')}}" rel="stylesheet">
    <style>
        .scroll-div {
            max-height: 420px;
            overflow-y: scroll;
        }
        .table-small * {
            font-size: 12px !important;
        }
        .logo-section {
            max-width: 100px;
            margin: auto;
            margin-bottom: 20px;
        }
    </style>
@endpush

@push('js')
    <script src="{{asset('plugins/components/raphael/raphael-min.js')}}"></script>
    <script src="{{asset('plugins/components/morrisjs/morris.js')}}"></script>

    {{-- <script src="{{asset('plugins/components/axios/axios.min.js')}}"></script>
    <script src="{{asset('plugins/components/lodash/lodash.min.js')}}"></script> --}}

    <script src="{{asset('plugins/components/vue/vue.min.js')}}"></script>
    

    <script>
        var initChartData = {
            memberDaily: cleanObject({!! $dailyMember->toJson() !!}),
            memberMonthly: cleanObject({!! $monthlyMember->toJson() !!}),
            eventDaily: cleanObject({!! $dailyEvent->toJson() !!}),
            eventMonthly: cleanObject({!! $monthlyEvent->toJson() !!}),
        }

        function cleanObject(data) {
            return JSON.parse(JSON.stringify(data));
        }

        // Initialized
        // chartObj.memberDaily.setData(initChartData.memberDaily);
        // chartObj.memberMonthly.setData(initChartData.memberMonthly);
    </script>
    <script src="{{asset('js/public.statistic.js')}}"></script>
@endpush