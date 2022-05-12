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
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/profile_card.css')}}">



</head>

<!-- Side Bar Menu -->
<div class="wrapper d-flex align-items-stretch">
    <!-- Page Content  -->

    <body class='card-bg'>
        <div id="content" class=" ">



            <div class="row container d-flex justify-content-center">

                <div class="card user-card-full floats-center">
                    <div class="row ">
                        <div class="col-sm-4 bg-c-lite-green user-profile">
                            <div class="card-block text-center text-white">
                                <div class="m-b-25"> <img src="{{ asset('images/user.png') }}" class="img-radius" alt="User-Profile-Image"> </div>
                                <h4 class="text-light f-w-600">{{$fname}} {{$lname}}</h4>
                                <h6 class="text-light f-w-600">{{$title}}</h6> <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div style="float:right;">
                                <a href="/alumni_records"> <span class="fa fa-arrow-right fa-2x float-right" style="color:#062847; margin-top:20px;"></span></a>
                            </div>
                            <div class="card-block">
                            <br><br>
                                <h5 class="m-b-20 p-b-5 b-b-default f-w-600">Personal Information</h5>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Full Name</p>
                                        <h6 class="text-muted f-w-400">{{$fname}} {{$mi}} {{$lname}}</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Gender</p>
                                        <h6 class=" f-w-400">{{$gender}}</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Home Address</p>
                                        <h6 class="text-muted f-w-400">{{$home}}</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Present Address</p>
                                        <h6 class="text-muted f-w-400">{{$present}}</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">School Graduated</p>
                                        <h6 class="text-muted f-w-400">{{$school}}</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Batch No.</p>
                                        <h6 class="text-muted f-w-400">{{$batch_no}}</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Email</p>
                                        <h6 class="text-muted f-w-400">{{$email}}</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Phone</p>
                                        <h6 class="text-muted f-w-400">{{$contact}}</h6>
                                    </div>

                                </div>
                                <h5 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Employment Details</h6>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Status</p>
                                            <h6 class="text-muted f-w-400">{{$status}}</h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Pending Job Offer</p>
                                            <h6 class="text-muted f-w-400">{{$pending}}</h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Company Name</p>
                                            <h6 class="text-muted f-w-400">{{$cname}}</h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Company Location</p>
                                            <h6 class="text-muted f-w-400">{{$location}}</h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Job Title</p>
                                            <h6 class="text-muted f-w-400">{{$title}}</h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Work Arrangement</p>
                                            <h6 class="text-muted f-w-400">{{$work_arr}}</h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Last Updated</p>
                                            <?php
                                            $date = strtotime($updated_at);
                                            $last_updated = date('D M d, Y', $date);
                                            ?>
                                            <h6 class="text-muted f-w-400">{{$last_updated}}</h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Date Hired</p>
                                            <?php
                                            $date = strtotime($date_hired);
                                            $hired = date('D M d, Y', $date);
                                            ?>
                                            <h6 class="text-muted f-w-400">{{$hired}}</h6>
                                        </div>
                                    </div>

                                    <ul class="social-link list-unstyled m-t-40 m-b-10">
                                        <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="facebook" data-abc="true"><i class="mdi mdi-facebook feather icon-facebook facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="twitter" data-abc="true"><i class="mdi mdi-twitter feather icon-twitter twitter" aria-hidden="true"></i></a></li>
                                        <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="instagram" data-abc="true"><i class="mdi mdi-instagram feather icon-instagram instagram" aria-hidden="true"></i></a></li>
                                    </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </body>


    <!-- panel for Newly Hired Alumni -->



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