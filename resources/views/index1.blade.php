@section('title','admin')
@extends('master')
@section('noidung')

    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
  
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Report</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">TOTAL ORDERS</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$sum}} VND</div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-shopping-cart fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Sales</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$sales}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-credit-card fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Customer</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$customer}}</div>
                        </div>

                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-user fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Source</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$source}}</div>
                        </div>

                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-user fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

           
          </div>

          <!-- Content Row -->

          <div class="row">
            <div class=" col-md-6">
              <p>tỷ lệ source:</p>
                <div id="donut-chart"></div>
                
            </div>

            <!-- Area Chart -->
            <div class=" col-md-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Theo order</h6><br>
                  <div class="form-group">
                    <label class="control-label" for="input-date-start">Total:</label>
                    <p id="totalorders" ></p></b>
                  </div>
                  <div class="form-group">
                    <label class="control-label" for="input-date-start">Date Start</label>
                    <div class="input-group date">
                    <input type="date" name="date_start"  placeholder="Date Start" data-date-format="YYYY-MM-DD" id="date-start"  class="form-control" >
                    <span class="input-group-btn">
                    </span></div>
                  </div>
                  <div class="form-group">
                    <label class="control-label" for="input-date-start">Date End</label>
                    <div class="input-group date">
                    <input type="date" name="date_end" value="" placeholder="Date Start" data-date-format="YYYY-MM-DD" id="date-end" class="form-control" >
                    <span class="input-group-btn">
                    </span></div>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="check me" id="check-me-btn"">
                  </div>


                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                  
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in ranges" aria-labelledby="dropdownMenuLink">
                      
                      <a class="dropdown-item" href="#" data-range='7'>1 Tuần trước</a>
                      <a class="dropdown-item" href="#" data-range='30'>1 Tháng trước</a>
                      <a class="dropdown-item" href="#" data-range='60'>2 Tháng trước</a>
                      

                    </div>
                  </div>
                  
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                  
                   
                    <div id="myfirstchart"></div>
                    
                  </div>
                </div>
              </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-md-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Theo nguồn</h6>
                  <b>Total:<p id="totalsource"></p></b>
                  <div class="form-group">
                    <label class="control-label" for="input-date-start">Date Start</label>
                    <div class="input-group date">
                    <input type="date" name="date_start"  placeholder="Date Start" data-date-format="YYYY-MM-DD" id="date-start-source"  class="form-control" >
                    <span class="input-group-btn">
                    </span></div>
                  </div>
                  <div class="form-group">
                    <label class="control-label" for="input-date-start">Date End</label>
                    <div class="input-group date">
                    <input type="date" name="date_end" value="" placeholder="Date Start" data-date-format="YYYY-MM-DD" id="date-end-source" class="form-control" >
                    <span class="input-group-btn">
                    </span></div>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="check me" id="check-me-btn-source">
                  </div>

                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in ranges1" aria-labelledby="dropdownMenuLink">
                      
                      <a class="dropdown-item" href="#" data-range='7'>1 Tuần trước</a>
                      <a class="dropdown-item" href="#" data-range='30'>1 Tháng trước</a>
                      <a class="dropdown-item" href="#" data-range='60'>2 Tháng trước</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area" >
                    <div id="line-chart"></div>
                    
                    
                   
                  </div>

                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->
          <div class="row">

            <div class="col-md-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Thống kê iap:</h6>
                  <b>Total iap:<p id="totaliap"></p></b>
                  <div class="form-group">
                    <label class="control-label" for="input-date-start">Date Start</label>
                    <div class="input-group date">
                    <input type="date" name="date_start"  placeholder="Date Start" data-date-format="YYYY-MM-DD" id="date-start-iap"  class="form-control" >
                    <span class="input-group-btn">
                    </span></div>
                  </div>
                  <div class="form-group">
                    <label class="control-label" for="input-date-start">Date End</label>
                    <div class="input-group date">
                    <input type="date" name="date_end" value="" placeholder="Date Start" data-date-format="YYYY-MM-DD" id="date-end-iap" class="form-control" >
                    <span class="input-group-btn">
                    </span></div>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="check me" id="check-me-btn-iap">
                  </div>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in ranges3" aria-labelledby="dropdownMenuLink">
                      
                      <a class="dropdown-item" href="#" data-range='7'>1 Tuần trước</a>
                      <a class="dropdown-item" href="#" data-range='30'>1 Tháng trước</a>
                      <a class="dropdown-item" href="#" data-range='60'>2 Tháng trước</a>
                    </div>
                  </div>
                  
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                  
                   
                    <div id="customer"></div>
                    
                  </div>
                </div>
              </div>
            </div>
  
        </div>
        {{-- <div class="row">
          <div id="donut-chart"></div>
        </div> --}}
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
           
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>



  @endsection


  <!-- Bootstrap core JavaScript-->
  
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
 
  <script>
$(function() {
  let firstChart = new Morris.Line({
        element: 'myfirstchart',
        data: [], 
        xkey: 'date', 
        ykeys: ['value'], 
        labels: ['Orders'],
      });
  let donutchart = new Morris.Donut({
      element: 'donut-chart',
      data:  '{!! asset('/tylesource') !!}',
    });
  // let donutchart = new Morris.Bar({
  //     element: 'donut-chart',
  //     data: [],
  //     xkey:'source',
  //     ykeys:['value'],
  //     labels:['value']
  //   });
  let lineChart = new Morris.Bar({
        element: 'line-chart',
        data: [], 
        xkey: 'source', 
        ykeys: ['value'], 
        labels: ['value']
      });

  let iapchart = new Morris.Bar({
        element: 'customer',
        data: [], 
        xkey: 'name', 
        ykeys: ['value'], 
        labels: ['value']
      });

  let defaultDay = 7;
     requestData1(donutchart,"./tylesource");
      requestData(defaultDay, firstChart, "./testchart");
      requestData(defaultDay, lineChart, "./source");
      requestData(defaultDay, iapchart, "./customer");
// custom chart theo order
      $('#check-me-btn').click(function() {
        let day1= document.getElementById("date-start").value ;
        let day2 =document.getElementById("date-end").value;
        
        let days = {
            'start_date' : day1,
            'end_date' : day2
        };
        requestData(days, firstChart, "./testchart1");
        requestTotalOrders(days,"./totalorderscustom");
      });
      // custom chart theo source
      $('#check-me-btn-source').click(function(){
        let day1= document.getElementById("date-start-source").value ;
        let day2 =document.getElementById("date-end-source").value;
        
        let days = {
            'start_date' : day1,
            'end_date' : day2
        };
         requestData(days, lineChart, "./sourcecustom");
         requestTotalSource(days,"./totaliapcustom");
      })
      // custom chart theo iap
      $('#check-me-btn-iap').click(function(){
        let day1= document.getElementById("date-start-iap").value ;
        let day2 =document.getElementById("date-end-iap").value;
        
        let days = {
            'start_date' : day1,
            'end_date' : day2
        };
         requestData(days, iapchart, "./customercustom");
         requestTotalIap(days,"./totalcustomercustom");
      })

      $('div.ranges a').click(function(e){
        e.preventDefault();
        var el = $(this);
        days = el.attr('data-range');
        requestData(days, firstChart,"./testchart");
        requestTotalOrders(days,"./totalorders");
      });
      $('div.ranges1 a').click(function(e){
        e.preventDefault();
        var el = $(this);
        days = el.attr('data-range');
        requestData(days, lineChart,"./source");
        requestTotalSource(days,"./totaliap") ;
      }) ;
      $('div.ranges3 a').click(function(e){
        e.preventDefault();
        var el = $(this);
        days = el.attr('data-range');
        requestData(days, iapchart,"./customer");
        requestTotalIap(days,"./totaliap") ;
      }) ;
      function requestData1(chart,url){
        $.ajax({
          type: "GET",
          url: url, 
          success:(function( data ) {
            console.log(data);
              chart.setData(data);
          })
        })   
      }  
     
      function requestData(days, chart, url){
        $.ajax({
          type: "GET",
          url: url, 
          data: { day: days },
          success:(function( data ) {
           // console.log(data);
            
              chart.setData(data);
          })
        })      
      } 
      // ham tinh total orders
      function requestTotalOrders(days,url){
        $.ajax({
          type: "GET",
          url:url,
          data:{day:days},
          success:function(data){
           $('#totalorders').html(data);            
          }
        })
      }
      // ham tinh total source
      function requestTotalSource(days,url){
        $.ajax({
          type: "GET",
          url:url,
          data:{day:days},
          success:function(data){
           $('#totalsource').html(data);           
          }
        })
      }
      // function tinh total iap
      function requestTotalIap(days,url){
        $.ajax({
          type: "GET",
          url:url,
          data:{day:days},
          success:function(data){
           $('#totaliap').html(data);           
          }
        })
      }
      
});
 
</script>
  <script src="{{asset('/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('/js/sb-admin-2.min.js')}}"></script>

  <!-- Page level plugins -->
  


</body>

</html>
