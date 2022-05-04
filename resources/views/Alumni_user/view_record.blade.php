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
        <style>.nav-bk5{
background: #0575E6;  
background: -webkit-linear-gradient(to right, #021B79, #0575E6);  
background: linear-gradient(to left, #021B79, #0575E6);}
.nav-bk7{
background: #c2e59c;  
background: -webkit-linear-gradient(to right, #64b3f4, #c2e59c);  
background: linear-gradient(to right, #64b3f4, #c2e59c); }
.nav-bk2{
 
 background: #23074d; 
  
 background: -webkit-linear-gradient(to right, #cc5333, #23074d); 
  
 background: linear-gradient(to right, #cc5333, #23074d);
  
  
  
 }

</style>
        
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
                <h6 class="logo"style="margin-top: 20px;"><span class="text-white font-user">{{Auth::user()->name}}</span></h6>
                <!-- <h6 class="logo"><span class="text-white font-user">Logged In User</span></h6> -->
                </div>
                <br><br>
                <h1><a href="index.html" class="logo ">Menu</a></h1>
                    <ul class="list-unstyled components mb-4">
                        <li>
                            <a href="user_dashboard"><span class="fa fa-home mr-3"></span> Dashboard</a>
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
            <div id="content" class="p-4 p-md-5 pt-5">
            <div class="container"> <div>

                                <div class="card nav-bk7" style="width: 8.4in;" >
                                    <div class="card-header text-left">
                            <table class="table"><link rel="stylesheet" type="text/css" href="{{asset('css/alumni.css') }}">
                        <!--<tbody><tr class="table_row logo">
                            <td class="table_column logo">
                                <img src="">
                                <p>Alumni Records View</p>
                            </td>
                        </tr>-->
                        
                        <tr class="table_row table_part ">              
                            

         
                            <td class="table_column nav-bk5">
  
                                PERSONAL INFORMATION
                                <div class="float-right card-header ">
                                    <a href="alumni_view/create" class="btn btn-success">Edit</a>
                                </div>
                            </td>
                        </tr>
                        <tr class="table_row ">
                            <td class="table_column table_head text-align='center' m-column ">
                                 USER ID
                            </td>
                            <td class="table_column m-column">
                                {{$alumni_user1 -> user_id}}
                            </td>
                            <td class="table_column p-column">
                               <img src="images/paulo1.jpg" td="">
                        </td></tr>
                       
                        <tr class="table_row  ">
                            <td class="table_column table_head m-column">
                                FIRST NAME
                            </td>
                            <td class="table_column m-column">
                                {{ ucfirst($alumni_user1 -> first_name) }}
                            </td>
                            <td class="table_column table_head m-column ">
                                MIDDLE NAME
                            </td>
                            <td class="table_column  m-column">
                                {{ ucfirst($alumni_user1 -> middle_name) }}
                           </td>
                            <td class="table_column table_head m-column ">
                                LAST NAME
                            </td>
                            <td class="table_column m-column">
                                {{ ucfirst($alumni_user1 -> last_name) }}
                            </td>
                        </tr>
                        <tr class="table_row clearfix">
                            <td class="table_column table_head s-column ">
                                Gender
                            </td>
                            <td class="table_column table_head s-column ">
                                Contact
                            </td>
                            <td class="table_column table_head s-column ">
                                Email
                            </td>
                            <td class="table_column s-column">
                                {{ ucfirst($alumni_user1 -> gender) }}
                            </td>
                            <td class="table_column s-column">
                                 {{$alumni_user1 -> contact}}
                            </td>
                            <td class="table_column s-column">
                                {{$alumni_user1 -> email}}
                            </td>
                        </tr>
                        <tr class="table_row clearfix">
                            <td class="table_column table_head s-column ">
                                Home Address
                            </td>
                            <td class="table_column table_head s-column ">
                                Present Address
                            </td>
                            <td class="table_column table_head s-column ">
                                School Graduated
                            </td>
                            <td class="table_column s-column">
                                {{ ucfirst($alumni_user1 -> home_address) }}
                            </td>
                            <td class="table_column s-column">
                                {{ ucfirst($alumni_user1 -> present_address) }}
                            </td>
                            <td class="table_column s-column">
                                {{ ucfirst($alumni_user1 -> school_graduated) }}
                            </td>
                        </tr>
                        <tr class="table_row clearfix">
                            <td class="table_column table_head s-column ">
                                Batch Number
                            </td>
                            <td class="table_column table_head s-column ">
                                Pending Offer
                            </td>
                            <td class="table_column table_head s-column ">
                                Employment Status
                            </td>
                            <td class="table_column s-column">
                                {{$alumni_user1 -> batch_no}}
                            </td>
                            <td class="table_column s-column">
                                 {{$alumni_user1 -> pending_offer}}
                            </td>
                            <td class="table_column s-column">
                                {{$alumni_user1 -> employment_status}}
                            </td>
                        </tr>
                        
                        <tr class="table_row clearfix">
                            <td class="table_column table_head s-column ">
                                Company Name
                            </td>
                            <td class="table_column table_head s-column ">
                                Company Location
                            </td>
                            <td class="table_column table_head s-column ">
                                Job Title
                            </td>
                            <td class="table_column s-column">
                                {{ ucfirst($alumni_user1 -> company_name) }}
                            </td>
                            <td class="table_column s-column">
                                {{ ucfirst($alumni_user1 -> company_location) }}
                            </td>
                            <td class="table_column s-column">
                                {{ ucfirst($alumni_user1 -> job_title) }}
                            </td>
                        </tr>
                        <!--<tr class="table_row ">
                            <td class="table_column table_head m-column ">
                              Profile Picture
                            </td>
                           
                            <td class="table_column m-column">
                                images/paulo1.jpeg
                            </td>
                           
                        </tr>
                        <tr class="table_row clearfix">
                            <td class="table_column table_head s-column ">
                              Date Created
                            </td>
                            <td class="table_column table_head s-column ">
                              Date Updated
                            </td>
                            <td class="table_column s-column">
                                00-0000-00
                            </td>
                            <td class="table_column s-column">
                                00-0000-00
                            </td>
                        </tr>-->
                        </tbody></table>
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