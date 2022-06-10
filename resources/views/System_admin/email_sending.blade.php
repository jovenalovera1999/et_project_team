@if(!Auth::check() || Auth::user()->user_type != 'Administrator')
<meta http-equiv="refresh" content="0; url=/login" />
@else
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employment Tracker | Job Opportunities</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" class="rel">
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.25.1/ui/trumbowyg.min.css" rel="stylesheet">
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
                    <li class="active">
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
            <div id="content" class="p-4 p-md-5 pt-5">
                <div class="container mr-10">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <h5 class="card-header bg-c-blue text-white">Emails</h5>
                                    <div class="card-body">
                                        <div class="table-responsive p-2">
                                            <table id="emailTable" class="table table-bordered table-hover table-striped">
                                                <thead class="text-dark">
                                                    <tr>
                                                        <div class="row">
                                                            <div class="col p-1 ml-2">
                                                                <select class="form-control filter-select" data-column="4">
                                                                    <option value="">Filter Batch Number</option>
                                                                    <option value="">Reset</option>
                                                                    @foreach($batch_no as $batch_number)
                                                                    <option value="{{ $batch_number }}">{{ $batch_number }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col p-1">
                                                                <select class="form-control filter-select" data-column="5">
                                                                    <option value="">Filter Scholarship Sponsor</option>
                                                                    <option value="">Reset</option>
                                                                    @foreach($scholarship_sponsor as $sponsor)
                                                                    <option value="{{ $sponsor }}">{{ $sponsor }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                        </div>
                                                    </tr>
                                                    <tr>
                                                        <th><input type="checkbox" name="select_all" value="1" id="select_all"></th>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th style="width:20%;">Email</th>
                                                        <th style="width:10%;">Batch No.</th>
                                                        <th style="width:10%;">Scholarship Sponsors</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="records">
                                                    @foreach($alumni_records as $alumni_record)
                                                    <tr>
                                                        <td><input type="checkbox" name="email" id="checkbox_each" value="{{$alumni_record->email}}"></td>
                                                        <td>{{$alumni_record->id}}</td>
                                                        @if(str_contains($alumni_record->middle_name, 'None'))
                                                        <td>{{$alumni_record->first_name}} {{$alumni_record->last_name}}</td>
                                                        @else
                                                        <td>{{$alumni_record->first_name}} {{$alumni_record->middle_name[0].'.'}} {{$alumni_record->last_name}}</td>
                                                        @endif
                                                        <td>{{$alumni_record->email}}</td>
                                                        <td>{{$alumni_record->batch_no}}</td>
                                                        <td>{{$alumni_record->scholarship_sponsor}}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <h5 class="card-header bg-c-pink text-white">Compose Email</h5>
                                    <div class="card-body">
                                        <form class="needs-validation" method="POST" action="/send_email">
                                            @csrf
                                            @if(Session::has('msg'))
                                            <div class="alert alert-success alert-dismissible fade show">{{session('msg')}}</div>
                                            @endif
                                            <div class="form-group">
                                                <label for="emailaddress">Email address</label>
                                                <textarea type="text" class="form-control" id="emailaddress" name="emailaddress" placeholder="Input email/s here..."></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="subject">Subject</label>
                                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject">
                                            </div>
                                            <div class="form-group">
                                                <label for="message">Message</label>
                                                <textarea type="text" class="form-control" id="message" name="message" placeholder="Your message"></textarea>
                                            </div>
                                            <input class="btn bg-c-blue text-light btn-lg btn-block" type="submit" value="Send">
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

    <script src="{{URL::asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('js/jquery.min.js')}}"></script>
    <script src="{{URL::asset('js/main.js')}}"></script>
    <script src="{{URL::asset('js/custom.js')}}"></script>
    <script src="{{URL::asset('js/jquery-3.5.1.js')}}"></script>
    <script src="{{URL::asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.25.1/trumbowyg.min.js"></script>

    <script>
        $(document).ready(function() {
            var table = $('#emailTable').DataTable({
                processing: true,
                'order': [
                    [1, 'asc']
                ]
            });

            $('.filter-select').change(function() {
                table.column($(this).data('column'))
                    .search($(this).val())
                    .draw();
            });

            // Handle click on "Select all" control
            $('#select_all').on('click', function() {
                // Get all rows with search applied
                var rows = table.rows({
                    'search': 'applied'
                }).nodes();
                // Check/uncheck checkboxes for all rows in the table
                $('input[type="checkbox"]', rows).prop('checked', this.checked);
                GetEmail();
            });

            $('#records').on('change', 'input[type="checkbox"]', function() {
                if (!this.checked) {
                    var el = $('#select_all').get(0);
                    // If "select all" control is checked and has 'indeterminate' property
                    if (el && el.checked && ('indeterminate' in el)) {
                        // Set visual state of "select all" control
                        // as 'indeterminate'
                        el.indeterminate = true;
                    }
                }
                GetEmail();
            });

            function GetEmail() {
                $('#emailaddress').text('');
                var rows = table.rows({
                    'search': 'applied'
                }).nodes();
                $('input[id="checkbox_each"]', rows).each(function() {
                    if (this.checked) {
                        let old_text = $('#emailaddress').text() ? $('#emailaddress').text() + ', ' : '';
                        $('#emailaddress').text(old_text + $(this).val());
                    }
                });
            }

            //Importing Trumboywg
            $('#message').trumbowyg();
        });
    </script>
</body>

</html>
@endif