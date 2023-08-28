
<!DOCTYPE html>
<html lang="en">
   
<!-- Mirrored from androthemes.com/themes/html/medjestic/pages/prebuilt-pages/default-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Apr 2023 21:01:20 GMT -->
<head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width,initial-scale=1">
      <title>O'RBS MEDICA | {{ $title }}</title>
      <!-- Iconic Fonts -->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link href="{{ url('') }}/vendors/iconic-fonts/font-awesome/css/all.min.css" rel="stylesheet">
      <link rel="stylesheet" href="{{ url('') }}/vendors/iconic-fonts/flat-icons/flaticon.css">
      <link rel="stylesheet" href="{{ url('') }}/vendors/iconic-fonts/cryptocoins/cryptocoins.css">
      <link rel="stylesheet" href="{{ url('') }}/vendors/iconic-fonts/cryptocoins/cryptocoins-colors.css">
      <!-- Bootstrap core CSS -->
      <link href="{{ url('') }}/assets/css/bootstrap.min.css" rel="stylesheet">
      <!-- jQuery UI -->
      <link href="{{ url('') }}/assets/css/jquery-ui.min.css" rel="stylesheet">
      <!-- Medjestic styles -->
      <link href="{{ url('') }}/assets/css/style.css" rel="stylesheet">
      @yield('css-library')
      @yield('css-custom')

      <!-- Favicon -->
      <link rel="icon" type="image/png" sizes="32x32" href="{{ url('') }}/assets/img/logo.jpg">
   </head>
   <body class="ms-body ms-primary-theme ms-logged-out">
      
      <!-- Main Content -->
      <main class="body-content">
        @yield('content')
      </main>
      <!-- SCRIPTS -->
      <!-- Global Required Scripts Start -->
      <script src="{{ url('') }}/assets/js/jquery-3.3.1.min.js"></script>
      <script src="{{ url('') }}/assets/js/popper.min.js"></script>
      <script src="{{ url('') }}/assets/js/bootstrap.min.js"></script>
      <script src="{{ url('') }}/assets/js/perfect-scrollbar.js"> </script>
      <script src="{{ url('') }}/assets/js/jquery-ui.min.js"> </script>
      <!-- Global Required Scripts End -->
      <!-- Medjestic core JavaScript -->
      <script src="{{ url('') }}/assets/js/framework.js"></script>
      <!-- Settings -->
      <script src="{{ url('') }}/assets/js/settings.js"></script>
      @yield('js-library')
      @yield('js-custom')
   </body>

<!-- Mirrored from androthemes.com/themes/html/medjestic/pages/prebuilt-pages/default-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Apr 2023 21:01:23 GMT -->
</html>
