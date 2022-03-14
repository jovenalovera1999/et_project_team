<html>
    <head>
        <title>Employment Tracker System | Dashboard</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
    </head>

    <body>
        <div class="col">
            <h1 class="text-primary text-center">EMPLOYMENT STATUS</h1>
            <img src="https://www.pngitem.com/pimgs/m/508-5087336_person-man-user-account-profile-employee-profile-template.png" style="width: 230px">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="school_graduated">School Graduated</label>
                        <input type="text" name="school_graduated" id="school_graduated" class="form-input">
                    </div>
                </div>
                <div class="col ">
                    <div class="form-group">
                        <label for="batch_no">Batch No.</label>
                        <input type="text" name="batch_no" id="batch_no" class="form-input">
                    </div>
                </div>
                <div class="col ">
                    <div class="form-group">
                        <label for="sponsor">Sponsor</label>
                        <input type="text" name="sponsor" id="sponsor" class="form-input">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col ">
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" id="first_name" class="form-input">
                    </div>
                </div>
                <div class="col ">
                    <div class="form-group">
                        <label for="middle_name">Middle Name</label>
                        <input type="text" name="middle_name" id="middle_name" class="form-input">
                    </div>
                </div>
                <div class="col ">
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" id="last_name" class="form-input">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col ">
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <input type="text" name="gender" id="gender" class="form-input">
                    </div>
                </div>
                <div class="col ">
                    <div class="form-group">
                        <label for="contact_no">Contact No.</label>
                        <input type="text" name="contact_no" id="contact_no" class="form-input">
                    </div>
                </div>
                <div class="col ">
                    <div class="form-group">
                        <label for="home_address">Home Address</label>
                        <input type="text" name="home_address" id="home_address" class="form-input">
                    </div>
                </div>
                <div class="col ">
                    <div class="form-group">
                        <label for="present_address">Present Address</label>
                        <input type="text" name="present_address" id="present_address" class="form-input">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col ">
                    <div class="form-group">
                        <label for="company_name">Company Name</label>
                        <input type="text" name="company_name" id="company_name" class="form-input">
                    </div>
                </div>
                <div class="col ">
                    <div class="form-group">
                        <label for="company_location">Company Location</label>
                        <input type="text" name="company_location" id="company_location" class="form-input">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col ">
                    <div class="form-group">
                        <label for="job_title">Job Title</label>
                        <input type="text" name="job_title" id="job_title" class="form-input">
                    </div>
                </div>
                <div class="col ">
                    <div class="form-group">
                        <label for="work_management">Work Management</label>
                        <input type="text" name="work_management" id="work_management" class="form-input">
                    </div>
                </div>
            </div>
            <div class="row float-right">
                <div class="btn-group btn-group-lg" role="group">
                    <button type="button" class="btn btn-success" disabled>Save</button>
                    <button type="button" class="btn btn-primary">Edit</button>
                    <button type="button" class="btn btn-danger">Back</button>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
        <script src="URL::asset('js/custom.js')"></script>
    </body>
</html>