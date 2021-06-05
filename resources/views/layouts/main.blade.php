<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('plugins/images/logo/jdv.png')}}">
    <title>@yield('title')</title>
    @yield('css')
    <!-- ===== Bootstrap CSS ===== -->
    <link href="{{asset('bootstrap/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- ===== Plugin CSS ===== -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <!-- ===== Animation CSS ===== -->
    <link href="{{asset('bootstrap/css/animate.css')}}" rel="stylesheet">
    <!-- ===== Custom CSS ===== -->
    <link href="{{asset('bootstrap/css/style.css')}}" rel="stylesheet">
    <!-- ===== Color CSS ===== -->
    <link href="{{asset('bootstrap/css/colors/default-dark.css')}}" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="mini-sidebar">
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <!-- ===== Top-Navigation ===== -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <a class="navbar-toggle font-20 hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="top-left-part">
                    <a class="logo" href="/">
                        <b>
                            <img src="{{asset('plugins/images/logo/jdv_white.png')}}" width="40px" height="50px" sy alt="home" />
                        </b>
                        <span>
                            <img src="{{asset('plugins/images/logo/jdv_letter.png')}}" width="180px" height="30px" sy alt="home" alt="homepage" class="dark-logo" />
                        </span>
                    </a>
                </div>
                @if(auth()->user()->level == "super_admin" || auth()->user()->level == "management_staff")
                <ul class="nav navbar-top-links navbar-left hidden-xs">
                    <li>
                        <a href="javascript:void(0)" class="sidebartoggler font-20 waves-effect waves-light"><i class="icon-arrow-left-circle"></i></a>
                    </li>
                </ul>
                @endif
                @if(auth()->user()->level == "super_admin")
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle waves-effect waves-light font-20" data-toggle="dropdown" href="javascript:void(0);">
                            <i class="icon-bell"></i>
                            @if(auth()->user()->unreadNotifications->count())
                            <span class="badge badge-xs badge-danger">{{auth()->user()->unreadNotifications->count()}}</span>
                            @endif
                        </a>
                        <ul class="dropdown-menu mailbox animated bounceInDown">
                            <li>
                                <div class="drop-title">You have {{auth()->user()->unreadNotifications->count()}} new notifications</div>
                            </li>
                            <li>
                                <div class="message-center">
                                    @foreach(auth()->user()->unreadNotifications->slice(0, 5) as $notif)
                                    <a class="mark-as-read" data-id="{{ $notif->id }}" style="background-color: lightblue" href="/admin/memberList">
                                        <div class="mail-contnet">
                                            <span class="mail-desc">New Member Registered</span>
                                            <span>{{$notif->data['name']}}</span><span class="label label-danger m-l-30">New</span>
                                            <span class="time">{{date(' d F Y H:i', strtotime($notif->created_at))}}</span>
                                        </div>
                                    </a>
                                    @endforeach
                                    @foreach(auth()->user()->readNotifications->slice(0, 2) as $notif)
                                    <a href="/admin/memberList">
                                        <div class="mail-contnet">
                                            <span class="mail-desc">New Member Registered</span>
                                            <span>{{$notif->data['name']}}</span>
                                            <span class="time">{{date(' d F Y H:i', strtotime($notif->created_at))}}</span>
                                        </div>
                                    </a>
                                    @endforeach
                                </div>
                            </li>
                            <li>
                                <a class="text-center" href="{{ route('notif') }}">
                                    <strong>See all notifications</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                @endif
            </div>
        </nav>
        <!-- ===== Top-Navigation-End ===== -->
        <!-- ===== Left-Sidebar ===== -->
        <aside class="sidebar" role="navigation">
            <div class="scroll-sidebar">
                <div class="user-profile">
                    <div class="dropdown user-pro-body">
                        <div class="profile-image">
                            <img src="{{asset('gambar/profil.jpg')}}" alt="user-img" class="img-circle">
                        </div>
                        @if (auth()->check())
                        <p class="profile-text m-t-15 font-16"><a href="javascript:void(0);">{{ auth()->user()->name }}</a></p>
                        @endif
                    </div>
                </div>
                <nav class="sidebar-nav">
                    <ul id="side-menu">
                        @if(auth()->user()->level == "super_admin")
                        <li>
                            <a href="/admin" aria-expanded="false"><i class="icon-screen-desktop fa-fw"></i> <span class="hide-menu"> Dashboard </span></a>
                        </li>
                        <li>
                            <a href="/admin/memberList" aria-expanded="false"><i class="icon-people fa-fw"></i> <span class="hide-menu"> Members </span></a>
                        </li>
                        <li>
                            <a href="/admin/event" aria-expanded="false"><i class="icon-calender fa-fw"></i> <span class="hide-menu"> Events </span></a>
                        </li>
                        @elseif(auth()->user()->level == "management_staff")
                        <li>
                            <a href="/staff" aria-expanded="false"><i class="icon-screen-desktop fa-fw"></i> <span class="hide-menu"> Dashboard </span></a>
                        </li>
                        <li>
                            <a href="/staff/memberList" aria-expanded="false"><i class="icon-people fa-fw"></i> <span class="hide-menu"> Members </span></a>
                        </li>
                        <li>
                            <a href="/staff/event" aria-expanded="false"><i class="icon-calender fa-fw"></i> <span class="hide-menu"> Events </span></a>
                        </li>
                        @else
                        <li>
                            <a href="/member" aria-expanded="false"><i class="icon-screen-desktop fa-fw"></i> <span class="hide-menu"> Dashboard </span></a>
                            <a href="/member/myprofile" aria-expanded="false"><i class="icon-user fa-fw"></i> <span class="hide-menu"> My Profile </span></a>
                            <a href="/member/mywifi" aria-expanded="false"><i class="icon-feed fa-fw"></i> <span class="hide-menu"> Wifi Information </span></a>
                        </li>
                        @endif
                        <br><br>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="icon-logout fa-fw"></i> <span class="hide-menu"> {{ __('Logout') }}</span></a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- ===== Left-Sidebar-End ===== -->
        <!-- Page Content -->
        <div class="page-wrapper">
            @yield('content')
            <footer class="footer t-a-c">
                © 2021 JDV
            </footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="{{asset('plugins/components/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('bootstrap/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- Sidebar menu plugin JavaScript -->
    <script src="{{asset('bootstrap/js/sidebarmenu.js')}}"></script>
    <!--Slimscroll JavaScript For custom scroll-->
    <script src="{{asset('bootstrap/js/jquery.slimscroll.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{asset('bootstrap/js/waves.js')}}"></script>
    <!-- Custom Theme JavaScript -->
    <script src="{{asset('bootstrap/js/custom.js')}}"></script>
    <!--Style Switcher -->
    <script src="{{asset('plugins/components/styleswitcher/jQuery.style.switcher.js')}}"></script>
    <!-- toast -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        @if(Session::has('toastrnya'))
            toastr.success("{{Session::get('toastrnya')}}", 'Success')
        @endif
        @if(Session::has('success'))
            toastr.success("{{Session::get('success')}}", 'Complete Next Action')
        @endif
        @if(Session::has('failed'))
            toastr.error("{{Session::get('failed')}}", 'Failed')
        @endif
        @foreach ($errors->all() as $error)
            toastr.error("{{$error}}")
        @endforeach
    </script>
    @yield('js')
    <script>
        function sendMarkRequest(id = null) {
            return $.ajax("{{ route('markNotification') }}", {
                method: 'POST',
                data: {
                    _token:'{{csrf_token()}}',
                    id
                }
            });
        }
        $(function() {
            $('.mark-as-read').click(function() {
                let request = sendMarkRequest($(this).data('id'));
                request.done(() => {
                    $(this).parents('div.alert').remove();
                });
            });
            $('#mark-all').click(function() {
                let request = sendMarkRequest();
                request.done(() => {
                    $('div.alert').remove();
                })
            });
        });
    </script>
</body>

</html>
