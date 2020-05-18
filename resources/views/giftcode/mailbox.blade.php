@extends('master')
@section('noidung')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
 
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Mailbox</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">

            <div class="card-body">
              <div class="table-responsive">
                
                <table class="table table-bordered" width="100%" cellspacing="0">
                    
                 <div class="row">
                  <div class="col-md-3"> Search message:  <input type="text" name="message" id="message">
                  </div>
                  <div class="col-md-3">Search isread: <input type="number" name="isread" id="isread">
                  </div>
                  <div class="col-md-3">Search Createdate: <input type="date" name="createdate" id="createdate">
                  </div>
                  <div class="col-md-3">Search Expiredate: <input type="date" name="expiredate" id="expiredate">
                  </div>
                  <div class="col-md-2">Search Title: <input type="text" name="title" id="title">
                  </div>
                  
                </div>
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Message</th>
                      <th>isread</th>
                      <th>Createdate</th>
                      <th>Expiredate</th>
                      <th> Title </th>
                      <th> Thao tac </th>
                      
                    </tr>
                  </thead>
                  
                 <tbody id="lis-player">
                     @foreach( $mailbox as $g)
                     <tr>
                        <td>{{$g->id}}</td>
                        <td>{{$g->message}}</td>
                        <td>{{$g->isread}}</td>
                        <td>{{$g->createdate}}</td>
                        <td>{{$g->expiredate}}</td>
                        <td>{{$g->title}}</td>
                        <td>
                            <a href="crmailbox"><i class="fas fa-plus-circle"></i></a>
                            <a href="editmailbox/{{$g->id}}"> <i class="fas fa-edit"></i></a> 
                            <a href="deletemailbox/{{$g->id}}" onclick="alert('Bạn có chắc chắn muốn xóa')"> <i class="far fa-trash-alt"></i></a>
                        </td>
                     </tr>
                     @endforeach
                 </tbody>
                </table>
                {{$mailbox->links()}}
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
    $('#message').keyup(function(){
      //alert("Hello! I am an alert box!!");
        $('#lis-player').html(`<tr><td colspan="9" class="text-center"><div class="loader"></div></td></tr>`);
        const search = $(this).val();
        const url = '{!! asset('/searchmessage') !!}'
        $.ajax({
            url,
            data: {search},
            success:function(data){
                $('#lis-player').html(data);
            }
        });
    })
    $('#isread').keyup(function(){
      //alert("Hello! I am an alert box!!");
        $('#lis-player').html(`<tr><td colspan="9" class="text-center"><div class="loader"></div></td></tr>`);
        const search = $(this).val();
        const url = '{!! asset('/searchisread') !!}'
        $.ajax({
            url,
            data: {search},
            success:function(data){
                $('#lis-player').html(data);
            }
        });
    })
    $('#createdate').keyup(function(){
      //alert("Hello! I am an alert box!!");
        $('#lis-player').html(`<tr><td colspan="9" class="text-center"><div class="loader"></div></td></tr>`);
        const search = $(this).val();
        const url = '{!! asset('/searchcreatedate') !!}'
        $.ajax({
            url,
            data: {search},
            success:function(data){
                $('#lis-player').html(data);
            }
        });
    })
    $('#expiredate').keyup(function(){
      //alert("Hello! I am an alert box!!");
        $('#lis-player').html(`<tr><td colspan="9" class="text-center"><div class="loader"></div></td></tr>`);
        const search = $(this).val();
        const url = '{!! asset('/searchexpiredate') !!}'
        $.ajax({
            url,
            data: {search},
            success:function(data){
                $('#lis-player').html(data);
            }
        });
    })
    $('#title').keyup(function(){
      //alert("Hello! I am an alert box!!");
        $('#lis-player').html(`<tr><td colspan="9" class="text-center"><div class="loader"></div></td></tr>`);
        const search = $(this).val();
        const url = '{!! asset('/searchtitle') !!}'
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




