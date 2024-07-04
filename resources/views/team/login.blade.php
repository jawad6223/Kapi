<!DOCTYPE html>
<html lang="en">
   <!-- Mirrored from admin.pixelstrap.com/cuba/theme/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Apr 2021 09:50:27 GMT -->
   @include('team.includes.head')
   <body>
      <!-- login page start-->
      <div class="container-fluid p-0">
         <div class="row m-0">
            <div class="col-12 p-0">
               <div class="login-card">
                  <div>
                     <div><a class="logo" href=""><img class="img-fluid for-light" src="{{asset('public/assets/images/logo/login.png')}}" alt="looginpage" style="width:150px;height:80px;"><img class="img-fluid for-dark" src="{{asset('public/assets/images/logo/logo_dark.png')}}" alt="looginpage" style="width:150px;height:80px;"></a></div>
                     <div class="login-main">
                        @if (session('error'))
                        <div class="alert alert-danger mb-2" id="hi" role="alert">
                           Login credentials not match try again
                        </div>
                        @endif
                        <form class="theme-form"  action="teamlogin" method="post">
                           @csrf
                           <h4>Sign in to account</h4>
                           <p>Enter your email & password to login</p>
                           <div class="form-group">
                              <label class="col-form-label">Email Address</label>
                              <input class="form-control" type="email"  name="email"  required placeholder="">
                              @error('email')
                              <span class="text-danger">
                              {{$message}}
                              </span>
                              @enderror
                           </div>
                           <div class="form-group">
                              <label class="col-form-label">Password</label>
                              <div class="form-input position-relative">
                                 <input class="form-control" type="password" name="password" id="login_password" required placeholder="">
                                 @error('password')
                                 <span class="text-danger">
                                 {{$message}}
                                 </span>
                                 @enderror
                                 <div class="show-hide">
                        <span class="show" onclick="visibility()"> </span>
                      </div>
                              </div>
                           </div>
                         
                           <div class="form-group mb-0">
                    <div class="checkbox p-0">
                      <input id="checkbox1" type="checkbox">
                    
                    </div><a class="link" href="{{ url('/team/forget') }}">Forgot password?</a>
                    <div class="text-end mt-3">
                      <button class="btn btn-primary btn-block w-100" type="submit">Sign in</button>
                    </div>
                  </div>
                           <h6 class="text-muted mt-4 or">Or Sign in with</h6>
                           <p class="mt-4 mb-0 text-center">Don't have account?<a class="ms-2" href="{{ url('/team/signup') }}">Create Account</a></p>
                           <!-- <div class="social mt-4">
                              <div class="btn-showcase">
                                 <a class="btn btn-light " href="https://www.google.com/" target="_blank"><i class="fab fa-google" style="color:#809fff; font-size:15px;padding-right:7px"></i>Google</a>
                                 <a class="btn btn-light " href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f" style="color: #809fff; font-size:15px;padding-right:8px"></i>facebook</a>
                              </div> -->
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- latest jquery-->
         <script src="{{asset('public/assets/js/jquery-3.5.1.min.js')}}"></script>
         <!-- Bootstrap js-->
         <script src="{{asset('public/assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
         <!-- feather icon js-->
         <script src="{{asset('public/assets/js/icons/feather-icon/feather.min.js')}}"></script>
         <script src="{{asset('public/assets/js/icons/feather-icon/feather-icon.js')}}"></script>
         <!-- scrollbar js-->
         <!-- Sidebar jquery-->
         <script src="{{asset('public/assets/js/config.js')}}"></script>
         <!-- Plugins JS start-->
         <!-- Plugins JS Ends-->
         <!-- Theme js-->
         <script src="{{asset('public/assets/js/script.js')}}"></script>
         <!-- login js-->
         <!-- Plugin used-->
         <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
         <script>
      function visibility() {
  var x = document.getElementById('login_password');
  if (x.type === 'password') {
    x.type = "text";
    $('#eyeShow').show();
    $('#eyeSlash').hide();
  }else {
    x.type = "password";
    $('#eyeShow').hide();
    $('#eyeSlash').show();
  }
}
    </script>
      <script>
$('#hi').delay(2000).slideUp(1200);
</script>
</div>
   
   </body>
   <!-- Mirrored from admin.pixelstrap.com/cuba/theme/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Apr 2021 09:50:27 GMT -->
</html>