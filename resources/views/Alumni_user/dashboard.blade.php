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
                <div style="align-items: center; text-align: center; margin-top:5px;">
                    <a class="navbar-brand" href="#">
                        <div class="thumb-lg member-thumb mx-auto"><img src="{{ asset('images/coders_tribe_primary_logo.png') }}" width="100" height="100" class="d-inline-block align-text-top" style="border-radius: 50px;" class="rounded-circle img-thumbnail" alt="Coders Tribe"></div>
                    </a>
                    <h6 class="logo" style="margin-top: 20px;"><span class="text-white font-user">{{Auth::user()->name}}</span></h6>
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
                                        <?php
                                        $name = Auth::user()->name;
                                        $fname = explode(' ', trim($name));
                                        $first_name = $fname[0]
                                        ?>
                                        <h4 class="text-white text-size-m"> Hello, {{$first_name}}!</h4>
                                        <span class="text-white text-size-small"> {{$user}} </span>
                                    </div>
                                    <div class="align-self-center">
                                        <h1 class="text-white" ><i class="fa fa-info fa-1x font-large-2 mr-2" style="color: #7ce8ff;" ></i></h1>
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
                                    <div class="align-self-center" style="margin-right: 7px;">
                                        <i class=" fa fa-thumb-tack fa-2x text-white font-large-2 mr-2"></i>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="text-white text-size-m"> Now Hiring!</h4>
                                        <span class="text-white text-size-small">Overall Posted Job Oppurtunities</span>
                                    </div>
                                    <div class="align-self-center">
                                        <h1 class="text-size-num" style="color: #7ce8ff;">{{$job_opportunities_count}}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- panel for Newly Hired Alumni -->

            <div class="card text-center">
                <div class="card-header" style="letter-spacing:2px;">
                    Featured
                </div>
                <div class="card-body">
                    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
                    <div class="content">
                        <div class="container card-title ">
                            <h6 class="padding-color text" style="padding-top: 10px; padding-bottom: 10px; letter-spacing:2px;">Available Job Opportunities. Apply now!</h6>
                            <br>

                            <!-- end row -->

                            <div class="row">
                                @foreach ($job_opportunities as $job_opportunity)
                                <div class="col-lg-4">
                                    <div class="profile-card-4 text-center"><img src="{{ asset('images/now-hiring-bg.jpg') }}" alt="Job-Hiring-Image" class="img img-responsive">
                                        <div class="profile-content">
                                            <div class="profile-name"><mark>{{$job_opportunity->company_name}}</mark>
                                                <p><mark> {{$job_opportunity->job_role}} {{$job_opportunity->job_title}}</mark></p>
                                            </div>
                                            <div class="profile-description">Apply now and be a part of our growing family.</div>
                                            <a href="{{route('post.show',['id'=>$job_opportunity->id,'c_name'=>$job_opportunity->company_name, 'title'=>$job_opportunity->job_title, 'role'=>$job_opportunity->job_role, 'reqs'=>$job_opportunity->job_requirements, 'location'=>$job_opportunity->company_location, 'vacancy'=>$job_opportunity->vacancy_no, 'status'=>$job_opportunity->status])}}" class="profile_button px-5">Read More</a>
                                        </div>
                                        <div class=" text-muted" style="margin-top:7px; margin-bottom:10px; ">
                                        <p>{{$job_opportunity->created_at->diffForHumans()}}</p>
                                        </div>
                                       
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