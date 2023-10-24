<?php

namespace App\Traits;
use Config;
use Illuminate\Http\Request;
use App\Models\Books;

trait CommonTrait {
    public function uploadFile(Request $request,$imagePath){
        if (!file_exists($imagePath)) {
            mkdir($imagePath, 0755, true); // Create the directory
        }
        if(!empty($request->file_path) && file_exists($request->file_path)){
            $this->removeFile($request->file_path);
        }
        $image = $request->file('image');
        $imgName = time().'_'.strtolower($image->getClientOriginalName());
        $image->move($imagePath, $imgName);
        return $imgName;
    }

    public function removeFile($filePath){
        unlink($filePath);
    }
}