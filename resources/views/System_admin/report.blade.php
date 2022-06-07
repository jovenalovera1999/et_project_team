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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
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

                    <div class="card-body">
                        <div class="table-responsive">

                            <div class="row input-daterange" align="left">
                                <div class="row">
                                    <form metho="GET" action="">
                                        <div class="form-group col-md-3 float-left">
                                            <label>From Date:</label>
                                            <input type="text" class="form-control" name="fromDate" id="fromDate"  Placeholder="Select From Date" readonly>
                                        </div>
                                        <div class="form-group col-md-3 float-left">
                                            <label>To Date: </label>
                                            <input type="text" name="toDate" id="toDate" class="form-control"   Placeholder="Select To Date" readonly>
                                        </div>

                                        <div class="form-group col-md-2 float-left">
                                            <label></label>
                                            <!-- <i class="fa fa-paper-plane"></i> -->
                                            <button type="button" name="load" id="load" class="mt-2 btn btn-secondary  btn-block"> Load</button>
                                        </div>
                                        <div class="form-group col-md-2 float-left">
                                            <label></label>
                                            <!--<i class="fa fa-paper-plane"></i>-->
                                            <button type="button" name="refresh" id="refresh" class="mt-2 btn btn-success btn-block"> Refresh</button>
                                        </div>

                                    </form>
                                </div>
                                <br>
                                </style>
                                <div class="tg-wrap">
                                    <table id="order_table" class="display table table-bordered table-hover table-striped" cellspacing="0" style="width:100%">
                                        <thead class="bg-c-pink text-white" style="font: bold;" align="center">
                                            <tr>
                                                <th>Id</th>
                                                <th align=center>First Name</th>
                                                <th align=center>Middle Name</th>
                                                <th align=center>Last Name</th>
                                                <th align=center>Gender</th>
                                                <th align=center>Contact</th>
                                                <th align=center>Email</th>
                                                <th align=center>Home Address</th>
                                                <th align=center>Present Address</th>
                                                <th align=center>School Graduated</th>
                                                <th align=center>Batch Number</th>
                                                <th align=center>Scholarship Sponsor</th>
                                                <th align=center>Pending Offer</th>
                                                <th align=center>Employment Status</th>
                                                <th align=center>Company Name</th>
                                                <th align=center>Company Location</th>
                                                <th align=center>Job Title</th>
                                                <th align=center>Date Hired</th>
                                                <th align=center>Work Arrangement</th>
                                                <th align=center>Date Created</th>
                                            </tr>
                                        </thead>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
        <script src="{{URL::asset('js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
        <script src="{{URL::asset('js/main.js')}}"></script>
        <script src="{{URL::asset('js/custom.js')}}"></script>
    </div>
    <script>
        $(document).ready(function() {
           
            $('.input-daterange').datepicker({
                todayBtn: 'linked',
                format: 'yyyy-mm-dd',
                timeFormat: 'HH:mm:ss',
                autoclose: true
            });
            load_data();

            function load_data(fromDate = '', toDate = '') {
                $('#order_table').DataTable({
                    processing: true,
                    serverSide: true,
                    method: "POST",
                    order: [
                    [1, 'asc']
                     ],
                    ajax: {
                        url: '{{route("report.index")}}',
                       
                        data: {
                            fromDate: fromDate,
                            toDate: toDate
                        }
                    },

                    columns: [{
                            data: 'id',
                            name: 'id',
                        },
                        {
                            data: 'first_name',
                            name: 'first_name',
                        },
                        {
                            data: 'middle_name',
                            name: 'middle_name',
                        },
                        {
                            data: 'last_name',
                            name: 'last_name',
                        },
                        {
                            data: 'gender',
                            name: 'gender',
                        },
                        {
                            data: 'contact',
                            name: 'contact',
                        },
                        {
                            data: 'email',
                            name: 'email',
                        },
                        {
                            data: 'home_address',
                            name: 'home_address',
                        },
                        {
                            data: 'present_address',
                            name: 'present_address',
                        },
                        {
                            data: 'school_graduated',
                            name: 'school_graduated',
                        },
                        {
                            data: 'batch_no',
                            name: 'batch_no',
                        },
                        {
                            data: 'scholarship_sponsor',
                            name: 'scholarship_sponsor',
                        },
                        {
                            data: 'pending_offer',
                            name: 'pending_offer',
                        },
                        {
                            data: 'employment_status',
                            name: 'employment_status',
                        },
                        {
                            data: 'company_name',
                            name: 'company_name',
                        },
                        {
                            data: 'company_location',
                            name: 'company_location',
                        }

                        ,
                        {
                            data: 'job_title',
                            name: 'job_title',
                        },
                        {
                            data: 'date_hired',
                            name: 'date_hired',
                        },
                        {
                            data: 'work_arrangement',
                            name: 'work_arrangement',
                        },
                        {
                            data: 'created_at',
                            name: 'created_at',
                        }

                    ]


                });

            }
            $('#load').click(function() {
                var toDate = $('#toDate').val();
                var fromDate = $('#fromDate').val();

                if (toDate != '' && fromDate != '') {
                    $('#order_table').DataTable().destroy();
                    load_data(fromDate, toDate);
                } else {
                    alert('Both Date is required');

                }
            });
            $('#refresh').click(function() {
                $('#fromDate').val('');
                $('#toDate').val('');
                $('#order_table').DataTable().destroy();
                load_data();
            });

        });
        
    </script>


</body>


</html>
@endif