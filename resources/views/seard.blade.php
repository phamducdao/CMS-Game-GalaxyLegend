@extends('master')
@section('noidung')

    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
 
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Player</h1>
          <p class="mb-4">Danh sách các người chơi </p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Player</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                  <div class="row">
                    <div class="col-md-3"><input type="text" class="" id="name" placeholder="Search name">
                    </div>
                    <div class="col-md-3"><input type="text" class="" id="level" placeholder="Search level">
                    </div>
                    <div class="col-md-3"><input type="text" class="" id="score" placeholder="Search score">
                    </div>
                    <div class="col-md-3"><input type="text" class="" id="countrycode" placeholder="Search countrycode">
                    </div>
                  </div>
                  <br>
                  <div class="row">
                      <div class="col-md-6">SearchCreatDate:<input type="date" class="" id="createdate" placeholder="Search createdate">
                      </div>
                      <div class="col-md-6">
                        SearchUpdateDate: <input type="date" class="" id="updatedate" placeholder="Search updatedate">
                      </div>
                  </div>
                <table  width="100%" cellspacing="0" class="table table-bordered" >
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Score</th>
                      <th>Level</th>
                      <th>Countrycode</th>
                      <th>Deviced</th>
                      <th>Createdate</th>
                      <th>Updatedate</th>
                      <th>Avarta</th>
                      <th>Ban</th>
                      <th>Thao tác</th>

                    </tr>
                  </thead>
                 
                  <tbody id="lis-player">
                  @foreach($player as $p)
                   <tr>
                      <td>{{$p->name}}</td>
                      <td>{{$p->score}}</td>
                      <td>{{$p->level}}</td>
                      <td>{{$p->countrycode}}</td>
                      <td>{{$p->deviceid}}</td>
                      <td>{{$p->createdate}}</td>
                      <td>{{$p->updatedate}}</td>
                      <td>{{$p->linkavatar}}</td>
                      <td>{{$p->ban}} </td>
                   <td><a href="ban/{{$p->id}}"><i class="fas fa-ban"></i></a></td>
                    </tr>
                   @endforeach
                  </tbody>
                </table>
               <br>
                <div class="dataTables_paginate paging_simple_numbers"> {!! $player->links() !!}
                  
                </div>
                  
                   
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
  <script type="text/javascript">

    $('#name').keyup(function(){
      $('#lis-player').html(`<tr><td colspan="9" class="text-center"><div class="loader"></div></td></tr>`);
        const search = $(this).val();
        const url = '{!! asset('/search') !!}'
        $.ajax({
            url,
            data: {search},
            success:function(data){
                $('#lis-player').html(data);
            }
        });
    })
    $('#level').keyup(function(){
      $('#lis-player').html(`<tr><td colspan="9" class="text-center"><div class="loader"></div></td></tr>`);
        const search = $(this).val();
        const url = '{!! asset('/searchlevel') !!}'
        $.ajax({
            url,
            data: {search},
            success:function(data){
                $('#lis-player').html(data);
            }
        });
    })
    $('#score').keyup(function(){
      $('#lis-player').html(`<tr><td colspan="9" class="text-center"><div class="loader"></div></td></tr>`);
        const search = $(this).val();
        const url = '{!! asset('/searchscore') !!}'
        $.ajax({
            url,
            data: {search},
            success:function(data){
                $('#lis-player').html(data);
            }
        });
    })
    $('#createdate').keyup(function(){
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
    $('#updatedate').keyup(function(){
      $('#lis-player').html(`<tr><td colspan="9" class="text-center"><div class="loader"></div></td></tr>`);
        const search = $(this).val();
        const url = '{!! asset('/searchupdatedate') !!}'
        $.ajax({
            url,
            data: {search},
            success:function(data){
                $('#lis-player').html(data);
            }
        });
    })
    $('#countrycode').keyup(function(){
      $('#lis-player').html(`<tr><td colspan="9" class="text-center"><div class="loader"></div></td></tr>`);
        const search = $(this).val();
        const url = '{!! asset('/searchcountrycode') !!}'
        $.ajax({
            url,
            data: {search},
            success:function(data){
                $('#lis-player').html(data);
            }
        });
    })
</script>

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




