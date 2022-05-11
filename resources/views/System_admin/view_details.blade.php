@if(!Auth::check() || Auth::user()->user_type != 'Administrator')
<meta http-equiv="refresh" content="0; url=/login" />
@else
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employment Tracker | View Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/view_details.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

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
                    <h5 class="logo" style="margin-top: 20px;"><span class="text-white font-user">{{Auth::user()->name}}</span></h5>
                    <h6 class="logo"><span class="text-white font-user">Administrator</span></h6>
                </div>
                <br>
                <h1><a href="index.html" class="logo ">Menu</a></h1>

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
            <a href="/admin_dashboard"> <span class="fa fa-arrow-right fa-2x float-right" style="color:#001c52"></span>
                <h4 class=" mb-0 text-gray-800 mb-4">Overview</h4>


                <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

                <div class="container">
                    <div class="row">
                    <div class="col-lg-4">
                            <div class="card1 ccard radius-t-0 h-100">
                                <div class="position-tl w-102 border-t-3 brc-primary-tp3 ml-n1px mt-n1px"></div>
                                <!-- the blue line on top -->

                                <div class="card-header pb-3 brc-secondary-l3">
                                    <img alt="brifcase" src="{{ asset('images/icons8-self-60.png') }}" class=" float-right h-4 w-4" />
                                    <h6 class="card-title mb-2 mb-md-0 text-dark-m3 " >
                                        Employed
                                    </h6>
                                </div>

                                <div class="card-body pt-2 pb-1 card-bg ">
                                    @foreach ($employed as $employee)
                                    <a href="{{route('alumni.show',[
                                        'fname'=>$employee->first_name, 
                                        'mi'=>$employee->middle_name, 
                                        'lname'=>$employee->last_name, 
                                        'gender'=>$employee->gender, 
                                        'contact'=>$employee->contact, 
                                        'email'=>$employee->email, 
                                        'home'=>$employee->home_address,
                                        'present'=>$employee->present_address,
                                        'school'=>$employee->school_graduated,
                                        'pending'=>$employee->pending_offer,
                                        'status'=>$employee->employment_status,
                                        'batch_no'=>$employee->batch_no,
                                        'cname'=>$employee->company_name,
                                        'location'=>$employee->company_location,
                                        'title'=>$employee->job_title,
                                        'work_arr'=>$employee->work_arrangement,
                                        'update_date'=>$employee->date_hired
                                        ])}}">
                                        <div role="button" class="d-flex flex-wrap align-items-center my-2 bgc-secondary-l4 bgc-h-secondary-l3 radius-1 p-25 d-style">
                                            <span class="mr-25 w-4 h-4 overflow-hidden text-center border-1 brc-secondary-m2 radius-round shadow-sm d-zoom-2">
                                                <img alt="Derek's avatar" src="{{ asset('images/employed.png') }}" class="h-4 w-4" />
                                            </span>

                                            <span class="text-default-d3 text-90 text-600">
                                                {{$employee->first_name}} {{$employee->middle_name}} {{$employee->last_name}}
                                            </span>

                                            <span class="ml-auto text-dark-l2 text-nowrap">
                                                <!-- 350 -->
                                                <span class="text-80">
                                                    <!-- EUR -->
                                                </span>
                                            </span>

                                            <span class="ml-2">
                                                <i class="fa fa-arrow-up text-green-m1 text-95"></i>
                                            </span>
                                        </div>
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                       

                        <div class="col-lg-4">
                            <div class="card1 ccard radius-t-0 h-100">
                                <div class="position-tl w-102 border-t-3 brc-primary-tp3 ml-n1px mt-n1px"></div>
                                <!-- the blue line on top -->

                                <div class="card-header pb-3 brc-secondary-l3">
                                    <img alt="brifcase" src="{{ asset('images/icons8-unemployment-64.png') }}" class=" float-right h-4 w-4" />
                                    <h6 class="card-title mb-2 mb-md-0 text-dark-m3">
                                        Unemployed
                                    </h6>
                                </div>

                                <div class="card-body pt-2 pb-1 card-bg">
                                    @foreach ($unemployed as $non_employee)
                                    <a href="{{route('alumni.show',[
                                        'fname'=>$non_employee->first_name, 
                                        'mi'=>$non_employee->middle_name, 
                                        'lname'=>$non_employee->last_name, 
                                        'gender'=>$non_employee->gender, 
                                        'contact'=>$non_employee->contact, 
                                        'email'=>$non_employee->email, 
                                        'home'=>$non_employee->home_address,
                                        'present'=>$non_employee->present_address,
                                        'school'=>$non_employee->school_graduated,
                                        'pending'=>$non_employee->pending_offer,
                                        'status'=>$non_employee->employment_status,
                                        'batch_no'=>$non_employee->batch_no,
                                        'cname'=>$non_employee->company_name,
                                        'location'=>$non_employee->company_location,
                                        'title'=>$non_employee->job_title,
                                        'work_arr'=>$non_employee->work_arrangement,
                                        'update_date'=>$non_employee    ->date_hired
                                        ])}}">
                                        <div role="button" class="d-flex flex-wrap align-items-center my-2 bgc-secondary-l4 bgc-h-secondary-l3 radius-1 p-25 d-style">
                                            <span class="mr-25 w-4 h-4 overflow-hidden text-center border-1 brc-secondary-m2 radius-round shadow-sm d-zoom-2">
                                                <img alt="Derek's avatar" src="{{ asset('images/unemployed.png') }}" class="h-4 w-4" />
                                            </span>

                                            <span class="text-default-d3 text-90 text-600">
                                                {{$non_employee->first_name}} {{$non_employee->middle_name}} {{$non_employee->last_name}}
                                            </span>

                                            <span class="ml-auto text-dark-l2 text-nowrap">
                                                <!-- 350 -->
                                                <span class="text-80">
                                                    <!-- EUR -->
                                                </span>
                                            </span>

                                            <span class="ml-2">
                                                <i class="fa fa-arrow-down text-danger-m1 text-95"></i>
                                            </span>
                                        </div>
                                    </a>

                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card1 ccard radius-t-0 h-100">
                                <div class="position-tl w-102 border-t-3 brc-primary-tp3 ml-n1px mt-n1px"></div>
                                <!-- the blue line on top -->

                                <div class="card-header pb-3 brc-secondary-l3">
                                    <img alt="brifcase" src="{{ asset('images/icons8-offer-58.png') }}" class=" float-right h-4 w-4" />
                                    <h6 class="card-title mb-2 mb-md-0 text-dark-m3">
                                        With Pending Offers
                                    </h6>
                                </div>

                                <div class="card-body pt-2 pb-1 card-bg">
                                    @foreach ($pending_offers as $pending_offer)
                                    <a href="{{route('alumni.show',[
                                        'fname'=>$pending_offer->first_name, 
                                        'mi'=>$pending_offer->middle_name, 
                                        'lname'=>$pending_offer->last_name, 
                                        'gender'=>$pending_offer->gender, 
                                        'contact'=>$pending_offer->contact, 
                                        'email'=>$pending_offer->email, 
                                        'home'=>$pending_offer->home_address,
                                        'present'=>$pending_offer->present_address,
                                        'school'=>$pending_offer->school_graduated,
                                        'pending'=>$pending_offer->pending_offer,
                                        'status'=>$pending_offer->employment_status,
                                        'batch_no'=>$pending_offer->batch_no,
                                        'cname'=>$pending_offer->company_name,
                                        'location'=>$pending_offer->company_location,
                                        'title'=>$pending_offer->job_title,
                                        'work_arr'=>$pending_offer->work_arrangement,
                                        'update_date'=>$pending_offer    ->date_hired
                                        ])}}">

                                        <div role="button" class="d-flex flex-wrap align-items-center my-2 bgc-secondary-l4 bgc-h-secondary-l3 radius-1 p-25 d-style">
                                            <span class="mr-25 w-4 h-4 overflow-hidden text-center border-1 brc-secondary-m2 radius-round shadow-sm d-zoom-2">
                                                <img alt="Derek's avatar" src="{{ asset('images/pending_offer.png') }}" class="h-4 w-4" />
                                            </span>

                                            <span class="text-default-d3 text-90 text-600">
                                                {{$pending_offer->first_name}} {{$pending_offer->middle_name}} {{$pending_offer ->last_name}}
                                            </span>

                                            <span class="ml-auto text-dark-l2 text-nowrap">
                                                <!-- 232 -->
                                                <span class="text-80">
                                                    <!-- EUR -->
                                                </span>
                                            </span>

                                            <span class="ml-2">
                                                <i class="fa fa-arrow-right text-blue-m1 text-95"></i>
                                            </span>
                                        </div>
                                    </a>

                                    @endforeach
                                </div>
                            </div>
                        </div>
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