<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;


class forgetcontroller extends Controller
{
    //
    public  function admin_forgetpage(){
        return view('admin.forget');

    }
    public  function admin_forget(Request $req){
        $req->validate([
            'email' => 'required|email',
        ]);

        $user = user::where('email', $req->email)->first();

        if ($user) {
            
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $password = '';
            for ($i = 0; $i < 10; $i++) {
                $password = $characters[rand(0, strlen($characters))];
            }
            
            $user->password = bcrypt($password);
            $user->save();

            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $to = $req->email;
            $from = 'info@kapinstitute.org';
            $subject = 'Reset Password';
            $message = '<p>Hye User</br>There was a request for password resetting. your system generated password is '.$password.'</p>';
            $headers .= 'From: info@kapinstitute.org'."\r\n".
            'Reply-To: info@kapinstitute.org'. "\r\n" .
            'X-Mailer: PHP/' . phpversion();
            
            if(mail($to, $subject, $message, $headers))
            {
                return back()->with('message1','djj');
            }
            else{
                return back()->with('message2','djj');
            }
           
         
        }
        else{
            return back()->with('message','djj');
        }
        
    }


    
    public  function team_forgetpage(){
        return view('team.forget');
    }


    public  function team_forget(Request $req){
    //    dd($req);
        $req->validate([
            'email' => 'required|email',

        ]);

        $user = user::where('email', $req->email)->first();

        if ($user) {
            
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $password = '';
            for ($i = 0; $i < 10; $i++) {
                $password = $characters[rand(0, strlen($characters))];
            }
            
            $user->password = bcrypt($password);
            $user->save();

            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $to = $req->email;
            $from = 'info@kapinstitute.org';
            $subject = 'Reset Password';
            $message = '<p>Hye User</br>There was a request for password resetting. your system generated password is '.$password.'</p>';
            $headers .= 'From: info@kapinstitute.org'."\r\n".
            'Reply-To: info@kapinstitute.org'. "\r\n" .
            'X-Mailer: PHP/' . phpversion();
            
            if(mail($to, $subject, $message, $headers))
            {
                return back()->with('message1','djj');
            }
            else{
                return back()->with('message2','djj');
            }
           
         
        }
        else{
            return back()->with('message','djj');
        }
        
    }
}
