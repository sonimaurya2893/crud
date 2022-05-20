<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
     $posts = Post::with("user")->orderBy("created_at")->paginate(10);
     
     return view("admin.index",compact("posts"));
    }


    public function postForm(){
        return view("admin.create");
    }

    
    public function postStore(Request $request){
        $request->validate([
            'name'=>'required|string|min:3|max:50',
            'description'=>'required|string|min:5',
            'image'=>'required|image:jpg,jpeg,png|max:10000'
        ]);
        $imageName ="";
        if($request->hasFile("image")){
            $image = $request->image;
            $imageName = time().".".$image->getClientOriginalExtension();
            $path = public_path() . '/front/images/posts/';
            $image->move($path, $imageName);
        }
        $data =[
            'name'=>$request->name,
            'description'=>strip_tags($request->description),
            'image'=>$imageName,
            "user_id"=>auth()->user()->id
        ];
    
        $result = Post::create($data);
        if($result){
            return redirect()->back()->with("success","Post Created Successfully!!");
        }
        
    }


    public function edit($id){
        $post = Post::findOrFail($id);
        return view("admin.edit",compact("post"));
    }


    public function update(Request $request ,$id){
        $request->validate([
            'name'=>'required|string|min:3|max:50',
            'description'=>'required|string|min:5',
        ]);
        $post = Post::findOrFail($id);
        if($request->hasFile("image")){
            $image = $request->image;
            $imageName = time().".".$image->getClientOriginalExtension();
            $path = public_path() . '/front/images/posts/';
            $image->move($path, $imageName);
            $post->image  = $imageName;
        }
        
       
        $post->name=$request->name;
        $post->description=strip_tags($request->description);
        $post->user_id=auth()->user()->id;
        $result = $post->save();
        if($result){
            return redirect()->back()->with("success","Post Updated Successfully!!");
        }
        else{
            return redirect()->back()->with("Fail","Fail to Update!!");
        }
        
    }

    public function delete($id){
        $result = Post::where("id",$id)->delete();
        if($result){
            return redirect()->back()->with("success","Post Deleted Successfully!!");
        }
        else{
            return redirect()->back()->with("Fail","Fail to Delete!!");
        }
        
    }

    public function view($id){
        $post = Post::findOrFail($id);
        return view("admin.view",compact("post"));
    }
}


