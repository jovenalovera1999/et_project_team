@if(!Auth::check() || Auth::user()->user_type != 'Administrator')
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
    <link rel="stylesheet" href="{{URL::asset('css/jquery.dataTables.min.css')}}">
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

            <!--<h1 class="h3 mb-0 text-gray-800 mb-4">Reports</h1>-->
            <div class="col">
                <div class="card" style="width:100%;">

                    <h5 class="card-header bg-c-pink text-white">Alumni Report Summary by Date
                        <div class="float-right  print-container1">
                            <a href="{{route('report_export')}}" class="btn btn-success btnprn"><i class="fa fa-file-excel-o" aria-hidden="true"> Excel</i></a>
                        </div>
                    </h5>

                    <div class="card-body" >
                        <div class="table-responsive">
                            <form class="myForm" method="get" enctype="application/x-www-form-urlencoded" action="">
                                <div class="form-row" align="left">
                                    <div class="form-group col-md-3">
                                        <label>From Date:</label>
                                        <input type="date" class="datepicker btn-block" name="from" id="fromDate" Placeholder="Select From Date" value="">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>To Date: </label>
                                        <input type="date" name="to" id="toDate" class="datepicker btn-block" Placeholder="Select To Date" value="">
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label></label>
                                        <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-paper-plane"></i> Load</button>
                                    </div>
                                    <!--<div class="form-group col-md-3 ">
                                            <label></label>
                                            <a href="" class="btn btn-success btn-block"><i class="fa fa-refresh"></i> Reset</a></span>
                                        </div>

                                         <div class="form-group col-md-3">
                                            <label>Pending Offers: </label>
                                            <select class="custom-select" name="pending_offers" id="pending_offers" required>
                                                <option value="">--Select Pending Offers</option>
                                                <option value="With">With</option>
                                                <option value="Without">Without</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Home Address:</label>
                                            <?php
                                            /** connection */
                                            ?>
                                            <select name="home_address" id="home_address" class="custom-select" required>
                                                <option value="">--Select Home Address--</option>
                                                <?php //echo $city_name; 
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row" align="left">
                                        <div class="form-group col-md-3 offset-md-6">
                                            <a href="" class="btn btn-success btn-block"><i class="fa fa-refresh"></i> Reset</a></span>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-paper-plane"></i> Load</button>
                                        </div>
                                    </div>-->
                            </form>
                            <br>

                            </style>
                            <div class="tg-wrap">
                                <table id="table" class="display" cellspacing="0" style="width:100%">
                                    <thead class="bg-c-pink text-white" style="font: bold;" align="center">
                                        <tr>
                                            <th>Id</th>
                                            <th align=center>Name</th>
                                            <th align=center>Job Title</th>
                                            <th align=center>Home Address</th>
                                            <th align=center>Date Created</th>
                                            <th align=center>Batch Number</th>
                                            <th align=center>Status</th>
                                            <th align=center>Pending Offers</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($data)
                                        @foreach($data as $d)
                                        <tr>
                                            <td>{{$d->id}}</td>
                                            <td>
                                                <p>{{$d->first_name}} {{$d->last_name}}</p>
                                            </td>
                                            <td>
                                                {{$d->job_title}}
                                            </td>
                                            <td>
                                                {{$d->home_address}}
                                            </td>
                                            <td>
                                                {{$d->created_at}}
                                            </td>
                                            <td>
                                                {{$d->batch_no}}
                                            </td>
                                            <td>
                                                {{$d->status}}
                                            </td>
                                            <td>
                                                {{$d->pending_offers}}
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                    <!-- <tfoot class="bg-c-pink text-white">
                                            <tr>
                                                <th>Id</td>
                                                <th align=center>Name</th>
                                                <th align=center>Job Title</th>
                                                <th align=center>Home Address</th>
                                                <th align=center>Date Created</th>
                                                <th align=center>Batch Number</th>
                                                <th align=center>Status</th>
                                                <th align=center>Pending Offers</th>
                                            </tr>
                                        </tfoot> -->
                                </table>
                            </div>
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
    <script src="{{URL::asset('js/jquery.dataTables.min.js')}}"></script>
    </div>
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                order: [
                    [1, 'asc']
                ]
            });
        });
    </script>


</body>


</html>
@endif