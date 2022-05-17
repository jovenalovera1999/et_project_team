@if(!Auth::check())
<meta http-equiv="refresh" content="0; url=/login" />
@else
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Employment Tracker | Manage User Record</title>
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
                <h6 class="logo"style="margin-top: 20px;"><span class="text-white font-user">{{Auth::user()->name}}</span></h6>
                <!-- <h6 class="logo"><span class="text-white font-user">Logged In User</span></h6> -->
                </div>
                <br><br>
                <h1><a href="index.html" class="logo ">Menu</a></h1>
                <ul class="list-unstyled components mb-4">
                    <li class="active">
                        <a href="/user_dashboard"><i class="fa fa-home mr-3"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="{{url('alumni_view')}}"><span class="fa fa-user mr-3"></span>My Record</a>
                    
                    </li>
                    <li>
                        <a href="/logout/{{Auth::user()->id}}"><span class="fa fa-sign-out mr-3"></span> Logout</a>
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
                                    <div class="card-header  bg-c-pink text-white text-center">
                                            <h4 class="text-white m-b-20">Manage {{ ucfirst(trans(Auth::user() -> name)) }}'s Record</h4>
                                            <a href="{{url('alumni_view')}}" class="btn btn-primary float-right">Back</a>  
                                        </div>

                                    <div class="row">
                                        <div class="col-sm-7" style="margin-left: 30px">
                                            <form action="/update_alumni/{{Auth::user()->id}}" method="POST" class="mt-3" enctype="multipart/form-data">
                                                @csrf
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
                                                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="{{ ucfirst($alumni_user1 -> first_name) }}">
                                                    <span class="text-danger">@error('first_name') {{$message}} @enderror</span>
                                                </div>
                                                <div class="mb-3" style="width: 3in;">
                                                    <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Middle Name" value="{{ ucfirst($alumni_user1 -> middle_name) }}">
                                                    <span class="text-danger">@error('middle_name') {{$message}} @enderror</span>
                                                </div>
                                                <div class="mb-3" style="width: 3in;">
                                                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="{{ ucfirst($alumni_user1 -> last_name) }}">
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
                                                <div class="mb-3" style="width: 3in;">
                                                    <label for="gender" class="form-label">Gender</label>
                                                    @if(empty(old('gender')))
                                                    <select class="form-select" name="gender" id="gender" role="button">
                                                        <option value="" selected>{{ ucfirst($alumni_user1 -> gender) }}</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
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
                                                </div>
                                                <!-- Gender -->

                                                <!-- Contact -->
                                                <div class="mb-3" style="width: 3in;">
                                                    <label for="contact" class="form-label">Contact Number</label>
                                                    <input type="number" class="form-control" id="contact" name="contact" placeholder="Contact Number" value="{{ ucfirst($alumni_user1 -> contact) }}">
                                                    <span class="text-danger">@error('contact') {{$message}} @enderror</span>
                                                </div>
                                                <!-- Contact -->

                                                <!-- Addresses -->
                                                <div class="mb-3" style="width: 4.5in;">
                                                    <label for="home_address" class="form-label">Address</label>
                                                    <input type="text" class="form-control" id="home_address" name="home_address" placeholder="Home Address" value="{{ ucfirst($alumni_user1 -> home_address) }}">
                                                    <span class="text-danger">@error('home_address') {{$message}} @enderror</span>
                                                </div>
                                                <div class="mb-3" style="width: 4.5in;">
                                                    <input type="text" class="form-control" id="present_address" name="present_address" placeholder="Present Address" value="{{ ucfirst($alumni_user1 -> present_address) }}">
                                                    <span class="text-danger">@error('present_address') {{$message}} @enderror</span>
                                                </div>
                                                <!-- Addresses -->

                                                <!-- School Graduated -->
                                                <div class="mb-3" style="width: 3in;">
                                                    <label for="school_graduated" class="form-label">School Graduated</label>
                                                    <input type="text" class="form-control" id="school_graduated" name="school_graduated" placeholder="School Graduated" value="{{ ucfirst($alumni_user1 -> school_graduated) }}">
                                                    <span class="text-danger">@error('school_graduated') {{$message}} @enderror</span>
                                                </div>
                                                <!-- School Graduated -->

                                                <!-- Batch No -->
                                                <div class="mb-3" style="width: 3in;">
                                                    <label for="batch_no" class="form-label">Batch No.</label>
                                                    <input type="number" class="form-control" id="batch_no" name="batch_no" value="{{ ucfirst($alumni_user1 -> batch_no) }}">
                                                    <span class="text-danger">@error('batch_no') {{$message}} @enderror</span>
                                                </div>
                                                <!-- Batch No -->

                                                <!-- Employment Status -->

                                                <div>
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
                                                            date_hired.disabled = pending_offer.checked ? true : false;
                                                            if (!work_arrangement.disabled) {}
                                                        }
                                                    </script>
                                                    <label for="pending_offer">
                                                        <input type="checkbox" id="pending_offer" name="pending_offer" onclick="EnableDisableTextBox(this)" value="check" />
                                                        Have pending offers?
                                                    </label>
                                                    <br />
                                                </div>
                                                <div class="mb-3" style="width: 3in;">
                                                    <label for="employment_status" class="form-label">Employment Status</label> <br />
                                                    @if(empty(old('employment_status')))
                                                    <select class="form-select" name="employment_status" id="employment_status" role="button" value="{{old('employment_status')}}">
                                                        <option value="" selected>{{ ucfirst($alumni_user1 -> employment_status) }}</option>
                                                        <option value="Employed">Employed</option>
                                                        <option value="Unemployed">Unemployed</option>
                                                    </select>
                                                    @else
                                                    <select class="form-select" name="employment_status" id="employment_status" role="button" value="{{old('employment_status')}}">
                                                        <option value="">None</option>
                                                        <option value="Employed">Employed</option>
                                                        <option value="Unemployed">Unemployed</option>
                                                        <option value="{{old('employment_status')}}" selected hidden>{{ ucfirst($alumni_user1 -> employment_status) }}</option>
                                                    </select>
                                                    @endif
                                                    <span class="text-danger">@error('employment_status') {{$message}} @enderror</span>
                                                </div>
                                                <div class="mb-3" style="width: 4.5in;">
                                                    <input type="text" class="form-control" id="job_title" name="job_title" placeholder="Job Title" value="{{ ucfirst($alumni_user1 -> job_title) }}">
                                                    <span class="text-danger">@error('job_title') {{$message}} @enderror</span>
                                                </div>
                                                <div class="mb-3" style="width: 4.5in;">
                                                    <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Company Name" value="{{ ucfirst($alumni_user1 -> company_name) }}">
                                                    <span class="text-danger">@error('company_name') {{$message}} @enderror</span>
                                                </div>
                                                <div class="mb-3" style="width: 4.5in;">
                                                    <input type="text" class="form-control" id="company_location" name="company_location" placeholder="Company Location" value="{{ ucfirst($alumni_user1 -> company_location) }}">
                                                    <span class="text-danger">@error('company_location') {{$message}} @enderror</span>
                                                </div>
                                                <div class="mb-3" style="width: 4.5in;">
                                                    <input type="date" class="form-control" id="date_hired" name="date_hired" placeholder="Date Hired" value="{{$alumni_user1 -> date_hired}}">
                                                    <span class="text-danger">@error('date_hired') {{$message}} @enderror</span>
                                                </div>
                                                <!-- <div class="mb-3" style="width: 4.5in;">

                                                    <span class="text-danger">@error('job_title') {{$message}} @enderror</span>
                                                </div> -->
                                                @if(empty(old('work_arrangement')))
                                                <div class="mb-3" style="width: 3in;">
                                                    <select class="form-select" name="work_arrangement" id="work_arrangement" role="button" value="{{$alumni_user1 -> work_arrangement}}">
                                                        <option value="Full-time" selected>Full-time</option>
                                                        <option value="Part-time">Part-time</option>
                                                        <option value="Flextime">Flextime</option>
                                                        <option value="Trainee">Trainee</option>
                                                    </select>
                                                    <span class="text-danger">@error('work_arrangement') {{$message}} @enderror</span>
                                                </div>
                                                @else
                                                <div class="mb-3" style="width: 3in;">
                                                    <select class="form-select" name="work_arrangement" id="work_arrangement" role="button" value="{{$alumni_user1 -> work_arrangement}}">
                                                        <option value="Full-time" selected>Full-time</option>
                                                        <option value="Part-time">Part-time</option>
                                                        <option value="Flextime">Flextime</option>
                                                        <option value="Trainee">Trainee</option>
                                                        <option value="{{old('work_arrangement')}}" selected hidden>{{$alumni_user1 -> work_arrangement}}</option>
                                                    </select>
                                                    <span class="text-danger">@error('work_arrangement') {{$message}} @enderror</span>
                                                </div>
                                                @endif
                                                <!-- Employment Status -->

                                                <!-- Scholarship Sponsors--> 

                                                <div class="mb-3" style="width: 3in;">
                                                    <label for="work_arrangement" class="form-label">Scholarship Sponsor</label>
                                                    <select class="form-select" name="scholarship_sponsor" id="scholarship_sponsor" role="button" value="{{$alumni_user1->scholarship_sponsor}}">
                                                        <option value="" selected>{{$alumni_user1->scholarship_sponsor}}</option>
                                                        
                                                    </select>
                                                    <span class="text-danger">@error('scholarship_sponsor') {{$message}} @enderror</span>
                                                </div>
                                                <!-- Scholarship Sponsors -->

                                                <!-- User Type -->

                                                <!-- <div class="mb-3" style="width: 3in;">
                                                        <label for="user_type" class="form-label">User Type</label>
                                                        <select class="form-select" name="user_type" id="user_type" role="button">
                                                            <option selected>Select user</option>
                                                            <option value="Alumni">Alumni</option>
                                                            <option value="Administrator">Administrator</option>
                                                        </select>
                                                    </div> -->

                                                <!-- User Type -->

                                                <!-- Login Credentials -->
                                                <div class="mb-3" style="width: 3in;">
                                                    <label for="email" class="form-label">Login Credentials</label>
                                                    <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{ $alumni_user1 -> email }}">
                                                    <span class="text-danger">@error('email') {{$message}} @enderror</span>
                                                </div>
                                                <div class="mb-3" style="width: 3in;">
                                                    <input type="password" class="form-control" id="password" name="password" placeholder="Input user's password" value="{{$alumni_user1 -> password}}">
                                                    <span class="text-danger">@error('password') {{$message}} @enderror</span>
                                                </div>
                                                <div class="mb-3" style="width: 3in;">
                                                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm password" value="{{$alumni_user1 -> confirm_password}}">
                                                    <span class="text-danger">@error('confirm_password') {{$message}} @enderror</span>
                                                </div>
                                                <!-- Login Credentials -->

                                                <!--  Code for Profile Picture -->

                                                <div class="mb-3" style="width: 3in;">
                                                        <!--<label for="email" class="form-label">Login Credentials</label>-->
                                                        <label for="" class="form-label">Profile Picture</label>
                                                        <div class="input-box input-upload-box left">
                                                            <div class="upload-wrapper">
                                                                <div class="upload-box">
                                                                    <input type="file" name="profile_picture" id="profile_picture" class="form-control" >
                                                                </div>
                                                            </div>
                                                            <div class="">Please select a file and click upload</div>
                                                        </div>
                                                    </div>

                                                    <div class="mb-3 text-center">
                                                       <input class="btn btn-primary btn-lg btn-block" type="submit" value="Update">
                                                    </div>
                                                <!-- Code for Profile Picture -->

                                            </form>
                                        </div>
                                        <!-- <div class="col" style="margin-right: 3in; margin-top: 73px">
                                                <img src="data:image/png;base64,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"
                                                alt="Ninja Tribe Solutions Inc." style="width: 70%">
                                            </div> -->
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