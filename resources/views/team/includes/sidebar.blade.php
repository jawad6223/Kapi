@include('team.includes.head');
<!-- Page Sidebar Start-->
<div class="sidebar-wrapper">
   <div>
      <div class="logo-wrapper py-2">
         <a href="{{url('team/dashboard')}}"><img class="img-fluid for-light" src="{{asset('public/assets/images/logo/logo.png')}}" style="width:120px;height:70px; " alt="">
         <img class="img-fluid for-dark" src="{{asset('public/assets/images/logo/logo_dark.png')}}" alt=""></a>
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
                  <a class="sidebar-link " href="{{ url('/team/dashboard' )}}"><i data-feather="home"></i><span class="lan-3">Dashboard </span></a>
               </li>
               

              

               <li class="sidebar-list">
                  <a class="sidebar-link sidebar-title" href="#"><i data-feather="inbox"></i><span>Post</span></a>
                  <ul class="sidebar-submenu">
                     <li><a href="{{url('team/addpost')}}">Add Post</a></li>
                     <li><a href="{{url('team/viewpost')}}">View Post</a></li>
                   
                  </ul>
               </li>
               
            </ul>
         </div>
         <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
      </nav>
   </div>
</div>
<!-- Page Sidebar Ends-->