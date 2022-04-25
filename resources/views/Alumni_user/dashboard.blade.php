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
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/fresh-bootstrap-table.css')}}">


</head>

<body class='grey-bg'>

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
                </a>
                <h1><a href="index.html" class="logo ">Menu<span class="text-white">User: {{Auth::user()->name}}</span></a></h1>
                <br>
                <ul class="list-unstyled components mb-4">
                    <li class="active">
                        <a href="{{url('user_dashboard')}}"><span class="fa fa-home mr-3"></span> Dashboard</a>
                    </li>
                    <li>
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

        <div id="content" class="p-4 p-md-5 pt-5">

            <h1 class="h3 mb-0 text-gray-800 mb-4">Dashboard</h1>

            <div class="row">
                <div class="col-xl-6 ">
                    <div class="card overflow-hidden card1color">
                        <div class="card-content">
                            <div class="card-body cleartfix">
                                <div class="media align-items-stretch">
                                    <div class="align-self-center">
                                        <!-- <i class="fa fa-repeat fa-2x text-white font-large-2 mr-2"></i> -->
                                    </div>
                                    <div class="media-body">
                                        <h4 class="text-white"> Pending Offers</h4>
                                        <span class="text-white"> {{$user}} </span>
                                    </div>
                                    <div class="align-self-center">
                                        <h1 class="text-white"><i class="fa fa-repeat fa-1x text-white font-large-2 mr-2"></i></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 ">
                    <div class="card overflow-hidden card1color">
                        <div class="card-content">
                            <div class="card-body cleartfix">
                                <div class="media align-items-stretch">
                                    <div class="align-self-center">
                                        <i class=" fa fa-briefcase fa-2x text-white font-large-2 mr-2"></i>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="text-white"> Job Oppurtunities</h4>
                                        <span class="text-white"> Total Number of Job Oppurtunities</span>
                                    </div>
                                    <div class="align-self-center">
                                        <h1 class="text-white">{{$job_opportunities_count}}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- panel for Newly Hired Alumni -->

            <div class="fresh-table full-color-orange">
                <!--
          Available colors for the full background: full-color-blue, full-color-azure, full-color-green, full-color-red, full-color-orange
          Available colors only for the toolbar: toolbar-color-blue, toolbar-color-azure, toolbar-color-green, toolbar-color-red, toolbar-color-orange
        -->
                <div class="fresh-table datatable1color">
                    <div class="toolbar">
                        <br>
                        <h6 class="text-center text-light">Available Job Opportunities</h1>
                        <br>
                            <div class="btn_group text-center">
                                <a type="button" class="btn btn-primary text-center text-light" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    <span class="" style="color:dark"></span>
                                    <h6>View All</h6>
                                </a>
                                <br>
                            </div>
                    </div>

                    <table id="fresh-table " class="table text-light">
                        <thead>
                            <br>
                            <th>Company Name</th>
                            <th>Job Title</th>
                            <th>Role</th>
                            <th>Requirements</th>
                            <th>Location</th>
                            <th>Vacancy</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($job_opportunities as $job_opportunity)
                                <td>{{$job_opportunity->company_name}}</td>
                                <td>{{$job_opportunity->job_title}}</td>
                                <td>{{$job_opportunity->job_role}}</td>
                                <td>{{$job_opportunity->job_requirements}}</td>
                                <td>{{$job_opportunity->company_location}}</td>
                                <td>{{$job_opportunity->vacancy_no}}</td>
                                <td>{{$job_opportunity->status}}</td>
                                <?php
                                $date = $job_opportunity->created_at;
                                $phpdate = strtotime($date);
                                $date = date('D M d, Y', $phpdate);
                                ?>
                                <td>{{$date}}</td>
                                <td>
                                    <a href="{{route('post.show',['id'=>$job_opportunity->id,'c_name'=>$job_opportunity->company_name, 'title'=>$job_opportunity->job_title, 'role'=>$job_opportunity->job_role, 'reqs'=>$job_opportunity->job_requirements, 'location'=>$job_opportunity->company_location, 'vacancy'=>$job_opportunity->vacancy_no, 'status'=>$job_opportunity->status])}}"> <span class="fa fa-eye text-center" style="color:light"></span></a>
                                    <!-- <a href="/view_job/{{$job_opportunity->id}}" class="text-center" >
                                        <span class="fa fa-eye" style="color:black"></span>
                                    </a> -->
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- PANEL START CODE  -->

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 40%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Now Hiring Jobs!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" class="border shadow p-3 rounded">
                    @foreach ($job_opportunities as $job_opportunity)

                            <div class="col-md-12">
                                
                           
                                <div class="profile-card-6"><img src="https://media.istockphoto.com/photos/now-hiring-easel-recruitment-new-employee-workers-search-for-and-picture-id1317004880?b=1&k=20&m=1317004880&s=170667a&w=0&h=BTfw879pRGhNzBKjrxljh9hc1CVPrXLvwp4fszNJuBg=" class="img img-responsive">
                                    <div class="profile-name">{{$job_opportunity->company_name}}
                                        <br><h6>{{$job_opportunity->job_role}} {{$job_opportunity->job_title}}</h6>
                                        <br><br>
                                    </div>
                                    <div class="profile-position">{{$job_opportunity->company_location}}</div>
                                    <div class="profile-overview">
                                        <div class="profile-overview">
                                            <div class="row text-center">
                                                <div class="col-xs-4">
                                                    <h5>Status</h5>
                                                    <p>{{$job_opportunity->status}}</p>
                                                </div>
                                                <div class="col-xs-4">
                                                    <h5>Vacancy</h5>
                                                    <p>{{$job_opportunity->vacancy_no}}</p>
                                                </div>
                                                <div class="col-xs-4">
                                                    <h5>Job Requirements</h5>
                                                    <p>{{$job_opportunity->job_requirements}}</p>
                                                </div>
                                                <br>
                                                <div class="col-xs-12">
                                                <a href="{{route('post.show',['id'=>$job_opportunity->id,'c_name'=>$job_opportunity->company_name, 'title'=>$job_opportunity->job_title, 'role'=>$job_opportunity->job_role, 'reqs'=>$job_opportunity->job_requirements, 'location'=>$job_opportunity->company_location, 'vacancy'=>$job_opportunity->vacancy_no, 'status'=>$job_opportunity->status])}}"> <span class="" ></span><u style="color:rgba(255, 255, 255, 0.4)">Click here for more details</u></a>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                      
                    @endforeach
                </form>
            </div>
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