@if(!Auth::check())
<meta http-equiv="refresh" content="0; url=/login" />
@else
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employment Tracker | Alumni Records</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" class="rel">
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
                        <div class="thumb-lg member-thumb mx-auto"><img
                                src="{{ asset('images/coders_tribe_primary_logo.png') }}" width="100" height="100"
                                class="d-inline-block align-text-top" style="border-radius: 50px;"
                                class="rounded-circle img-thumbnail" alt="Coders Tribe"></div>
                    </a>
                    <h6 class="logo " style="margin-top: 20px;"><span
                            class="text-white font-user">{{Auth::user()->name}}</span></h6>
                    <h5 class="logo"><span class="text-white font-user">Administrator</span></h5>
                </div>
                <br>
                <h1><a href="index.html" class="logo ">Menu</a></h1>
                <ul class="list-unstyled components mb-4">
                    <li>
                        <a href="admin_dashboard"><span class="fa fa-home mr-3"></span> Dashboard</a>
                    </li>
                    <li class="active">
                        <a href="alumni_records"><span class="fa fa-user mr-3"></span> Alumni Records</a>
                    </li>
                    <li>
                        <a href="job_opportunities"><span class="fa fa-briefcase mr-3"></span> Job Opportunity</a>
                    </li>
                    <li>
                        <a href="scholarship_sponsors"><span class="fa fa-cloud-upload mr-3"></span> Scholarship
                            Sponsors</a>
                    </li>
                    <li>
                        <a href="{{url('email')}}"><span class="fa fa-paper-plane mr-3"></span> Email</a>
                    </li>
                    <li>
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

        <div class="wrapper d-flex align-items-stretch">
            <!-- Page Content  -->
            <div id="content" style="margin-top: 33px;">
                <div>
                    <div class="container mr-10">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card" style="margin-left:1.5%;">
                                        <div class="card-header bg-c-blue ">
                                            <div class="float-left">
                                                <h4 class="text-white">Manage Alumni Record</h4>
                                            </div>
                                            <div class="float-right">
                                                <a href="add_new_record" type="button"
                                                    class="btn profile_button2 text-light">
                                                    <span class="fa fa-plus  mr-3" style="color:light"></span>Add New
                                                    Alumni Record
                                                </a>
                                            </div>
                                            <!-- Add Scholarship code -->
                                            <div class="float-right">
                                                <a type="button" class="btn profile_button2 text-light"
                                                    data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                    <span class="fa fa-plus  mr-3" style="color:light"></span>Import
                                                    Excel
                                                </a>
                                            </div>
                                            <!-- Add Scholarship code -->
                                        </div>
                                        <div class="card-body">
                                            @if(Session::has('message-success'))
                                            <p class="alert alert-success" role="alert">
                                                <svg width="1.25em" height="1.25em" class="bi bi-shield-fill-check"
                                                    fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M8 .5c-.662 0-1.77.249-2.813.525a61.11 61.11 0 0 0-2.772.815 1.454 1.454 0 0 0-1.003 1.184c-.573 4.197.756 7.307 2.368 9.365a11.192 11.192 0 0 0 2.417 2.3c.371.256.715.451 1.007.586.27.124.558.225.796.225s.527-.101.796-.225c.292-.135.636-.33 1.007-.586a11.191 11.191 0 0 0 2.418-2.3c1.611-2.058 2.94-5.168 2.367-9.365a1.454 1.454 0 0 0-1.003-1.184 61.09 61.09 0 0 0-2.772-.815C9.77.749 8.663.5 8 .5zm2.854 6.354a.5.5 0 0 0-.708-.708L7.5 8.793 6.354 7.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z" />
                                                </svg>
                                                {{ Session::get('message-success') }}
                                            </p>
                                            @endif
                                            @if(Session::has('message-error'))
                                            <p class="alert alert-danger" role="alert">
                                                <svg width="1.25em" height="1.25em"
                                                    class="bi bi-exclamation-circle-fill" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                                </svg>
                                                {{ Session::get('message-error') }}
                                            </p>
                                            @endif
                                            <div class="table-responsive">
                                                <table id="myTable"
                                                    class="table table-bordered table-hover table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Full Name</th>
                                                            <th>Email</th>
                                                            <th>School Graduated</th>
                                                            <th>Employment Status</th>
                                                            <th>Scholarship Sponsor</th>
                                                            <th>Batch No</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($alumni_records as $alumni_records)
                                                        <tr>
                                                            <td>{{$alumni_records->id}}</td>
                                                            <?php
                                                            if (str_contains($alumni_records->middle_name, 'None')) {
                                                                $alumni_records->middle_name = ' ';
                                                            } else {
                                                                $alumni_records->middle_name = $alumni_records->middle_name;
                                                            }
                                                            ?>
                                                            <td>{{$alumni_records->first_name}}
                                                                {{$alumni_records->middle_name}}
                                                                {{$alumni_records->last_name}}
                                                            </td>
                                                            <td>{{$alumni_records->email}}</td>
                                                            <td>{{$alumni_records->school_graduated}}</td>
                                                            <td>{{$alumni_records->employment_status}}</td>
                                                            <td>{{$alumni_records->scholarship_sponsor}}</td>
                                                            <td>{{$alumni_records->batch_no}}</td>
                                                            <td>

                                                                <div class="btn-group" role="group"
                                                                    aria-label="Basic example">
                                                                    <a href="{{route('alumni.view',[
                                        'fname'=>$alumni_records->first_name, 
                                        'mi'=>$alumni_records->middle_name, 
                                        'lname'=>$alumni_records->last_name, 
                                        'gender'=>$alumni_records->gender, 
                                        'contact'=>$alumni_records->contact, 
                                        'email'=>$alumni_records->email, 
                                        'home'=>$alumni_records->home_address,
                                        'present'=>$alumni_records->present_address,
                                        'school'=>$alumni_records->school_graduated,
                                        'pending'=>$alumni_records->pending_offer,
                                        'status'=>$alumni_records->employment_status,
                                        'batch_no'=>$alumni_records->batch_no,
                                        'cname'=>$alumni_records->company_name,
                                        'location'=>$alumni_records->company_location,
                                        'title'=>$alumni_records->job_title,
                                        'work_arr'=>$alumni_records->work_arrangement,
                                        'date_hired'=>$alumni_records->date_hired,
                                        'updated_at'=>$alumni_records->updated_at
                                        ])}}" class="btn"><span class="fa fa-eye mr-3 text-center"
                                                                            style="color:dark"></span></a>
                                                                    <a href="/alumni_records/{{$alumni_records->id}}"
                                                                        class="btn "><span
                                                                            class="fa fa-edit mr-3 text-center"
                                                                            style="color:dark"></span></a>
                                                                    <form
                                                                        action="/alumni_records/{{$alumni_records->id}}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button class="btn"><span
                                                                                class="fa fa-trash mr-3 text-center"
                                                                                style="color:dark"></span></a></button>
                                                                    </form>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Start Add Modal --}}
                                    <div style="margin-top: 180px" class="modal fade" id="staticBackdrop"
                                        data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Import Excel</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="{{route('excel_import')}}" method="POST"
                                                    enctype="multipart/form-data" class="mt-3">
                                                    @csrf
                                                    <div class="mb-3" style="width: 4.8in;">
                                                        <label for="file">Choose CSV</label>
                                                        <input type="file" class="form-control" id="file" name="file">
                                                        <span class="text-danger">@error('file')
                                                            {{$message}} @enderror</span>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn bg-c-blue text-light"
                                                            style="width: 100px;">Import</button>
                                                        <button type="button" class="btn btn-danger"
                                                            data-bs-dismiss="modal" style="width: 100px">Close</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- End Add Modal --}}

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
    <script src="{{URL::asset('js/custom.js')}}"></script>
    <script src="{{URL::asset('js/jquery-3.5.1.js')}}"></script>
    <script src="{{URL::asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('js/dataTables.select.min.js')}}"></script>
    <script scr="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
    </script>
</body>

</html>
@endif