@if(!Auth::check())
<meta http-equiv="refresh" content="0; url=/login" />
@else
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employment Tracker | Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/fonts/simple-line-icons/style.min.css">
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/fresh-bootstrap-table.css')}}">


</head>

<body class='grey-bg'>

    <!-- Side Bar Menu -->
    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="custom-menu">
                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">Toggle Menu</span>
                </button>

            </div>
            <div class="p-4">
            <div style="align-items: center; text-align: center; margin-top:5px;">
                <a class="navbar-brand" href="#">
                    <div class="thumb-lg member-thumb mx-auto"><img src="{{ asset('images/coders_tribe_primary_logo.png') }}" width="100" height="100" class="d-inline-block align-text-top" style="border-radius: 50px;" class="rounded-circle img-thumbnail" alt="Coders Tribe"></div>
                </a>
                <h6 class="logo"style="margin-top: 20px;"><span class="text-white font-user">{{Auth::user()->name}}</span></h6>
                <!-- <h6 class="logo"><span class="text-white font-user">Logged In User</span></h6> -->
                </div>
                <br><br>
                <h1><a href="index.html" class="logo ">Menu</a></h1>
                <ul class="list-unstyled components mb-4">
                    <li class="active">
                        <a href="{{url('user_dashboard')}}"><span class="fa fa-home mr-3"></span> Dashboard</a>
                    </li>
                    <li>
                        <a href="{{url('alumni_view')}}"><span class="fa fa-user mr-3"></span> My Record</a>

                    </li>
                    <li>
                        <a href="/logout/{{Auth::user()->id}}"><span class="fa fa-sign-out mr-3"></span> Logout</a>
                    </li>
                </ul>
                <div class="footer"></div>
            </div>
        </nav>

        <!-- Page Content  -->

        <div id="content" class="p-4 p-md-5 pt-5">
            <a href="{{url('user_dashboard')}}"> <span class="fa fa-arrow-right fa-2x float-right" style="color:#001c52"></span>
                <h1 class="h3 mb-0 text-gray-800 mb-4">Apply Now!</h1>
            </a>

            <form action="#" class="border shadow p-3 rounded  profile-card-box ">

                <div class="profile-card-4 size text-center"><img src="{{ asset('images/apply-now.gif') }}" class="img img-responsive">

                    <div class="profile-content">
                        <div class="profile-name "><mark>{{$c_name}}</mark>
                            <p><mark>We are hiring {{$role}} {{$title}}. Apply now!</mark></p>
                        </div>
                        <div class="profile-description">If you're interested, you can email us at opportunity@email.com and submit the ff. requirements: {{$reqs}}</div>
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="profile-overview">
                                    <p>Company Location</p>
                                    <h4>{{$location}}</h4>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="profile-overview">
                                    <p>No. of Vacancy</p>
                                    <h4>{{$vacancy}}</h4>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="profile-overview">
                                    <p>Status</p>
                                    <h4>{{$status}}</h4>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="profile-overview">
                                    <a href="#!" class="profile_button px-5">Apply Now!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </form>
    </div>






    <!-- panel for Newly Hired Alumni -->


    </div>
    </div>

    <!-- PANEL START CODE  -->


    <script src="{{URL::asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('js/jquery.min.js')}}"></script>
    <script src="{{URL::asset('js/main.js')}}"></script>
    <script src="{{URL::asset('js/popper.js')}}"></script>
    <script src="{{URL::asset('js/custom.js')}}"></script>

</body>

</html>
@endif