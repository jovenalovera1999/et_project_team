<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Employment Tracker | User Authentiction</title>

        <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
    </head>
    <body>
        <div style="margin-top: 100px">
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-sm-12">
                        <div class="card mt-5">
                            <div class="card-header text-center bg-c-pink">
                                <h2 class="text-white">Employment Tracker</h2>
                            </div>
                            <div class="row">
                                <div class="col-sm-7" style="margin-left: 12px">
                                    <form action="/login" method="POST" class="mt-3">
                                        @csrf
                                        @if(Session::has('message-success'))
                                        <p class="alert alert-success" role="alert">
                                            <svg width="1.25em" height="1.25em" class="bi bi-shield-fill-check" fill="currentColor">
                                                <path fill-rule="evenodd" d="M8 .5c-.662 0-1.77.249-2.813.525a61.11 61.11 0 0 0-2.772.815 1.454 1.454 0 0 0-1.003 1.184c-.573 4.197.756 7.307 2.368 9.365a11.192 11.192 0 0 0 2.417 2.3c.371.256.715.451 1.007.586.27.124.558.225.796.225s.527-.101.796-.225c.292-.135.636-.33 1.007-.586a11.191 11.191 0 0 0 2.418-2.3c1.611-2.058 2.94-5.168 2.367-9.365a1.454 1.454 0 0 0-1.003-1.184 61.09 61.09 0 0 0-2.772-.815C9.77.749 8.663.5 8 .5zm2.854 6.354a.5.5 0 0 0-.708-.708L7.5 8.793 6.354 7.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                                            </svg>
                                            {{ Session::get('message-success') }}
                                        </p>
                                        @endif
                                        @if(Session::has('message-error'))
                                        <p class="alert alert-danger" role="alert">
                                            <svg width="1.25em" height="1.25em" class="bi bi-exclamation-circle-fill" fill="currentColor">
                                                <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                                            </svg>
                                            {{ Session::get('message-error') }}
                                        </p>
                                        @endif
                                        @if(!Auth::check())
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}" placeholder="Please input your email">
                                            <span class="text-danger">@error('email') {{$message}} @enderror</span>
                                        </div>
                                        @else
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="text" class="form-control" id="email" name="email" value="{{Auth::user()->email}}" placeholder="Please input your email">
                                            <span class="text-danger">@error('email') {{$message}} @enderror</span>
                                        </div>
                                        @endif
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Please input your password">
                                            <span class="text-danger">@error('password') {{$message}} @enderror</span>
                                        </div>
                                        <div class="mb-3 text-center">
                                            <button type="submit" class="btn btn-primary color-theme text-white" style="width: 200px">Login</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col" style="margin-right: 12px">
                                    <img src="images/coders_tribe_primary_logo.png"
                                    alt="Ninja Tribe Solutions Inc." style="width: 100%">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{URL::asset('js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
        <script src="{{URL::asset('js/jquery-3.5.1.js')}}"></script>
        <script src="{{URL::asset('js/custom.js')}}"></script>
    </body>
</html>