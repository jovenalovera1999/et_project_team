@if(!Auth::check() || Auth::user()->user_type != 'Administrator')
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
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/datatable_dashboard.css') }}">

</head>

<body>

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
                    <h6 class="logo " style="margin-top: 20px;"><span class="text-white font-user">{{Auth::user()->name}}</span></h6>
                    <h5 class="logo"><span class="text-white font-user">Administrator</span></h5>
                </div>
                <br>
                <h1><a href="index.html" class="logo">Menu</a></h1>
                <ul class="list-unstyled components mb-4">
                    <li class="active">
                        <a href="/admin_dashboard"><span class="fa fa-home mr-3"></span> Dashboard</a>
                    </li>
                    <li>
                        <a href="/alumni_records"><span class="fa fa-user mr-3"></span> Alumni Records</a>
                    </li>
                    <li>
                        <a href="/job_opportunities"><span class="fa fa-briefcase mr-3"></span> Job Opportunity</a>
                    </li>
                    <li>
                        <a href="/scholarship_sponsors"><span class="fa fa-cloud-upload mr-3"></span> Scholarship Sponsors</a>
                    </li>
                    <li>
                        <a href="{{url('email')}}"><span class="fa fa-paper-plane mr-3"></span> Email</a>
                    </li>
                    <li>
                        <a href="{{url('report')}}"><span class="fa fa-sticky-note mr-3"></span> Reports</a>
                    </li>
                    <li>
                        <a href="/register"><span class="fa fa-user-plus mr-3"></span> Admin Registration</a>
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

            <h4 class=" mb-0 text-gray-800 mb-4">Overview</h4>


            <!-- Row of panels for dashboard -->
            <!-- In Minimize Mode -->
            <div class="row">
                <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
                <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-xl-3">
                            <div class="card bg-c-blue order-card b-4 border-left-primary shadow h-200 py-0">
                                <div class="card-block">
                                    <p class="m-b-20 panel-text">Total Registered Alumni</p>
                                    <h2 class="text-right text-white text-size-num2"><i class="fa fa-users f-left" style="color: #7ce8ff;"></i><span>{{$registered}}</span></h2>
                                    <a href="/alumni_records" type="button" class="btn profile_button2 text-size text-light">
                                        <span class="fa fa-eye  mr-3" style="color:light; margin-right:5px; letter-spacing:0px;"></span>View details
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-xl-3">
                            <div class="card bg-c-green order-card b-4 border-left-primary shadow h-200 py-0">
                                <div class="card-block">
                                    <p class="m-b-20 panel-text">Total Employed</p>
                                    <h2 class="text-right text-white text-size-num2"><i class="fa fa-arrow-up f-left" style="color: #7ce8ff;"></i><span>{{$employed}}</span></h2>
                                    <!-- <a class="m-b-0 text-white" href="/view_details">View details</a> -->
                                    <a href="/view_details" type="button" class="btn profile_button2 text-size text-light">
                                        <span class="fa fa-eye  mr-3" style="color:light; margin-right:5px; letter-spacing:0px;"></span>View details
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-xl-3">
                            <div class="card bg-c-yellow order-card b-4 border-left-primary shadow h-200 py-0">
                                <div class="card-block">
                                    <p class="m-b-20 panel-text">Total Unemployed</p>
                                    <h2 class="text-right text-white text-size-num2"><i class="fa fa-arrow-down f-left" style="color: #7ce8ff;"></i><span>{{$unemployed}}</span></h2>
                                    <a href="/view_details" type="button" class="btn profile_button2 text-size text-light">
                                        <span class="fa fa-eye  mr-3" style="color:light; margin-right:5px; letter-spacing:0px;"></span>View details
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-xl-3">
                            <div class="card bg-c-pink order-card b-4 border-left-primary shadow h-200 py-0">
                                <div class="card-block">
                                    <p class="m-b-20 panel-text">Pending Offers</p>
                                    <h2 class="text-right text-white text-size-num2"><i class="fa fa-briefcase f-left" style="color: #7ce8ff;"></i><span>{{$pending_offer}}</span></h2>
                                    <a href="/view_details" type="button" class="btn profile_button2 text-size text-light">
                                        <span class="fa fa-eye  mr-3" style="color:light; margin-right:5px; letter-spacing:0px;"></span>View details
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- panel for Newly Hired Alumni -->

            <div class="card text-center">
                <div class="card-header">
                    <h6 style="letter-spacing:2px;"><b>Featured</b></h6>
                </div>
                <div class="card-body">
                    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
                    <div class="content">
                        <div class="container card-title">
                            <h6 class="padding-color text" style="padding-top: 10px; padding-bottom: 10px; letter-spacing:2px;">Congratulations Newly Hired Alumni!</h6>
                            <br>
                            <!-- end row -->

                            <div class="row">
                                @foreach ($alumni_records as $alumni_record)
                                <div class="col-lg-4">
                                    <div class="text-center card-box">
                                        <p class="text-muted">Newly Hired {{$alumni_record->work_arrangement}} {{$alumni_record->job_title}}</p>
                                        <p class="text-muted"></p>

                                        <div class="member-card pt-2 pb-2">
                                            <br>
                                            <div class="thumb-lg member-thumb mx-auto"><img src="{{ asset('images/coders-logo.png') }}" class="rounded-circle img-thumbnail" alt="profile-image"></div>
                                            <div class="">
                                                <h5>{{$alumni_record->first_name}} {{$alumni_record->middle_name}} {{$alumni_record->last_name}}</h5>
                                                <p class="text-muted">{{$alumni_record->job_title}} <span>| </span><span><a href="#" class="text-red">{{$alumni_record->company_name}}</a></span></p>
                                            </div>
                                            <ul class="social-links list-inline">
                                                <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="#!" data-original-title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                                <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="#!" data-original-title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                                <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="{{$alumni_record->email}}" data-original-title="Email"><i class="fa fa-envelope"></i></a></li>
                                            </ul>
                                            <br>
                                            <a href="{{route('alumni.show',[
                                        'fname'=>$alumni_record->first_name, 
                                        'mi'=>$alumni_record->middle_name, 
                                        'lname'=>$alumni_record->last_name, 
                                        'gender'=>$alumni_record->gender, 
                                        'contact'=>$alumni_record->contact, 
                                        'email'=>$alumni_record->email, 
                                        'home'=>$alumni_record->home_address,
                                        'present'=>$alumni_record->present_address,
                                        'school'=>$alumni_record->school_graduated,
                                        'pending'=>$alumni_record->pending_offer,
                                        'status'=>$alumni_record->employment_status,
                                        'batch_no'=>$alumni_record->batch_no,
                                        'cname'=>$alumni_record->company_name,
                                        'location'=>$alumni_record->company_location,
                                        'title'=>$alumni_record->job_title,
                                        'work_arr'=>$alumni_record->work_arrangement,
                                        'update_date'=>$alumni_record->date_hired
                                        ])}}" class="profile_button px-5">View Profile</a>
                                            <div class="mt-4">
                                            </div>
                                        </div>
                                        <div class=" text-muted" style="margin-top:7px;">
                                            <p>{{$alumni_record->created_at->diffForHumans()}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                                @endforeach
                            </div>

                            <!-- end row -->

                            <!-- end row -->
                        </div>
                        <!-- container -->
                    </div>
                </div>
                <div class="card-footer text-muted">
                    {{$month}}
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