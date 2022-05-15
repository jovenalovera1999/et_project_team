@if(!Auth::check() || Auth::user()->user_type != 'Administrator')
<meta http-equiv="refresh" content="0; url=/login" />
@else
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employment Tracker | Add Job Oppotunities</title>
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
                <h6 class="logo " style="margin-top: 20px;"><span class="text-white font-user">{{Auth::user()->name}}</span></h6>
                    <h5 class="logo"><span class="text-white font-user">Administrator</span></h5>
                </div>
                <br>
                <h1><a href="index.html" class="logo ">Menu</a></h1>
                <ul class="list-unstyled components mb-4">
                    <li>
                        <a href="/admin_dashboard"><span class="fa fa-home mr-3"></span> Dashboard</a>
                    </li>
                    <li>
                        <a href="/alumni_records"><span class="fa fa-user mr-3"></span> Alumni Records</a>
                    </li>
                    <li class="active">
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
                        <a href="/logout/{{Auth::user()->id}}"><span class="fa fa-sign-out mr-3"></span> Logout</a>
                    </li>
                </ul>
                <div class="footer"></div>
            </div>
        </nav>

            <body>
                <div class="wrapper d-flex align-items-stretch">
                    <!-- Page Content  -->
                    
                    <div id="content" class="p-4 p-md-5 pt-5">
                        <div>
                            <div class="container mr-10">
                                <div class="contaciner">
                                <div class="row">
                                    <div class="col-lg-10 mx-auto">
                                        <div class="card">
                                            <div class="card-header bg-c-pink">
                                              <div class="float-left"> 
                                                  <h3 class="text-white">Add Job Opportunities Details</h3>
                                                  </div>
                                                  <div class="float-right">
                                                      <a href="/job_opportunities" class="btn btn-danger">Cancel</a>
                                                  </div>
                                              </div>
                                            <form action="/job_opportunities" method="POST">
                                              @csrf
                                            <div class="card-body"> 
                                                <div class="row">
                                                        <div class="col-lg-12">
                                                          <div class="form-group">
                                                            <label for="">Company Name</label>
                                                            <Input type="text" name="company_name" class="form-control" value="{{old('company_name')}}">
                                                            <span class="text-danger">@error('company_name') {{$message}} @enderror</span>
                                                          </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                          <div class="form-group">
                                                            <label for="">Job Title</label>
                                                            <Input type="text" name="job_title" class="form-control" value="{{old('job_title')}}">
                                                            <span class="text-danger">@error('job_title') {{$message}} @enderror</span>
                                                          </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                          <div class="form-group">
                                                            <label for="">Job Role</label>
                                                            <Input type="text" name="job_role" class="form-control" value="{{old('job_role')}}">
                                                            <span class="text-danger">@error('job_role') {{$message}} @enderror</span>
                                                          </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                          <div class="form-group">
                                                            <label for="">Job Requirements</label>
                                                            <!-- <Input type="text" name="job_requirements" class="form-control"> -->
                                                            <textarea rows="4" cols="54" id="keterangan" name="job_requirements"
                                                            class="form-control" style="resize: none">{{old('job_requirements')}}</textarea>
                                                            <span class="text-danger">@error('job_requirements') {{$message}} @enderror</span>
                                                          </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                          <div class="form-group">
                                                            <label for="">Company Location</label>
                                                            <Input type="text" name="company_location" class="form-control" value="{{old('company_location')}}">
                                                            <span class="text-danger">@error('company_location') {{$message}} @enderror</span>
                                                          </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                          <div class="form-group">
                                                            <label for="">Non. of Vacancy</label>
                                                            <Input type="number" name="vacancy_no" class="form-control" value="{{old('vacancy_no')}}">
                                                            <span class="text-danger">@error('vacancy_no') {{$message}} @enderror</span>
                                                          </div>
                                                        </div>

                                                        <!-- This is the first Status 'Working' -->

                                                       <!-- <div class="col-lg-12">
                                                          <div class="form-group">
                                                            <label for="">Status</label>
                                                            <Input type="text" name="status" class="form-control">
                                                          </div>
                                                        </div> -->


                                                        <!-- This is the 2nd Status w/ checkbox. -->

                                                        <div class="col-lg-12">
                                                          <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="check" id="status" name="status">
                                                            <label class="form-check-label" for="status">
                                                              Status
                                                            </label>
                                                          </div>
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                              <button type="submit" class="btn btn-primary color-theme">Save New Job Opportunity</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                            <!-- panel for Newly Hired Alumni -->
            <link rel="stylesheet" type="text/css" href="{{ asset('css/datatable_jobopportunity.css') }}">
           
            </body>

</html>
</div>
</div>

<script src="{{URL::asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('js/jquery.min.js')}}"></script>
<script src="{{URL::asset('js/main.js')}}"></script>
<script src="{{URL::asset('js/popper.js')}}"></script>
<script src="{{URL::asset('js/custom.js')}}"></script>
</body>

</html>
@endif