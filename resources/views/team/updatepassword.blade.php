
<!DOCTYPE html>
<html lang="en">
   
    @include('team.includes.head')
   <body>
      <div class="loader-wrapper">
         <div class="loader-index"><span></span></div>
         <svg>
            <defs></defs>
            <filter id="goo">
               <fegaussianblur in="SourceGraphic" stddeviation="11" result="blur"></fegaussianblur>
               <fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo"> </fecolormatrix>
            </filter>
         </svg>
      </div>
      <div class="page-wrapper compact-wrapper" id="pageWrapper">
         
         @include('team.includes.topbar')
         <!-- Page Body Start-->
         <div class="page-body-wrapper">
           
            @include('team.includes.sidebar')
            <div class="page-body">
               <div class="container-fluid ">
                  <div class="page-title " style="padding-top:0px;">
                     <div class="row mt-4">
                        <div class="col-6">
                           <h3>Change Password</h3>
                        </div>
                        <div class="col-6">
                           <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="index.php">                                      
                                 <i data-feather="home"></i></a>
                              </li>
                              <li class="breadcrumb-item">Password</li>
                              <li class="breadcrumb-item active"> Change Password</li>
                           </ol>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Container-fluid starts-->
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-sm-12">
                        <div class="card">
                        @if (session('message'))
               <div class="alert alert-success mb-2" id="hi">
              Successfully Update Password
               </div>
               @endif
                           <div class="card-header">
                                @if (session('error'))
              <div class="alert alert-danger mb-2" role="alert">
Login credentials not match try again
</div>                      @endif


                              <form class="theme-form" method="post" action="teamupdatepassword">
@csrf
                              
                                 <div class="row">
                                    <div class="col-md-4 ">
                                       
                                       <input class="form-control" id="" type="text" name="oldpassword" placeholder="Current Password"  required >
                                       @error('oldpassword')
                                       <div class="text-danger mb-2" role="alert">
                      {{$message}}
</div>
                    @enderror

                                    </div>
                                  
                                 
                                    <div class="col-md-4 ">
                                       
                                       <input class="form-control" id="" type="text"  required name="newpassword"  placeholder="New password" >
                                       @error('newpassword')
                                       <div class="text-danger mb-2" role="alert">
                      {{$message}}
</div>
                    @enderror
                                    </div>
                                    
                               
                                    <div class="col-md-4 ">
                                       
                                       <input class="form-control" id="" type="text" required name="confirmpassword"  placeholder="Confirm New Password" >
                                       @error('confirmpassword')
                                       <div class="text-danger mb-2">
                      {{$message}}
</div>
                    @enderror

                                    </div>
</div>
                                            
                                    
                                           
                                    
                                    
                                    
                                    <div class="card-footer text-end">
                                       <button class="btn btn-primary " name="submit" type="submit">Change Password</button>
                                    </div>
                                    </div>
                              </form>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- Container-fluid Ends-->
               
               <!-- footer start-->
             
               @include('team.includes.footer')
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
      <script src="{{asset('public/assets/js/scrollbar/simplebar.js')}}"></script>
      <script src="{{asset('public/assets/js/scrollbar/custom.js')}}"></script>
      <!-- Sidebar jquery-->
      <script src="{{asset('public/assets/js/config.js')}}"></script>
      <!-- Plugins JS start-->
      <script src="{{asset('public/assets/js/sidebar-menu.js')}}"></script>
      <script src="{{asset('public/assets/js/dropzone/dropzone.js')}}"></script>
      <script src="{{asset('public/assets/js/dropzone/dropzone-script.js')}}"></script>
      <script src="{{asset('public/assets/js/tooltip-init.js')}}"></script>
      <script src="{{asset('public/assets/js/notify/bootstrap-notify.min.js')}}"></script>
      <!-- Plugins JS Ends-->
      <!-- Theme js-->
      <script src="https://use.fontawesome.com/43c99054a6.js"></script>
      <script src="{{asset('public/assets/js/script.js')}}"></script>
      <script src="{{asset('public/assets/js/select2/select2.full.min.js')}}"></script>
      <script src="{{asset('public/assets/js/select2/select2-custom.js')}}"></script>
     


      <script>

$('#hi').delay(2000).slideUp(1200);
</script>

    
   </body>
</html>