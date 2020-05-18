@extends('master')
@section('noidung')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
 
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Edit Campain</h1>
        

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
           
            <div class="card-body">
              <div class="table-responsive">
              <form method="POST" >
                  <div class="row">
                  <div class="col-md-6">
                  
                  <div class="row">
                    <div class="col-md-3"><span>Name<span></div>
                    <div class="col-md-9"><input type="text" name="name" required value="{{$campain->name}}"></div>
                  </div>
                  <p style="color:red;">{{ $errors->first('name') }}</p>
                  <br>
                  <div class="row">
                    <div class="col-md-3"><span>Showdate<span></div>
                    <div class="col-md-9">
                    <input type="datetime" name="showdate"  value="{{$campain->showdate}} " required >
                    </div>
                  </div>
                  <br>
                   <div class="row">
                    <div class="col-md-3"><span>Startdate<span></div>
                    <div class="col-md-9"><input type="datetime" name="startdate"  value="{{$campain->startdate}}" required></div>
                  </div>
                  <p style="color:red;">{{ $errors->first('startdate') }}</p>
                  <br>
                   <div class="row">
                    <div class="col-md-3"><span>Enddate<span></div>
                    <div class="col-md-9"><input type="datetime" name="enddate"  value="{{$campain->enddate}}" required></div>
                  </div>
                  <p style="color:red;">{{ $errors->first('enddate') }}</p>
                  <br>
                  <div class="row">
                    <div class="col-md-3"><span>Createdate<span></div>
                    <div class="col-md-9"><input type="datetime" name="createdate"  value="{{$campain->createdate}}" required></div>
                  </div>
                 

                  <br>
                   <div class="row">
                    <div class="col-md-3"><span>Rewardtime<span></div>
                    <div class="col-md-9"><input type="datetime" name="rewardtime" value="{{$campain->rewardtime}}" required></div>
                  </div>
                  <br>
                 <div class="row">
                    <div class="col-md-3"><span>Isactive<span></div>
                    <div class="col-md-9">
                      
                      unibale:<input type="radio" name="isactive" value="1" @if($campain->isactive==1) checked @endif>
                      disnable:<input type="radio" name ="isactive" value="0"  @if($campain->isactive==0) checked @endif>
                      
                    </div>
                 </div>
                 <br>
                 <div class="row">
                  <div class="col-md-3"><span>Life<span></div>
                  <div class="col-md-9">
                    <input type="number" name="life" value="{{$campain->life}}">
                  </div>
               </div>
               <br>
               <div class="row">
                <div class="col-md-3"><span>Gold<span></div>
                <div class="col-md-9">
                  <input type="number" name="gold" value="{{$campain->gold}}">
                </div>
             </div>
                </div>
                 <br>
                 
                 
                
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-3"><span>Limitplay<span></div>
                    <div class="col-md-9"><input type="number" name="limitplay" required value="{{$campain->limitplay}}"></div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-3"><span>Countryvalidate<span></div>
                    <div class="col-md-9">
                        <input type="text" name="countryvalidate" required value="{{$campain->countryvalidate}}">
                        
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-3"><span>Counfree<span></div>
                    <div class="col-md-9"><input type="number" name="counfree" required value="{{$campain->countfree}}"></div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-3"><span>Bonustype<span></div>
                    <div class="col-md-9">
                     
                      Kim cương:<input type="radio" name="bonustype" value="1"  @if($campain->bonustype==1) checked @endif>
                      Vàng:<input type="radio" name ="bonustype" value="0" @if($campain->bonustype==0) checked @endif>
                     
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-3"><span>Countad<span></div>
                    <div class="col-md-9"><input type="number" name="countad" required value="{{$campain->countad}}"></div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-3"><span>Shipid<span></div>
                    <div class="col-md-9"><input type="number" name="shipid" required value="{{$campain->shipid}}"></div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-3"><span>League<span></div>
                    <div class="col-md-9"><input type="number" name="league" required value="{{$campain->league}}"></div>
                  </div>
                  <br>
                   <div class="row">
                    <div class="col-md-3"><span>Datawave<span></div>
                    <div class="col-md-9"><input type="text" name="datewave"  value="{{$campain->datawave}}"></div>
                  </div>
                  <br>
                </div>
                </div>
               {{ csrf_field() }}
                <input type="submit" class="btn btn-primary" value="Cập nhật giải đấu" style="margin-left: 40%;">
                <a href="{{asset('cp')}}" class="btn btn-primary" ><i class="fas fa-undo-alt"></i></a>
                  
              </form>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
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



  

</body>

</html>
@endsection
<!-- Bootstrap core JavaScript-->
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('js/demo/datatables-demo.js')}}"></script>




