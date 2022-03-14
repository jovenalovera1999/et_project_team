<html>
    <head>
        <title>Employment Tracker System | Dashboard</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
    </head>

    <body>
        <!-- Image and text -->
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="#">
                <img src="https://assets.bossjob.com/companies/21474/logo/xaSv8AIGbPUh8qadfHgH6mc4HXXQTNkucUgu5wdM.png" width="100" height="100" class="d-inline-block align-top" alt="">
            </a>
            <img src="https://i.pinimg.com/736x/b8/69/5f/b8695f007aea9a08a0419479217ca6aa.jpg" width="100" height="100" class="d-inline-block align-top float-right" alt="">
        </nav>
        <div class="col-2 float-left bg-primary">
            <div class="position-sticky sidebar-sticky bg-primary">
                <div class="list-group list-group-flush mx-3 mt-4">
                    <h1 class="text-white bg-dark text-center">Menu</h1>
                    <a
                    href="#"
                    class="list-group-item list-group-item-action py-2 ripple bg-primary text-white"
                    aria-current="true"
                    >
                    <i class="bi bi-building"></i>
                    <span>Company</span>
                    </a>
                    <a
                    href="#"
                    class="list-group-item list-group-item-action py-2 ripple bg-primary text-white"
                    >
                    <i class="bi bi-card-heading"></i>
                    <span>Job Title</span>
                    </a>
                    <a
                    href="#"
                    class="list-group-item list-group-item-action py-2 ripple bg-primary text-white"
                    ><i class="bi bi-hash"></i><span>No. of Vacancy</span></a
                    >
                    <a
                    href="#"
                    class="list-group-item list-group-item-action py-2 ripple bg-primary text-white"
                    ><i class="bi bi-clipboard-check"></i></i
                    ><span>Job Requirements</span></a
                    >
                    <a
                    href="#"
                    class="list-group-item list-group-item-action py-2 ripple bg-primary text-white"
                    >
                    <i class="bi bi-code"></i><span>Job Role</span>
                    </a>
                    <a
                    href="#"
                    class="list-group-item list-group-item-action py-2 ripple bg-primary text-white"
                    ><i class="bi bi-binoculars"></i><span>Company Location</span></a
                    >
                    <a
                    href="#"
                    class="list-group-item list-group-item-action py-2 ripple bg-primary text-white"
                    ><i class="bi bi-file-person-fill"></i><span>Employment Status</span></a
                    >
                </div>
            </div>
        </div>
        <div class="col-10 float-left">
            <form action="">
                <h1 class="text-primary">NOW HIRING</h1>
                <div class="col-6 float-left">
                    <div class="form-group">
                        <input type="text" name="company" class="form-input" placeholder="Company">
                    </div>
                </div>
                <div class="col-6 float-right">
                    <div class="form-group">
                        <input type="text" name="job_tite" class="form-input" placeholder="Job Title">
                    </div>
                </div>
                <div class="col-6 float-left">
                    <div class="form-group">
                        <input type="text" name="no_of_vacancy" class="form-input" placeholder="No. of Vacancy">
                    </div>
                </div>
                <div class="col-6 float-right">
                    <div class="form-group">
                        <input type="text" name="job_requirements" class="form-input" placeholder="Job Requirements">
                    </div>
                </div>
                <div class="col-6 float-left">
                    <div class="form-group">
                        <input type="text" name="job_role" class="form-input" placeholder="Job Role">
                    </div>
                </div>
                <div class="col-6 float-right">
                    <div class="form-group">
                        <input type="text" name="company_location" class="form-input" placeholder="Company Location">
                    </div>
                </div>
                <div class="col-6 float-left">
                    <div class="form-group">
                        <input type="text" name="employment_status" class="form-input" placeholder="Employment Status">
                    </div>
                </div>
            </form>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
        <script src="URL::asset('js/custom.js')"></script>
    </body>
</html>