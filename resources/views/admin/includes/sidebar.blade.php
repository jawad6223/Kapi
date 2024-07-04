@include('admin.includes.head');
<!-- Page Sidebar Start-->
<div class="sidebar-wrapper">
   <div>
      <div class="logo-wrapper py-2" >
         <a href="{{url('admin/dashboard')}}"><img class="img-fluid for-light pb-2" src="{{asset('public/assets/images/logo/logo.png')}}" alt="" style="width:120px;height:70px; ">
        </a>
         <!-- <div class="back-btn"><i class="fa fa-angle-left"></i></div>
         <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div> -->
      </div>
      <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid" src="{{asset('public/assets/images/logo/logo-icon.png')}}" alt=""></a></div>
      <nav class="sidebar-main">
         <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
         <div id="sidebar-menu">
            <ul class="sidebar-links" id="simple-bar">
               <li class="back-btn">
                  <a href="index.html"><img class="img-fluid" src="{{asset('public/assets/images/logo/logo-icon.png')}}" alt=""></a>
                  <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
               </li>
               <li class="sidebar-list">
                  <a class="sidebar-link " href="{{ url('/admin/dashboard' )}}"><i data-feather="home"></i><span class="lan-3">Dashboard              </span></a>
               </li>
               <li class="sidebar-list">
                  <a class="sidebar-link sidebar-title" href="#"><i data-feather="list"></i><span>Category</span></a>
                  <ul class="sidebar-submenu">
                     <li><a href="{{url('admin/addcategory')}}">Add Category</a></li>
                     <li><a href="{{url('admin/viewcategory')}}">View Category</a></li>
                   

                  </ul>
               </li>
               <li class="sidebar-list">
                  <a class="sidebar-link sidebar-title" href="#"> <i class="fas fa-city "></i><span style="padding-left:10px">City</span></a>
                  <ul class="sidebar-submenu">
                     <li><a href="{{url('admin/addcity')}}">Add City</a></li>
                     <li><a href="{{url('admin/viewcity')}}">View City</a></li>
                   

                  </ul>
               </li>

               <li class="sidebar-list">
                  <a class="sidebar-link sidebar-title" href="#"><i data-feather="users"></i><span>Team</span></a>
                  <ul class="sidebar-submenu">
                     <li><a href="{{url('admin/addteam')}}">Add Team</a></li>
                     <li><a href="{{url('admin/viewteam')}}">View Team</a></li>
                     <li><a href="{{url('admin/pendingteam')}}">Pending Approvals</a></li>
                   

                  </ul>
               </li>

               <li class="sidebar-list">
                  <a class="sidebar-link sidebar-title" href="#"><i data-feather="inbox"></i><span>Post</span></a>
                  <ul class="sidebar-submenu">
                     <li><a href="{{url('admin/addpost')}}">Add Post</a></li>
                     <li><a href="{{url('admin/viewpost')}}">View Post</a></li>
                     <li><a href="{{url('admin/pendingpost')}}">Pending Approvals</a></li>
                  </ul>
               </li>
               
            </ul>
         </div>
         <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
      </nav>
   </div>
</div>
<!-- Page Sidebar Ends-->