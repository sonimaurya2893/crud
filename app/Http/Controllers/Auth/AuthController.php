<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index(){
        return view("auth.signup");
    }

    public function signup(Request $request){
        $request->validate([
        'name'=>'required|string|min:3|max:50',
        'email'=>'required|email|unique:users',
        'password'=>'required|string|min:8|max:10',
        'description'=>'required|string|min:5',
        'image'=>'required|image:jpg,jpeg,png|max:10000'
    ]);
     $imageName ="";
    if($request->hasFile("image")){
        $image = $request->image;
        $imageName = time().".".$image->getClientOriginalExtension();
        $path = public_path() . '/front/images/profile/';
        $image->move($path, $imageName);
    }
    $data =[
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>bcrypt($request->password),
        'description'=>strip_tags($request->description),
        'image'=>$imageName
    ];

    $result = User::create($data);
    if($result){
        return redirect()->route("home");
    }
    }

    public function loginForm(){
        return view("auth.login");
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $remember = $request->has('remember') ? true : false; 

        $user = User::where('email',$request->email)->first();

        if (auth()->attempt(['email' => $request->email, 'password' => $request->password], $remember)) {

            return redirect()->route('home');

        }else{
            session()->flash('message', 'Invalid credentials');
            return redirect()->back();
        }
    }

    public function logout(){
            \Auth::logout();
            return redirect()->route('login.view');
        
    }
}
