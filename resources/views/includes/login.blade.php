<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <form action="{{ route('admin.login') }}" method="post">
            @csrf
            <div class="modal-body">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true" style="font-size: 40px;">&times;</span>
               </button>
               <div style="text-align: center;margin-top:50px;">
                  <img src="{{ asset('image/login.png') }}" alt="img" style="width: 35%; border-radius: 50%;">
               </div>
               
               <div style="margin-top:25px;">
                  <label>Information</label>
                  <div class="form-group">
                     <input type="text" class="form-control" name="mobileNumber" id="mobileNumber" placeholder="Enter 11 Digits Mobile Number" autocomplete="off" autofocus required maxlength="11">
                     @error('mobileNumber')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span> 
                     @enderror
                   </div>
                   <div class="form-group">
                     <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" autocomplete="off" required>
                     @error('password')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span> 
                     @enderror
                   </div>
               </div>
            </div>
            <div class="modal-footer">
               <input type="submit" class="btn btn-success" value="Login" id="loginSubmitButton" disabled>
            </div>
         </form>
      </div>
   </div>
</div>
