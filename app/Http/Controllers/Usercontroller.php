<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

use App\User;


class Usercontroller extends Controller
{
    //
    
        
    public function __construct() {
            $this->middleware('auth');
        }
        
        
        public function config(){
            $user = \Auth::user();
            
            
            
            return view('user.user',array('user'=>$user));
            //return view('user.user');
        }
        
        
        
        public function update(Request $request){
            
            $user = \Auth::user();
            $user_id = $user->id;
            
            //validacion
            $validation = $this->validate($request,[
                'name'=>'required|alpha|max:255',
                'surname'=>'required|alpha|max:255',
                'role'=>'required|string|max:255',
                'email'=>'required|string|email|max:255|unique:users,email,'.$user_id,
                
            ]);
            //pick up the info
            $name = $request->input('name');
            $surname = $request->input('surname');
            $email = $request->input('email');
            $role = $request->input('role');
            
            //set the object
            $user->name = $name;
            $user->surname = $surname;
            $user->email = $email;
            $user->role = $role;
            
          
            
            $user->update();
            
            return redirect()->route('config')->with(array('message'=>"Userinfo successfully updated"));
            
            
        }
        
        
        public function getImage($filename){
            
            $file = Storage::disk('users')->get($filename);
            return new Response($file,200);
        }
    
    
}
