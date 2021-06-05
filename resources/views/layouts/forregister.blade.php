<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  
  <!-- MDB icon -->
  <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="{{asset('MDB/css/bootstrap.min.css')}}">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="{{asset('MDB/css/mdb.min.css')}}">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="{{asset('MDB/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('MDB/css/addons-pro/steppers.min.css')}}">
  <!-- Toastr -->
  <link href="{{asset('plugins/components/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
    

	<title>Jogja Digital Valley</title>
</head>
<body>
  <div class="bg-img"></div>
    <div class="container mt-5">
      <div class="row acc-wizard">
        <div class="col-md-4">
          <div class="dv-left-box">
            <div class="d-flex justify-content-center">
              <img style="width:150px;  text-align:center;"
                src="http://member.jogjadigitalvalley.com/plugins/images/logo/jdv.png" />
            </div>
            <p class="dv-desc mt-2" style = "font-family:Trebuchet MS;font-size:15px;font-style:italic;text-align: center;">
              Jogja Digital Valley is an incubator and co-working space for digital creative enthusiasts of
              various backgrounds including students, community members, freelancers, IT practitioners and startup
              founders.
            <br>
              Jogja Digital Valley membership is offered to those who met our criteria. Applicant should
              submit the application form with complete details. JDV management have the right to reject new
              member applications for any reasons including incomplete application form and mismatch applicant
              criteria.
            </p>
          </div>
        </div>

      <!-- Start your project here-->  
      @yield('isi');
      <!-- End your project here-->
    </div>
  </div>

  <!-- jQuery -->
  <script type="text/javascript" src="{{asset('MDB/js/jquery.min.js')}}"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="{{asset('MDB/js/popper.min.js')}}"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="{{asset('MDB/js/bootstrap.min.js')}}"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="{{asset('MDB/js/mdb.min.js')}}"></script>
  <!-- Your custom scripts (optional) -->
  <script type="text/javascript"></script>
  <script type="text/javascript" src="{{asset('MDB/js/addons-pro/steppers.min.js')}}"></script>
  <!-- Toastr -->
    <script src="{{asset('plugins/components/toast-master/js/jquery.toast.js')}}"></script>
    <script src="{{asset('bootstrap/js/toastr.js')}}"></script>
  <script>
  @if(Session::has('success'))
    toastr.success("{{Session::get('success')}}", 'Complete Next Action')
  @endif
  </script>
  <script>
  @if(Session::has('failed'))
    toastr.error("{{Session::get('failed')}}", 'Failed')
  @endif
  @foreach ($errors->all() as $error)
    toastr.error("{{$error}}")
  @endforeach
  </script>

  <script>
    $(document).ready(function () {
    $('.stepper').mdbStepper();
    })
  </script>

  <script>
    function myFunction() {
      document.getElementById("myForm").submit();
    }
  </script>

</body>
</html>