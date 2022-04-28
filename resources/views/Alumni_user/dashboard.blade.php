@if(!Auth::check() || Auth::user()->user_type != 'Alumni')
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
                <a class="navbar-brand" href="#">
                </a>
                <h1><a href="index.html" class="logo ">Menu<span class="text-white">User: {{Auth::user()->name}}</span></a></h1>
                <br>
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

            <h1 class="h3 mb-0 text-gray-800 mb-4">Dashboard</h1>

            <div class="row">
                <div class="col-xl-6 ">
                    <div class="card overflow-hidden card1color">
                        <div class="card-content">
                            <div class="card-body cleartfix">
                                <div class="media align-items-stretch">
                                    <div class="align-self-center">
                                        <!-- <i class="fa fa-repeat fa-2x text-white font-large-2 mr-2"></i> -->
                                    </div>
                                    <div class="media-body">
                                        <h4 class="text-white"> Pending Offers</h4>
                                        <span class="text-white"> {{$user}} </span>
                                    </div>
                                    <div class="align-self-center">
                                        <h1 class="text-white"><i class="fa fa-repeat fa-1x text-white font-large-2 mr-2"></i></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 ">
                    <div class="card overflow-hidden card1color">
                        <div class="card-content">
                            <div class="card-body cleartfix">
                                <div class="media align-items-stretch">
                                    <div class="align-self-center">
                                        <i class=" fa fa-briefcase fa-2x text-white font-large-2 mr-2"></i>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="text-white"> Job Oppurtunities</h4>
                                        <span class="text-white"> Total Number of Job Oppurtunities</span>
                                    </div>
                                    <div class="align-self-center">
                                        <h1 class="text-white">{{$job_opportunities_count}}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- panel for Newly Hired Alumni -->

            <div class="card text-center">
                <div class="card-header">
                    Featured
                </div>
                <div class="card-body">
                    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
                    <div class="content">
                        <div class="container card-title ">
                        <p>Available Job Opportunities</p>
                            <!-- end row -->

                            <div class="row">
                                @foreach ($job_opportunities as $job_opportunity)
                                <div class="col-lg-4">
                                    <div class="profile-card-4 text-center"><img src="https://www.bworldonline.com/wp-content/uploads/2021/07/Upskilling-meeting-640x427.jpg" class="img img-responsive">
                                        <div class="profile-content">
                                            <div class="profile-name"><mark>{{$job_opportunity->job_role}} {{$job_opportunity->job_title}}</mark>
                                                <p><mark>{{$job_opportunity->company_name}}</mark></p>
                                            </div>
                                            <div class="profile-description">Apply now and be a part of our growing family.</div>
                                            <a href="{{route('post.show',['id'=>$job_opportunity->id,'c_name'=>$job_opportunity->company_name, 'title'=>$job_opportunity->job_title, 'role'=>$job_opportunity->job_role, 'reqs'=>$job_opportunity->job_requirements, 'location'=>$job_opportunity->company_location, 'vacancy'=>$job_opportunity->vacancy_no, 'status'=>$job_opportunity->status])}}" class="profile_button px-5">Read More</a>
                                        </div>
                                        <br>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    {{$month}}
                </div>

                <!-- end col -->
            </div>
            <!-- end row -->

            <!-- end row -->
        </div>
        <!-- container -->
    </div>
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