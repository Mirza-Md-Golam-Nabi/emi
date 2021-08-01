<!DOCTYPE html> 
<html lang="en" style="height: 100%;">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>EMI</title>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body style="height: 100%;">
   <div class="container" style="margin-top: 25px;">
      @include('includes.nav')
   </div>
   <div class="d-flex justify-content-center align-items-center" style="height: 100%">   
      
      <div>
         @include('msg')
        <form action="{{ route('admin.register.store') }}" method="post">
            @csrf
            <div class="modal-body">
               <div style="text-align: center;margin-top:50px;">
                  <img src="{{ asset('image/login.png') }}" alt="img" style="width: 35%; border-radius: 50%;">
               </div>
               
               <div style="margin-top:25px;">
                  <label>Information</label>
                  <div class="form-group">
                     <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Enter Your Mobile Number" autocomplete="off" autofocus required maxlength="11">
                     <small class="text-secondary">Mobile Number must be 11 digits.</small>
                   </div>
                   <div class="form-group">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter Your Password" autocomplete="off" required>
                  </div>
               </div>
            </div>
            <div class="modal-footer" style="border-top: none;">
               <input type="submit" class="btn btn-success" value="Register" id="register" disabled>
            </div>
         </form>         
      </div>
   </div>

   @include('includes.login')

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
   @include('includes.scriptextra')

</body>
</html>