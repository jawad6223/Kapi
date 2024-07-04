<!DOCTYPE html>
<html lang="en">
   @include('admin.includes.head')
   <link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/vendors/datatables.css')}}">
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
               <div class="container-fluid">
                  <div class="row">
                     <!-- Individual column searching (text inputs) Starts-->
                     <div class="page-title " style="padding-top:0px;">
                        <div class="row ">
                           <div class="col-6">
                              <h3>View Category</h3>
                           </div>
                           <div class="col-6">
                              <ol class="breadcrumb">
                                 <li class="breadcrumb-item"><a href="index.php">                                      
                                    <i data-feather="home"></i></a>
                                 </li>
                                 <li class="breadcrumb-item">Category</li>
                                 <li class="breadcrumb-item active"> View Category</li>
                              </ol>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <!-- Individual column searching (text inputs) Starts-->
                     <div class="card">
                        <div class="col-sm-12 col-xl-12 xl-100">
                           <div class="card-body">
                           @if (session('message'))
                           <div class="alert alert-success mb-2" id="hi">
                           {{session('message')}}
                           </div>
                           @endif
                           @if (session('error_message'))
                           <div class="alert alert-danger mb-2" id="hi">
                           {{session('error_message')}}
                           </div>
                           @endif

                           @if (session('messagem'))
                           <div class="alert alert-success mb-2" id="hi">
                           Successfully Update Category
                           </div>
                           @endif





                              <div id="myDIV" class="table-responsive product-table" >
                                 <table class="hover" id="datatable_page" id="example-style-5">
                                    <thead style="background-color: #E5E5E5">
                                       <tr>
                                          <th scope="col">#</th>
                                          <th scope="col">Name</th>
                                          <th scope="col">Image</th>
                                          <th scope="col">Action</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                    @php
$count= 1
@endphp
                                       @foreach($categories as $category)
                                       <tr> 
                                 
                                          <td scope="row">{{$count++}}</td>
                                          <td>{{$category->name}}</td>
                                       
                                          <td><img src="{{asset('storage/app/'.$category->icon)}}" style=" height:48px;width:52px; border-radius: 50px"  alt="" srcset=""></td>
                                          <td> <a    data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm" > 
                                          <a href="{{url('admin/editcategory',$category->id)}}"><i class="fa fa-edit fa-lg" style="color: blue"></i></a>
                                       &nbsp;
                                             <a href="{{url('admin/categorydelete/'.$category->id)}}" onClick="return confirm('Are you sure?')"><i class="fa fa-times-circle fa-lg" style="color: red" ></i></a>
                                          </td>
                                       </tr>
                                       
                                       @endforeach
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- Individual column searching (text inputs) Ends-->
                  </div>
                  <!-- Container-fluid Ends-->
               </div>
            </div>
            <!-- footer start-->
            @include('admin.includes.footer')
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
      <script src="{{asset('public/assets/js/scrollbar/simplebar.js')}}"></script>
      <script src="{{asset('public/assets/js/scrollbar/custom.js')}}"></script>
      <!-- Sidebar jquery-->
      <script src="{{asset('public/assets/js/config.js')}}"></script>
      <!-- Plugins JS start-->
      <script src="{{asset('public/assets/js/sidebar-menu.js')}}"></script>
      <script src="{{asset('public/assets/js/notify/bootstrap-notify.min.js')}}"></script>
      <script src="{{asset('public/assets/js/select2/select2.full.min.js')}}"></script>
      <script src="{{asset('public/assets/js/select2/select2-custom.js')}}"></script>
      <!-- Plugins JS Ends-->
      <!-- Theme js-->
      <script src="https://use.fontawesome.com/43c99054a6.js')}}"></script>
      <script src="{{asset('public/assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
      <script src="{{asset('public/assets/js/datatable/datatables/datatable.custom.js')}}"></script>
      <script src="{{asset('public/assets/js/script.js')}}"></script>
      <script>
$('#hi').delay(2000).slideUp(1200);
</script>
<script type="text/javascript">
            $('#datatable_page').dataTable( {
              "pageLength": 25,
               "order": [[ 1, "desc" ]]
            } );
        </script>
      <!-- login js-->
      <!-- Plugin used-->
   </body>
   <!-- Mirrored from admin.pixelstrap.com/cuba/theme/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Apr 2021 09:50:21 GMT -->
</html>