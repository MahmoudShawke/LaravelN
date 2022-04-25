<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Profiler\Profile;

class uController extends Controller
{
    function store(Request $request){

       


        $data=$this->validate($request,[
            "title"=>"required|min:3|max:10",
            "content"=>"required|min:3|max:10",
            "image"=>"required|mimes:jpg,JPEG,png"

        ]);
        $title=$data['title'];
        $content=$data['content'];
        $image=$data['image'];

        $img=new ImageClass();
        $img->Store($request);
        
        
        setcookie('title', $title, time() + (86400 * 30), "/");
        setcookie('content', $content, time() + (86400 * 30), "/");
        
        return view('profile',compact('title','content'));
 
    }
}
