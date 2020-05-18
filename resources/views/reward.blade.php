@extends('master')
@section('noidung')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
 
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Reward</h1>
          <p>Danh sách quà</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
               Search: <input type="search" id="search">
                
                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Namevi</th>
                      <th>Thao tác</th>
                      
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Namevi</th>
                      <th>Thao tác</th>
                      
                    </tr>
                  </tfoot>
                 <tbody id="lis-player">
                 @foreach($reward as $rw)
                    <tr>
                        <td>{{$rw->id}}</td>
                        <td>{{$rw->name}}</td>
                        <td>{{$rw->namevi}}</td>
                        <td>
                          <a href="{{asset('crw')}}"><i class="fas fa-plus-circle"></i></a>
                          <a href="editcrw/{{$rw->id}}"> <i class="fas fa-edit"></i></a> 
                          <a href="deletecrw/{{$rw->id}}" onclick="alert('Bạn có chắc chắn muốn xóa')"> <i class="far fa-trash-alt"></i></a>
                      </td>
                    </tr>
                  @endforeach
                 </tbody>
                </table>
                {{$reward->links()}}
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
<script type="text/javascript">
  $(document).ready(function(){

    $('#search').keyup(function(){
      $('#lis-player').html(`<tr><td colspan="9" class="text-center"><div class="loader"></div></td></tr>`);
        const search = $(this).val();
        const url = '{!! asset('searchreward') !!}';
        $.ajax({
            url,
            data: {search},
            success:function(data){
                $('#lis-player').html(data);
            }
        });
    })
  })
</script>

</html>
@endsection
<!-- Bootstrap core JavaScript-->
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('js/demo/datatables-demo.js')}}"></script>


