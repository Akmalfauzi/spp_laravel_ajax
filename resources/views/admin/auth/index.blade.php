<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ urlTemplate() }}assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ urlTemplate() }}assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ urlTemplate() }}assets/modules/bootstrap-social/bootstrap-social.css">
  <link rel="stylesheet" href="{{ urlTemplate() }}assets/modules/izitoast/css/iziToast.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ urlTemplate() }}assets/css/style.css">
  <link rel="stylesheet" href="{{ asset('css/custom.css')}}">
  <link rel="stylesheet" href="{{ urlTemplate() }}assets/css/components.css">

</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Login</h4></div>

              <div class="card-body">
                <form method="POST" action="{{ url('login/post') }}">
                    @csrf
                  <div class="form-group">
                    <label for="email">Username</label>
                    <input id="email" type="text" class="form-control" name="name" tabindex="1" required autofocus>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="password" class="control-label">Password</label>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>

                  </div>


                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>


              </div>
            </div>
 
            <div class="simple-footer">
              Copyright &copy; Akmal 2020
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="{{ urlTemplate() }}assets/modules/jquery.min.js"></script>
  <script src="{{ urlTemplate() }}assets/modules/popper.js"></script>
  <script src="{{ urlTemplate() }}assets/modules/tooltip.js"></script>
  <script src="{{ urlTemplate() }}assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="{{ urlTemplate() }}assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="{{ urlTemplate() }}assets/modules/moment.min.js"></script>
  <script src="{{ urlTemplate() }}assets/js/stisla.js"></script>
  <script src="{{ urlTemplate() }}assets/modules/izitoast/js/iziToast.min.js"></script>

  <script>
    $(function(){
        @if(Session::has('error'))
        iziToast.error({
            title: 'Gagal!',
            message: 'Masukkan username dan password dengan benar!',
            theme: 'dark',
            backgroundColor: 'red',
            position: 'topRight',
            timeout: 4000
        });
        @endif
    });
  </script>
  
  <!-- JS Libraies -->

  <!-- Page Specific JS File -->
  
  <!-- Template JS File -->
  <script src="{{ urlTemplate() }}assets/js/scripts.js"></script>
  <script src="{{ urlTemplate() }}assets/js/custom.js"></script>
</body>
</html>