<html>
    <head>
        <title>Employment Tracker System | User Authentication</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
        <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
    </head>

    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div style="margin-top: 170px">
                    <div class="card mt-5">
                        <div class="card-header">
                            <h2 class="text-center">NINJA TRIBE</h2><br><h2 class="text-center">EMPLOYMENT TRACKER SYSTEM</h2>
                        </div>
                        <div class="card-body">
                            <div class="login-form">
                                <form action="/login" class="form">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <input type="text" name="username" class="form-input" placeholder="Username">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password" class="form-input" placeholder="Password">
                                            </div>
                                            <div class="mb-3">
                                                Don't have an Account? <a href="#">Register</a>
                                            </div>
                                            <div class="btn-group dropright">
                                                <button type="submit" class="btn btn-primary">
                                                    Submit
                                                </button>
                                                <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                </button>
                                                <div class="dropdown-menu">
                                                    <!-- Dropdown menu links -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="text-center">
                                                <img src="https://assets.bossjob.com/companies/21474/logo/xaSv8AIGbPUh8qadfHgH6mc4HXXQTNkucUgu5wdM.png" style="width: 190px;">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    </body>
</html>