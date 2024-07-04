<!DOCTYPE html>
<html lang="en">
   <head>
   <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js"></script>
   <script>
        var dropzone = new Dropzone('#file-upload', {
            previewTemplate: document.querySelector('#preview-template').innerHTML,
            parallelUploads: 3,
            thumbnailHeight: 150,
            thumbnailWidth: 150,
            maxFilesize: 5,
            filesizeBase: 1500,
            thumbnail: function (file, dataUrl) {
                if (file.previewElement) {
                    file.previewElement.classList.remove("dz-file-preview");
                    var images = file.previewElement.querySelectorAll("[data-dz-thumbnail]");
                    for (var i = 0; i < images.length; i++) {
                        var thumbnailElement = images[i];
                        thumbnailElement.alt = file.name;
                        thumbnailElement.src = dataUrl;
                    }
                    setTimeout(function () {
                        file.previewElement.classList.add("dz-image-preview");
                    }, 1);
                }
            }
        });
        
        var minSteps = 6,
            maxSteps = 60,
            timeBetweenSteps = 100,
            bytesPerStep = 100000;

        dropzone.uploadFiles = function (files) {
            var self = this;

            for (var i = 0; i < files.length; i++) {

                var file = files[i];
                totalSteps = Math.round(Math.min(maxSteps, Math.max(minSteps, file.size / bytesPerStep)));

                for (var step = 0; step < totalSteps; step++) {
                    var duration = timeBetweenSteps * (step + 1);
                    setTimeout(function (file, totalSteps, step) {
                        return function () { 
                            file.upload = {
                                progress: 100 * (step + 1) / totalSteps,
                                total: file.size,
                                bytesSent: (step + 1) * file.size / totalSteps
                            };

                            self.emit('uploadprogress', file, file.upload.progress, file.upload
                                .bytesSent);
                            if (file.upload.progress == 100) {
                                file.status = Dropzone.SUCCESS;
                                self.emit("success", file, 'success', null);
                                self.emit("complete", file);
                                self.processQueue();
                            }
                        };
                    }(file, totalSteps, step), duration);
                }
            }
        }

    </script>

    <style>
        .dropzone {
            background: #e3e6ff;
            border-radius: 13px;
            max-width: 550px;
            margin-left: auto;
            margin-right: auto;
            border: 2px dotted #1833FF;
            margin-top: 50px;
        }

    </style>
       <link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/vendors/datatables.css')}}">

   </head>
   @include('admin.includes.head');
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
         @include('admin.includes.topbar');
         <!-- Page Body Start-->
         <div class="page-body-wrapper">
            @include('admin.includes.sidebar');
            <div class="page-body">
               <div class="container-fluid">
                  <div class="row">
                     <!-- Individual column searching (text inputs) Starts-->
                     <div class="page-title " style="padding-top:0px;">
                        <div class="row ">
                           <div class="col-6">
                              <h3>View Files</h3>
                           </div>
                           <div class="col-6">
                              <ol class="breadcrumb">
                                 <li class="breadcrumb-item"><a href="index.php">                                      
                                    <i data-feather="home"></i></a>
                                 </li>
                                 <li class="breadcrumb-item">Files</li>
                                 <li class="breadcrumb-item active"> View Files</li>
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
                              @if (session('message90'))
                              <div class="alert alert-success mb-2" id="hi">
                                 Successfully Delete post
                              </div>
                              @endif
                              @if (session('message77'))
                              <div class="alert alert-success mb-2" id="hi">
                                 Successfully Delete File
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
                                          <th scope="col">FILES</th>
                                          <th scope="col">Action</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       @php
                                       $count= 1;
                                       @endphp
                                       @foreach($images as $image)
                                       <tr>
                                          <td scope="row">  {{$count++}} </td>
                                          <td> 
                                             <a href="{{asset('public/images/'.$image->file)}}" target="blank" itemprop="contentUrl" data-size="1600x950">
                                             <img class="img-fluid rounded" src="{{asset('public/images/'.$image->file)}}" itemprop="thumbnail" alt="gallery"
                                                style="height:150px;width:150px" ></a>

                                                <div class="caption"> <p>
                                                                                       {{$image->description}}
                                                                                    </p></div>
                                          <td>
                                             <a href="{{url('admin/adminimagedelete/'.$image->id)}}" onClick="return confirm('Are you sure?')"><i class="fa fa-times-circle fa-lg" style="color: red" ></i></a>
                                          </td>
                                       </tr>
                                       @endforeach
                                       @foreach($videos as $video)
                                       <tr>
                                          <td scope="row">  {{$count++}} </td>
                                          <td>
                                             <a href="{{asset('public/images/'.$video->file)}}" target="blank" itemprop="contentUrl" data-size="1600x950">
                                                <video width="150" height="150" controls>
                                                   <source src="{{asset('public/images/'.$video->file)}}" >
                                                   Your browser does not support the video tag.
                                                </video>
                                             </a>
                                             <div class="caption"> <p>
                                                                                       {{$video->description}}
                                                                                    </p></div>
                                          <td>
                                             <a href="{{url('admin/adminvideodelete/'.$video->id)}}"  target="blank" onClick="return confirm('Are you sure?')"><i class="fa fa-times-circle fa-lg" style="color: red" ></i></a>
                                          </td>
                                       </tr>
                                       @endforeach
                                       @foreach($attachments as $attachment)
                                       <tr>
                                          <td scope="row">  {{$count++}} </td>
                                          <td> 
                                             <a href="{{asset('public/images/'.$attachment->file)}}">
                                             {{$attachment->file}}</a>
                                             <div class="caption"> <p>
                                                                                       {{$attachment->description}}
                                                                                    </p></div>
                                          <td>
                                             <a href="{{url('admin/adminattachmentdelete/'.$attachment->id)}}"  onClick="return confirm('Are you sure?')"><i class="fa fa-times-circle fa-lg" style="color: red" ></i></a>
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
               <!-- Container-fluid Ends-->
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-sm-12">
                        <div class="card">
                      
                           <div class="card-header">
                           
                           <div id="dropzone">
                           <form  method="post"  action="{{ route('dropzoneFileUploadedit') }}"   enctype="multipart/form-data">
                                 @csrf
                            
                                 <input type="hidden" name="post_id" id="post_id" value="{{$id}}">
                                 <div class="row">
                                    <div class="col-md-10">
                                       <label for="" class="col-form-label">
                                          <H5>Attach Files:</H5>
                                       </label>
                                    </div>
                                    <div class="col-md-2">
                                        <a type="button" style="float:right;font-size:40px;padding-right:15px;color:#1f2e2e" id="click"><i class="fas fa-plus-square"></i></a>
                                    </div>
                                 </div>

                                 <div class="row mt-2">
                                    <div class="col-md-12 mt-2">
                                       <input class="form-control" id="#address"  required  name="file[]" type="file" >
                                    </div>
                                
                                    <div class="col-md-12 mt-2">
                                        <textarea id="" class="md-textarea form-control" rows="4"  required  name="description[]"></textarea>
                                    </div>
                                 </div>

                                 <div id="body">

                                 </div>

<div class="card-footer text-end">
                                    <button class="btn btn-danger " name="submit" type="submit">Save</button>
                                 </div></div>

                              </form>
    </div>

                             
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
            </div>
         </div>
         <!-- footer start-->
         @include('admin.includes.footer');
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
      <script>
  $(function(){

    var html = '';
  var counter=0
    $('#click').click(function(){
           counter++ 

           html = '<div class="row mt-2" id="'+counter+'" >'+
                        '<div class="col-md-10">'+
                            '<input class="form-control" id="#address"  required  name="file[]" type="file" >'+
                        '</div>'+
                        '<div class="col-md-2">'+
                        '  <button type="button" class="btn btn-danger" onclick="deleterow('+counter+')"  ><li class="fa fa-times"></li></button>'+ 
                        '</div>'+

                        '<div class="col-md-12 mt-2">'+
                            '<textarea id="" class="md-textarea form-control" rows="4"  required  name="description[]"></textarea>'+
                        '</div>'+
                    '</div>';
                    $('#body').append(html)
       
    })
  })
 function deleterow(id){
    $('#'+id).remove()

  }
</script>
   </body>
   <!-- Mirrored from admin.pixelstrap.com/cuba/theme/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Apr 2021 09:50:21 GMT -->
</html>