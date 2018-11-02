    @extends('layouts.adminLayout.admin_design')
    @section('content')

    <div class="main-panel">
        <div class="content-wrapper">
          <div class="row purchace-popup">
            <div class="col-12">
             
            </div>
          </div>
          <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card bg-danger p-20">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-cube text-light icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right text-white">Products</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0 text-white">{{ $products }}</h3>
                      </div>
                    </div>
                  </div>
                 
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card bg-success p-20">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-poll-box text-light icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right text-white">Sales</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0 text-white">{{ $sales }}</h3>
                      </div>
                    </div>
                  </div>
                 
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card bg-info p-20">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-account-location text-light icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right text-white">Dropshipper</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0 text-white">{{ $dropshipper }}</h3>
                      </div>
                    </div>
                  </div>
                 
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card bg-warning p-20">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-account text-light icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right text-white">Customer</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0 text-white">{{ $customers }}</h3>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

<a class="weatherwidget-io" href="https://forecast7.com/en/n7d27112d75/surabaya-city/" data-label_1="SURABAYA CITY" data-label_2="WEATHER" data-theme="gray" data-basecolor="#3aa4df" data-highcolor="#fdbb82" data-lowcolor="#d6efff" data-suncolor="#ffb273" data-raincolor="#b9e3ff" >SURABAYA CITY WEATHER</a>
<script>
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
</script>


          <div class="row">
            <div class="col-lg-7 grid-margin stretch-card">

            </div>
            <div class="col-lg-5 grid-margin stretch-card">
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->

  @endsection