<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $page_title }} - {{ $site_title }}</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ config('constants.__SITECONTROL_ASSETS') }}css/bootstrap.css">

    <link rel="stylesheet" href="{{ config('constants.__SITECONTROL_ASSETS') }}vendors/iconly/bold.css">
    <link rel="stylesheet" href="{{ config('constants.__SITECONTROL_ASSETS') }}vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="{{ config('constants.__SITECONTROL_ASSETS') }}vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ config('constants.__SITECONTROL_ASSETS') }}vendors/simple-datatables/style.css">
    
    <link rel="stylesheet" href="{{ config('constants.__SITECONTROL_ASSETS') }}css/app.css">

    <link rel="stylesheet" href="{{ config('constants.__SITECONTROL_ASSETS') }}css/custom.css">
    
    <link rel="shortcut icon" href="{{ config('constants.__SITECONTROL_ASSETS') }}images/favicon.svg" type="image/x-icon">
</head>
<body>

  <div id="app">
    
    @include('sitecontrol.includes.sidebar')
    
    <div id="main">
      <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
      </header>
      <div class="page-heading">
          <h3>{{ $page_title }}</h3>
          <div class="page-content">
            @include($view_directory . $view)
          </div>
      </div>
      <footer>
          <div class="footer clearfix mb-0 text-muted">
              <div class="float-start">
                  <p>{{ date('Y') }} &copy; LaraCMS</p>
              </div>
          </div>
      </footer>
      
      @if(session()->has('message'))
        <div class="notification_messages">
          <div class="alert alert-light-{{session()->get('type')}} color-{{session()->get('type')}}">
            <h4 class="color-{{session()->get('type')}}">{{session()->get('title')}}</h4>
            <p class="color-{{session()->get('type')}}">{{ session()->get('message') }}</p>
          </div>
        </div>
      @endif

    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="{{ config('constants.__SITECONTROL_ASSETS') }}vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <script src="{{ config('constants.__SITECONTROL_ASSETS') }}js/bootstrap.bundle.min.js"></script>

  <script src="{{ config('constants.__SITECONTROL_ASSETS') }}vendors/simple-datatables/simple-datatables.js"></script>
  <script src="{{ config('constants.__SITECONTROL_ASSETS') }}vendors/apexcharts/apexcharts.js"></script>
  <script src="{{ config('constants.__SITECONTROL_ASSETS') }}vendors/tinymce/tinymce.min.js"></script>

  <script src="{{ config('constants.__SITECONTROL_ASSETS') }}js/pages/dashboard.js"></script>

  <script src="{{ config('constants.__SITECONTROL_ASSETS') }}js/main.js"></script>
  <script src="{{ config('constants.__SITECONTROL_ASSETS') }}js/custom.js"></script>
</body>
</html>