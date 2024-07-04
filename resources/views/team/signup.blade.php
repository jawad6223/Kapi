<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from admin.pixelstrap.com/cuba/theme/sign-up.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Apr 2021 09:50:29 GMT -->
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

              @if (session('message'))
                           <div class="alert alert-success mb-2" id="hi">
                           {{session('message')}}
                           </div>
                           @endif
              <form class="theme-form"  method="post" action="signup"  enctype="multipart/form-data">
                  @csrf
                  <h4>Create your account</h4>
                  <p>Enter your personal details to create account</p>
                  <div class="form-group">
                    <label class="col-form-label">Name:</label>
                    <input class="form-control" type="text" name="name" required>
                    
                   
                                       @error('name')
                                       <span class="text-danger">
                                       {{$message}}
                                       </span>
                                       @enderror

                  </div>
                  <div class="form-group">
                    <label class="col-form-label">Email:</label>
                    <input class="form-control" type="email" name="email" required>
                   
                                       @error('email')
                                       <span class="text-danger">
                                       {{$message}}
                                       </span>
                                       @enderror

                  </div>
                  <div class="form-group">
                    <label class="col-form-label">Password:</label>
                    <input class="form-control" type="password" required  name="password" >
                   
                                       @error('password')
                                       <span class="text-danger">
                                       {{$message}}
                                       </span>
                                       @enderror

                  </div>
                  <div class="form-group">
                    <label class="col-form-label">Contact:</label>
                    <input class="form-control" type="text" required name="contact">
                   
                                       @error('contact')
                                       <span class="text-danger">
                                       {{$message}}
                                       </span>
                                       @enderror

                  </div>
                  <div class="form-group">
                    <label class="col-form-label">Image:</label>
                    <input class="form-control" type="file" name="image" required>
                    
                                       @error('image')
                                       <span class="text-danger">
                                       {{$message}}
                                       </span>
                                       @enderror

                  </div>
                  
                  <div class="form-group">
                    <label class="col-form-label">Street:</label>
                    <div class="form-input position-relative">
                      <input class="form-control" type="text" name="street" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-form-label">City:</label>
                    <div class="form-input position-relative">
                      <input class="form-control" type="text" name="city" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-form-label">State</label>
                    <div class="form-input position-relative">
                      <input class="form-control" type="text" name="state" required>
                    </div>
                  </div>
                 
              

                  <div class="form-group">
                    <label class="col-form-label">Zip:</label>
                    <div class="form-input position-relative">
                      <input class="form-control" type="text" name="zip" required >
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-form-label">Country:</label>
                    <div class="form-input position-relative">
                      <input class="form-control" type="text" name="country" required >
                    </div>
                  </div>



            
                                
                
                  
                  <div class="form-group mb-0">
                  
                    <button class="btn btn-primary btn-block w-100" type="submit">Create Account</button>
                  </div>
                  <h6 class="text-muted mt-4 or">Or signup with</h6>
                  <div class="social mt-4">
                    
                  <div class="btn-showcase">
                  <a class="btn btn-light " href="https://www.google.com/" target="_blank"><i class="fab fa-google" style="color:#809fff; font-size:15px;padding-right:7px"></i>Google</a>

                  <a class="btn btn-light " href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f" style="color: #809fff; font-size:15px;padding-right:8px"></i>facebook</a></div>
                  </div>
                  <p class="mt-4 mb-0">Already have an account?<a class="ms-2" href="{{url('team/login')}}">Sign in</a></p>
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
      <!-- Plugin used-->
      <script>
$('#hi').delay(3500).slideUp(1200);
</script>
    </div>
  </body>

<!-- Mirrored from admin.pixelstrap.com/cuba/theme/sign-up.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Apr 2021 09:50:29 GMT -->
</html>