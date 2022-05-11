@if(!Auth::check())
<meta http-equiv="refresh" content="0; url=/login" />
@else
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employment Tracker | Add New Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
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
                <h5 class="logo"style="margin-top: 20px;"><span class="text-white font-user">{{Auth::user()->name}}</span></h5>
                <h6 class="logo"><span class="text-white font-user">Administrator</span></h6>
                </div>
                <br>
                <h1><a href="index.html" class="logo ">Menu</a></h1>
                <ul class="list-unstyled components mb-4">
                    <li>
                        <a href="/admin_dashboard"><span class="fa fa-home mr-3"></span> Dashboard</a>
                    </li>
                    <li class="active">
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
                        <a href="/report"><span class="fa fa-sticky-note mr-3"></span> Reports</a>
                    </li>
                    <li>
                        <a href="/register"><span class="fa fa-user-plus mr-3"></span> Admin Registration</a>
                    </li>
                    <li>
                        <a href="#"><span class="fa fa-sign-out mr-3"></span> Logout</a>
                    </li>
                </ul>
                <div class="footer"></div>
            </div>
        </nav>

        <div class="wrapper d-flex align-items-stretch">
            <!-- Page Content  -->
            <div id="content" class="p-4 p-md-5 pt-5">
                <div>
                    <div class="container mr-10">
                        <div class="row justify-content-center">
                            <div class="col-sm-8">
                                <div class="card" style="width: 6.2in;">
                                    <div class="card-header  bg-c-pink text-white">
                                        <h4 class="text-white m-b-20">View Alumni Record</h4>
                                        <div class="float-right">
                                            <a href="/alumni_records" class="btn btn-secondary">View Alumni Records</a>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-7" style="margin-left: 30px">
                                            <form action="/alumni_records/{{$alumni_records->id}}" method="POST" class="mt-3">
                                                @csrf
                                                @method('PUT')
                                                @if(Session::has('message-success'))
                                                <p class="alert alert-success" role="alert">
                                                    <svg width="1.25em" height="1.25em" class="bi bi-shield-fill-check" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M8 .5c-.662 0-1.77.249-2.813.525a61.11 61.11 0 0 0-2.772.815 1.454 1.454 0 0 0-1.003 1.184c-.573 4.197.756 7.307 2.368 9.365a11.192 11.192 0 0 0 2.417 2.3c.371.256.715.451 1.007.586.27.124.558.225.796.225s.527-.101.796-.225c.292-.135.636-.33 1.007-.586a11.191 11.191 0 0 0 2.418-2.3c1.611-2.058 2.94-5.168 2.367-9.365a1.454 1.454 0 0 0-1.003-1.184 61.09 61.09 0 0 0-2.772-.815C9.77.749 8.663.5 8 .5zm2.854 6.354a.5.5 0 0 0-.708-.708L7.5 8.793 6.354 7.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z" />
                                                    </svg>
                                                    {{ Session::get('message-success') }}
                                                </p>
                                                @endif
                                                @if(Session::has('message-error'))
                                                <p class="alert alert-danger" role="alert">
                                                    <svg width="1.25em" height="1.25em" class="bi bi-exclamation-circle-fill" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                                    </svg>
                                                    {{ Session::get('message-error') }}
                                                </p>
                                                @endif
                                                <!-- Full Name -->
                                                <div class="mb-3" style="width: 3in;">
                                                    <label for="first_name" class="form-label">Full Name</label>
                                                    <input type="text" class="form-control" name="first_name" value="{{$alumni_records->first_name}}">
                                                    <span class="text-danger">@error('first_name') {{$message}} @enderror</span>
                                                </div>
                                                <div class="mb-3" style="width: 3in;">
                                                    <input type="text" class="form-control" id="middle_name" name="middle_name" value="{{$alumni_records->middle_name}}">
                                                    <span class="text-danger">@error('middle_name') {{$message}} @enderror</span>
                                                </div>
                                                <div class="mb-3" style="width: 3in;">
                                                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="{{$alumni_records->last_name}}">
                                                    <span class="text-danger">@error('last_name') {{$message}} @enderror</span>
                                                </div>
                                                <!-- Full Name
                                                    <div class="input-group mb-3 mt-2" style="width: 5.5in;">
                                                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" style="width: 1in;">
                                                        <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Middle Name" style="width: 1in;">
                                                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" style="width: 1in;">
                                                        <span class="text-danger">@error('last_name') {{$message}} @enderror</span>
                                                        <span class="text-danger">@error('middle_name') {{$message}} @enderror</span>
                                                        <span class="text-danger">@error('first_name') {{$message}} @enderror</span>
                                                    </div> -->
                                                <!-- Full Name -->

                                                <!-- Gender -->
                                                <!-- <div class="mb-3" style="width: 3in;">
                                                    <label for="gender" class="form-label">Gender</label>
                                                    @if(empty(old('gender')))
                                                    <select class="form-select" name="gender" id="gender" role="button">
                                                        <option value="" selected>{{$alumni_records->gender}}</option>
                                                    </select>
                                                    @else
                                                    <select class="form-select" name="gender" id="gender" role="button">
                                                        <option value="">Select Gender</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                        <option value="{{old('gender')}}" selected hidden>{{old('gender')}}</option>
                                                    </select>
                                                    @endif
                                                    <span class="text-danger">@error('gender') {{$message}} @enderror</span>
                                                </div> -->
                                                <!-- Gender -->

                                                <!-- Contact -->
                                                <div class="mb-3" style="width: 3in;">
                                                    <label for="contact" class="form-label">Contact Number</label>
                                                    <input type="number" class="form-control" id="contact" name="contact" value="{{$alumni_records->contact}}">
                                                    <span class="text-danger">@error('contact') {{$message}} @enderror</span>
                                                </div>
                                                <!-- Contact -->

                                                <!-- Addresses -->
                                                <div class="mb-3" style="width: 4.5in;">
                                                    <label for="home_address" class="form-label">Address</label>
                                                    <input type="text" class="form-control" id="home_address" name="home_address" value="{{$alumni_records->home_address}}">
                                                    <span class="text-danger">@error('home_address') {{$message}} @enderror</span>
                                                </div>
                                                <div class="mb-3" style="width: 4.5in;">
                                                    <input type="text" class="form-control" id="present_address" name="present_address" value="{{$alumni_records->present_address}}">
                                                    <span class="text-danger">@error('present_address') {{$message}} @enderror</span>
                                                </div>
                                                <!-- Addresses -->

                                                <!-- School Graduated -->
                                                <div class="mb-3" style="width: 3in;">
                                                    <label for="school_graduated" class="form-label">School Graduated</label>
                                                    <input type="text" class="form-control" id="school_graduated" name="school_graduated" value="{{$alumni_records->school_graduated}}">
                                                    <span class="text-danger">@error('school_graduated') {{$message}} @enderror</span>
                                                </div>
                                                <!-- School Graduated -->

                                                <!-- Batch No -->
                                                <div class="mb-3" style="width: 3in;">
                                                    <label for="batch_no" class="form-label">Batch No.</label>
                                                    <input type="number" class="form-control" id="batch_no" name="batch_no" value="{{$alumni_records->batch_no}}">
                                                    <span class="text-danger">@error('batch_no') {{$message}} @enderror</span>
                                                </div>
                                                <!-- Batch No -->

                                                <!-- Employment Status -->

                                                <!-- <div>
                                                    <script type="text/javascript">
                                                        function EnableDisableTextBox(pending_offer) {
                                                            employment_status.disabled = pending_offer.checked ? true : false;
                                                            if (!employment_status.disabled) {}
                                                            job_title.disabled = pending_offer.checked ? true : false;
                                                            if (!job_title.disabled) {}
                                                            company_name.disabled = pending_offer.checked ? true : false;
                                                            if (!company_name.disabled) {}
                                                            company_location.disabled = pending_offer.checked ? true : false;
                                                            if (!company_location.disabled) {}
                                                            work_arrangement.disabled = pending_offer.checked ? true : false;
                                                            if (!work_arrangement.disabled) {}
                                                        }
                                                        </div>
                                                    </script> -->

                                                <div class="mb-3" style="width: 3in;">
                                                    <label for="pending_offer" class="form-label">Pending Offers(With or Without)</label>
                                                    <input type="text" class="form-control" id="pending_offer" name="pending_offer" value="{{$alumni_records->pending_offer}}">
                                                    <span class="text-danger">@error('pending_offer') {{$message}} @enderror</span>


                                                </div>
                                                <div class="mb-3" style="width: 3in;">
                                                    <label for="employment_status" class="form-label">Employment Status</label> <br />
                                                    @if(empty(old('employment_status')))
                                                    <select class="form-select" name="employment_status" id="employment_status" role="button" value="{{$alumni_records->employment_status}}">
                                                        <option value="" selected>{{$alumni_records->employment_status}}</option>
                                                        <option value="Employed">Employed</option>
                                                        <option value="Unemployed">Unemployed</option>
                                                    </select>
                                                    @else
                                                    <select class="form-select" name="employment_status" id="employment_status" role="button" value="{{$alumni_records->employment_status}}">
                                                        <option value="">None</option>
                                                        <option value="Employed">Employed</option>
                                                        <option value="Unemployed">Unemployed</option>
                                                        <option value="{{$alumni_records->employment_status}}" selected hidden>{{$alumni_records->employment_status}}</option>
                                                    </select>
                                                    @endif
                                                    <span class="text-danger">@error('employment_status') {{$message}} @enderror</span>
                                                </div>
                                                <div class="mb-3" style="width: 4.5in;">
                                                    <label for="job_title" class="form-label">Job Title</label>
                                                    <input type="text" class="form-control" id="job_title" name="job_title" placeholder="Job Title" value="{{$alumni_records->job_title}}">
                                                    <span class="text-danger">@error('job_title') {{$message}} @enderror</span>
                                                </div>
                                                <div class="mb-3" style="width: 4.5in;">
                                                    <label for="company_name" class="form-label">Company Name</label>
                                                    <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Company Name" value="{{$alumni_records->company_name}}">
                                                    <span class="text-danger">@error('company_name') {{$message}} @enderror</span>
                                                </div>
                                                <div class="mb-3" style="width: 4.5in;">
                                                    <label for="company_location" class="form-label">Company Location</label>
                                                    <input type="text" class="form-control" id="company_location" name="company_location" placeholder="Company Location" value="{{$alumni_records->company_location}}">
                                                    <span class="text-danger">@error('company_location') {{$message}} @enderror</span>
                                                </div>
                                                <div class="mb-3" style="width: 4.5in;">
                                                    <input type="date" class="form-control" id="date_hired" name="date_hired" value="{{$alumni_records->date_hired}}">
                                                    <span class="text-danger">@error('date_hired') {{$message}} @enderror</span>
                                                </div>
                                                <!-- <div class="mb-3" style="width: 4.5in;">

                                                    <span class="text-danger">@error('job_title') {{$message}} @enderror</span>
                                                </div> -->
                                                @if(empty(old('work_arrangement')))
                                                <div class="mb-3" style="width: 3in;">
                                                    <label for="work_arrangement" class="form-label">Work Arrangement</label>
                                                    <select class="form-select" name="work_arrangement" id="work_arrangement" role="button" value="{{$alumni_records->work_arrangement}}">
                                                        <option value="" selected>{{$alumni_records->work_arrangement}}</option>
                                                        <option value="Full time">Full time</option>
                                                        <option value="Part time">Part time</option>
                                                        <option value="Trainee">Trainee</option>
                                                    </select>
                                                    <span class="text-danger">@error('work_arrangement') {{$message}} @enderror</span>
                                                </div>
                                                @else
                                                <div class="mb-3" style="width: 3in;">
                                                    <select class="form-select" name="work_arrangement" id="work_arrangement" role="button" value="{{$alumni_records->work_arrangement}}">
                                                        <option value="">Work Arrangement</option>
                                                        <option value="Employed">Employed</option>
                                                        <option value="Unemployed">Unemployed</option>
                                                        <option value="{{$alumni_records->work_arrangement}}" selected hidden>{{$alumni_records->work_arrangement}}</option>
                                                    </select>
                                                    <span class="text-danger">@error('work_arrangement') {{$message}} @enderror</span>
                                                </div>
                                                @endif

                                        
                                                <!-- Employment Status -->

                                                <!-- Scholarship Sponsors -->
                                                <div class="mb-3" style="width: 3in;">
                                                    <label for="scholarship_sponsors" class="form-label">Scholarship Sponsors</label>
                                                    <select class="form-select" name="scholarship_sponsors" id="scholarship_sponsors" role="button" value="{{$alumni_records->scholarship_sponsors}}">
                                                        <option value="" selected>{{$alumni_records->scholarship_sponsors}}</option>
                                                    </select>
                                                    <span class="text-danger">@error('scholarship_sponsors') {{$message}} @enderror</span>
                                                </div>

                                                

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="{{URL::asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('js/jquery.min.js')}}"></script>
    <script src="{{URL::asset('js/main.js')}}"></script>
    <script src="{{URL::asset('js/popper.js')}}"></script>
    <script src="{{URL::asset('js/jquery-3.5.1.js')}}"></script>
    <script src="{{URL::asset('js/custom.js')}}"></script>
    <script>
        if (pending_offer.checked) {

        }
    </script>
</body>

</html>
@endif