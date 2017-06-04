<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CCCDMSI</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
        
        .navbar {
            background: #006080;
            color: white;
        }
        
        .navbar-default .navbar-nav>li>a {
            color: #f7f2f2;
        }
        a:hover{
            color: white;
        }
        .downlods.panel {
            margin-right: 20px;
            background: gray;
        }
        .navbar-default .navbar-brand{
            color: white;
        }
        .container-fluid{
            padding-left: 5%;
            padding-right: 5%;
        }
        .addbutton{
            margin-top: 10px;
        }
        .form-group{
            margin-bottom:3px;    
        }
        .control-label{
            padding-right:5px;
        }
        .custom{
            padding-left:0px;
        }
        .label{
            padding-right: 3px;
            padding-bottom:0px;
            padding-top:0px;
        }
        .input-sm{
            font-weight: bold;
        }
        
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ url('/') }}">
                    CCCDMSI
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li class="{{ setActiveapp('dataentry')}}"><a href="{{ url('/dataentry') }}">Application</a></li>
                    <li class="{{ setActiveapp('production')}}"><a href="{{ url('/production') }}">Production Report</a></li>
                    <li class="{{ setActiveapp('leave/view')}}"><a href="{{ url('/leave/view') }}">Leave Credit</a></li>
                    <li class="{{ setActiveapp('profile/view')}}"><a href="{{ url('/profile/view') }}">Profile</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/admin/login') }}">Login</a></li>
                        <li><a href="{{ url('/admin/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <img src="{{ asset('/images/userprofile/'.Auth::guard('web')->user()->id.'.jpg') }}" class="img-rounded" height="18" width="18"> 
                                {{ Auth::guard('web')->user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('#') }}"><i class="fa fa-btn fa-sign-out"></i>Profile</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <div class="container-fluid">
        <div class="row">
        <div class="col-md-12">
            @include('flash::message')       
        </div>
        </div>    
    </div>

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    
     @stack('scripts')
    <script>
        $('#flash-overlay-modal').modal();
        
        //var $jqDate = jQuery('input[name="contract_date"]');
        var $jqDate = jQuery('input.aussie_date[type=text]');

        //Bind keyup/keydown to the input
        $jqDate.bind('keyup','keydown', function(e){
          //To accomdate for backspacing, we detect which key was pressed - if backspace, do nothing:
        	if(e.which !== 8) {	
        		var numChars = $jqDate.val().length;
        		if(numChars === 2 || numChars === 5){
        			var thisVal = $jqDate.val();
        			thisVal += '/';
        			$jqDate.val(thisVal);
        		}
          }
        });
        
       $('#flash-overlay-modal').modal();
        
        //var $jqDate = jQuery('input[name="contract_date"]');
        var $jqDate1 = jQuery('input.date1[type=text]');

        //Bind keyup/keydown to the input
        $jqDate1.bind('keyup','keydown', function(e){
          //To accomdate for backspacing, we detect which key was pressed - if backspace, do nothing:
        	if(e.which !== 8) {	
        		var numChars = $jqDate1.val().length;
        		if(numChars === 2 || numChars === 5){
        			var thisVal = $jqDate1.val();
        			thisVal += '/';
        			$jqDate1.val(thisVal);
        		}
          }
        });
        
        
        
    </script>
    
    
</body>
</html>
