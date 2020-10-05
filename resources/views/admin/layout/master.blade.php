<x-header></x-header>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <x-navbar></x-navbar>
      <x-sidebar></x-sidebar>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-icon shadow-primary bg-primary">
                  @yield('icon_menu')
                </div>
                <div class="card-wrap">
                {{--   <div class="card-header">
                    <h4>Total Orders</h4>
                  </div> --}}
                  <div class="card-body mt-2">
                    @yield('title_menu')
                  </div>
                </div>
              </div>
            </div>
          </div>
          @yield('content')
        </section>
        @yield('modal')
      </div>
<x-footer></x-footer>