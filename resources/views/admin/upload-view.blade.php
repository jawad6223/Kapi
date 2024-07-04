<!DOCTYPE html>
<html lang="en">
   
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
               <div class="container-fluid ">
                  <div class="page-title " style="padding-top:0px;">
                     <div class="row">
                        <div class="col-6">
                           <h3>Upload File</h3>
                        </div>
                        <div class="col-6">
                           <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="index.php">                                      
                                 <i data-feather="home"></i></a>
                              </li>
                              <li class="breadcrumb-item">File</li>
                              <li class="breadcrumb-item active">Upload File</li>
                           </ol>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Container-fluid starts-->
               <div class="container-fluid">
                  <div class="row">
                     <div class=" col-sm-12">
                        <div class="card">
                           <div class="card-header">
                              <form  method="post"  action="{{ route('dropzoneFileUpload') }}"   enctype="multipart/form-data">
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
      
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script>
         $('#hi').delay(2000).slideUp(1200);
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
</html>