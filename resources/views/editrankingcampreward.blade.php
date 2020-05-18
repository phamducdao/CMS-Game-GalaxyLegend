@extends('master')
@section('noidung')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
 
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">EditRankingCampReward</h1>
         

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
            </div>
            <div class="card-body">
                   <form method="post">

                  <div class="row">
                  <div class="col-md-2">
                  <div class="form-group">
                  <label for="sel1">Tên giải đấu:</label>
                  <select id="sel1" name="campainid" >
                  @foreach($name as $n)
                  <option value="{{$n['name']}}" @if($campain->name==$n['name']) selected  @endif>{{$n['name']}}</option>
      
                  @endforeach
                  </select>
                  </div>
                  </div>

                  <div class="col-md-3">
                  <div class="form-group">
                  <label for="sel1">Tên phần thưởng</label>
                  <select class="" id="sel1" name="rewardid">
                  @foreach($name1 as $rw)
                  <option value="{{$rw['name']}}" @if($reward->name==$rw['name']) selected @endif>{{$rw['name']}}</option>
                  @endforeach
                  </select>
                  </div>
                  </div>

                  <div class="col-md-2">
                  <div class="form-group">
                  <label for="sel1">Ranking</label> <br>
                  <input type="number" name="ranking" required style="width: 36%;" value="{{$rcr[0]->ranking}}">
                  </div>
                  </div>
                  
                  <div class="col-md-2">
                  <div class="form-group">
                  <label for="sel1">Amount</label> <br>
                  <input type="number" name="amount" required style="width: 36%;" value="{{$rcr[0]->amount}}">
                  </div>
                  </div>
                  

                </div>
                    <input type="submit" class="btn btn-primary" name="submit1" value="Cập nhật phần thưởng">
                    {{csrf_field()}}
              </form>
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




