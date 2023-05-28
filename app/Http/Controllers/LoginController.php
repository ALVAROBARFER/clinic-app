<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * Returns Login page.
     */
    public function Login_view()
    {
        return view('login');
    }
    /**
     * Handles Login form submit
     */
    public function Login_done(Request $request)
    {
        $this->validate(request(),[
            $request->email,$request->password
            ]);

            $user = new User();

            $email = $request->email;
            $password = $request->password;

            $id_user = $user->getUserIdByEmail($email)[0];

            $user_by_id=$user->getUserdById($id_user);

            if($email == $user_by_id->email && $password == $user_by_id->password){

                switch($user_by_id->role_cod_role){
                    case 1:
                        return redirect('/')->with('status', 'Login successful');
                        break;
                    case 2:
                        return redirect('/')->with('status', 'Login successful');
                        break;
                    case 3:
                        return redirect('/')->with('status', 'Login successful');
                        break;
                    default:
                    return redirect('login')->with('status', 'Login failed. The user has no role.');
                        break;
                }
           }else{
                return redirect('login')->with('status', 'Login failed');
            }   
    }
}