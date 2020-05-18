@extends('master')
@section('noidung')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
 
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Campain</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Campain</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Show date</th>
                      <th>Start date</th>
                      <th>Enddate</th>
                      <th>Createdate</th>
                      <th>Rewardtime</th>
                      <th>Isactive</th>
                      <th>Name</th>
                      <th>Limitplay</th>
                      <th>Countryvalidate</th>
                      <th>Countfree</th>
                      <th>Gold</th>
                      <th>Countad</th>
                      <th>Shipid</th>
                      <th>Datawave</th>
                      <th> Bonustype</th>
                      <th>Life</th>
                      <th>Thao tac</th>

                    </tr>
                  </thead>
                  
                 <tbody>
                 @foreach($campain as $p)
                    <tr>
                        <td>{{$p->id}}</td>
                        <td>{{$p->showdate}}</td>
                        <td>{{$p->startdate}}</td>
                        <td>{{$p->enddate}}</td>
                        <td>{{$p->createdate}}</td>
                        <td>{{$p->rewardtime}}</td>
                        <td>{{$p->isactive}}</td>
                        <td>{{$p->name}}</td>
                        <td>{{$p->limitplay}}</td>
                        <td>{{$p->countryvalidate}}</td>
                        <td>{{$p->countfree}}</td>
                        <td>{{$p->gold}}</td>
                        <td>{{$p->countad}}</td>
                        <td>{{$p->shipid}}</td>
                        <td>{{$p->datawave}}</td>
                        <td>{{$p->bonustype}}</td>
                        <td>{{$p->life}}<br><br><a href="life/{{$p->id}}"><i class="fas fa-life-ring" alt="them "></i></a></td>
                        <td>
                            <a href="{{asset('creat')}}"><i class="fas fa-plus-circle"></i></a>
                            <a href="edit/{{$p->id}}"> <i class="fas fa-edit"></i></a> 
                            <a href="delete/{{$p->id}}" onclick="alert('Bạn có chắc chắn muốn xóa')"> <i class="far fa-trash-alt"></i></a>
                        </td>
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




