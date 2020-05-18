<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
  <title>Document</title>
</head>
<body>
<div class="login">
                  
                  
                  <form class="user" method="post" action="{{asset('sbm')}}" style="width: 400px;margin: 4% auto;">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login Galaxy Legend</h1>
                  </div>
                  @include('errors.note')
                    <div class="form-group">
                      <input type="email" required class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" name="email" placeholder="Email...">
                    </div>
                    <div class="form-group">
                      <input type="password" required class="form-control form-control-user" id="exampleInputPassword"  name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">                     
                      </div>
                    </div>
                    <input type="submit" class="btn btn-primary btn-user btn-block" value="Đăng nhập ">
                    
                    <hr>
                    {{csrf_field()}}
                  </form>
</div>
</body>
</html>
                  
                  
            
            