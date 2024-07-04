<!DOCTYPE html>
<html>
   <head>
      <title>KAPI | KURDISTAN MAP</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/vendors/bootstrap.css')}}">
      <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
      <link rel="icon" href="{{asset('public/assets/images/favicon.png')}}" type="image/x-icon">
      <link rel="shortcut icon" href="{{asset('public/assets/images/favicon.png')}}" type="image/x-icon">
      <style>
         /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
         #map {
         height: 100%;
         }
         /* Optional: Makes the sample pa] fill the window. */
         html,
         body {
         height: 100%;
         margin: 0;
         padding: 0;
         }
         .container-fluid{
         height:100%;
         }
         .col-height{
         height:710px; 
         }
         .col-height2{
         overflow-y :scroll;
         height:630px; 
         }
         .videos{
         width: 100%;
         height:250px;
         }
         .map1{
         color: #404040;
         }
         .map1:hover {
         color:#4775d1;
         }
      </style>
   </head>
   <body>
      <div class="container-fluid">
         <div class="row">
            <div class="col-lg-9 col-height">
               <div id="map"> 
               </div>
            </div>
            <div class="col-lg-3 " id="sidenav" >
               <div class="row mt-2 mr-3 mb-3" >
               <div class="col-3" >
               <a href="https://www.kapinstitute.org" target="blank"><img class="" 
               src="{{asset('public/assets/images/logo/login.png')}}" 
               style="width:70px;height:50px;" alt="looginpage"> </a>

                  </div>

                  <div class="col-3">
                     <a class=" mb-2 map1"   href="{{url('mapaction2')}}"  class="map1" > 
                     <i class="fas fa-archive pl-3" >
                     </i> <br> <span  > Archive </span></a>
                  </div>
                  <div class="col-3 ">
                     <a class="mb-2 map1"  href="{{url('mapaction')}}"  > 
                     <i class="fas fa-list-alt pl-2"  >
                     </i> <br>  <span  > Latest</span></a>
                  </div>
                  <div class="col-3">
                     <a class=" mb-2 map1"  data-bs-toggle="modal" data-bs-target="#test1"  > 
                     <i class="fas fa-search-location pl-2"    >
                     </i>  <br> <span > Search   </span> </a>
                  </div>
               </div>
               <div class="modal fade " id="test1" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-sm">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h4 class="modal-title" id="myLargeModalLabel">  Search Post </h4>
                           <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                           <form class="theme-form" method="post" action="mapaction" >
                              @csrf
                              <div class="row">
                                 <div class="col-md-12 ">
                                    <select class="form-control"  name="postcategoryid">
                                       <option value="990"> All Category</option>
                                       @foreach ($post2 as $categorie) 
                                       <option value="{{$categorie->id}}">
                                          {{$categorie->name}}
                                       </option>
                                       @endforeach
                                    </select>
                                 </div>
                              </div>
                              <div class="row my-2">
                                 <div class="col-md-12">
                                    <label for="" class="col-form-label ">Title</label>
                                    <input class="form-control" name="title" id="" type="text" >
                                 </div>
                              </div>
                              <div class="row my-2">
                                 <div class="col-md-12  ">
                                    <label for="" class="col-form-label ">From-date</label>
                                    <input class="form-control" name="fromdate" id="" type="date" >
                                 </div>
                              </div>
                              <div class="row my-2">
                                 <div class="col-md-12">
                                    <label for="" class="col-form-label ">To-date</label>
                                    <input class="form-control"  name="todate" id="" type="date" >
                                 </div>
                              </div>
                              <div class="text-end">
                                 <button class="btn btn-primary " name="submit" type="submit">Show</button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
               <div class=" col-height2" >
                  @foreach($post as $post1)
                  <div class="card shadow-none border"   id="datatable_page{{$post1->id}} " >
                     <div class="card-header">
                        <img src="{{asset('storage/app/'.$post1->category->icon)}}" data-bs-toggle="modal" data-bs-target="#test{{$post1->id}}" style="height:30px;width:30px;" alt="">  <span data-bs-toggle="modal" data-bs-target="#test{{$post1->id}}" > {{$post1->title}}</span> 
                        <span class="float-right">
                        <a href="{{$post1->source}}" target="blank"> <i class="fa fa-external-link-alt pl-1" style="color:black">  </i> Source</a></span>
                     </div>

                     <div class="card-body">
                        <span class="mb-2">
                        <b>{{$post1->date}} </b>
                        </span> <span class="float-right" > <a href="#" onclick="navigator.clipboard.writeText('localhost/news/copy/{{$post1->id}}'   );"><i class="far fa-copy" ></i><b style="font-size:12px;">  Copy Url </b> </a> </span>
                        <p data-bs-toggle="modal" data-bs-target="#test{{$post1->id}}">{{ Str::words($post1->description,40)}}</p>
                       @if($post1->attachments->has('attachment'))
                        <h5>  <b> Attachments </b></h5>
                        @endif
                        @foreach ($post1->attachments as $attachment)
                        <a href="{{asset('public/images/'.$attachment->file)}}" target="blank">
                        {{$attachment->file}}</a>  <br>
                        @endforeach 
                        <br> <br>
                        @foreach ($post1->images as $image)
                        <figure itemprop="associatedMedia" itemscope="">
                           <a href="{{asset('public/images/'.$image->file)}}"  target="blank" itemprop="contentUrl" data-size="1600x950">
                           <img class="img-fluid rounded" src="{{asset('public/images/'.$image->file)}}" itemprop="thumbnail" alt="gallery"
                              style="height:200px;width:500px"  ></a>
                        </figure>
                        @endforeach
                        @foreach ($post1->videos as $video)
                        <a href="{{asset('public/images/'.$video->file)}}" target="blank"  itemprop="contentUrl" data-size="1600x950">
                           <video controls class="videos">
                              <source src="{{asset('public/images/'.$video->file)}}" >
                              Your browser does not support the video tag.
                           </video>
                        </a>
                        
                        @endforeach
                     </div>
                  </div>
                  <br>
                  <div class="modal fade " id="test{{$post1->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                     <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h4 class="modal-title" id="myLargeModalLabel">  <img src="{{asset('storage/app/'.$post1->category->icon)}}"  style="height:50px;width:50px;" alt="">  <span > {{$post1->title}}</span> </h4>
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
                                          <div class="profile-img-style">
                                             <p>{{$post1->description}} </p>
                                             <span  class="" > 
                                             <a href="{{$post1->source}}" target="blank"> <i class="fa fa-external-link-alt pl-1" style="color:black">  </i> Source</a></span> 
                                             @if($post1->attachments->has('attachment'))
                                             <h5> <b> <br> Attachments </b>  </h5>
                                             @endif
                                             @foreach ($post1->attachments as $attachment)
                                             <a href="{{asset('public/images/'.$attachment->file)}}" target="blank">
                                             {{$attachment->file}}</a>
                                             
                                             <div class="caption"> <p>
                                                                                       {{$attachment->description}}
                                                                                    </p></div>
                                             <br>
                                             @endforeach
                                             <div class="row mt-5">
                                                @foreach ($post1->images as $image)
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
                                                @foreach ($post1->videos as $video)
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
                  @endforeach
               </div>
            </div>
         </div>
      </div>
      <!-- <div id="map">
         </div> -->
      <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
      <script
         src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDMlR4YuYz3KMPmTmOXSwQc7p6IS-a19Bs&callback=initMap&libraries=&v=weekly"
         async
         ></script>
      <script>
         // This example creates a simple polygon representing the Bermuda Triangle.
         function initMap() {
           var map = new google.maps.Map(document.getElementById('map'), {
             center: {
               lat:36.4103,
                    lng:44.3872
             },
             zoom: 6,
             mapTypeId: 'terrain'
         });
         
         
           const triangleCoords = [
  {
         "lng":39.998572,
         "lat":36.364405
         },
         {
         "lng":40.717463,
         "lat":36.491086
         },
         {
         "lng":41.254502,
         "lat":36.289929
         },
         {
         "lng":41.66104,
         "lat":36.243466
         },
         {
         "lng":41.992048,
         "lat":36.153729
         },
         {
         "lng":42.274954,
         "lat":36.252394
         },
         {
         "lng":42.607317,
         "lat":36.272363
         },
         {
         "lng":42.723052,
         "lat":36.296968
         },
         {
         "lng":43.079756,
         "lat":36.372004
         },
         {
         "lng":43.144314,
         "lat":36.324444
         },
         {
         "lng":43.3792,
         "lat":36.129478
         },
         {
         "lng":43.37283,
         "lat":36.007769
         },
         {
         "lng":43.369616,
         "lat":35.94623
         },
         {
         "lng":43.332545,
         "lat":35.879486
         },
         {
         "lng":43.292721,
         "lat":35.848317
         },
         {
         "lng":43.283116,
         "lat":35.790406
         },
         {
         "lng":43.763885,
         "lat":35.324538
         },
         {
         "lng":43.379331,
         "lat":35.279663
         },
         {
         "lng":43.364252,
         "lat":35.134901
         },
         {
         "lng":43.47415,
         "lat":34.977516
         },
         {
         "lng":43.796933,
         "lat":34.781507
         },
         {
         "lng":44.491961,
         "lat":34.244031
         },
         {
         "lng":44.732293,
         "lat":34.339369
         },
         {
         "lng":44.9136,
         "lat":34.224772
         },
         {
         "lng":44.968567,
         "lat":34.021262
         },
         {
         "lng":44.994605,
         "lat":34.000349
         },
         {
         "lng":45.314708,
         "lat":33.741952
         },
         {
         "lng":45.556451,
         "lat":33.579651
         },
         {
         "lng":45.849058,
         "lat":33.092025
         },
         {
         "lng":46.166322,
         "lat":33.041414
         },
         {
         "lng":46.484926,
         "lat":33.226609
         },
         {
         "lng":47.071372,
         "lat":33.22322
         },
         {
         "lng":47.741566,
         "lat":33.43443
         },
         {
         "lng":48.159043,
         "lat":33.727384
         },
         {
         "lng":48.867733,
         "lat":33.663461
         },
         {
         "lng":49.098419,
         "lat":34.01939
         },
         {
         "lng":49.04338,
         "lat":34.76285
         },
         {
         "lng":48.735699,
         "lat":35.015171
         },
         {
         "lng":47.939035,
         "lat":35.580041
         },
         {
         "lng":47.911518,
         "lat":35.90999
         },
         {
         "lng":47.559896,
         "lat":36.083298
         },
         {
         "lng":47.526918,
         "lat":36.194211
         },
         {
         "lng":47.537873,
         "lat":36.406732
         },
         {
         "lng":47.528269,
         "lat":36.412014
         },
         {
         "lng":47.296131,
         "lat":36.539239
         },
         {
         "lng":47.186222,
         "lat":36.768411
         },
         {
         "lng":46.845577,
         "lat":36.996877
         },
         {
         "lng":46.373116,
         "lat":37.014379
         },
         {
         "lng":46.070927,
         "lat":37.237738
         },
         {
         "lng":45.691844,
         "lat":37.346963
         },
         {
         "lng":45.373191,
         "lat":37.464757
         },
         {
         "lng":45.39514,
         "lat":37.621572
         },
         {
         "lng":45.257772,
         "lat":37.778042
         },
         {
         "lng":45.241253,
         "lat":38.007817
         },
         {
         "lng":45.153322,
         "lat":38.19802
         },
         {
         "lng":45.125822,
         "lat":38.387735
         },
         {
         "lng":45.329068,
         "lat":38.521122
         },
         {
         "lng":45.350994,
         "lat":38.812807
         },
         {
         "lng":45.444357,
         "lat":38.992379
         },
         {
         "lng":44.757527,
         "lat":39.651043
         },
         {
         "lng":44.499274,
         "lat":39.921199
         },
         {
         "lng":44.394878,
         "lat":40.005402
         },
         {
         "lng":44.169626,
         "lat":40.055857
         },
         {
         "lng":43.977348,
         "lat":40.039015
         },
         {
         "lng":43.894923,
         "lat":40.139877
         },
         {
         "lng":43.84547,
         "lat":40.194447
         },
         {
         "lng":43.664156,
         "lat":40.303448
         },
         {
         "lng":43.559759,
         "lat":40.391363
         },
         {
         "lng":43.598184,
         "lat":40.562702
         },
         {
         "lng":43.69705,
         "lat":40.683637
         },
         {
         "lng":43.691527,
         "lat":40.837601
         },
         {
         "lng":43.526683,
         "lat":41.007777
         },
         {
         "lng":43.405805,
         "lat":41.090626
         },
         {
         "lng":43.438748,
         "lat":41.19406
         },
         {
         "lng":43.328868,
         "lat":41.22298
         },
         {
         "lng":43.208008,
         "lat":41.206436
         },
         {
         "lng":43.153054,
         "lat":41.29317
         },
         {
         "lng":43.092615,
         "lat":41.334427
         },
         {
         "lng":42.966242,
         "lat":41.420983
         },
         {
         "lng":42.850858,
         "lat":41.499196
         },
         {
         "lng":42.510264,
         "lat":41.400333
         },
         {
         "lng":42.147681,
         "lat":41.37144
         },
         {
         "lng":42.043343,
         "lat":41.148421
         },
         {
         "lng":42.010411,
         "lat":40.986882
         },
         {
         "lng":41.906033,
         "lat":40.974429
         },
         {
         "lng":41.845615,
         "lat":40.903872
         },
         {
         "lng":41.664337,
         "lat":40.824913
         },
         {
         "lng":41.5435,
         "lat":40.691737
         },
         {
         "lng":41.285298,
         "lat":40.670877
         },
         {
         "lng":41.175438,
         "lat":40.59582
         },
         {
         "lng":40.823848,
         "lat":40.554053
         },
         {
         "lng":40.55468,
         "lat":40.424501
         },
         {
         "lng":40.615147,
         "lat":40.236048
         },
         {
         "lng":40.692076,
         "lat":40.152128
         },
         {
         "lng":40.532777,
         "lat":40.051258
         },
         {
         "lng":40.291058,
         "lat":40.030201
         },
         {
         "lng":40.12075,
         "lat":40.042801
         },
         {
         "lng":39.944955,
         "lat":40.025956
         },
         {
         "lng":39.703261,
         "lat":39.874314
         },
         {
         "lng":39.461537,
         "lat":39.882719
         },
         {
         "lng":39.302214,
         "lat":39.90799
         },
         {
         "lng":39.142888,
         "lat":39.95431
         },
         {
         "lng":38.967064,
         "lat":40.084714
         },
         {
         "lng":38.637454,
         "lat":40.025806
         },
         {
         "lng":38.395744,
         "lat":39.962646
         },
         {
         "lng":38.236389,
         "lat":40.151847
         },
         {
         "lng":37.983656,
         "lat":40.269289
         },
         {
         "lng":37.676028,
         "lat":40.172773
         },
         {
         "lng":37.379367,
         "lat":40.18533
         },
         {
         "lng":37.016771,
         "lat":40.244019
         },
         {
         "lng":36.604782,
         "lat":40.063416
         },
         {
         "lng":36.297164,
         "lat":39.928703
         },
         {
         "lng":36.192833,
         "lat":39.692368
         },
         {
         "lng":36.072038,
         "lat":39.370332
         },
         {
         "lng":36.061106,
         "lat":39.097998
         },
         {
         "lng":36.352287,
         "lat":39.008444
         },
         {
         "lng":36.780819,
         "lat":38.876037
         },
         {
         "lng":36.995108,
         "lat":38.687633
         },
         {
         "lng":36.968424,
         "lat":38.618649
         },
         {
         "lng":36.907254,
         "lat":38.459989
         },
         {
         "lng":36.830388,
         "lat":38.227311
         },
         {
         "lng":36.753509,
         "lat":38.063124
         },
         {
         "lng":36.627178,
         "lat":37.946232
         },
         {
         "lng":36.61074,
         "lat":37.724955
         },
         {
         "lng":36.440454,
         "lat":37.637979
         },
         {
         "lng":36.583337,
         "lat":37.380884
         },
         {
         "lng":36.4735,
         "lat":37.192927
         },
         {
         "lng":36.380127,
         "lat":37.096577
         },
         {
         "lng":36.22083,
         "lat":37.004484
         },
         {
         "lng":36.094822,
         "lat":36.891208
         },
         {
         "lng":36.182766,
         "lat":36.823289
         },
         {
         "lng":36.190859,
         "lat":36.710011
         },
         {
         "lng":36.212656,
         "lat":36.639472
         },
         {
         "lng":36.231893,
         "lat":36.597593
         },
         {
         "lng":36.303323,
         "lat":36.553481
         },
         {
         "lng":36.442041,
         "lat":36.508254
         },
         {
         "lng":36.446178,
         "lat":36.417682
         },
         {
         "lng":36.494272,
         "lat":36.283844
         },
         {
         "lng":36.547842,
         "lat":36.24177
         },
         {
         "lng":36.580816,
         "lat":36.223492
         },
         {
         "lng":36.649454,
         "lat":36.329239
         },
         {
         "lng":36.670056,
         "lat":36.343625
         },
         {
         "lng":37.014083,
         "lat":36.39177
         },
         {
         "lng":37.032605,
         "lat":36.493969
         },
         {
         "lng":37.004439,
         "lat":36.564597
         },
         {
         "lng":37.040126,
         "lat":36.612578
         },
         {
         "lng":37.23105,
         "lat":36.573451
         },
         {
         "lng":37.415785,
         "lat":36.507266
         },
         {
         "lng":37.688411,
         "lat":36.479144
         },
         {
         "lng":37.922567,
         "lat":36.531608
         },
         {
         "lng":38.28582,
         "lat":36.542139
         },
         {
         "lng":38.518614,
         "lat":36.537198
         },
         {
         "lng":38.674138,
         "lat":36.45588
         },
         {
         "lng":38.736669,
         "lat":36.411819
         },
         {
         "lng":38.800173,
         "lat":36.385344
         },
         {
         "lng":38.858161,
         "lat":36.382052
         },
         {
         "lng":38.900412,
         "lat":36.402081
         },
         {
         "lng":38.922103,
         "lat":36.477355
         },
         {
         "lng":39.052161,
         "lat":36.542763
         },
         {
         "lng":39.133556,
         "lat":36.554367
         },
         {
         "lng":39.659939,
         "lat":36.477716
         },
         {
         "lng":39.998572,
         "lat":36.364405
         }
           ];
         
           
           const bermudaTriangle = new google.maps.Polygon({
             paths: triangleCoords,
             strokeColor: "#FF0000",
             strokeOpacity: 0.8,
             strokeWeight: 2,
             fillColor: "#f8b864",
             fillOpacity: 0.35,
           });
           bermudaTriangle.setMap(map);
         
         
         
         
          
         
           var marker=new Array(); 
           var infoWindow=new Array();
           var icon1;
           @foreach($post as $key=>$post)
         
           
         
            icon1 = {
              url:"{{asset('storage/app/'.$post->category->icon)}}",
              scaledSize: new google.maps.Size(35,35 ),
            };
           
           var lati =parseFloat({{$post->latitude}});
           var lngi =parseFloat({{$post->longitude}});
           
           
            marker[{{$key}}] = new google.maps.Marker({
             position: {
                 lat: lati,
                 lng: lngi,
             },
             map: map,
             icon: icon1,
             
             }); 
         
         
         
         
           infoWindow[{{$key}}] = new google.maps.InfoWindow({
            content:' <div>'+
                            '  <a type="button" class="btn btn-primary"  data-bs-toggle="modal" style="width:100px;margin-bottom:5px;"  target="blank"  data-bs-target="#test{{$post->id}}" >View</a>'+
                           ' </div>',
         });
         google.maps.event.addListener(marker[{{$key}}], 'click', function () {
           
            infoWindow[{{$key}}].open(map,this);
         });
         
         
         @endforeach
         
           
         }
         
            
      </script>
      <script>






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
      <script src="{{asset('public/assets/js/script.js')}}"></script>
      <script src="{{asset('public/assets/js/select2/select2.full.min.js')}}"></script>
      <script src="{{asset('public/assets/js/select2/select2-custom.js')}}"></script>
   </body>
</html>