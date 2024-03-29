<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use App\Models\User;
use App\Mail\Email;

class RegisterController extends Controller
{
    /**
     * Returns to Register page.
     */
    public function Register_view()
    {
        return view('register');
    }
    /**
     * Handles Register form submit
     */
    public function Register_done(Request $request)
    {
        $request->validate([
            'uname' => 'required|string|min:2|max:10',
            'email' => 'required|email|min:8|max:35',
            Rule::unique('user', 'email'),
            'password' => 'required|min:8|max:15',
            'pass_conf' => 'required|same:password',
            'check_terms' => 'accepted',
            ]);

            $user = new User();
            $id_user = $user->getUserIdByEmail($request->email);

            if($id_user != null){
                return redirect('register')->with('scrollToSelection', 'section');
        }else{
            if($request->password == $request->pass_conf && $request->check_terms != null){
                $cod_verify = Str::upper(Str::random(4));
                $hash_cod_verify = Hash::make($cod_verify);
                $name = $request->uname;
                $role = 6;
                $hash_pssw = Hash::make($request->password);                
                $response = Mail::to($request->email)->send(new Email($name,$cod_verify));
                $result=$user->createUser($request->uname, $request->email, $hash_pssw, $hash_cod_verify, $role, now());
                return redirect('verify')->with('scrollToSelection', 'section');
            }else{
                return redirect('register')->with('scrollToSelection', 'section');
            }
        }
  
    }
    public function Verify(Request $request)
    {
        $request->validate([            
            'email' => 'required|email',
            'password' => 'required|min:8|max:12',
            'code' => 'required',
            ]);
            $password=$request->password;
            $user = new User();
            $user_id=$user->getUserIdByEmail($request->email);
            $user_by_id = $user->getUserdById($user_id);

            if(Hash::check($password, $user_by_id->password) && Hash::check($request->code, $user_by_id->cod_verify)){
                $active = 0;
                $result=$user->updateUser($user_id, $user_by_id->username, $user_by_id->email, $user_by_id->password, $user_by_id->cod_verify, $active,$user_by_id->reg_date);
                return redirect('login');
            }else{
                return redirect('verify');
            }

    }
}