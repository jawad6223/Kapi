<!DOCTYPE html>
<html lang="en">
   @include('admin.includes.head')
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
         @include('admin.includes.topbar')
         <!-- Page Body Start-->
         <div class="page-body-wrapper">
            @include('admin.includes.sidebar')
            <div class="page-body">
               <div class="container-fluid ">
                  <div class="page-title" style="padding-top:0px;">
                     <div class="row ">
                        <div class="col-6">
                           <h3>Add Team</h3>
                        </div>
                        <div class="col-6">
                           <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="index.php">                                      
                                 <i data-feather="home"></i></a>
                              </li>
                              <li class="breadcrumb-item">Team</li>
                              <li class="breadcrumb-item active"> Add Team</li>
                           </ol>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Container-fluid starts-->
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-sm-12">
                        <div class="card col-md-8" >
                           <div class="card-header">
                              @if (session('message'))
                              <div class="alert alert-success mb-2" id="hi">
                                 Successfully Add Team
                              </div>
                              @endif
                              <form class="theme-form" method="post" action="addteamaction"
                                 enctype="multipart/form-data">
                                 @csrf
                                 <div class="row">
                                    <div class="col-md-3  ">
                                       <label for="" class="col-form-label mt-1">Name : </label>
                                    </div>
                                    <div class="col-md-9 mb-3  ">
                                       <input class="form-control" required id="" type="text" name="name" >
                                       <span class="text-danger">
                                       @error('name')
                                       {{$message}}
                                       @enderror
                                       </span>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-3  ">
                                       <label for="" class="col-form-label mt-1">Email:</label>
                                    </div>
                                    <div class="col-md-9 mb-3  ">
                                       <input class="form-control" id="" required type="email" name="email"  >
                                       <span class="text-danger">
                                       @error('email')
                                       {{$message}}
                                       @enderror
                                       </span>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-3 "> 
                                       <label for="" class="col-form-label mt-1">Password: </label>
                                    </div>
                                    <div class="col-md-9 mb-3  ">
                                       <input class="form-control" id="" required type="password"  name="password" >
                                       <span class="text-danger">
                                       @error('password')
                                       {{$message}}
                                       @enderror
                                       </span>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-3 ">
                                       <label for="" class="col-form-label mt-1">Contact:</label>
                                    </div>
                                    <div class="col-md-9 mb-3  ">
                                       <input class="form-control" id=""  required type="number" name="contact">
                                       <span class="text-danger">
                                       @error('contact')
                                       {{$message}}
                                       @enderror
                                       </span>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-3 ">
                                       <label for="" class="col-form-label mt-1">Image:</label>
                                    </div>
                                    <div class="col-md-9 mb-3  ">
                                       <input class="form-control"  required id="" type="file" name="image">
                                       <span class="text-danger">
                                       @error('image')
                                       {{$message}}
                                       @enderror
                                       </span>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-3  ">
                                       <label for="" class="col-form-label mt-1">Street :</label>
                                    </div>
                                    <div class="col-md-9 mb-3  ">
                                       <input class="form-control" id="" required type="text" name="street" >
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-3  ">
                                       <label for="" class="col-form-label mt-1">City :</label>
                                    </div>
                                    <div class="col-md-9 mb-3  ">
                                       <input class="form-control" required id="" type="text" name="city" >
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-3  ">
                                       <label for="" class="col-form-label mt-1">State :</label>
                                    </div>
                                    <div class="col-md-9 mb-3  ">
                                       <input class="form-control" id=""  required type="text" name="state" >
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-3  ">
                                       <label for="" class="col-form-label mt-1">Zip:</label>
                                    </div>
                                    <div class="col-md-9 mb-3  ">
                                       <input class="form-control" id="" required type="number" name="zip" >
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-3 ">
                                       <label for="" class="col-form-label mt-1">Country:</label>
                                    </div>
                                    <div class="col-md-9 mb-3  ">
                                       <input class="form-control" id="" required type="text" name="country" >
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-3   ">
                                       <label for="" class="col-form-label mt-1">Role:</label>
                                    </div>
                                    <div class="col-md-9 mb-3   ">
                                       <select class="form-select" required name="role_id" aria-label="Default select example">
                                          <option value="1">Admin</option>
                                          <option value="2">Team</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="card-footer text-end">
                                    <button class="btn btn-primary " name="submit" type="submit">Submit</button>
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
      @include('admin.includes.footer')
    
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