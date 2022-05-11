@if(!Auth::check() || Auth::user()->user_type != 'Administrator')
<meta http-equiv="refresh" content="0; url=/login" />
@else
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employment Tracker | Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" class="rel">
</head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
</head>

<body>

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
                        <a href="admin_dashboard"><span class="fa fa-home mr-3"></span> Dashboard</a>
                    </li>
                    <li>
                        <a href="alumni_records"><span class="fa fa-user mr-3"></span> Alumni Records</a>
                    </li>
                    <li>
                        <a href="job_opportunities"><span class="fa fa-briefcase mr-3"></span> Job Opportunity</a>
                    </li>
                    <li>
                        <a href="scholarship_sponsors"><span class="fa fa-cloud-upload mr-3"></span> Scholarship Sponsors</a>
                    </li>
                    <li>
                        <a href="{{url('email')}}"><span class="fa fa-paper-plane mr-3"></span> Email</a>
                    </li>
                    <li>
                        <a href="report"><span class="fa fa-sticky-note mr-3"></span> Reports</a>
                    </li>
                    <li class="active">
                        <a href="register"><span class="fa fa-user-plus mr-3"></span> Admin Registration</a>
                    </li>
                    <li>
                        <a href="#"><span class="fa fa-sign-out mr-3"></span> Logout</a>
                    </li>
                </ul>
                <div class="footer"></div>
            </div>
        </nav>


        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-sm-12">
                        <div class="card" style="margin-left: 12px; margin-top: 50px">
                            <div class="card-header text-center bg-c-pink">
                                <h1 class="text-white">Account Registration</h1>
                            </div>
                            <div class="row">
                                <div class="col-sm-7" style="margin-left: 12px; margin-top: 30px">
                                    <form action="/register" method="POST" class="mt-3">
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
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Input user's name" value="{{old('name')}}">
                                            <span class="text-danger">@error('name') {{$message}} @enderror</span>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="text" class="form-control" id="email" name="email" placeholder="Input user's email" value="{{old('email')}}">
                                            <span class="text-danger">@error('email') {{$message}} @enderror</span>
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Input user's password" value="{{old('password')}}">
                                            <span class="text-danger">@error('password') {{$message}} @enderror</span>
                                        </div>
                                        <div class="mb-3">
                                            <label for="confirm_password" class="form-label">Confirm Password</label>
                                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm password">
                                            <span class="text-danger">@error('password') {{$message}} @enderror</span>
                                        </div>
                                        <div class="mb-3 text-center">
                                            <button type="submit" class="btn bg-c-blue text-light" style="width: 200px">Create</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col" style="margin-right: 30px; margin-top: 90px">
                                    <img src="{{ asset('images/coders_tribe_primary_logo.png') }}" alt="Ninja Tribe Solutions Inc." style="width: 100%">
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
</body>

</html>
@endif