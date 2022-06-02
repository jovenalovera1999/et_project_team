@if(!Auth::check() || Auth::user()->user_type != 'Alumni')
<meta http-equiv="refresh" content="0; url=/login" />
@else
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employment Tracker | Alumni View Record</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">


</head>

<body>
    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="custom-menu">
                <button type="button" id="sidebarCollapse" class="btn btn-primary print-container">
                    <i class="fa fa-bars print-container"></i>
                    <span class="sr-only">Toggle Menu</span>
                </button>

            </div>
            <div class="p-4">
                <div style="align-items: center; text-align: center; margin-top:5px;">
                    <a class="navbar-brand" href="#">
                        <div class="thumb-lg member-thumb mx-auto"><img src="{{ asset('images/coders_tribe_primary_logo.png') }}" width="100" height="100" class="d-inline-block align-text-top" style="border-radius: 50px;" class="rounded-circle img-thumbnail" alt="Coders Tribe"></div>
                    </a>
                    <h6 class="logo" style="margin-top: 20px;"><span class="text-white font-user">{{Auth::user()->name}}</span></h6>
                    <h5 class="logo"><span class="text-white font-user">Alumni User</span></h5>
                </div>
                <br><br>
                <h1><a href="index.html" class="logo ">Menu</a></h1>
                <ul class="list-unstyled components mb-4">
                    <li>
                        <a href="/user_dashboard"><span class="fa fa-home mr-3"></span> Dashboard</a>
                    </li>
                    <li class="active">
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


        <div id="content" class="">
            <div class="container rounded bg-white mt-5 mb-5" style="width:93%;">
                <div class="row">
                    <div class="col-md-3 border-right">
                        <?php
                        if (str_contains($alumni_user->middle_name, 'None')) {
                            $alumni_user->middle_name = "";
                        } else {
                            $alumni_user->middle_name = $alumni_user->middle_name[0] . '.';
                        }
                        ?>
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="{{$alumni_user->profile_picture}}" onerror="this.src='images/coders-logo.png'"><br><span class="font-weight-bold" style="font-size:16px;">{{$alumni_user->first_name}} {{$alumni_user->middle_name}} {{$alumni_user->last_name}}</span><span class="text-black-50">{{$alumni_user->job_title}}
                            </span><br>
                            <span><a href="alumni_view/create">
                                    <div id="hide-btn" class="d-flex justify-content-between align-items-center experience"><span class="border px-3 p-1 add-experience label-btn"><i class="fa fa-edit"></i>&nbsp;Update</span></div>
                                </a></span>
                            <span><a href="{{url('alumni_view')}}">
                                    <div id="hide-btn" class="d-flex justify-content-between align-items-center experience" onclick="this.style.display='none';window.print()" style="margin-top:5px;"><span class="border px-3 p-1 add-experience label-btn"><i class="fa fa-print"></i>&nbsp;Print</span></div>
                                </a></span>
                        </div>
                    </div>
                    <div class="col-md-5 border-right">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-right title">Personal Information</h4>
                            </div>
                            <div class="row mt-2">
                                <div class="col-lg-4"><label class="labels">First Name</label><input type="text-disable" class="form-control label" value="{{$alumni_user->first_name}}" disabled></div>
                                <?php
                                if (str_contains($alumni_user->middle_name, 'None')) {
                                    $alumni_user->middle_name = 'Unknown';
                                } else {
                                    $alumni_user->middle_name = $alumni_user->middle_name;
                                }
                                ?>
                                <div class="col-lg-4"><label class="labels">Middle Name</label><input type="text-disable" class="form-control label" value="{{$alumni_user->middle_name}}" disabled></div>
                                <div class="col-lg-4"><label class="labels">Last Name</label><input type="text-disable" class="form-control label" value="{{$alumni_user->last_name}}" disabled></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12"><label class="labels">Gender</label><input type="text-disable" class="form-control label" value="{{$alumni_user->gender}}" disabled><br></div>
                                <div class="col-md-12"><label class="labels">Home Address</label><input type="text-disable" class="form-control label" value="{{$alumni_user->home_address}}" disabled><br></div>
                                <div class="col-md-12"><label class="labels">Present Address</label><input type="text-disable" class="form-control label" value="{{$alumni_user->present_address}}" disabled><br></div>
                            </div>
                            <br>
                            <div class="row mt-3">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="text-right title">Educational Background</h4>
                                </div>
                                <div class="col-md-12"><label class="labels">School Graduated</label><input type="text-disable" class="form-control label" value="{{$alumni_user->school_graduated}}" disabled> <br></div>
                                <div class="col-md-12"><label class="labels">Batch Number</label><input type="text-disable" class="form-control label" value="{{$alumni_user->batch_no}}" disabled><br></div>
                                <div class="col-md-12"><label class="labels">Scholarship Sponsor</label><input type="text-disable" class="form-control label" value="{{$alumni_user->scholarship_sponsor}}" disabled><br></div>
                                <!-- <div class="col-md-6"><label class="labels">Country</label><input type="text" class="form-control" placeholder="country" value=""></div>
                                <div class="col-md-6"><label class="labels">State/Region</label><input type="text" class="form-control" value="" placeholder="state"></div> -->
                            </div>
                            <br>
                            <div class="row mt-3">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="text-right title">Contact Information</h4>
                                </div>
                                <div class="col-md-12"><label class="labels">Phone Number</label><input type="text-disable" class="form-control label" value="{{$alumni_user->contact}}" disabled><br></div>
                                <div class="col-md-12"><label class="labels">Email Address</label><input type="text-disable" class="form-control label" value="{{$alumni_user->email}}" disabled><br></div>
                                <!-- <div class="col-md-6"><label class="labels">Country</label><input type="text" class="form-control" placeholder="country" value=""></div>
                                <div class="col-md-6"><label class="labels">State/Region</label><input type="text" class="form-control" value="" placeholder="state"></div> -->
                            </div>
                            <!-- <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div> -->
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-right title">Employment Details</h4>
                            </div>
                            <!-- <div class="d-flex justify-content-between align-items-center experience"><span>Edit Experience</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span></div><br> -->
                            <div class="col-md-12"><label class="labels">Employment Status</label><input type="text-disable" class="form-control label" value="{{$alumni_user->employment_status}}" disabled></div> <br>
                            <div class="col-md-12"><label class="labels">Pending Offer</label><input type="text-disable" class="form-control label" value="{{$alumni_user->pending_offer}}" disabled></div> <br>
                            <div class="col-md-12"><label class="labels">Company Name</label><input type="text-disable" class="form-control label" value="{{$alumni_user->company_name}}" disabled></div> <br>
                            <div class="col-md-12"><label class="labels">Company Location</label><input type="text-disable" class="form-control label" value="{{$alumni_user->company_location}}" disabled></div><br>
                            <div class="col-md-12"><label class="labels">Job Title</label><input type="text-disable" class="form-control label" value="{{$alumni_user->job_title}}" disabled></div><br>
                            <?php
                            if (str_contains($alumni_user->date_hired, '1999-10-10')) {
                                $hired = 'Unknown';
                            } else {
                                $date = strtotime($alumni_user->date_hired);
                                $hired = date('D M d, Y', $date);
                            }
                            ?>
                            <div class="col-md-12"><label class="labels">Date Hired</label><input type="text-disable" class="form-control label" value="{{$hired}}" disabled></div><br>
                            <?php
                            $date = strtotime($alumni_user->updated_at);
                            $last_updated = date('D M d, Y', $date);
                            ?>
                            <div class="col-md-12"><label class="labels">Date Updated</label><input type="text-disable" class="form-control label" value="{{$last_updated}}" disabled></div><br>
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