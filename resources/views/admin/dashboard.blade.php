<!DOCTYPE html>
<html lang="en">
   <link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/vendors/datatables.css')}}">
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
               <div class="container-fluid">        
               </div>
               <!-- Container-fluid starts-->
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-6">
                        <h3>Team Info</h3>
                     </div>
                  </div>
                  <div class="row mt-3">
                     <div class="col-sm-12  col-md-4">
                        <div class="card o-hidden">
                           <div class="bg-primary b-r-4 card-body">
                              <div class="media static-top-widget">
                                 <div class="align-self-center text-center"><i class="fa fa-users" style="font-size:30px;"></i></div>
                                 <div class="media-body">
                                    <span class="m-0">Total Teams</span>
                                    <h4 class="mb-0 counter">{{$totalteam}}</h4>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-12 col-md-4">
                        <div class="card o-hidden">
                           <div class="bg-success b-r-4 card-body">
                              <div class="media static-top-widget">
                                 <div class="align-self-center text-center"><i class="fa fa-thumbs-up" style="font-size:30px;"></i></div>
                                 <div class="media-body">
                                    <span class="m-0">Approvals</span>
                                    <h4 class="mb-0 counter">{{$approvalteam}}</h4>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-12  col-md-4">
                        <div class="card o-hidden">
                           <div class="bg-secondary b-r-4 card-body">
                              <div class="media static-top-widget">
                                 <div class="align-self-center text-center"><i class="fa fa-ellipsis-h" style="font-size:30px;"></i></div>
                                 <div class="media-body">
                                    <span class="m-0"> Pending Approvals</span>
                                    <h4 class="mb-0 counter">{{$pendingteam}}</h4>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-6">
                        <h3>Post Info</h3>
                     </div>
                  </div>
                  <div class="row mt-3">
                     <div class="col-sm-12  col-md-4">
                        <div class="card o-hidden">
                           <div class="bg-primary b-r-4 card-body">
                              <div class="media static-top-widget">
                                 <div class="align-self-center text-center"><i class="fa fa-users" style="font-size:30px;"></i></div>
                                 <div class="media-body">
                                    <span class="m-0">Total Post</span>
                                    <h4 class="mb-0 counter">{{$totalpost}}</h4>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-12 col-md-4">
                        <div class="card o-hidden">
                           <div class="bg-success b-r-4 card-body">
                              <div class="media static-top-widget">
                                 <div class="align-self-center text-center"><i class="fa fa-thumbs-up" style="font-size:30px;"></i></div>
                                 <div class="media-body">
                                    <span class="m-0">Approvals</span>
                                    <h4 class="mb-0 counter">{{$approvalpost}}</h4>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-12  col-md-4">
                        <div class="card o-hidden">
                           <div class="bg-secondary  b-r-4 card-body">
                              <div class="media static-top-widget">
                                 <div class="align-self-center text-center"><i class="fa fa-ellipsis-h" style="font-size:30px;"></i></div>
                                 <div class="media-body">
                                    <span class="m-0"> Pending Approvals</span>
                                    <h4 class="mb-0 counter">{{$pendingpost}}</h4>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="container-fluid">
                     <div class="row mt-3">
                        <!-- Individual column searching (text inputs) Starts-->
                        <div class="page-title " style="padding-top:0px;">
                           <div class="row ">
                              <div class="col-6">
                                 <h3>Pending Approvals</h3>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- Individual column searching (text inputs) Starts-->
                     <div class="card">
                        <div class="col-sm-12 col-xl-12 xl-100">
                           <div class="card-body">
                              @if (session('message'))
                              <div class="alert alert-success mb-2" id="hi">
                                 Successfully Approved Post
                              </div>
                              @endif
                              <div id="myDIV" class="table-responsive product-table" >
                                 <table class="hover" id="datatable_page" id="example-style-5">
                                    <thead style="background-color: #E5E5E5">
                                       <tr>
                                          <th scope="col">#</th>
                                          <th scope="col">Name</th>
                                          <th scope="col">Email</th>
                                          <th scope="col">Contact</th>
                                          <th scope="col">Image</th>
                                          <th scope="col">Roll</th>
                                          <th scope="col">Action</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       @php
                                       $count= 1;
                                       @endphp
                                       @foreach($user as $user)
                                       <tr>
                                          <td scope="row">{{$count++}}</td>
                                          <td>{{$user->name}}</td>
                                          <td>{{$user->email}}</td>
                                          <td>{{$user->contact}}</td>
                                          <td><img src="{{asset('storage/app/'.$user->image)}}" style=" height:48px;width:52px; border-radius: 50px" alt=""></td>
                                          <td>
                                             <span class="badge badge-success"> Team</span>
                                          </td>
                                          <td>
                                             <a href="{{url('admin/pendingapprovals',$user->id)}}"><i class="fa fa-check fa-lg" style="color: green"  ></i></a>
                                             &nbsp;
                                             <a href=""  data-bs-toggle="modal" data-bs-target="#test{{$user->id}}"><i class="fa fa-info fa-lg text-info  " ></i></a>
                                          </td>
                                       </tr>
                                       <!-- Large modal-->
                                       <div class="modal fade bd-example-modal-lg" id="test{{$user->id}}" tabindex="-1"  role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                          <div class="modal-dialog modal-lg">
                                             <div class="modal-content">
                                                <div class="modal-header" 
                                                   >
                                                   <h4 class="modal-title" id="myLargeModalLabel">{{$user->name}}</h4>
                                                   <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                   <div class="user-profile ">
                                                      <div class="row">
                                                         <div class="col-sm-12">
                                                            <div class="card hovercard text-center">
                                                               <div class="cardheader" style="height:200px;"  ></div>
                                                               <div class="user-image" >
                                                                  <div class="avatar "><img alt="" src="{{asset('storage/app/'.$user->image)}}" ></div>
                                                               </div>
                                                               <div class="info">
                                                                  <div class="row">
                                                                     <div class="col-sm-6 col-lg-4 order-sm-1 order-xl-0">
                                                                        <div class="row">
                                                                           <div class="col-md-6">
                                                                              <div class="ttl-info text-start">
                                                                                 <h6><i class="fa fa-envelope"></i>   Email</h6>
                                                                                 <span>{{$user->email}}</span>
                                                                              </div>
                                                                           </div>
                                                                           <div class="col-md-6">
                                                                              <div class="ttl-info text-start">
                                                                                 <h6><i class="fa fa-phone"></i>   Contact Us</h6>
                                                                                 <span> {{$user->contact}}</span>
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-sm-12 col-lg-4 order-sm-0 order-xl-1">
                                                                        <div class="user-designation">
                                                                           <div class="title"> <a target="_blank" href="#">{{$user->name}}</a></div>
                                                                           <div class="desc">
                                                                              @if($user->role_id == 1)
                                                                              <span > Admin</span>
                                                                              @else
                                                                              <span> Team</span>
                                                                              @endif
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-sm-6 col-lg-4 order-sm-2 order-xl-2">
                                                                        <div class="row">
                                                                           <div class="col-md-12">
                                                                              <div class="ttl-info text-start">
                                                                                 <h6><i class="fa fa-address-book"></i>   Address</h6>
                                                                                 <span>{{$user->street}},{{$user->city}},{{$user->state}},{{$user->zip}},{{$user->country}}</span>
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       @endforeach
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- Individual column searching (text inputs) Ends-->
               </div>
               </div>
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
   </body>
</html>