@extends('master')
@section('noidung')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
 
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Allgiftcode</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">

            <div class="card-body">
              <div class="table-responsive">
              
                 
                 
                 <div class="row">
                    <div class="col-md-3"> Search Giftcode:  <input type="text" name="giftcode" id="giftcode">
                    </div>
                    <div class="col-md-3">Search isuse: <input type="text" name="isuse" id="isuse">
                    </div>
                    <div class="col-md-3">Search Createdate: <input type="date" name="date" id="date">
                    </div>
                    
                  </div>
               
                <table  width="100%" cellspacing="0" class="table table-bordered" >
                  <thead>
                    <tr>
                      
                      <th>Giftcode</th>
                      <th>Isuse</th>
                      <th>Createdate</th>
                      <th> Thao tac </th>
                    </tr>
                  </thead>
                 
                  <tbody id="lis-player">
                    @foreach($allgc as  $g)
                      <tr>
                        
                        <td>{{$g->giftcode}}</td>
                        <td>{{$g->isuse}}</td>
                        <td>{{$g->createdate}}</td>
                        <td>
                            <a href="allgiftcode"><i class="fas fa-plus-circle"></i></a>
                        <a href="editallgc/{{$g->giftcode}}"> <i class="fas fa-edit"></i></a> 
                        <a href="deleteallgc/{{$g->giftcode}}" onclick="alert('Bạn có chắc chắn muốn xóa')"> <i class="far fa-trash-alt"></i></a>
                        </td>
                      </tr>
                    @endforeach
                   

                  </tbody>
                </table>
                {{$allgc->links()}}
              
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
    $('#giftcode').keyup(function(){
      $('#lis-player').html(`<tr><td colspan="9" class="text-center"><div class="loader"></div></td></tr>`);
        const search = $(this).val();
        const url = '{!! asset('/searchgc') !!}'
        $.ajax({
            url,
            data: {search},
            success:function(data){
                $('#lis-player').html(data);
            }
        });
    })
    $('#isuse').keyup(function(){
      $('#lis-player').html(`<tr><td colspan="9" class="text-center"><div class="loader"></div></td></tr>`);
        const search = $(this).val();
        const url = '{!! asset('/searchisuse') !!}'
        $.ajax({
            url,
            data: {search},
            success:function(data){
                $('#lis-player').html(data);
            }
        });
    })
    $('#date').keyup(function(){
      $('#lis-player').html(`<tr><td colspan="9" class="text-center"><div class="loader"></div></td></tr>`);
        const search = $(this).val();
        const url = '{!! asset('/searchdate') !!}'
        $.ajax({
            url,
            data: {search},
            success:function(data){
                $('#lis-player').html(data);
            }
        });
    })
</script>

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




