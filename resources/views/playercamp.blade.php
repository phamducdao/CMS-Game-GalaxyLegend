@extends('master')
@section('noidung')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
 
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Playercamp</h1>
          <p class="mb-4"> Danh sách các người tham gia giải đấu.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Playercamp</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
               
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Campid</th>
                      <th>Tên giải đấu</th>
                      <th>Playerid</th>
                      <th>Name</th>
                      <th>Score</th>
                      <th>Wave</th>
                      <th>Createdate</th>
                      <th>Updatedate</th>
                      <th>Count</th>
                      <th>Timeplay</th>
                    </tr>
                  </thead>
                 
                <tbody>
                @foreach($playercamp as $p)
                  <tr>
                    <td>{{$p->campid}}</td>
                    <td>{{$p->campain['name']}}</td>
                    <td>{{$p->playerid}}</td>
                  <td>{{$p->player['name']}}</td>
                    <td>{{$p->score}}</td>
                    <td>{{$p->wave}}</td>
                    <td>{{$p->createdate}}</td>
                    <td>{{$p->updatedate}}</td>
                    <td>{{$p->count}}</td>
                    <td>{{$p->timeplay}}</td>
                  </tr>
                @endforeach
                </tbody>
                </table>
               
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




