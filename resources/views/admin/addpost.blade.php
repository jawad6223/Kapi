<!DOCTYPE html>
<html lang="en">
   <head>
   </head>
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
                  <div class="page-title " style="padding-top:0px;">
                     <div class="row mt-4">
                        <div class="col-6">
                           <h3>Add Post</h3>
                        </div>
                        <div class="col-6">
                           <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="index.php">                                      
                                 <i data-feather="home"></i></a>
                              </li>
                              <li class="breadcrumb-item">Post</li>
                              <li class="breadcrumb-item active"> Add Post</li>
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
                           <div class="card-header">
                              @if (session('message'))
                              <div class="alert alert-success mb-2" id="hi">
                                 Successfully Add Post
                              </div>
                              @endif
                              <form class="theme-form" method="post" action="adminaddpost">
                                 @csrf
                                 <div class="row">
                                    <div class="col-md-4 ">
                                       <select class="js-example-basic-single col-sm-12" required name="postcategoryid">
                                          <option value="">Select Post Category </option>
                                          @foreach ($categories as $categorie) {
                                          <option value="{{$categorie->id}}">
                                             {{$categorie->name}}
                                          </option>
                                          @endforeach
                                       </select>
                                    </div>
                                    <div class="col-md-4 ">
                                       <input class="form-control" id="" type="text" required name="title" placeholder="Title">
                                       @error('title')
                                       <div class="text-danger mb-2" role="alert">
                                          {{$message}}
                                       </div>
                                       @enderror
                                    </div>
                                    <div class="col-md-4 ">
                                       <input class="form-control" id="#address"  required  name="source" type="url" placeholder="Source">
                                    </div>
                                 </div>
                                 <div class="row mt-4  ">
                                    <div class="col-md-12 ">
                                       <textarea id="" class="md-textarea form-control" rows="4" placeholder="Description" required  name="description"></textarea>
                                    </div>
                                 </div>
                                 <div class="row mt-4">
                                
                                    <div class="col-md-6 ">
                                       <input class="form-control"  required id="lat" name="latitude" type="text" placeholder="Latitude">
                                       @error('latitude')
                                       <div class="text-danger mb-2" role="alert">
                                          {{$message}}
                                       </div>
                                       @enderror
                                    </div>
                                    <div class="col-md-6 ">
                                       <input class="form-control" required id="lng" type="text" name="longitude" placeholder="Longitude">
                                       @error('longitude')
                                       <div class="text-danger mb-2" role="alert">
                                          {{$message}}
                                       </div>
                                       @enderror
                                    </div>
                                    

                                    <div class="col-md-6 mt-4 ">
                                    <label for="" style="color:#a3a3a3">Date {mm/dd/yyyy}</label>
                                       <input class="form-control" required  type="date" name="date" >
                                    </div>
                                    <div class="col-md-6 mt-4 ">
                                    <label for="" >City name</label>
                                    <select class="js-example-basic-single col-sm-12" id="mySelect"  onchange="myFunction()" required>
                                          <option value="">Select City name </option>
                                          @foreach($city as $city)
                                          <option value="{{$city->lat}},{{$city->lng}}"   >
                                             {{$city->name}}
                                          </option>
                                          @endforeach
                                       </select>
                                 </div>
                                 </div>
                                 <div class="row mt-4">
                                    <div id="map" style="height: 350px;"></div>
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
      <script>
function myFunction() {
   let str  = document.getElementById("mySelect").value;
   var words = str.split(",");
   var word1 = parseFloat(words[0]);
   var word2 = parseFloat(words[1]);

   document.getElementById('lat').value = word1;
   document.getElementById('lng').value = word2;
}
</script>
      <script>
         function myMap() {
         var mapProp= {
             center:new google.maps.LatLng(36.4103,44.3872),
             zoom:5,
         };

         const image ="{{asset('public/assets/images/map_icon.png')}}";
         var map=new google.maps.Map(document.getElementById("map"),mapProp);
         var marker;
        
         google.maps.event.addListener(map, 'click', function(event) {
         // alert(event.latLng.lat() + ", " + event.latLng.lng());
         $('#lat').val(event.latLng.lat());
         $('#lng').val(event.latLng.lng());
          if (marker && marker.setMap) {
             marker.setMap(null);
           }
          marker = new google.maps.Marker({
             position: {
                 lat: event.latLng.lat(),
                 lng: event.latLng.lng()
             },
             map: map,
             icon: image,
             title: event.latLng.lat()+","+event.latLng.lng()
         });
         
         map.setZoom(8);
               map.setCenter(marker.getPosition());
               // map.setCenter(38.577099024063436,42.63863452121868);
         });
         
         
                
         
         
         
         }
         
         
      </script>
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
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDMlR4YuYz3KMPmTmOXSwQc7p6IS-a19Bs&callback=myMap"></script>
      <script>
         $('#hi').delay(2000).slideUp(1200);
      </script>
   </body>
</html>