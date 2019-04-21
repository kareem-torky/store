<?php 

namespace App\Helpers\Classes;

use Image;
class UploadClass
{
	
	public static function uploadFile($request,$name_file,$path,$all=null,$big=700)
	{
        // upload one file and return name of this file after change the name of this file  
            // create instanc
        
        // add more size of image ( small , medium , big )
        if($all)
        {
            // small -> in small folder
            Image::make($request->$name_file)->resize(300, null, function ($constraint) 
            {
                $constraint->aspectRatio();
            })->save($path.'small/'.$request->$name_file->hashName());


            // medium -> in medium folder
            Image::make($request->$name_file)->resize(500, null, function ($constraint) 
            {
                $constraint->aspectRatio();
            })->save($path.'medium/'.$request->$name_file->hashName());

            //  big  -> in the root of path 
            Image::make($request->$name_file)->resize($big, null, function ($constraint) 
            {
                $constraint->aspectRatio();
            })->save($path.$request->$name_file->hashName());


        }
        else
        {
            Image::make($request->$name_file)->resize('300', null, function ($constraint) 
            {
                $constraint->aspectRatio();
            })->save($path.$request->$name_file->hashName());

        }


        return $request->$name_file->hashName();
     
	}


    //	upload image withoutResize and with resizing
	public  static  function uploadImage($request,$name_file,$path,$small=null,$medium=null)
    {

        if($small){$s=$small;}else{$s='400';}
        if($medium){$m=$medium;}else{$m='600';}
        // small -> in small folder
        Image::make($request->$name_file)->resize($s, null, function ($constraint) 
        {
            $constraint->aspectRatio();
        })->save($path.'small/'.$request->$name_file->hashName());

        // medium -> in medium folder
        Image::make($request->$name_file)->resize($m, null, function ($constraint) 
        {
            $constraint->aspectRatio();
        })->save($path.'medium/'.$request->$name_file->hashName());

        // upload image using intervention without resizeing
        $img = Image::make($request->$name_file);
        // save image
        $img->save($path.$request->$name_file->hashName());

        return $request->$name_file->hashName();
    }








    //	upload image withoutResize
	public  static  function uploadRealImage($request,$name_file,$path)
    {
        // upload image using intervention without resizeing
        $img = Image::make($request->$name_file);
        // save image
        $img->save($path.$request->$name_file->hashName());

        return $request->$name_file->hashName();
    }
















}





























