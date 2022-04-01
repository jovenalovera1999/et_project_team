@if(!Auth::check())
<meta http-equiv="refresh" content="0; url=/login" />
@else
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employment Tracker | Reports</title>
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
                <a class="navbar-brand" href="#">
                    <!-- <img src="data:image/png;base64,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" alt="" width="75" height="75" class="d-inline-block align-text-top" style="border-radius: 50px"> -->
                </a>
                <h1><a href="index.html" class="logo ">Menu<span class="text-white">Admin: {{Auth::user()->name}}</span></a></h1>
                <br>
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
                    <li class="active">
                        <a href="report"><span class="fa fa-sticky-note mr-3"></span> Reports</a>
                    </li>
                    <li>
                        <a href="register"><span class="fa fa-user-plus mr-3"></span> Admin Registration</a>
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
            <h1 class="h3 mb-0 text-gray-800 mb-4">Reports</h1>
        </div>

        <!-- PANEL START CODE  -->

        <script src="{{URL::asset('js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
        <script src="{{URL::asset('js/jquery.min.js')}}"></script>
        <script src="{{URL::asset('js/main.js')}}"></script>
        <script src="{{URL::asset('js/popper.js')}}"></script>
        <script src="{{URL::asset('js/custom.js')}}"></script>
    </div>

</body>

</html>
@endif