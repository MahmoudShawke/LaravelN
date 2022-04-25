<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
class ImageClass
{
    function Store(Request $request)
    {
       foreach ($request->files as $file) {
        $extension = $file->getClientOriginalExtension();
        $fileNameWithExt = $file->getClientOriginalName();
        $fileName =  $file->getPathName();
        
        $arr = explode(' ', $extension);
        $fname = time() . rand() . "." . $arr[0];
        
        $Path = 'Images/' . $fname;
        ImageClass::uploadfile($fileName, $Path);
        

       }
    }
    function uploadfile($tmp, $Path)
    {
      if (move_uploaded_file($tmp, $Path)) {
    
        return "image Uploaded";
      } else {
    
        return "image Uploaded Failed";
      }
    }



}
