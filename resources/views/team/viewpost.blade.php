<!DOCTYPE html>
<html lang="en">
   @include('team.includes.head')
   <link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/vendors/datatables.css')}}">
   <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

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
               <div class="container-fluid">
                  <div class="row">
                     <!-- Individual column searching (text inputs) Starts-->
                     <div class="page-title " style="padding-top:0px;">
                        <div class="row ">
                           <div class="col-6">
                              <h3>View Post</h3>
                           </div>
                           <div class="col-6">
                              <ol class="breadcrumb">
                                 <li class="breadcrumb-item"><a href="index.php">                                      
                                    <i data-feather="home"></i></a>
                                 </li>
                                 <li class="breadcrumb-item">Post</li>
                                 <li class="breadcrumb-item active"> View Post</li>
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
                                 Successfully Delete post
                              </div>
                              @endif
                              @if (session('message991'))
                              <div class="alert alert-success mb-2" id="hi">
                                 Successfully Edit post
                              </div>
                              @endif
                              @if (session('message99'))
                              <div class="alert alert-danger mb-2" id="hi">
                              File does not exist
                              </div>
                              @endif
                              <div id="myDIV" class="table-responsive product-table" >
                                 <table class="hover" id="example-style-5" id="datatable_page">
                                    <thead style="background-color: #E5E5E5">
                                       <tr>
                                          <th scope="col">#</th>
                                          <th scope="col">Post Category</th>
                                          <th scope="col">Title</th>
                                          <th scope="col">Date</th>
                                          <th scope="col">Source</th>
                                          <th scope="col">Status</th>
                                          <th scope="col">Action</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       @php
                                       $count= 1;
                                       @endphp
                                       @foreach ($users as $user)
                                       <tr>
                                          <td scope="row"> {{$count++}} </td>
                                          <td scope="row">{{$user->category->name}}</td>
                                          <td>{{$user->title}}</td>
                                          <td>  {{date('d-m-Y', strtotime($user->date))}}</td>
                                          <td> <a href=" {{$user->source}}" target="blank" > {{$user->source}}</a> </td>
                                          <td scope="row">
                                             @if($user->status == 1)  
                                             <span class="badge badge-success"> Approved</span>
                                             @else
                                             <span class="badge badge-danger">Pending</span>
                                             @endif
                                          </td>
                                          <td>
                                       <a href="{{url('team/postedit',$user->id)}}"><i class="fa fa-edit fa-lg" style="color: blue"></i></a>
                                       &nbsp;
                                             <a href="{{url('team/postdelete',$user->id)}}" onClick="return confirm('Are you sure?')"><i class="fa fa-times-circle fa-lg" style="color: red" ></i></a>
                                             &nbsp;
                                             <a href=""  data-bs-toggle="modal" data-bs-target="#test{{$user->id}}"><i class="fa fa-info fa-lg text-info" ></i></a>
                                             <div class="modal fade " id="test{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                   <div class="modal-content">
                                                      <div class="modal-header">
                                                         <h4 class="modal-title" id="myLargeModalLabel">{{$user->title}}</h4>
                                                         <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                      </div>
                                                      <div class="modal-body">
                                                         <div class="container-fluid">
                                                            <div class="user-profile">
                                                               <div class="row">
                                                                  <!-- user profile first-style start-->
                                                                  <!-- user profile first-style end-->
                                                                  <!-- user profile second-style start-->
                                                                  <div class="col-sm-12">
                                                                     <div class="card">
                                                                        <div class="profile-img-style">
                                                                           <div class="row">
                                                                              <div class="col-sm-8">
                                                                                 <div class="media">
                                                                                    <img class="img-thumbnail rounded-circle me-3" src="{{asset('storage/app/'.$user1->image)}}" alt="Generic placeholder image">
                                                                                    <div class="media-body align-self-center">
                                                                                       <h5 class="mt-0 user-name">
                                                                                          {{$user1->name}}</h5>
                                                                                          <p>
                                                                                         {{date('d-m-Y', strtotime($user->date))}}
                                                                                          </p>
                                                                                    </div>
                                                                                 </div>
                                                                              </div>
                                                                           </div>
                                                                           <hr>
                                                                           <p>{{$user->description}} </p>
                                                                           <br>
                                                                           <a href="{{$user->source}}" target="blank"> <i class="fas fa-external-link-alt pl-1" style="color:black">  </i> Source</a>
                                                                           <h5>  <br> <b> Attachments </b></h5>  
                                                                           @foreach ($user->attachments as $attachment)
                                                                           
                                                                         
                                                                            <a href="{{asset('public/images/'.$attachment->file)}}" target="blank">
                                                                            {{$attachment->file}}</a>
                                                                            
                                                                            <div class="caption"> <p>
                                                                                       {{$attachment->description}}
                                                                                    </p></div>
                                                                          <br>
                                                                              @endforeach
                                                                         
                                                                           <div class="row mt-5">
                                                                           @foreach ($user->images as $image)
                                                                           
                                                                              <div class="col-md-4">
                                                                                 <figure itemprop="associatedMedia" itemscope="">
                                                                                    <a href="{{asset('public/images/'.$image->file)}}" target="blank" itemprop="contentUrl" data-size="1600x950">
                                                                                    <img class="img-fluid rounded" src="{{asset('public/images/'.$image->file)}}" itemprop="thumbnail" alt="gallery"
                                                                                    style="height:200px;width:200px" ></a>
                                                                                    <div class="caption"> <p>
                                                                                       {{$image->description}}
                                                                                    </p></div>
                                                                                 </figure>
                                                                              </div>
                                                                                 @endforeach

                                                                                 @foreach ($user->videos as $video)
                                                                                 <div class="col-md-4">
                                                                                 <a href="{{asset('public/images/'.$video->file)}}" target="blank" itemprop="contentUrl" data-size="1600x950">

                                                                                 <video width="200" height="200" controls>
                                       <source src="{{asset('public/images/'.$video->file)}}" >
                                   
                                 Your browser does not support the video tag.
                                         </video>
                                                                                 </a>
                                                                                 <div class="caption"> <p>
                                                                                       {{$video->description}}
                                                                                    </p></div>
                                                                                 </div>
                                         @endforeach
                                                                                
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
                                          </td>
                                       </tr>
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
      <script src="{{asset('public/assets/js/notify/bootstrap-notify.min.js')}}"></script>
      <script src="{{asset('public/assets/js/select2/select2.full.min.js')}}"></script>
      <script src="{{asset('public/assets/js/select2/select2-custom.js')}}"></script>
      <!-- Plugins JS Ends-->
      <!-- Theme js-->
      <script src="https://use.fontawesome.com/43c99054a6.js')}}"></script>
      <script src="{{asset('public/assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
      <script src="{{asset('public/assets/js/datatable/datatables/datatable.custom.js')}}"></script>
      <script src="{{asset('public/assets/js/script.js')}}"></script>
      <!-- login js-->
      <!-- Plugin used-->
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
   <!-- Mirrored from admin.pixelstrap.com/cuba/theme/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Apr 2021 09:50:21 GMT -->
</html>