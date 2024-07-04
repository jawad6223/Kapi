<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\signupcontroller;
use App\Http\Controllers\forgetcontroller;
use App\Http\Controllers\dashboardcontroller;
use App\Http\Controllers\logoutcontroller;
use App\Http\Controllers\categorycontroller;
use App\Http\Controllers\teamcontroller;

use App\Http\Controllers\profilecontroller;
use App\Http\Controllers\citycontroller;
use App\Http\Controllers\postcontroller;
use App\Http\Controllers\passwordcontroller;
use App\Http\Controllers\editcontroller;
use App\Http\Controllers\FileUploadController;

use App\Http\Controllers\mapcontroller;
use App\Http\Controllers\partice;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
 |
*/


route::get('/', [mapcontroller::class,'mapfunction']);
route::post('mapaction', [mapcontroller::class,'mapfunction1']);
Route::get('mapaction', function () {
    return redirect('/');
  
});

route::get('mapaction2', [mapcontroller::class,'mapfunction2']);
route::get('copy/{id}', [mapcontroller::class,'mapcopy']);

Route::get('copy/mapaction2', function () {
    return redirect('mapaction2');
  
});
route::post('copy/mapaction', [mapcontroller::class,'mapfunction1']);



//--------------------Admin--------------------------------


Route::get('login', function () {
    return redirect('admin/login');
  
});
Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return redirect('admin/login');
      
    });

    route::post('loginaction', [logincontroller::class,'admin_loginpage']);
    route::view('login','admin.login');
    Route::get('forget', [forgetcontroller::class,'admin_forgetpage']);
    route::post('adminforget',[forgetcontroller::class,'admin_forget']);
      
    //----------Middleware---------------------

    Route::group(['middleware' => 'one'], function () {

        
    //----------category----------------------

        route::post('categoryaction',[categorycontroller::class,'admin_category']);
        route::view('addcategory','admin.addcategory');
        route::get('viewcategory',[categorycontroller::class,'admin_view_category']);

       


        route::get('categorydelete/{id}',[categorycontroller::class,'admin_team_delete']);
        route::get('editcategory/{id}',[categorycontroller::class,'editcategory']);
        route::post('editcategoryaction',[categorycontroller::class,'editcategoryaction']);


        // ----------------City-------------
        route::view('addcity','admin.addcity');
        route::post('addcityaction',[citycontroller::class,'addcityaction']);
        route::get('viewcity',[citycontroller::class,'viewcity']);
        route::get('citydelete/{id}',[citycontroller::class,'citydelete']);
    //----------team----------------------

    route::get('pendingteam',[teamcontroller::class,'admin_pending_team']);
    route::get('teamdetail/{id}',[teamcontroller::class,'admin_teamdetail']);
    route::get('pendingapprovals/{id}',[teamcontroller::class,'admin_pendingapprovals']);
    route::get('teamdetail/{id}',[teamcontroller::class,'admin_teamdetail']);
    route::get('admin_team_delete/{id}',[teamcontroller::class,'admin_team_delete']);
    route::post('addteamaction',[teamcontroller::class,'admin_addteam']);
    route::view('addteam','admin.addteam');
    route::get('viewteam',[teamcontroller::class,'admin_view_team']);

      //----------post----------------------
      route::post('adminaddpost',[postcontroller::class,'adminaddpost']);
        route::get('addpost' ,[postcontroller::class,'adminviewpost']);
        route::get('viewpost',[postcontroller::class,'viewpostadmin']);

        route::get('pendingpost',[postcontroller::class,'adminpendingpost']);
        route::get('pendingdelete/{id}',[postcontroller::class,'admin_pending_delete']);
        route::get('pendingpost/{id}',[postcontroller::class,'admin_pendingpost']);
        route::get('partice',[partice::class,'partice']);



        route::get('editteam/{id}', [editcontroller::class,'profile_edit']);
        route::post('/team_edit',[editcontroller::class,'team_edit']);

        Route::get('upload-ui/{id}', [FileUploadController::class, 'admindropzoneUi' ]);
      Route::post('file-upload', [FileUploadController::class, 'dropzoneFileUpload' ])->name('dropzoneFileUpload');
      Route::post('file-upload1', [FileUploadController::class, 'dropzoneFileUploadedit' ])->name('dropzoneFileUploadedit');


        route::get('adminpostdelete/{id}',[postcontroller::class,'admin_post_delete']);

        route::get('adminpostedit/{id}',[postcontroller::class,'admin_post_edit']);
        route::post('admineditpost', [postcontroller::class,'admin_post_update']);


        route::get('admineditpost2/{id}',[postcontroller::class,'admin_post_edit2']);   
        
        route::get('adminimagedelete/{id}',[postcontroller::class,'admin_image_delete']);
        
        route::get('adminvideodelete/{id}',[postcontroller::class,'admin_video_delete']);
        
        route::get('adminattachmentdelete/{id}',[postcontroller::class,'adminattachmentdelete']);

 //--------------------------------


 route::get('profile', [profilecontroller::class,'admin_profile']);
 route::post('adminprofileupdate', [profilecontroller::class,'admin_profile_update']);


        route::get('logout', [logoutcontroller::class,'admin_logout']);
 
       

        route::get('dashboard',[dashboardcontroller::class,'admin_pending_team']);
        route::get('pendingapprovals/{id}',[dashboardcontroller::class,'admin_pendingapprovals']);


       
        route::view('updatepassword','admin.updatepassword');
        route::post('adminupdatepassword', [passwordcontroller::class,'adminupdatepassword']);
    
    });

});



//--------------------Team--------------------------------

Route::prefix('team')->group(function () {
    Route::get('/', function () {
        return redirect('team/login');
      
    });
  
    route::view('signup','team.signup');
    
    Route::post("signup", [signupcontroller::class,'team_signuppage'] );
 route::post('teamlogin', [logincontroller::class,'team_loginpage'] );
route::view('login','team.login');
Route::get("forget", [forgetcontroller::class,'team_forgetpage'] );
route::post('teamforget',[forgetcontroller::class,'team_forget']);

Route::group(['middleware' => 'two'], function () {

    route::get('dashboard',[dashboardcontroller::class,'teamdashboard']);
    route::get('dashboarddelete/{id}',[dashboardcontroller::class,'team_post_delete']);
    
    route::view('profile','team.profile');


    route::view('updatepassword','team.updatepassword');
    route::post('teamupdatepassword', [passwordcontroller::class,'teamupdatepassword']);


    route::get('logout', [logoutcontroller::class,'team_logout']);
    
    
          //----------post----------------------

          Route::get('upload-ui/{id}', [FileUploadController::class, 'teamdropzoneUi' ]);
          Route::post('file-upload2', [FileUploadController::class, 'dropzoneFileUpload1' ])->name('dropzoneFileUpload1');

          Route::post('file-upload3', [FileUploadController::class, 'dropzoneFileUpload12' ])->name('dropzoneFileUpload12');
          Route::post('file-upload4', [FileUploadController::class, 'dropzoneFileUploadedit12' ])->name('dropzoneFileUploadedit12');

          route::post('teamaddpost',[postcontroller::class,'teamaddpost']);
            route::get('addpost' ,[postcontroller::class,'teamviewpost']);
            route::get('viewpost',[postcontroller::class,'viewpostteam']);
            route::get('postdelete/{id}',[postcontroller::class,'team_post_delete']);

            route::get('postedit/{id}',[postcontroller::class,'team_post_edit']);
            route::post('teameditpost', [postcontroller::class,'team_post_update']);

            route::get('editpost2/{id}',[postcontroller::class,'team_post_edit2']);   
            
            route::get('imagedelete/{id}',[postcontroller::class,'team_image_delete']);
            
            route::get('videodelete/{id}',[postcontroller::class,'team_video_delete']);
            
            route::get('attachmentdelete/{id}',[postcontroller::class,'team_attachment_delete']);




            route::get('profile', [profilecontroller::class,'team_profile']);
        route::post('teamprofileupdate', [profilecontroller::class,'team_profile_update']);

});
});

