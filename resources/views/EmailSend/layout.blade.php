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
  <link rel="stylesheet" href="{{URL::asset('css/jquery.dataTables.min.css')}}">
  <!-- <link rel="stylesheet" href="{{URL::asset('css/dataTables.checkboxes.css')}}">
  <link rel="stylesheet" href="{{URL::asset('css/dataTables.min.css')}}"> -->
  <link rel="stylesheet" href="{{URL::asset('css/select.dataTables.min.css')}}">
  <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
  <link rel="stylesheet" href="{{URL::asset('css/trumbowyg.min.css')}}">
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
        <h1><a href="#" class="logo">Menu <span>Logged In: {{Auth::user()->name}}</span></a></h1>
        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="{{url('admin_dashboard')}}"><i class="fa fa-home mr-3"></i> Dashboard</a>
          </li>
          <li>
            <a href="alumni_records"><span class="fa fa-user mr-3"></span> Alumni Records</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-briefcase mr-3"></span> Job Opportunity</a>
          </li>
          <li>
            <a href="scholarship_sponsors"><span class="fa fa-cloud-upload mr-3"></span>Scholarship Sponsors</a>
          </li>
          <li>
            <a href="{{url('email')}}"><span class="fa fa-paper-plane mr-3"></span> Email</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-sticky-note mr-3"></span> Reports</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-cloud-upload mr-3"></span> Alumni Portal</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-address-book-o mr-3"></span> Contacts</a>
          </li>
          <li>
            <a href="/logout/{{Auth::user()->id}}"><span class="fa fa-sign-out mr-3"></span> Logout</a>
          </li>
        </ul>
        <div class="footer"></div>
      </div>
    </nav>

    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-4 pt-5">
      @yield('content')
    </div>
  </div>
  <script src="{{URL::asset('js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
  <script src="{{URL::asset('js/jquery.min.js')}}"></script>
  <script src="{{URL::asset('js/main.js')}}"></script>
  <script src="{{URL::asset('js/popper.js')}}"></script>
  <script src="{{URL::asset('js/custom.js')}}"></script>
  <script src="{{URL::asset('js/jquery-3.5.1.js')}}"></script>
  <script src="{{URL::asset('js/dataTables.checkboxes.min.js')}}"></script>
  <script src="{{URL::asset('js/jquery.dataTables.min.js')}}"></script>
  <script src="{{URL::asset('js/dataTables.select.min.js')}}"></script>
  <script src="{{URL::asset('js/trumbowyg.min.js')}}"></script>
  <script>
    $(document).ready(function() {
      $('#emailtb').DataTable({
        //   columnDefs: [{
        //     orderable: false,
        //     className: 'select-checkbox',
        //     targets: 0,
        //     checkboxes: {
        //       selectRow: true
        //   }
        // }],
        //   select: {
        //     style: 'multi',
        //     selector: 'td:first-child'
        //   },
        order: [
          [1, 'asc']
        ]
      });
      $("#select_all").on('click', function() {
        if ($(this).prop('checked')) {
          $('.select-checkbox').each(function() {
            $(this).prop('checked', true);
          });
        } else {
          $('.select-checkbox').each(function() {
            $(this).prop('checked', false);
          });
        }
      });
      //Importing Trumbowyg
      $("#message").trumbowyg();
      $.get(svgPath, function(data) {
        div.innerHTML = new XMLSerializer().serializeToString(data.documentElement);
      });

      function updateTextArea() {
        var allVals = [];
        $('#alluser :checked').each(function() {
          allVals.push($(this).val());
        });
        $('#emailaddress').val(allVals);
      }
      $(function() {
        $('#select_all').click(updateTextArea);
        updateTextArea();
      });
    });
  </script>

</body>

</html>
@endif