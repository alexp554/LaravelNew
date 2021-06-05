<!-- ===== Bootstrap CSS ===== -->
<link href="{{asset('bootstrap/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
<!-- ===== Plugin CSS ===== -->
<link href="{{asset('plugins/components/chartist-js/dist/chartist.min.css')}}" rel="stylesheet">
<link href="{{asset('plugins/components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css')}}" rel="stylesheet">

<!-- ===== Animation CSS ===== -->
<link href="{{asset('bootstrap/css/animate.css')}}" rel="stylesheet">
<!-- ===== Custom CSS ===== -->
<link href="{{asset('bootstrap/css/style-normal.css')}}" rel="stylesheet">
<!--==== Common css ==== -->
<link href="{{asset('bootstrap/css/common.css')}}" rel="stylesheet">
<style>
    @media (min-width: 768px){
        .extra.collapse li a span.hide-menu {
            display: block!important;
        }
        .extra.collapse.in li a.waves-effect span.hide-menu {
            display: block!important;
        }
        .extra.collapse li.active a.active span.hide-menu {
            display: block!important;
        }
        ul.side-menu li:hover + .extra.collapse.in li.active a.active span.hide-menu{
            display: block!important;
        }
    }
</style>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->