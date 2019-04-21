<?php

namespace App\Http\Controllers\Admin\Service;

use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;
use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceImage ;

use Image;
use Storage;


class ImageController extends Controller
{
   

   // return view of seo data 
    public function addImages($id)
    {
        $data ['service'] = Service::findOrFail($id);
        $data['images'] = ServiceImage::where('service_id',$id)->get();
        return view('admin.service.images.index')->with($data);

    }



     // storing data in db 
    public function moreImages(Request $request)
    {
        $this->validate($request, [

                'id'   => 'required|numeric|exists:services,id',
                'img'   => 'required',
                'img.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:100000'

        ]);

         if($request->hasfile('img'))
         {
            foreach($request->file('img') as $image)
            { 
                $data = new ServiceImage();

                // upload image using intervention without resizeing
                $img = Image::make($image);
                // save image
                $img->save(UPLOADS_PATH.SERVICE_IMAGES_PATH.$image->hashName());

                $data->service_id = $request->id;
                $data->img = $image->hashName();
                $data->save();

            }
         }
        session()->flash('message',trans('site.added_success'));
        return back();
    }




    public function deleteImage($id)
    {
        $data = ServiceImage::findOrFail($id);
        Storage::disk('public_uploads')->delete(SERVICE_IMAGES_PATH.$data->img);
        ServiceImage::destroy($id);
        session()->flash('message',trans('site.deleted_success'));
        return back();


    }








}
